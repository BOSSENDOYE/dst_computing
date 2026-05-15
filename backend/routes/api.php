<?php
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\DevisController;
use App\Http\Controllers\Api\MembreEquipeController;
use App\Http\Controllers\Api\ProduitController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\TemoignageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    // Contenu site (public, pas de rate limit strict)
    Route::get('/produits', [ProduitController::class, 'index']);
    Route::get('/services', [ServiceController::class, 'index']);
    Route::get('/temoignages', [TemoignageController::class, 'index']);
    Route::get('/equipe', [MembreEquipeController::class, 'index']);
    Route::get('/articles', [ArticleController::class, 'index']);
    Route::get('/articles/{slug}', [ArticleController::class, 'show']);

    // Formulaires
    Route::post('/devis', [DevisController::class, 'store'])->middleware('throttle:5,1');
    Route::post('/contact', [ContactController::class, 'store'])->middleware('throttle:10,1');

    // Newsletter
    Route::post('/newsletter', function (Request $request) {
        $request->validate(['email' => 'required|email']);
        return response()->json(['success' => true, 'message' => 'Inscription réussie !']);
    });
});
