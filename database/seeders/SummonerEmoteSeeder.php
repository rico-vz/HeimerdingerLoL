<?php

namespace Database\Seeders;

use App\Models\SummonerEmote;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class SummonerEmoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $emoteDataUrl = 'https://raw.communitydragon.org/latest/plugins/rcp-be-lol-game-data/global/default/v1/summoner-emotes.json';
        $emoteData = json_decode(file_get_contents($emoteDataUrl), true);
        $changeCount = 0;

        foreach ($emoteData as $emote) {
            if (str_contains($emote['name'], 'game_summoner_emote_name_')
                || $emote['inventoryIcon'] === ""
                || empty($emote['inventoryIcon'])
                || $emote['inventoryIcon'] === "/lol-game-data/assets/"
                || $emote['id'] === 0) {
                continue;
            }

            $emoteId = $emote['id'];
            $emoteExists = SummonerEmote::where('emote_id', $emoteId)->first();
            $afterKeyword = str_replace('/lol-game-data/assets/ASSETS/Loadouts/SummonerEmotes', '', $emote['inventoryIcon']);
            $imageUrl = 'https://raw.communitydragon.org/latest/plugins/rcp-be-lol-game-data/global/default/assets/loadouts/summoneremotes' . strtolower($afterKeyword);

            $emoteAttributes = [
                'emote_id' => $emote['id'],
                'title' => $emote['name'],
                'image' => $imageUrl,
            ];

            if ($emoteExists && $this->hasAttributesChanged($emoteExists, $emoteAttributes)) {
                Log::info('Emote ' . $emoteId . ' has changed, updating...');
                $emoteExists->update($emoteAttributes);
                $changeCount++;
            } elseif (!$emoteExists) {
                Log::info('New emote detected! Creating ' . $emoteId . '...');
                SummonerEmote::create($emoteAttributes);
                $changeCount++;
            }
        }
        if ($changeCount > 0) {
            Artisan::call('cloudflare:purge');
        }
    }

    private function hasAttributesChanged($champion, $attributes): bool
    {
        foreach ($attributes as $key => $value) {
            if ($champion->{$key} != $value) {
                return true;
            }
        }

        return false;
    }
}
