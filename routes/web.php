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
use App\Http\Controllers\DepartementsController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Auth\ForgotPasswordController;
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
    Route::middleware(['admin'])->group(function () {
        
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
				Route::get('/createpdf', [DemandeController::class, 'createpdf'])->name('demandes.createpdf');

			});
		Route::prefix('justifications')->group(function () {
				Route::get('/index', [JustificationsController::class, 'index'])->name('justifications.index');
				Route::get('/createpdf', [JustificationsController::class, 'createpdf'])->name('justifications.createpdf');

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
				Route::get('/createpdf', [NotedefraisController::class, 'createpdf'])->name('notedefrais.createpdf');

			});
		Route::prefix('absences')->group(function () {
			Route::get('/index', [AbsencesController::class, 'index'])->name('absences.index');
			Route::get('/createpdf', [AbsencesController::class, 'createpdf'])->name('absences.createpdf');
			Route::post('/store', [AbsencesController::class, 'store'])->name('absences.store');

		});
		Route::prefix('achats')->group(function () {
			Route::get('/index', [AchatsController::class, 'index'])->name('achats.index');
			Route::get('/createpdf', [AchatsController::class, 'createpdf'])->name('achats.createpdf');

		});
		Route::prefix('departements')->group(function () {
			Route::get('/index', [DepartementsController::class, 'index'])->name('departements.index');
			Route::get('/create', [DepartementsController::class, 'create'])->name('departements.create');
			Route::post('/store', [DepartementsController::class, 'store'])->name('departements.store');
			Route::get('/edit/{id}', [DepartementsController::class, 'edit'])->name('departements.edit');
			Route::post('/update', [DepartementsController::class, 'update'])->name('departements.update');
			Route::get('/delete/{id}', [DepartementsController::class, 'destroy'])->name('departements.delete');
		});
		
		Route::prefix('responsable')->group(function () {
			Route::get('/affect/{id}', [DepartementsController::class, 'affect'])->name('responsable.affect');

		});
        
    });
    
    Route::middleware(['user'])->group(function(){
        
    Route::prefix('absences')->group(function () {
        Route::get('/create', [AbsencesController::class, 'create'])->name('absences.create');
        Route::post('/store', [AbsencesController::class, 'store'])->name('absences.store');
        Route::get('/edit/{id}', [AbsencesController::class, 'edit'])->name('absences.edit');
        Route::get('/delete/{id}', [AbsencesController::class, 'destroy'])->name('absences.delete');
        Route::post('/update', [AbsencesController::class, 'update'])->name('absences.update');
        Route::get('/createUserpdf', [AbsencesController::class, 'createUserpdf'])->name('absences.createUserpdf');

       });
    Route::prefix('achats')->group(function () {
        Route::get('/create', [AchatsController::class, 'create'])->name('achats.create');
        Route::post('/store', [AchatsController::class, 'store'])->name('achats.store');
        Route::get('/edit/{id}', [AchatsController::class, 'edit'])->name('achats.edit');
        Route::get('/delete/{id}', [AchatsController::class, 'destroy'])->name('achats.delete');
        Route::post('/update', [AchatsController::class, 'update'])->name('achats.update');
        Route::get('/createUserpdf', [AchatsController::class, 'createUserpdf'])->name('achats.createUserpdf');


       });
    Route::prefix('demandes')->group(function () {
			Route::get('/create', [DemandeController::class, 'create'])->name('demandes.create');
			Route::post('/store', [DemandeController::class, 'store'])->name('demandes.store');
			Route::get('/edit/{id}', [DemandeController::class, 'edit'])->name('demandes.edit');
            Route::get('/delete/{id}', [DemandeController::class, 'destroy'])->name('demandes.delete');
            Route::post('/update', [DemandeController::class, 'update'])->name('demandes.update');
            Route::post('/modifier', [DemandeController::class, 'modifier'])->name('demandes.modifier');
            Route::get('/editConge/{id}', [DemandeController::class, 'editConge'])->name('demandes.editConge');
			Route::get('/createUserpdf', [DemandeController::class, 'createUserpdf'])->name('demandes.createUserpdf');

		});
	Route::prefix('justifications')->group(function () {
			Route::get('/create', [JustificationsController::class, 'create'])->name('justifications.create');
			Route::post('/store', [JustificationsController::class, 'store'])->name('justifications.store');
			Route::get('/edit/{id}', [JustificationsController::class, 'edit'])->name('justifications.edit');
            Route::get('/delete/{id}', [JustificationsController::class, 'destroy'])->name('justifications.delete');
            Route::post('/update', [JustificationsController::class, 'update'])->name('justifications.update');
            Route::get('/createUserpdf', [JustificationsController::class, 'createUserpdf'])->name('justifications.createUserpdf');

		});
	Route::prefix('notedefrais')->group(function () {
			Route::get('/create', [NotedefraisController::class, 'create'])->name('notedefrais.create');
			Route::post('/store', [NotedefraisController::class, 'store'])->name('notedefrais.store');
			Route::get('/edit/{id}', [NotedefraisController::class, 'edit'])->name('notedefrais.edit');
            Route::get('/delete/{id}', [NotedefraisController::class, 'destroy'])->name('notedefrais.delete');
            Route::post('/update', [NotedefraisController::class, 'update'])->name('notedefrais.update');
            Route::get('/createUserpdf', [NotedefraisController::class, 'createUserpdf'])->name('notedefrais.createUserpdf');
		});
        
    });

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/activite', [ActivityController::class, 'index'])->name('activite');


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
			Route::get('/createResponsablepdf', [DemandeController::class, 'createResponsablepdf'])->name('demandes.createResponsablepdf');
			Route::get('/createUserpdf', [DemandeController::class, 'createUserpdf'])->name('demandes.createUserpdf');
			Route::get('/traite/{id}/{index}', [DemandeController::class, 'traite'])->name('demandes.traite');
			Route::get('/delete/{id}', [DemandeController::class, 'destroy'])->name('demandes.delete');
		});
	Route::prefix('justifications')->group(function () {
			Route::get('/index', [JustificationsController::class, 'index'])->name('justifications.index');
			Route::get('/create', [JustificationsController::class, 'create'])->name('justifications.create');
			Route::post('/store', [JustificationsController::class, 'store'])->name('justifications.store');
			Route::get('/createResponsablepdf', [JustificationsController::class, 'createResponsablepdf'])->name('justifications.createResponsablepdf');
			Route::get('/createUserpdf', [JustificationsController::class, 'createUserpdf'])->name('justifications.createUserpdf');
			Route::get('/edit/{id}', [JustificationsController::class, 'edit'])->name('justifications.edit');
			Route::post('/update', [JustificationsController::class, 'update'])->name('justifications.update');
			Route::get('/traite/{id}/{index}', [JustificationsController::class, 'traite'])->name('justifications.traite');
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
			Route::get('/createResponsablepdf', [NotedefraisController::class, 'createResponsablepdf'])->name('notedefrais.createResponsablepdf');
			Route::get('/createUserpdf', [NotedefraisController::class, 'createUserpdf'])->name('notedefrais.createUserpdf');
			Route::post('/update', [NotedefraisController::class, 'update'])->name('notedefrais.update');
			Route::get('/traite/{id}/{index}', [NotedefraisController::class, 'traite'])->name('notedefrais.traite');
			Route::get('/delete/{id}', [NotedefraisController::class, 'destroy'])->name('notedefrais.delete');
		});
    Route::prefix('absences')->group(function () {
        Route::get('/index', [AbsencesController::class, 'index'])->name('absences.index');
        Route::get('/create', [AbsencesController::class, 'create'])->name('absences.create');
        Route::post('/store', [AbsencesController::class, 'store'])->name('absences.store');
        Route::get('/createResponsablepdf', [AbsencesController::class, 'createResponsablepdf'])->name('absences.createResponsablepdf');
        Route::get('/createUserpdf', [AbsencesController::class, 'createUserpdf'])->name('absences.createUserpdf');
        Route::get('/createUserpdf', [AbsencesController::class, 'createUserpdf'])->name('absences.createUserpdf');
        Route::get('/edit/{id}', [AbsencesController::class, 'edit'])->name('absences.edit');
        Route::post('/update', [AbsencesController::class, 'update'])->name('absences.update');
        Route::get('/traite/{id}/{index}', [AbsencesController::class, 'traite'])->name('absences.traite');
        Route::get('/delete/{id}', [AbsencesController::class, 'destroy'])->name('absences.delete');
    });
    Route::prefix('achats')->group(function () {
        Route::get('/index', [AchatsController::class, 'index'])->name('achats.index');
        Route::get('/create', [AchatsController::class, 'create'])->name('achats.create');
        Route::post('/store', [AchatsController::class, 'store'])->name('achats.store');
        Route::get('/edit/{id}', [AchatsController::class, 'edit'])->name('achats.edit');
        Route::get('/createResponsablepdf', [AchatsController::class, 'createResponsablepdf'])->name('achats.createResponsablepdf');
        Route::get('/createUserpdf', [AchatsController::class, 'createUserpdf'])->name('achats.createUserpdf');
        Route::post('/update', [AchatsController::class, 'update'])->name('achats.update');
        Route::get('/traite/{id}/{index}', [AchatsController::class, 'traite'])->name('achats.traite');
        Route::get('/delete/{id}', [AchatsController::class, 'destroy'])->name('achats.delete');
    });
    Route::prefix('departements')->group(function () {
        Route::get('/index', [DepartementsController::class, 'index'])->name('departements.index');
        Route::get('/create', [DepartementsController::class, 'create'])->name('departements.create');
        Route::post('/store', [DepartementsController::class, 'store'])->name('departements.store');
        Route::get('/edit/{id}', [DepartementsController::class, 'edit'])->name('departements.edit');
        Route::post('/update', [DepartementsController::class, 'update'])->name('departements.update');
        Route::get('/delete/{id}', [DepartementsController::class, 'destroy'])->name('departements.delete');
    });


   });


Route::prefix('accounts/validation')->group(function () {
			Route::get('/', [ValidationController::class, 'validation'])->name('users.validation');
			Route::post('/store', [ValidationController::class, 'validation_store'])->name('users.validation_store');
		});
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');