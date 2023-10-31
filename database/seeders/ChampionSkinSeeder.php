<?php

namespace Database\Seeders;

use App\Models\Champion;
use Illuminate\Database\Seeder;

class ChampionSkinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $championDataUrl = "http://cdn.merakianalytics.com/riot/lol/resources/latest/en-US/champions.json";
        $championData = json_decode(file_get_contents($championDataUrl), true);

        foreach ($championData as $champion) {
            $championId = $champion['id'];
            $championExists = Champion::where('champion_id', $championId)->first();
        }
    }
}
