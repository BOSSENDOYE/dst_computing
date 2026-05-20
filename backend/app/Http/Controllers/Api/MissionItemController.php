<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\MissionItem;

class MissionItemController extends Controller {
    public function index() {
        return response()->json(MissionItem::where('actif', true)->orderBy('ordre')->get());
    }
}
