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
        Schema::create('champions', function (Blueprint $table) {
            $table->id();

            $table->integer('champion_id')->unique();
            $table->string('key')->unique();
            $table->string('name');
            $table->string('title');
            $table->longText('lore');
            $table->json('roles');
            $table->integer('price_be');
            $table->integer('price_rp');
            $table->string('resource_type');
            $table->string('attack_type');
            $table->string('adaptive_type');
            $table->string('release_date');
            $table->string('release_patch');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('champions');
    }
};
