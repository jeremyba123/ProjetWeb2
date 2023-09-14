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
 *  GROUPES
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


/******
 * RESERVATION CLIENT
 */
Route::get('/client', [ClientController::class, 'index'])
    ->name('client.index')
    ->middleware("client");

Route::post('/client', [ClientController::class, 'store'])
    ->name('client.store')
    ->middleware("client");

/*****************
 * Admin
 */
Route::get('/admin', [AdminController::class, 'index'])
 ->name('admin.index')
 ->middleware("admin");

 Route::get('/admin/employe', [AdminController::class, 'create'])
 ->name('admin.create')
 ->middleware("admin");

 Route::get('/admin/client', [AdminController::class, 'ajout'])
 ->name('admin.ajout')
 ->middleware("admin");

Route::post("/admin", [AdminController::class, 'store'])
 ->name('admin.store')
 ->middleware("admin");

Route::get('/admin/user/{id}/edit', [AdminController::class, 'edit'])
 ->name('admin.edit')
 ->middleware("admin");

Route::put('/admin/user/{id}', [AdminController::class, 'update'])
 ->name('admin.update')
 ->middleware("admin");

Route::get('/admin/user/{id}', [AdminController::class, 'destroy'])
    ->name('admin.destroy')
    ->middleware("admin");






Route::get('/employee', [EmployeeController::class, 'index'])
    ->name('employee.index')
    ->middleware("employee");
