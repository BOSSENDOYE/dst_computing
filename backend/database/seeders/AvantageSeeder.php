<?php
namespace Database\Seeders;
use App\Models\Avantage;
use Illuminate\Database\Seeder;

class AvantageSeeder extends Seeder {
    public function run(): void {
        $data = [
            [
                'icone_path'  => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z',
                'icone_bg'    => 'bg-dst-blue/20',
                'icone_color' => 'text-dst-blue',
                'titre'       => 'Ancrage local',
                'texte'       => "Basés à Dakar, nous connaissons les réalités du marché ouest-africain.",
                'ordre'       => 1,
            ],
            [
                'icone_path'  => 'M13 10V3L4 14h7v7l9-11h-7z',
                'icone_bg'    => 'bg-dst-orange/20',
                'icone_color' => 'text-dst-orange',
                'titre'       => 'Réactivité',
                'texte'       => 'Réponse sous 24h et déploiements rapides, sans bureaucratie.',
                'ordre'       => 2,
            ],
            [
                'icone_path'  => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                'icone_bg'    => 'bg-green-500/20',
                'icone_color' => 'text-green-400',
                'titre'       => 'Fiabilité',
                'texte'       => 'Code de qualité, tests rigoureux et suivi post-déploiement.',
                'ordre'       => 3,
            ],
            [
                'icone_path'  => 'M13 7h8m0 0v8m0-8l-8 8-4-4-6 6',
                'icone_bg'    => 'bg-purple-500/20',
                'icone_color' => 'text-purple-400',
                'titre'       => 'Scalabilité',
                'texte'       => 'Des solutions qui grandissent avec votre activité sans tout refaire.',
                'ordre'       => 4,
            ],
        ];

        foreach ($data as $item) {
            Avantage::firstOrCreate(['titre' => $item['titre']], array_merge($item, ['actif' => true]));
        }
    }
}
