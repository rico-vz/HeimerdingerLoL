<?php

namespace App\Services;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use RuntimeException;
use Throwable;

class BorisStaticDataClient
{
    private const CHAMPIONS_ENDPOINT = '/lolstaticdata/champions.json';

    private const CHAMPION_RATES_ENDPOINT = '/lolstaticdata/championrates.json';

    private const MERAKI_CHAMPIONS_URL = 'https://cdn.merakianalytics.com/riot/lol/resources/latest/en-US/champions.json';

    private const MERAKI_CHAMPION_RATES_URL = 'https://cdn.merakianalytics.com/riot/lol/resources/latest/en-US/championrates.json';

    public function getChampions(): array
    {
        $payload = $this->fetchWithFallback(
            self::CHAMPIONS_ENDPOINT,
            self::MERAKI_CHAMPIONS_URL,
            fn (mixed $payload): bool => $this->isChampionPayload($payload)
        );

        return $this->normalizeChampionPayload($payload);
    }

    public function getChampionRates(): array
    {
        return $this->fetchWithFallback(
            self::CHAMPION_RATES_ENDPOINT,
            self::MERAKI_CHAMPION_RATES_URL,
            fn (mixed $payload): bool => $this->isChampionRatesPayload($payload)
        );
    }

    private function fetchWithFallback(string $borisEndpoint, string $merakiUrl, callable $validator): array
    {
        try {
            $payload = $this->fetchFromBoris($borisEndpoint);

            if ($validator($payload)) {
                return $payload;
            }

            $this->logInvalidPayload('boris', $borisEndpoint, 'Payload shape validation failed.');
        } catch (Throwable $exception) {
            Log::warning('Boris static data request failed.', [
                'source' => 'boris',
                'endpoint' => $borisEndpoint,
                'status' => $exception->getCode() ?: null,
                'message' => $exception->getMessage(),
            ]);
        }

        Log::warning('Falling back to Meraki static data.', [
            'source' => 'meraki',
            'endpoint' => $merakiUrl,
            'message' => 'Boris request failed or returned invalid payload.',
        ]);

        try {
            $payload = $this->fetchFromMeraki($merakiUrl);

            if ($validator($payload)) {
                Log::warning('Using Meraki static data fallback.', [
                    'source' => 'meraki',
                    'endpoint' => $merakiUrl,
                    'message' => 'Fallback request succeeded.',
                ]);

                return $payload;
            }

            $this->logInvalidPayload('meraki', $merakiUrl, 'Payload shape validation failed.');
        } catch (Throwable $exception) {
            Log::error('Meraki static data fallback failed.', [
                'source' => 'meraki',
                'endpoint' => $merakiUrl,
                'status' => $exception->getCode() ?: null,
                'message' => $exception->getMessage(),
            ]);

            throw new RuntimeException(
                sprintf('Unable to fetch static data from Boris or Meraki for [%s].', $borisEndpoint),
                0,
                $exception
            );
        }

        Log::error('Boris and Meraki returned invalid static data payloads.', [
            'source' => 'meraki',
            'endpoint' => $merakiUrl,
            'status' => null,
            'message' => 'Payload shape validation failed for both sources.',
        ]);

        throw new RuntimeException(
            sprintf('Unable to validate static data payload from Boris or Meraki for [%s].', $borisEndpoint)
        );
    }

    private function fetchFromBoris(string $endpoint): mixed
    {
        $response = Http::withHeaders([
            'X-API-Key' => (string) config('services.boris.api_key'),
        ])->get($this->borisUrl() . $endpoint);

        return $this->decodeResponse($response, $endpoint, 'boris');
    }

    private function fetchFromMeraki(string $url): mixed
    {
        $response = Http::get($url);

        return $this->decodeResponse($response, $url, 'meraki');
    }

    private function decodeResponse(Response $response, string $endpoint, string $source): mixed
    {
        if (! $response->successful()) {
            throw new RuntimeException(
                sprintf('%s request failed with status %d.', ucfirst($source), $response->status()),
                $response->status()
            );
        }

        $payload = $response->json();

        if ($payload === null) {
            throw new RuntimeException(sprintf('%s returned an invalid JSON response.', ucfirst($source)));
        }

        return $payload;
    }

    private function isChampionPayload(mixed $payload): bool
    {
        if (! is_array($payload) || $payload === []) {
            return false;
        }

        if (array_is_list($payload)) {
            return isset($payload[0]['id']);
        }

        $firstChampion = reset($payload);

        return is_array($firstChampion) && isset($firstChampion['id']);
    }

    private function isChampionRatesPayload(mixed $payload): bool
    {
        return is_array($payload) && isset($payload['data']) && is_array($payload['data']);
    }

    private function logInvalidPayload(string $source, string $endpoint, string $message): void
    {
        Log::warning('Static data payload validation failed.', [
            'source' => $source,
            'endpoint' => $endpoint,
            'status' => null,
            'message' => $message,
        ]);
    }

    private function borisUrl(): string
    {
        return rtrim((string) config('services.boris.url'), '/');
    }

    private function normalizeChampionPayload(array $payload): array
    {
        if (array_is_list($payload)) {
            return $payload;
        }

        return array_values($payload);
    }
}
