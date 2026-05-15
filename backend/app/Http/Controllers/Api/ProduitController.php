<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Produit;
use Illuminate\Http\JsonResponse;

class ProduitController extends Controller {
    public function index(): JsonResponse {
        return response()->json(Produit::where('is_active',true)->orderBy('ordre')->get());
    }
}
