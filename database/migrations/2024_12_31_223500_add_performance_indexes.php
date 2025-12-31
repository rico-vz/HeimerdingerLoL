<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    private function indexExists(string $table, string $indexName): bool
    {
        $result = DB::select("SHOW INDEX FROM {$table} WHERE Key_name = ?", [$indexName]);
        return count($result) > 0;
    }

    public function up(): void
    {
        Schema::table('champion_skins', function (Blueprint $table) {
            if (!$this->indexExists('champion_skins', 'champion_skins_availability_index')) {
                $table->index('availability');
            }
            if (!$this->indexExists('champion_skins', 'champion_skins_release_date_index')) {
                $table->index('release_date');
            }
            if (!$this->indexExists('champion_skins', 'champion_skins_slug_index')) {
                $table->index('slug');
            }
            if (!$this->indexExists('champion_skins', 'champion_skins_rarity_index')) {
                $table->index('rarity');
            }
        });

        Schema::table('summoner_icons', function (Blueprint $table) {
            if (!$this->indexExists('summoner_icons', 'summoner_icons_title_index')) {
                $table->index('title');
            }
            if (!$this->indexExists('summoner_icons', 'summoner_icons_esports_team_index')) {
                $table->index('esports_team');
            }
            if (!$this->indexExists('summoner_icons', 'summoner_icons_release_year_index')) {
                $table->index('release_year');
            }
        });
    }

    public function down(): void
    {
        Schema::table('champion_skins', function (Blueprint $table) {
            if ($this->indexExists('champion_skins', 'champion_skins_availability_index')) {
                $table->dropIndex(['availability']);
            }
            if ($this->indexExists('champion_skins', 'champion_skins_release_date_index')) {
                $table->dropIndex(['release_date']);
            }
            if ($this->indexExists('champion_skins', 'champion_skins_slug_index')) {
                $table->dropIndex(['slug']);
            }
            if ($this->indexExists('champion_skins', 'champion_skins_rarity_index')) {
                $table->dropIndex(['rarity']);
            }
        });

        Schema::table('summoner_icons', function (Blueprint $table) {
            if ($this->indexExists('summoner_icons', 'summoner_icons_title_index')) {
                $table->dropIndex(['title']);
            }
            if ($this->indexExists('summoner_icons', 'summoner_icons_esports_team_index')) {
                $table->dropIndex(['esports_team']);
            }
            if ($this->indexExists('summoner_icons', 'summoner_icons_release_year_index')) {
                $table->dropIndex(['release_year']);
            }
        });
    }
};
