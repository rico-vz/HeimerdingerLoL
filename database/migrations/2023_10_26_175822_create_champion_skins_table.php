<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('champion_skins', function (Blueprint $table) {
            $table->id();

            $table->integer('champion_id');
            $table->unsignedBigInteger('full_skin_id')->unique();
            $table->integer('skin_id');
            $table->string('skin_name');
            $table->longText('lore');
            $table->string('availability');
            $table->boolean('loot_eligible');
            $table->bigInteger('rp_price');
            $table->string('raritiy');
            $table->string('release_date');
            $table->json('associated_skinline');
            $table->boolean('new_effects');
            $table->boolean('new_animations');
            $table->boolean('new_recall');
            $table->boolean('new_voice');
            $table->boolean('new_quotes');
            $table->json('voice_actor');
            $table->json('splash_artist');

            $table->foreign('champion_id')->references('champion_id')->on('champions')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('champion_skins');
    }
};
