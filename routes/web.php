<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\FonctionController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ValidationController;
use App\Http\Controllers\JustificationsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotedefraisController;
use App\Http\Controllers\AbsencesController;
use App\Http\Controllers\AchatsController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', [HomeController::class, 'index'])->name('accueil');


//Auth::routes();


//ANULATION DE LA ROUTE DE REGISTER
Auth::routes([
  'register' => false, // Registration Routes...
]);

Route::middleware(['validation'])->group(function () {

Route::get('/home', [HomeController::class, 'index'])->name('home');



	Route::prefix('users')->group(function () {
			Route::get('/index', [UserController::class, 'index'])->name('users.index');
			Route::get('/create', [UserController::class, 'create'])->name('users.create');
			Route::post('/store', [UserController::class, 'store'])->name('users.store');
			Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
			Route::post('/update', [UserController::class, 'update'])->name('users.update');
			Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('users.delete');
		});

	Route::prefix('demandes')->group(function () {
			Route::get('/index', [DemandeController::class, 'index'])->name('demandes.index');
			Route::get('/create', [DemandeController::class, 'create'])->name('demandes.create');
			Route::post('/store', [DemandeController::class, 'store'])->name('demandes.store');
			Route::get('/edit/{id}', [DemandeController::class, 'edit'])->name('demandes.edit');
			Route::post('/update', [DemandeController::class, 'update'])->name('demandes.update');
			Route::get('/delete/{id}', [DemandeController::class, 'destroy'])->name('demandes.delete');
		});
	Route::prefix('justifications')->group(function () {
			Route::get('/index', [JustificationsController::class, 'index'])->name('justifications.index');
			Route::get('/create', [JustificationsController::class, 'create'])->name('justifications.create');
			Route::post('/store', [JustificationsController::class, 'store'])->name('justifications.store');
			Route::get('/edit/{id}', [JustificationsController::class, 'edit'])->name('justifications.edit');
			Route::post('/update', [JustificationsController::class, 'update'])->name('justifications.update');
			Route::get('/delete/{id}', [JustificationsController::class, 'destroy'])->name('justifications.delete');
		});
	Route::prefix('fonctions')->group(function () {
			Route::get('/index', [FonctionController::class, 'index'])->name('fonctions.index');
			Route::get('/create', [FonctionController::class, 'create'])->name('fonctions.create');
			Route::post('/store', [FonctionController::class, 'store'])->name('fonctions.store');
			Route::get('/edit/{id}', [FonctionController::class, 'edit'])->name('fonctions.edit');
			Route::post('/update', [FonctionController::class, 'update'])->name('fonctions.update');
			Route::get('/delete/{id}', [FonctionController::class, 'destroy'])->name('fonctions.delete');
		});
	Route::prefix('profils')->group(function () {
			Route::get('/index', [ProfilController::class, 'index'])->name('profils.index');
			Route::get('/create', [ProfilController::class, 'create'])->name('profils.create');
			Route::post('/store', [ProfilController::class, 'store'])->name('profils.store');
			Route::get('/edit/{id}', [ProfilController::class, 'edit'])->name('profils.edit');
			Route::post('/update', [ProfilController::class, 'update'])->name('profils.update');
			Route::get('/delete/{id}', [ProfilController::class, 'destroy'])->name('profils.delete');
		});
	Route::prefix('notedefrais')->group(function () {
			Route::get('/index', [NotedefraisController::class, 'index'])->name('notedefrais.index');
			Route::get('/create', [NotedefraisController::class, 'create'])->name('notedefrais.create');
			Route::post('/store', [NotedefraisController::class, 'store'])->name('notedefrais.store');
			Route::get('/edit/{id}', [NotedefraisController::class, 'edit'])->name('notedefrais.edit');
			Route::post('/update', [NotedefraisController::class, 'update'])->name('notedefrais.update');
			Route::get('/delete/{id}', [NotedefraisController::class, 'destroy'])->name('notedefrais.delete');
		});
    Route::prefix('absences')->group(function () {
        Route::get('/index', [AbsencesController::class, 'index'])->name('absences.index');
        Route::get('/create', [AbsencesController::class, 'create'])->name('absences.create');
        Route::post('/store', [AbsencesController::class, 'store'])->name('absences.store');
        Route::get('/edit/{id}', [AbsencesController::class, 'edit'])->name('absences.edit');
        Route::post('/update', [AbsencesController::class, 'update'])->name('absences.update');
        Route::get('/delete/{id}', [AbsencesController::class, 'destroy'])->name('absences.delete');
    });
    Route::prefix('achats')->group(function () {
        Route::get('/index', [AchatsController::class, 'index'])->name('achats.index');
        Route::get('/create', [AchatsController::class, 'create'])->name('achats.create');
        Route::post('/store', [AchatsController::class, 'store'])->name('achats.store');
        Route::get('/edit/{id}', [AchatsController::class, 'edit'])->name('achats.edit');
        Route::post('/update', [AchatsController::class, 'update'])->name('achats.update');
        Route::get('/delete/{id}', [AchatsController::class, 'destroy'])->name('achats.delete');
    });


   });

Route::prefix('accounts/validation')->group(function () {
			Route::get('/', [ValidationController::class, 'validation'])->name('user.validation');
			Route::post('/store', [ValidationController::class, 'validation_store'])->name('user.validation_store');
		});
