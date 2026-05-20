<?php
namespace Database\Seeders;
use App\Models\Technologie;
use Illuminate\Database\Seeder;

class TechnologieSeeder extends Seeder {
    public function run(): void {
        $techs = [
            'Laravel', 'Vue.js', 'Nuxt', 'React', 'Flutter',
            'WinDev', 'WebDev', 'HFSQL', 'MySQL', 'PostgreSQL',
            'SQLite', 'Docker', 'Nginx', 'Ubuntu Server', 'Claude AI',
            'Filament', 'Tailwind CSS',
        ];

        foreach ($techs as $i => $nom) {
            Technologie::firstOrCreate(['nom' => $nom], ['ordre' => $i + 1, 'actif' => true]);
        }
    }
}
