<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Technologie;

class TechnologieController extends Controller {
    public function index() {
        return response()->json(Technologie::where('actif', true)->orderBy('ordre')->get());
    }
}
