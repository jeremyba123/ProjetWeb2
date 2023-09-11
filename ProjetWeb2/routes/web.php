<?php

use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ConnexionController;
<<<<<<< HEAD
use App\Http\Controllers\ForfaitController;
use App\Http\Controllers\GroupeController;
=======
>>>>>>> 2dccf8a6fedb0bbd564db971c2bd28f59c192b4a
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

<<<<<<< HEAD
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
=======

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




>>>>>>> 2dccf8a6fedb0bbd564db971c2bd28f59c192b4a
