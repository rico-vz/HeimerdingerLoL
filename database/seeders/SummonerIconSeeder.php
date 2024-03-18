<?php

namespace Database\Seeders;

use App\Models\SummonerIcon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class SummonerIconSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $iconDataUrl = 'https://raw.communitydragon.org/latest/plugins/rcp-be-lol-game-data/global/default/v1/summoner-icons.json';
        $iconData = json_decode(file_get_contents($iconDataUrl), true);
        $changeCount = 0;

        foreach ($iconData as $icon) {
            if ($icon['yearReleased'] === 0) {
                continue;
            }

            $iconId = $icon['id'];
            $iconExists = SummonerIcon::where('icon_id', $iconId)->first();

            $iconAttributes = [
                'icon_id' => $icon['id'],
                'title' => $icon['title'],
                'description' => $icon['descriptions'][0]['description'] ?? null,
                'release_year' => $icon['yearReleased'],
                'legacy' => $icon['isLegacy'],
                'image' => 'https://raw.communitydragon.org/latest/plugins/rcp-be-lol-game-data/global/default/v1/profile-icons/'.$icon['id'].'.jpg',
                'esports_team' => $icon['esportsTeam'] ?? null,
                'esports_region' => $icon['esportsRegion'] ?? null,
                'esports_event' => $icon['esportsEvent'] ?? null,
            ];

            // Check if the champion already exists and if any attributes have changed, if so update the champion. If the champion doesn't exist, create it.
            // This is to prevent the champion data from being updated every time the seeder is run. As I'll probably run this on a cron job.
            if ($iconExists && $this->hasAttributesChanged($iconExists, $iconAttributes)) {
                Log::info('Icon '.$iconId.' has changed, updating...');
                $iconExists->update($iconAttributes);
                $changeCount++;
            } elseif (! $iconExists) {
                Log::info('New icon detected! Creating '.$iconId.'...');
                SummonerIcon::create($iconAttributes);
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
