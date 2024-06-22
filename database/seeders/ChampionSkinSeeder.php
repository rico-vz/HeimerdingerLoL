<?php

namespace Database\Seeders;

use App\Models\ChampionSkin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChampionSkinSeeder extends Seeder
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
                $skinId = $skin['id'];
                $skinExists = ChampionSkin::where('full_skin_id', $skinId)->first();

                // Original is just the base skin (so, none) so we don't need to store it.
                if ($skin['name'] === 'Original') {
                    continue;
                }

                if ($skin['cost'] == 'Special') {
                    $skin['cost'] = 99999;
                }

                $skinAttributes = [
                    'champion_id' => $champion['id'],
                    'full_skin_id' => $skin['id'],
                    'skin_id' => substr($skin['id'], 3),
                    'skin_name' => $skin['name'].' '.$champion['name'],
                    'lore' => $skin['lore'],
                    'availability' => $skin['availability'],
                    'loot_eligible' => $skin['lootEligible'],
                    'rp_price' => $skin['cost'],
                    'rarity' => $skin['rarity'],
                    'release_date' => $skin['release'],
                    'associated_skinline' => $skin['set'],
                    'new_effects' => $skin['newEffects'],
                    'new_animations' => $skin['newAnimations'],
                    'new_recall' => $skin['newRecall'],
                    'new_voice' => $skin['newVoice'],
                    'new_quotes' => $skin['newQuotes'],
                    'voice_actor' => $skin['voiceActor'],
                    'splash_artist' => $skin['splashArtist'],
                ];

                // Mundo is a special case, his skins often include his name in the skin name, so we need to remove it.
                if (str_contains($skinAttributes['skin_name'], 'Mundo Dr. Mundo')) {
                    $skinAttributes['skin_name'] = str_replace(
                        'Mundo Dr. Mundo',
                        'Mundo',
                        $skinAttributes['skin_name']
                    );
                }

                // Check if the skin already exists and if any attributes have changed, if so update the skin. If the skin doesn't exist, create it.
                // This is to prevent the skin data from being updated every time the seeder is run. As I'll probably run this on a cron job.
                if ($skinExists && $this->hasAttributesChanged($skinExists, $skinAttributes)) {
                    Log::info('Skin '.$skin['name'].' '.$champion['name'].' has changed, updating...');
                    $skinExists->update($skinAttributes);
                    $changeCount++;
                } elseif (! $skinExists) {
                    Log::info('New skin detected! Creating '.$skin['name'].' '.$champion['name'].'...');
                    ChampionSkin::create($skinAttributes);
                    $changeCount++;
                }
            }
        }
        if ($changeCount > 0) {
            Artisan::call('cloudflare:purge');
        }
    }

    private function hasAttributesChanged($skin, $attributes)
    {
        foreach ($attributes as $key => $value) {
            if ($skin->{$key} != $value) {
                return true;
            }
        }

        return false;
    }
}
