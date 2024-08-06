<?php

namespace Database\Seeders;

use App\Models\Champion;
use App\Models\ChampionImage;
use Illuminate\Database\Seeder;

class ChampionImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Champion::all()->each(function ($champion) {
            $dataJson = 'https://raw.communitydragon.org/pbe/plugins/rcp-be-lol-game-data/global/default/v1/champions/'.$champion->champion_id.'.json';

            $data = json_decode(file_get_contents($dataJson), true);

            $championSkins = $data['skins'];

            foreach ($championSkins as $skin) {
                $this->updateOrCreateImage($skin, $champion, 'splash', $skin['splashPath']);
                $this->updateOrCreateImage($skin, $champion, 'uncentered_splash', $skin['uncenteredSplashPath']);
                $this->updateOrCreateImage($skin, $champion, 'loading', $skin['loadScreenPath']);
                $this->updateOrCreateImage($skin, $champion, 'tile', $skin['tilePath']);
            }
        });
    }

    /**
     * Update or create a ChampionImage entry.
     */
    private function updateOrCreateImage($skin, $champion, $type, $path): void
    {
        $url = 'https://raw.communitydragon.org/pbe/plugins/rcp-be-lol-game-data/global/default/'.strtolower(substr($path, strpos($path, 'ASSETS')));

        ChampionImage::updateOrCreate(
            [
                'full_id' => $skin['id'],
                'type' => $type,
            ],
            [
                'champion_id' => $champion->champion_id,
                'url' => $url,
            ]
        );
    }
}