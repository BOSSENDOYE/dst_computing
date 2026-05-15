<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->string('auteur')->default('Équipe DST')->after('auteur_id');
            $table->string('temps_lecture')->default('5 min')->after('auteur');
        });
    }

    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn(['auteur', 'temps_lecture']);
        });
    }
};
