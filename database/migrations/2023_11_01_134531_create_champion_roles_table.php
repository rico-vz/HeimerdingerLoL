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
        Schema::create('champion_roles', function (Blueprint $table) {
            $table->id();
            $table->integer('champion_id')->unique();
            $table->string('champion_name');
            $table->json('roles');
            $table->timestamps();

            $table->foreign('champion_id')->references('champion_id')->on('champions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('champion_roles');
    }
};
