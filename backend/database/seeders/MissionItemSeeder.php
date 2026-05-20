<?php
namespace Database\Seeders;
use App\Models\MissionItem;
use Illuminate\Database\Seeder;

class MissionItemSeeder extends Seeder {
    public function run(): void {
        $data = [
            [
                'icone_path'  => 'M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z',
                'icone_bg'    => 'bg-dst-blue/10',
                'icone_color' => 'text-dst-blue',
                'barre'       => 'bg-dst-blue',
                'titre'       => 'Notre mission',
                'texte'       => "Accompagner les entreprises africaines dans leur transformation numérique avec des solutions IT innovantes, fiables et adaptées aux réalités locales.",
                'ordre'       => 1,
            ],
            [
                'icone_path'  => 'M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z',
                'icone_bg'    => 'bg-orange-50',
                'icone_color' => 'text-dst-orange',
                'barre'       => 'bg-dst-orange',
                'titre'       => 'Notre vision',
                'texte'       => "Devenir le partenaire technologique de référence en Afrique de l'Ouest, reconnu pour la qualité de nos solutions et notre proximité client.",
                'ordre'       => 2,
            ],
            [
                'icone_path'  => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                'icone_bg'    => 'bg-green-50',
                'icone_color' => 'text-green-600',
                'barre'       => 'bg-green-500',
                'titre'       => 'Notre engagement',
                'texte'       => "Un accompagnement humain, une écoute active et des livrables de qualité. Chaque projet est traité comme une priorité, quelle que soit sa taille.",
                'ordre'       => 3,
            ],
        ];

        foreach ($data as $item) {
            MissionItem::firstOrCreate(['titre' => $item['titre']], array_merge($item, ['actif' => true]));
        }
    }
}
