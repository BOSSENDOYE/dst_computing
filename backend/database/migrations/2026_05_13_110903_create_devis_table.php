<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('devis', function (Blueprint $table) {
            $table->id();
            // Contact
            $table->string('nom_complet');
            $table->string('structure')->nullable();
            $table->string('telephone');
            $table->string('email');
            $table->string('localisation')->nullable();
            // Projet
            $table->string('type_projet');       // logiciel, web, mobile, infra, ia, formation, autre
            $table->string('secteur');           // sante, commerce, douanes, education, services, admin, autre
            $table->text('description_besoin');
            $table->string('budget_estimatif')->nullable(); // <500k, 500k-2M, 2M-10M, >10M, non_defini
            $table->string('delai_souhaite')->nullable();   // urgent, 1-3mois, 3-6mois, sans_contrainte
            $table->string('source_contact')->nullable();   // comment nous avez-vous connu
            $table->string('piece_jointe')->nullable();     // chemin fichier uploadé
            // Statut CRM
            $table->enum('statut', ['nouveau', 'en_cours', 'qualifie', 'gagne', 'perdu'])->default('nouveau');
            $table->text('notes_internes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devis');
    }
};
