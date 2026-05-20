<?php

namespace Database\Seeders;

use App\Models\Partenaire;
use Illuminate\Database\Seeder;

class PartenaireSeeder extends Seeder
{
    public function run(): void
    {
        $partenaires = [
            ['nom' => 'Ministère de la Santé', 'logo_path' => '/logos/partenaires/msas.svg', 'site_url' => 'https://www.sante.gouv.sn', 'ordre' => 1],
            ['nom' => 'CCIS Dakar', 'logo_path' => '/logos/partenaires/ccis.svg', 'site_url' => 'https://www.ccis.sn', 'ordre' => 2],
            ['nom' => 'GIZ Sénégal', 'logo_path' => '/logos/partenaires/giz.svg', 'site_url' => 'https://www.giz.de', 'ordre' => 3],
            ['nom' => 'Orange Sénégal', 'logo_path' => '/logos/partenaires/orange.svg', 'site_url' => 'https://www.orange.sn', 'ordre' => 4],
            ['nom' => 'Sonatel', 'logo_path' => '/logos/partenaires/sonatel.svg', 'site_url' => 'https://www.sonatel.sn', 'ordre' => 5],
            ['nom' => 'ANSD', 'logo_path' => '/logos/partenaires/ansd.svg', 'site_url' => 'https://www.ansd.sn', 'ordre' => 6],
            ['nom' => 'BHS', 'logo_path' => '/logos/partenaires/bhs.svg', 'site_url' => 'https://www.bhs.sn', 'ordre' => 7],
            ['nom' => 'UCAD', 'logo_path' => '/logos/partenaires/ucad.svg', 'site_url' => 'https://www.ucad.sn', 'ordre' => 8],
        ];

        foreach ($partenaires as $data) {
            Partenaire::updateOrCreate(['nom' => $data['nom']], array_merge($data, ['actif' => true]));
        }
    }
}
