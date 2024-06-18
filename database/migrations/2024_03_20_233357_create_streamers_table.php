<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('streamers', function (Blueprint $table) {
            $table->id();
            $table->integer('champion_id');
            $table->enum('platform', ['twitch', 'youtube', 'kick', 'douyu', 'huya']);
            $table->string('username');
            $table->string('displayname');

            $table->foreign('champion_id')->references('champion_id')->on('champions')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('streamers');
    }
};
