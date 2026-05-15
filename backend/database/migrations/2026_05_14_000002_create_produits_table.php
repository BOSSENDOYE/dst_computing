<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('tagline');
            $table->string('secteur');
            $table->text('description');
            $table->json('techs')->nullable();
            $table->json('features')->nullable();
            $table->string('href')->default('/realisations');
            $table->string('accent_color')->default('bg-dst-blue');
            $table->string('badge_class')->default('bg-blue-50 text-dst-blue');
            $table->string('bg_gradient')->nullable();
            $table->text('icon_path')->nullable();
            $table->string('btn_bg')->default('bg-dst-blue');
            $table->boolean('is_active')->default(true);
            $table->integer('ordre')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }
    public function down(): void { Schema::dropIfExists('produits'); }
};
