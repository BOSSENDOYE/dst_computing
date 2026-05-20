<?php
namespace Database\Seeders;
use App\Models\Stat;
use Illuminate\Database\Seeder;

class StatSeeder extends Seeder {
    public function run(): void {
        $data = [
            // Hero
            ['valeur' => '6+',  'label' => "Ans d'expérience",   'couleur' => 'text-white', 'contexte' => 'hero',    'ordre' => 1],
            ['valeur' => '50+', 'label' => 'Projets livrés',      'couleur' => 'text-white', 'contexte' => 'hero',    'ordre' => 2],
            ['valeur' => '30+', 'label' => 'Clients actifs',      'couleur' => 'text-white', 'contexte' => 'hero',    'ordre' => 3],
            ['valeur' => '5',   'label' => 'Secteurs couverts',   'couleur' => 'text-white', 'contexte' => 'hero',    'ordre' => 4],
            // CTA Banner
            ['valeur' => '10+', 'label' => "Années d'expérience", 'couleur' => 'text-dst-orange',  'contexte' => 'cta', 'ordre' => 1],
            ['valeur' => '50+', 'label' => 'Projets livrés',      'couleur' => 'text-dst-blue',    'contexte' => 'cta', 'ordre' => 2],
            ['valeur' => '30+', 'label' => 'Clients actifs',      'couleur' => 'text-green-400',   'contexte' => 'cta', 'ordre' => 3],
            ['valeur' => '24h', 'label' => 'Réponse garantie',    'couleur' => 'text-purple-400',  'contexte' => 'cta', 'ordre' => 4],
            // Produits section header
            ['valeur' => '5',   'label' => 'Logiciels livrés',    'couleur' => 'text-white', 'contexte' => 'produits','ordre' => 1],
            ['valeur' => '5+',  'label' => 'Secteurs couverts',   'couleur' => 'text-white', 'contexte' => 'produits','ordre' => 2],
            ['valeur' => '50+', 'label' => 'Clients actifs',      'couleur' => 'text-white', 'contexte' => 'produits','ordre' => 3],
            ['valeur' => '10+', 'label' => "Années d'expérience", 'couleur' => 'text-white', 'contexte' => 'produits','ordre' => 4],
            // Qui sommes-nous
            ['valeur' => '10+', 'label' => "Années d'expérience", 'couleur' => 'text-dst-orange', 'contexte' => 'about', 'ordre' => 1],
            ['valeur' => '50+', 'label' => 'Projets livrés',      'couleur' => 'text-dst-orange', 'contexte' => 'about', 'ordre' => 2],
            ['valeur' => '30+', 'label' => 'Clients actifs',      'couleur' => 'text-dst-orange', 'contexte' => 'about', 'ordre' => 3],
            ['valeur' => '5',   'label' => 'Secteurs couverts',   'couleur' => 'text-dst-orange', 'contexte' => 'about', 'ordre' => 4],
        ];

        foreach ($data as $stat) {
            Stat::firstOrCreate(
                ['contexte' => $stat['contexte'], 'label' => $stat['label']],
                array_merge($stat, ['actif' => true])
            );
        }
    }
}
