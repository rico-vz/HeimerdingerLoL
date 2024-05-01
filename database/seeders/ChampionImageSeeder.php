<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ChampionImage;
use App\Models\Champion;

class ChampionImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Loop over all champions
        Champion::all()->each(function ($champion) {
            $dataJson = 'https://raw.communitydragon.org/pbe/plugins/rcp-be-lol-game-data/global/default/v1/champions/' . $champion->champion_id . '.json';

            $data = json_decode(file_get_contents($dataJson), true);

            $championSkins = $data['skins'];

            foreach ($championSkins as $skin) {
                $splash = new ChampionImage();
                $splash->full_id = $skin['id'];
                $splash->champion_id = $champion->champion_id;
                $splash->type = 'splash';
                $splash->url = 'https://raw.communitydragon.org/pbe/plugins/rcp-be-lol-game-data/global/default/' . strtolower(substr($skin['splashPath'], strpos($skin['splashPath'], 'ASSETS')));
                $splash->save();

                $uncenteredSplash = new ChampionImage();
                $uncenteredSplash->full_id = $skin['id'];
                $uncenteredSplash->champion_id = $champion->champion_id;
                $uncenteredSplash->type = 'uncentered_splash';
                $uncenteredSplash->url = 'https://raw.communitydragon.org/pbe/plugins/rcp-be-lol-game-data/global/default/' . strtolower(substr($skin['uncenteredSplashPath'], strpos($skin['uncenteredSplashPath'], 'ASSETS')));
                $uncenteredSplash->save();

                $loading = new ChampionImage();
                $loading->full_id = $skin['id'];
                $loading->champion_id = $champion->champion_id;
                $loading->type = 'loading';
                $loading->url = 'https://raw.communitydragon.org/pbe/plugins/rcp-be-lol-game-data/global/default/' . strtolower(substr($skin['loadScreenPath'], strpos($skin['loadScreenPath'], 'ASSETS')));
                $loading->save();

                $tile = new ChampionImage();
                $tile->full_id = $skin['id'];
                $tile->champion_id = $champion->champion_id;
                $tile->type = 'tile';
                $tile->url = 'https://raw.communitydragon.org/pbe/plugins/rcp-be-lol-game-data/global/default/' . strtolower(substr($skin['tilePath'], strpos($skin['tilePath'], 'ASSETS')));
                $tile->save();
            }
        });
    }
}
