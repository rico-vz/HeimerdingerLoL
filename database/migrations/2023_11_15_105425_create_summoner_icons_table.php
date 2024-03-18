<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up(): void
    {
        Schema::create('summoner_icons', function (Blueprint $table) {
            $table->id();
            $table->integer('icon_id');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->integer('release_year')->nullable();
            $table->boolean('legacy');
            $table->string('image');
            $table->string('esports_team')->nullable();
            $table->string('esports_region')->nullable();
            $table->string('esports_event')->nullable();
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('summoner_icons');
    }
};
