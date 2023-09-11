<?php

use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\ForfaitController;
use App\Http\Controllers\GroupeController;
use Illuminate\Support\Facades\Route;



/*****************
 * ACCUEIL
 */
Route::get('/', [AccueilController::class, 'index'])
    ->name('accueil');

/*****************
 * FORFAIT
 */
Route::get('/forfaits', [ForfaitController::class, 'index'])
    ->name('forfaits');
/*****************
 * FORFAIT
 */
Route::get('/groupes', [GroupeController::class, 'index'])
    ->name('groupes');
