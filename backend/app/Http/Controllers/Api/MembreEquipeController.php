<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\MembreEquipe;
use Illuminate\Http\JsonResponse;

class MembreEquipeController extends Controller {
    public function index(): JsonResponse {
        return response()->json(MembreEquipe::where('is_active',true)->orderBy('ordre')->get());
    }
}
