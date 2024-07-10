<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\UserList;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ClientBailleurController;
use App\Http\Controllers\VoyageurController;
use Illuminate\Foundation\Http\Kernel;
use App\Http\Controllers\admin\BiensImmobilierAdmin;
use App\Http\Controllers\admin\DashboardAdmin;

Route::get('/privateView', function () {
    return view('privateView');
})->middleware(['auth', 'verified'])->name('privateView');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// route client bailleur
Route::middleware(['auth','isClientBailleur'])->prefix('client-bailleur')->group(function () {
    Route::get('/', [ClientBailleurController::class, 'index'])->name('client_bailleur.index');
    Route::get('/create', [ClientBailleurController::class, 'create'])->name('client_bailleur.create');
    Route::post('/', [ClientBailleurController::class, 'store'])->name('client_bailleur.store');
    Route::get('/{bienImmobilier}', [ClientBailleurController::class, 'show'])->name('client_bailleur.show');
    Route::get('/{bienImmobilier}/edit', [ClientBailleurController::class, 'edit'])->name('client_bailleur.edit');
    Route::put('/{bienImmobilier}', [ClientBailleurController::class, 'update'])->name('client_bailleur.update');
    Route::delete('/{bienImmobilier}', [ClientBailleurController::class, 'destroy'])->name('client_bailleur.destroy');
    Route::get('/reservations-futures', [ClientBailleurController::class, 'futureReservations'])->name('client_bailleur.future_reservations');
    Route::get('/reservations-passees', [ClientBailleurController::class, 'pastReservations'])->name('client_bailleur.past_reservations');
    Route::post('/{bienImmobilier}/update-disponibilites', [ClientBailleurController::class, 'updateBlockedDates'])->name('client_bailleur.updateBlockedDates');

});

Route::middleware(['auth'])->group(function () {
    Route::get('/voyageur/search', [VoyageurController::class, 'search'])->name('voyageur.search');
    Route::post('/voyageur/handle-search', [VoyageurController::class, 'handleSearch'])->name('voyageur.handleSearch');
    Route::get('/voyageur/results', [VoyageurController::class, 'results'])->name('voyageur.results');
    Route::get('/voyageur/{id}', [VoyageurController::class, 'show'])->name('voyageur.show');
    Route::post('/voyageur/{id}/reserve', [VoyageurController::class, 'reserve'])->name('voyageur.reserve');
    Route::get('/voyageur/reservations', [VoyageurController::class, 'reservations'])->name('voyageur.reservations');
});

// route pour la navbar
Route::get('/team', [Controller::class, 'team'])->name('team');
Route::get('/owner', [Controller::class, 'owner'])->name('owner');
Route::get('/contact', [Controller::class, 'contact'])->name('contact');
Route::get('/profil', [Controller::class, 'profil'])->name('profil');
Route::get('/help', [Controller::class, 'help'])->name('help');
Route::get('/favoris', [Controller::class, 'favoris'])->name('favoris');
Route::get('/annonce', [Controller::class, 'annonce'])->name('annonce');
Route::get('/', [Controller::class,'publicView'])->name('publicView');

Route::middleware(['auth', 'admin'])->prefix('backoffice')->group(function (){
    Route::get('/adminPanel', [DashboardAdmin::class, 'numberUserAll'])->name('adminPanel');

    Route::get('/adminBiensImmo', [BiensImmobilierAdmin::class,'show'])->name('logementAdmin');
    Route::get('/adminBiensImmo/create', [BiensImmobilierAdmin::class, 'add'])->name('adminBien.create');
    Route::post('/adminBiensImmo/store', [BiensImmobilierAdmin::class, 'store'])->name('adminBien.store');
    Route::get('/adminBiensImmo/{id}/edit', [BiensImmobilierAdmin::class, 'edit'])->name('adminBien.edit');
    Route::put('/adminBiensImmo/{id}/update', [BiensImmobilierAdmin::class, 'update'])->name('adminBien.update');
    Route::patch('//adminBiensImmo{id}/update-statut', [BiensImmobilierAdmin::class, 'updateStatut'])->name('adminBien.updateStatut');
    Route::delete('/adminBiensImmo/{id}/delete', [BiensImmobilierAdmin::class, 'delete'])->name('adminBien.delete');


    Route::get('/adminUsers/list', [UserList::class, 'show'])->name('user.show');
    Route::get('/adminUsers/list/{id}/edit', [UserList::class,'edit'])->name('user.edit');
    Route::put('/adminUsers/list/{id}/update', [UserList::class,'update'])->name('user.update');
    Route::get('/adminUsers/add', [UserList::class,'add'])->name('user.add');
    Route::post('/adminUsers/check', [UserList::class,'checkAdd'])->name('user.check');
    Route::delete('/adminUsers/list/{id}/delete', [UserList::class,'delete'])->name('user.delete');

});

