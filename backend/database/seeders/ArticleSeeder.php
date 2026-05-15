<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'slug'         => 'digitalisation-pharmacies-senegal',
                'titre'        => 'La digitalisation des pharmacies au Sénégal : enjeux et solutions',
                'extrait'      => 'Comment les officines sénégalaises adoptent les logiciels de gestion pour améliorer leur efficacité et mieux servir leurs patients.',
                'contenu'      => 'La digitalisation des officines est un enjeu majeur pour la santé publique au Sénégal...',
                'categorie'    => 'Secteur Santé',
                'auteur'       => 'Équipe DST',
                'temps_lecture'=> '5 min',
                'statut'       => 'publie',
                'publie_le'    => '2025-05-10 08:00:00',
            ],
            [
                'slug'         => 'intelligence-artificielle-pme-afrique',
                'titre'        => "L'IA au service des PME africaines : par où commencer ?",
                'extrait'      => "ChatGPT, Claude, agents IA — décryptage des opportunités réelles pour les entreprises d'Afrique de l'Ouest.",
                'contenu'      => "L'intelligence artificielle est désormais accessible à toutes les entreprises...",
                'categorie'    => 'IA & Data',
                'auteur'       => 'Équipe DST',
                'temps_lecture'=> '7 min',
                'statut'       => 'publie',
                'publie_le'    => '2025-05-02 08:00:00',
            ],
            [
                'slug'         => 'securite-informatique-pme',
                'titre'        => 'Cybersécurité pour les PME : les 5 règles fondamentales',
                'extrait'      => 'Phishing, ransomware, mots de passe faibles — comment protéger votre entreprise sans exploser votre budget IT.',
                'contenu'      => 'La cybersécurité est un sujet incontournable pour toute entreprise moderne...',
                'categorie'    => 'Conseils IT',
                'auteur'       => 'Équipe DST',
                'temps_lecture'=> '6 min',
                'statut'       => 'publie',
                'publie_le'    => '2025-04-20 08:00:00',
            ],
            [
                'slug'         => 'nuxt-vue-applications-africaines',
                'titre'        => 'Nuxt.js pour les apps africaines : performance même sur réseau lent',
                'extrait'      => 'Comment le SSR et les optimisations réseau de Nuxt permettent de créer des apps performantes en Afrique.',
                'contenu'      => 'Le choix du framework web est crucial pour des applications destinées au marché africain...',
                'categorie'    => 'Développement',
                'auteur'       => 'Équipe DST',
                'temps_lecture'=> '8 min',
                'statut'       => 'publie',
                'publie_le'    => '2025-04-08 08:00:00',
            ],
            [
                'slug'         => 'ged-dematerilaisation-documents',
                'titre'        => 'Dématérialisation : comment passer au 0 papier en 3 mois',
                'extrait'      => "Guide pratique pour les entreprises et institutions qui souhaitent digitaliser leur gestion documentaire.",
                'contenu'      => 'Le passage au zéro papier est un projet qui se planifie et s\'exécute étape par étape...',
                'categorie'    => 'Conseils IT',
                'auteur'       => 'Équipe DST',
                'temps_lecture'=> '5 min',
                'statut'       => 'publie',
                'publie_le'    => '2025-03-25 08:00:00',
            ],
            [
                'slug'         => 'infrastructure-serveur-dakar',
                'titre'        => 'Hébergement local vs cloud : le bon choix pour votre entreprise à Dakar',
                'extrait'      => 'Analyse des coûts, de la latence et de la fiabilité pour vous aider à choisir la meilleure infrastructure.',
                'contenu'      => 'La question de l\'hébergement est centrale pour toute infrastructure informatique...',
                'categorie'    => 'Infrastructure',
                'auteur'       => 'Équipe DST',
                'temps_lecture'=> '6 min',
                'statut'       => 'publie',
                'publie_le'    => '2025-03-10 08:00:00',
            ],
        ];

        foreach ($articles as $data) {
            Article::firstOrCreate(['slug' => $data['slug']], $data);
        }
    }
}
