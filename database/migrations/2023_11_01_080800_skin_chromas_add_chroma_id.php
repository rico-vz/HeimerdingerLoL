<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('skin_chromas', function (Blueprint $table) {
            $table->string('chroma_id')->after('id')->unique();
        });
    }

    public function down(): void
    {
        Schema::table('skin_chromas', function (Blueprint $table) {
            $table->dropColumn('chroma_id');
        });
    }
};
