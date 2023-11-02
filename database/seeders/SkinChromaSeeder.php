<?php

namespace Database\Seeders;

use App\Models\SkinChroma;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class SkinChromaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $championDataUrl = 'http://cdn.merakianalytics.com/riot/lol/resources/latest/en-US/champions.json';
        $championData = json_decode(file_get_contents($championDataUrl), true);

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
                        'skin_name' => $skin['name'] . ' ' . $champion['name'],
                        'chroma_name' => $chroma['name'],
                        'chroma_colors' => $chroma['colors'],
                        'chroma_image' => $chroma['chromaPath'],
                    ];

                    // Mundo is a special case, his skins often include his name in the skin name, so we need to remove it.
                    if (strpos($chromaAttributes['skin_name'], 'Mundo Dr. Mundo') !== false) {
                        $skinAttributes['skin_name'] = str_replace('Mundo Dr. Mundo', 'Mundo', $chromaAttributes['skin_name']);
                    }

                    if ($chromaExists && $this->hasAttributesChanged($chromaExists, $chromaAttributes)) {
                        Log::info('Updating chroma: ' . $chromaId);
                        $chromaExists->update($chromaAttributes);
                    } elseif (! $chromaExists) {
                        Log::info('Creating chroma: ' . $chromaId);
                        SkinChroma::create($chromaAttributes);
                    }
                }
            }
        }
    }

    private function hasAttributesChanged($chroma, $attributes)
    {
        foreach ($attributes as $key => $value) {
            if ($chroma->{$key} != $value) {
                return true;
            }
        }

        return false;
    }
}
