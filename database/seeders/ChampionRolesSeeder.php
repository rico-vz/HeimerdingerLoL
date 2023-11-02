<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ChampionRoles;
use App\Models\Champion;
use Illuminate\Support\Facades\Log;


class ChampionRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleDataUrl = 'http://cdn.merakianalytics.com/riot/lol/resources/latest/en-US/championrates.json';
        $roleData = json_decode(file_get_contents($roleDataUrl), true);

        foreach ($roleData['data'] as $championId => $roles) {
            $rolesExists = ChampionRoles::where('champion_id', $championId)->first();
            $championExists = Champion::where('champion_id', $championId)->first();

            if ($championExists) $championName = $championExists->name;

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
                Log::info('Roles for ' . $championName . ' have changed, updating...');
                $rolesExists->update($rolesAttributes);
            } elseif (!$rolesExists) {
                Log::info('New roles detected for ' . $championName . '! Creating...');
                ChampionRoles::create($rolesAttributes);
            }
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
