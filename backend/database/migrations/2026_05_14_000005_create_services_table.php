<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description');
            $table->text('icon_path');
            $table->json('items')->nullable();
            $table->string('icon_bg')->default('bg-dst-blue/20');
            $table->string('icon_color')->default('text-dst-blue');
            $table->string('accent_bar')->default('bg-dst-blue');
            $table->string('link_color')->default('text-dst-blue hover:text-blue-700');
            $table->string('href')->default('/services');
            $table->boolean('is_active')->default(true);
            $table->integer('ordre')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('services'); }
};
