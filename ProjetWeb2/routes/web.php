<?php

use App\Http\Controllers\AccueilController;
use Illuminate\Support\Facades\Route;



/*****************
 * ACCUEIL
 */
Route::get('/', [AccueilController::class, 'index'])
    ->name('accueil');
