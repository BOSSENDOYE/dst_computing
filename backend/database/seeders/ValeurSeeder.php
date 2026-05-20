<?php
namespace Database\Seeders;
use App\Models\Valeur;
use Illuminate\Database\Seeder;

class ValeurSeeder extends Seeder {
    public function run(): void {
        $data = [
            ['titre' => 'Excellence',    'texte' => "Code propre, interfaces soignées, documentation complète. Nous ne livrons que ce dont nous sommes fiers.",          'num_bg' => 'bg-dst-blue/20 text-dst-blue',       'ordre' => 1],
            ['titre' => 'Innovation',    'texte' => "Nous explorons constamment de nouvelles technologies pour apporter les meilleures solutions du marché.",            'num_bg' => 'bg-dst-orange/20 text-dst-orange',   'ordre' => 2],
            ['titre' => 'Partenariat',   'texte' => "Nous ne sommes pas de simples prestataires, mais de véritables partenaires dans la durée.",                       'num_bg' => 'bg-green-500/20 text-green-400',     'ordre' => 3],
            ['titre' => 'Confiance',     'texte' => "Confidentialité, transparence et honnêteté dans chaque échange et chaque livrable.",                              'num_bg' => 'bg-purple-500/20 text-purple-400',   'ordre' => 4],
            ['titre' => 'Agilité',       'texte' => "Des cycles courts, des retours fréquents. Vos besoins évoluent, nos solutions s'adaptent.",                       'num_bg' => 'bg-teal-500/20 text-teal-400',       'ordre' => 5],
            ['titre' => 'Ancrage local', 'texte' => "Nous comprenons les défis locaux — énergie, connectivité, coûts — et y apportons des réponses concrètes.",       'num_bg' => 'bg-yellow-500/20 text-yellow-400',   'ordre' => 6],
        ];

        foreach ($data as $item) {
            Valeur::firstOrCreate(['titre' => $item['titre']], array_merge($item, ['actif' => true]));
        }
    }
}
