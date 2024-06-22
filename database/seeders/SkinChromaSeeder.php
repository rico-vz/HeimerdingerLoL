<?php

namespace Database\Seeders;

use App\Models\SkinChroma;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SkinChromaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mamcSecret = config('app.MAMC_SECRET');

        $championDataUrl = 'https://mamchamp.orianna.dev/champion-data';
        $championData = Http::withHeaders([
            'MAM-Get-Secret' => $mamcSecret,
        ])->get($championDataUrl)->json();
        $changeCount = 0;

        foreach ($championData as $champion) {
            foreach ($champion['skins'] as $skin) {
                if ($skin['name'] === 'Original') {
                    continue;
                }
                foreach ($skin['chromas'] as $chroma) {
                    if ($chroma === null) {
                        continue;
                    } // To address: https://github.com/meraki-analytics/lolstaticdata/issues/71

                    $chromaId = $chroma['id'];

                    $chromaExists = SkinChroma::where('chroma_id', $chromaId)->first();
                    $chromaAttributes = [
                        'chroma_id' => $chromaId,
                        'full_skin_id' => $skin['id'],
                        'skin_name' => $skin['name'].' '.$champion['name'],
                        'chroma_name' => $chroma['name'],
                        'chroma_colors' => $chroma['colors'],
                        'chroma_image' => $chroma['chromaPath'],
                    ];

                    // Mundo is a special case, his skins often include his name in the skin name, so we need to remove it.
                    if (str_contains($chromaAttributes['skin_name'], 'Mundo Dr. Mundo')) {
                        $chromaAttributes['skin_name'] = str_replace(
                            'Mundo Dr. Mundo',
                            'Mundo',
                            $chromaAttributes['skin_name']
                        );
                    }

                    if ($chromaExists && $this->hasAttributesChanged($chromaExists, $chromaAttributes)) {
                        Log::info('Updating chroma: '.$chromaId);
                        $chromaExists->update($chromaAttributes);
                        $changeCount++;
                    } elseif (! $chromaExists) {
                        Log::info('Creating chroma: '.$chromaId);
                        SkinChroma::create($chromaAttributes);
                        $changeCount++;
                    }
                }
            }
        }
        if ($changeCount > 0) {
            Artisan::call('cloudflare:purge');
        }
    }

    private function hasAttributesChanged($chroma, $attributes): bool
    {
        foreach ($attributes as $key => $value) {
            if ($chroma->{$key} != $value) {
                return true;
            }
        }

        return false;
    }
}
