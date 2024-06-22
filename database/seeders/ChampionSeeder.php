<?php

namespace Database\Seeders;

use App\Models\Champion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class ChampionSeeder extends Seeder
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
            $championId = $champion['id'];
            $championExists = Champion::where('champion_id', $championId)->first();

            $championAttributes = [
                'champion_id' => $champion['id'],
                'key' => $champion['key'],
                'name' => $champion['name'],
                'title' => $champion['title'],
                'lore' => $champion['lore'],
                'roles' => $champion['roles'],
                'price_be' => $champion['price']['blueEssence'],
                'price_rp' => $champion['price']['rp'],
                'resource_type' => $champion['resource'],
                'attack_type' => $champion['attackType'],
                'adaptive_type' => $champion['adaptiveType'],
                'release_date' => $champion['releaseDate'],
                'release_patch' => $champion['releasePatch'],
            ];

            // Check if the champion already exists and if any attributes have changed, if so update the champion. If the champion doesn't exist, create it.
            // This is to prevent the champion data from being updated every time the seeder is run. As I'll probably run this on a cron job.
            if ($championExists && $this->hasAttributesChanged($championExists, $championAttributes)) {
                Log::info('Champion '.$champion['name'].' has changed, updating...');
                $championExists->update($championAttributes);
                $changeCount++;
            } elseif (! $championExists) {
                Log::info('New champion detected! Creating '.$champion['name'].'...');
                Champion::create($championAttributes);
                $changeCount++;
            }
        }
        if ($changeCount > 0) {
            Artisan::call('cloudflare:purge');
        }
    }

    private function hasAttributesChanged($champion, $attributes)
    {
        foreach ($attributes as $key => $value) {
            if ($champion->{$key} != $value) {
                return true;
            }
        }

        return false;
    }
}
