<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Partenaire;

class PartenaireController extends Controller
{
    public function index()
    {
        return Partenaire::where('actif', true)
            ->orderBy('ordre')
            ->get(['id', 'nom', 'logo_path', 'site_url'])
            ->map(function ($p) {
                // Génère l'URL publique complète du logo uploadé via Filament
                if ($p->logo_path) {
                    $p->logo_url = asset('storage/' . $p->logo_path);
                } else {
                    $p->logo_url = null;
                }
                return $p;
            });
    }
}
