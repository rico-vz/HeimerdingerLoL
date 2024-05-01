<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('champion_images', function (Blueprint $table) {
            $table->id();
            $table->text('full_id');
            $table->integer('champion_id');
            $table->enum('type', ['splash', 'uncentered_splash', 'loading', 'tile', 'icon', 'ability', 'video']);
            $table->text('url');
            $table->foreign('champion_id')->references('champion_id')->on('champions')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('champion_images');
    }
};
