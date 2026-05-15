<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Temoignage;
use Illuminate\Http\JsonResponse;

class TemoignageController extends Controller {
    public function index(): JsonResponse {
        return response()->json(Temoignage::where('is_active',true)->orderBy('ordre')->get());
    }
}
