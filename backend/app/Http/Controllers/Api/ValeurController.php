<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Valeur;

class ValeurController extends Controller {
    public function index() {
        return response()->json(Valeur::where('actif', true)->orderBy('ordre')->get());
    }
}
