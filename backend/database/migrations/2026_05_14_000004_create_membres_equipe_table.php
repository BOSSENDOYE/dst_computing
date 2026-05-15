<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('membres_equipe', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('initiales', 5);
            $table->string('poste');
            $table->text('bio');
            $table->json('competences')->nullable();
            $table->string('avatar_bg')->default('bg-dst-blue');
            $table->boolean('is_active')->default(true);
            $table->integer('ordre')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('membres_equipe'); }
};
