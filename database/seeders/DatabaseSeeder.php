<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ChampionSeeder::class);
        $this->call(ChampionSkinSeeder::class);
        $this->call(SkinChromaSeeder::class);
        $this->call(ChampionRolesSeeder::class);
        $this->call(SummonerIconSeeder::class);
        $this->call(SummonerEmoteSeeder::class);
        $this->call(ChampionImageSeeder::class);

        Cache::flush();
        Artisan::call('cloudflare:purge');

        Log::info('Seeding complete at '.date('Y-m-d H:i:s'));
    }
}
