<?php

use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ConnexionController;
<<<<<<< HEAD
use App\Http\Controllers\ForfaitController;
use App\Http\Controllers\GroupeController;
=======

use App\Http\Controllers\ForfaitController;
use App\Http\Controllers\GroupeController;

>>>>>>> ee4903211b52abd2d280c2f2202275413e9c736c
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EnregistrementController;
use App\Http\Middleware\Auth;
use App\Http\Controllers\EnregistrementController;


/****** ROUTE LIBRE ACCES */
/*****************
 * ACCUEIL
 */
Route::get('/', [AccueilController::class, 'index'])
    ->name('accueil');

<<<<<<< HEAD
=======

>>>>>>> ee4903211b52abd2d280c2f2202275413e9c736c
/*****************
 * FORFAIT
 */
Route::get('/forfaits', [ForfaitController::class, 'index'])
    ->name('forfaits');
/*****************
<<<<<<< HEAD
 *  GROUPES
 */
Route::get('/groupes', [GroupeController::class, 'index'])
    ->name('groupes');
=======
 * Groupe
 */
Route::get('/groupes', [GroupeController::class, 'index'])
    ->name('groupes');

>>>>>>> ee4903211b52abd2d280c2f2202275413e9c736c

/******
 * CONNEXION ET ENREGISTREMENT
 */

Route::get("/connexion", [ConnexionController::class, 'create'])
    ->name('connexion.create')
    ->middleware("guest");

Route::post("/connexion", [ConnexionController::class, 'authentifier'])
    ->name('connexion.authentifier');

Route::get("/deconnexion", [ConnexionController::class, 'deconnecter'])
    ->name('deconnexion');

Route::get("/enregistrement", [EnregistrementController::class, 'create'])
    ->name('enregistrement.create');

Route::post("/enregistrement", [EnregistrementController::class, 'store'])
    ->name('enregistrement.store');


<<<<<<< HEAD
/******
 * RESERVATION CLIENT
 */
Route::get('/client', [ClientController::class, 'create'])
    ->name('client.create')
    ->middleware("client");

Route::post('/client', [ClientController::class, 'store'])
    ->name('client.store')
    ->middleware("client");




=======
/*****************
 * Client
 */
Route::get('/client', [ClientController::class, 'index'])
->name('client.index')
->middleware("client");

/*****************
 * Admin
 */
Route::get('/admin', [AdminController::class, 'index'])
 ->name('admin.index')
 ->middleware("admin");
/*****************
 * Employee
 */
 Route::get('/employee', [EmployeeController::class, 'index'])
 ->name('employee.index')
 ->middleware("employee");
>>>>>>> ee4903211b52abd2d280c2f2202275413e9c736c


Route::get('/admin', [AdminController::class, 'index'])
    ->name('admin.index')
    ->middleware("admin");

<<<<<<< HEAD
Route::get('/employee', [EmployeeController::class, 'index'])
    ->name('employee.index')
    ->middleware("employee");
=======

>>>>>>> ee4903211b52abd2d280c2f2202275413e9c736c
