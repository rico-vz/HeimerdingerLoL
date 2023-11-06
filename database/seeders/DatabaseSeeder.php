<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

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

        Cache::flush();

        Log::info('Seeding complete at ' . date('Y-m-d H:i:s'));
    }
}
