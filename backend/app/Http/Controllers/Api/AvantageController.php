<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Avantage;

class AvantageController extends Controller {
    public function index() {
        return response()->json(Avantage::where('actif', true)->orderBy('ordre')->get());
    }
}
