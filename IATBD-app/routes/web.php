<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('homepage');
})->middleware(['auth', 'verified'])->name('homepage');

// Route voor de dier-oppasser pagina
Route::get('/dier-oppasser', [AnimalController::class, 'index'])->name('dier-oppasser');

// Routes voor het bekijken en tonen van huizen
Route::get('/find-houses', [HomeController::class, 'index'])->name('dierhuizen');
Route::get('find-houses/{address}', [HomeController::class, 'show'])->name('home.address');

// Route voor het bekijken van een specifiek dier op basis van animalID
Route::get('/animal/{animalID}', [AnimalController::class, 'show'])->name('animal.animalID');
Route::post('/animal/{animalID}/reageren', [AnimalController::class, 'reageren'])->name('animal.reageren');
Route::post('/pet-sitting-request/{requestID}/accept', [AnimalController::class, 'acceptRequest'])->name('pet-sitting.accept');
Route::post('/pet-sitting-request/{requestID}/reject', [AnimalController::class, 'rejectRequest'])->name('pet-sitting.reject');


// Routes voor "Mijn Huisdieren" pagina (alleen toegankelijk voor geauthenticeerde gebruikers)
Route::middleware('auth')->group(function () {
    Route::get('/mijn-huisdieren', [PetController::class, 'index'])->name('mijnHuisdieren');
    Route::get('/mijn-huisdieren/nieuw', [PetController::class, 'create'])->name('maakHuisdier');
    Route::post('/mijn-huisdieren', [PetController::class, 'store'])->name('huisdieren.store');

    // Route voor het toevoegen van een huis (alleen toegankelijk voor geauthenticeerde gebruikers)
    Route::middleware('auth')->group(function () {
        Route::get('/huis-toevoegen', [HomeController::class, 'create'])->name('home.create');
        Route::post('/huis-toevoegen', [HomeController::class, 'store'])->name('home.store');
    });

    Route::get('/owner_profile', [UserController::class, 'index'])->name('profile');


    // Profiel bewerken en verwijderen
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Voeg de logout-route toe
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

require __DIR__.'/auth.php';
