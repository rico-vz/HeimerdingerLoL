<?php

namespace App\Console\Commands;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;

class CloudflarePurgeCommand extends Command
{
    protected $signature = 'cloudflare:purge';

    protected $description = 'Purge the Cloudflare cache.';

    /**
     * @throws GuzzleException
     */
    public function handle(): void
    {
        if (App::environment('production')) {
            $client = new Client;
            $cf_zone_id = config('cloudflare.cf_zone_id');
            $cf_auth_bearer = config('cloudflare.cf_auth_bearer');

            $response = $client->request(
                'POST',
                'https://api.cloudflare.com/client/v4/zones/'.$cf_zone_id.'/purge_cache',
                [
                    'headers' => [
                        'Authorization' => 'Bearer '.$cf_auth_bearer,
                        'Content-Type' => 'application/json',
                    ],
                    'json' => [
                        'purge_everything' => true,
                    ],
                ]
            );

            $body = json_decode($response->getBody(), true);

            if ($body['success'] === true) {
                $this->info('Cloudflare cache purged successfully.');
            } else {
                $this->error('Cloudflare cache could not be purged.');
            }
        }
    }
}
