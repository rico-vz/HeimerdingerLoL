<?php

namespace Database\Seeders;

use App\Models\Champion;
use App\Models\ChampionRoles;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class ChampionRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleDataUrl = 'https://cdn.merakianalytics.com/riot/lol/resources/latest/en-US/championrates.json';
        $roleData = json_decode(file_get_contents($roleDataUrl), true);
        $changeCount = 0;

        foreach ($roleData['data'] as $championId => $roles) {
            $rolesExists = ChampionRoles::where('champion_id', $championId)->first();
            $championExists = Champion::where('champion_id', $championId)->first();

            if (! $championExists) {
                Log::info('Champion with ID '.$championId.' does not exist, skipping...');

                continue;
            }

            $championName = $championExists->name;

            $playedRoles = [];

            foreach ($roles as $role => $data) {
                if ($data['playRate'] > 0) {
                    $playedRoles[] = $role;
                }
            }

            $rolesAttributes = [
                'champion_id' => $championId,
                'champion_name' => $championName,
                'roles' => $playedRoles,
            ];

            if ($rolesExists && $this->hasAttributesChanged($rolesExists, $rolesAttributes)) {
                Log::info('Roles for '.$championName.' have changed, updating...');
                $rolesExists->update($rolesAttributes);
                $changeCount++;
            } elseif (! $rolesExists) {
                Log::info('New roles detected for '.$championName.'! Creating...');
                ChampionRoles::create($rolesAttributes);
                $changeCount++;
            }
        }
        if ($changeCount > 0) {
            Artisan::call('cloudflare:purge');
        }
    }

    private function hasAttributesChanged($roleData, $attributes)
    {
        foreach ($attributes as $key => $value) {
            if ($roleData->{$key} != $value) {
                return true;
            }
        }

        return false;
    }
}
