<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ArticleController extends Controller {
    public function index(Request $request): JsonResponse {
        $query = Article::where('statut','publie')->orderBy('publie_le','desc');
        if ($request->categorie && $request->categorie !== 'Tous') {
            $query->where('categorie', $request->categorie);
        }
        return response()->json($query->get());
    }
    public function show(string $slug): JsonResponse {
        $article = Article::where('slug',$slug)->where('statut','publie')->firstOrFail();
        return response()->json($article);
    }
}
