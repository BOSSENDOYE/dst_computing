<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('produits', function (Blueprint $table) {
            $table->string('type')->default('Logiciel métier')->after('secteur');
            $table->json('produit_stats')->nullable()->after('features');
        });
    }
    public function down(): void {
        Schema::table('produits', function (Blueprint $table) {
            $table->dropColumn(['type', 'produit_stats']);
        });
    }
};
