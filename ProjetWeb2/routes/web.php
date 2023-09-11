<?php

use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ConnexionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Middleware\Auth;


/****** ROUTE LIBRE ACCES */
/*****************
 * ACCUEIL
 */
Route::get('/', [AccueilController::class, 'index'])
    ->name('accueil');


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


 Route::middleware(['client'])->group(function () {
    Route::get('/client', [ClientController::class, 'index'])->name('client.index');
    // Autres routes nécessitant le middleware "client"
});




 Route::get('/admin', [AdminController::class, 'index'])
 ->name('admin.index')
 ->middleware("admin");

 Route::get('/employee', [EmployeeController::class, 'index'])
 ->name('employee.index')
 ->middleware("employee");




