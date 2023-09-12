<?php

use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ConnexionController;

use App\Http\Controllers\ForfaitController;
use App\Http\Controllers\GroupeController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Middleware\Auth;
use App\Http\Controllers\EnregistrementController;


/****** ROUTE LIBRE ACCES */
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


/******
 * CONNEXION ET ENREGISTREMENT
 */

 Route::get("/connexion", [ConnexionController::class, 'create'])
 ->name('connexion.create')
 ->middleware("guest");

Route::post("/connexion", [ConnexionController::class, 'authentifier'])
 ->name('connexion.authentifier');

Route::post("/deconnexion", [ConnexionController::class, 'deconnecter'])
 ->name('deconnexion');

Route::get("/enregistrement",[EnregistrementController::class, 'create'])
 ->name('enregistrement.create');

Route::post("/enregistrement", [EnregistrementController::class, 'store'])
 ->name('enregistrement.store');




Route::get('/client', [ClientController::class, 'index'])
->name('client.index')
->middleware("client");


 Route::get('/admin', [AdminController::class, 'index'])
 ->name('admin.index')
 ->middleware("admin");

 Route::get('/employee', [EmployeeController::class, 'index'])
 ->name('employee.index')
 ->middleware("employee");




