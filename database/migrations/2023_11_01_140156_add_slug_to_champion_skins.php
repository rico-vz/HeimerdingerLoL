<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('champion_skins', function (Blueprint $table) {
            $table->string('slug')->after('splash_artist')->unique()->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('champion_skins', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
