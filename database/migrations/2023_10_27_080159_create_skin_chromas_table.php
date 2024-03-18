<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('skin_chromas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('full_skin_id');
            $table->string('skin_name');
            $table->string('chroma_name');
            $table->json('chroma_colors');
            $table->string('chroma_image');

            $table->foreign('full_skin_id')->references('full_skin_id')->on('champion_skins');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skin_chromas');
    }
};
