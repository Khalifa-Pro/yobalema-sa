<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\VoyageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ConduireController;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\ChauffeurController;
use App\Http\Controllers\ReservationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

route::get('/home',[HomeController::class,'index'])->middleware('auth')->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin/liste-chauffeurs',[ChauffeurController::class, 'liste'])->name('admin.espaceChauffeur');
Route::get('/admin/supprimer-chauffeurs/{id}',[ChauffeurController::class, 'supprimer'])->name('admin.supprimerChauffeur');
Route::get('/modifierChauffeur/{id}',[ChauffeurController::class,'modifier'])->name('modifier.chauffeur');
Route::post('/mettreAJourChauffeur/{id}',[ChauffeurController::class,'update'])->name('misajour.chauffeur');

Route::get('/admin/liste-vehicules',[VehiculeController::class, 'liste'])->name('admin.espaceVehicule');
Route::get('/admin/supprimer-vehicules/{id}',[VehiculeController::class, 'supprimer'])->name('admin.supprimerVehicule');
Route::get('/modifierVehicule/{id}',[VehiculeController::class,'modifier'])->name('modifier.vehicule');
Route::post('/mettreAJourVehicule/{id}',[VehiculeController::class,'update'])->name('misajour.vehicule');

Route::get('/admin/liste-conducteurs',[ConduireController::class, 'liste'])->name('admin.espaceConducteur');
Route::get('/home/liste-conducteurs',[HomeController::class, 'listeConducteurs'])->name('home.conducteur');

Route::get('/chauffeur/creer',[ChauffeurController::class, 'creer'])->name('chauffeur.creer');
Route::get('/chauffeur/notification',[ChauffeurController::class, 'notification'])->name('notification');
Route::post('chauffeur/traitement',[ChauffeurController::class,'store'])->name('chauffeur.traitement');
Route::get('/vehicule/creer',[VehiculeController::class, 'creer'])->name('vehicule.creer');
Route::post('/traitement-vehicule',[VehiculeController::class, 'sauvegarder'])->name('traitement.vehicule');

Route::get('/conduire',[ConduireController::class, 'conduirePage'])->name('conduire.page');
Route::post('/conduire/traitement',[ConduireController::class, 'conduire'])->name('conduire.traitement');
Route::get('/admin/supprimer-conduite/{id}',[ConduireController::class, 'supprimer'])->name('admin.supprimerConduite');

Route::get('/reservation',[ReservationController::class, 'reservationPage'])->name('reservation.page');
Route::post('/reservation/traitement',[ReservationController::class, 'reserver'])->name('traitement.reservation');
Route::get('/voyage/liste',[VoyageController::class, 'liste'])->name('voyage.liste');

Route::get('/voyageur/liste',[ClientController::class, 'liste'])->name('voyageur.liste');
Route::post('/voyageur/traitement',[ClientController::class, 'reserver'])->name('traitement.voyageur');
Route::get('/admin/voyage/{id}',[VoyageController::class, 'supprimer'])->name('admin.supprimerVoyage');

Route::get('/voyageur',[ClientController::class, 'espaceVoyageur'])->name('voyage.espace');

Route::post('/soumettre-alerte', [ChauffeurController::class, 'alerter'])->name('soumettre.alerte');

Route::get('/alert/liste',[ChauffeurController::class, 'listeAlerts'])->name('alert.liste');

Route::get('/alert/nombre',[ChauffeurController::class, 'nombreAlert'])->name('alert.nombre');

require __DIR__.'/auth.php';
