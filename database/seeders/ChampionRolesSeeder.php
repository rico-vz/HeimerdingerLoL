<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ChampionRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // TODO: http://cdn.merakianalytics.com/riot/lol/resources/latest/en-US/championrates.json
        $roleDataUrl = 'http://cdn.merakianalytics.com/riot/lol/resources/latest/en-US/championrates.json';
        $roleData = json_decode(file_get_contents($roleDataUrl), true);
    }
}
