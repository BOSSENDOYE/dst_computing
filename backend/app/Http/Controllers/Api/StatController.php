<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Stat;
use Illuminate\Http\Request;

class StatController extends Controller {
    public function index(Request $request) {
        $query = Stat::where('actif', true)->orderBy('ordre');
        if ($request->has('contexte')) {
            $query->where('contexte', $request->contexte);
        }
        return response()->json($query->get());
    }
}
