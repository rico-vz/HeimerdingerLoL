<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('champions', function (Blueprint $table) {
            $table->string('slug')->after('release_patch')->unique()->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('champions', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
