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

Route::get('/admin',function(){
    return view('dashboard_admin');
});

route::get('/home',[HomeController::class,'index'])->middleware('auth')->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin/liste-chauffeurs',[ChauffeurController::class, 'liste'])->name('admin.espaceChauffeur');
Route::get('/admin/liste-vehicules',[VehiculeController::class, 'liste'])->name('admin.espaceVehicule');
Route::get('/admin/liste-conducteurs',[ConduireController::class, 'liste'])->name('admin.espaceConducteur');
Route::get('/home/liste-conducteurs',[HomeController::class, 'listeConducteurs'])->name('home.conducteur');

Route::get('/chauffeur/creer',[ChauffeurController::class, 'creer'])->name('chauffeur.creer');
Route::get('/chauffeur/notification',[ChauffeurController::class, 'notification'])->name('notification');
Route::post('chauffeur/traitement',[ChauffeurController::class,'store'])->name('chauffeur.traitement');
Route::get('/vehicule/creer',[VehiculeController::class, 'creer'])->name('vehicule.creer');
Route::post('/traitement-vehicule',[VehiculeController::class, 'sauvegarder'])->name('traitement.vehicule');

Route::get('/conduire',[ConduireController::class, 'conduirePage'])->name('conduire.page');
Route::post('/conduire/traitement',[ConduireController::class, 'conduire'])->name('conduire.traitement');

Route::get('/reservation',[ReservationController::class, 'reservationPage'])->name('reservation.page');
Route::post('/reservation/traitement',[ReservationController::class, 'reserver'])->name('traitement.reservation');
Route::get('/voyage/liste',[VoyageController::class, 'liste'])->name('voyage.liste');

Route::get('/voyageur/liste',[ClientController::class, 'liste'])->name('voyageur.liste');
Route::post('/voyageur/traitement',[ClientController::class, 'reserver'])->name('traitement.voyageur');


Route::get('/voyageur',[ClientController::class, 'espaceVoyageur'])->name('voyage.espace');

require __DIR__.'/auth.php';
