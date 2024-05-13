<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\DoctorDashboardController;
use App\Http\Controllers\InfirmierDashboardController;
use App\Http\Controllers\patient;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\search_controller;
use Illuminate\Support\Facades\Route;

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
    return view('home');
})->name('home');

Route::get('/faqs', [patient::class, 'faqs'])
    ->name('patient.faqs');

Route::get('/contact', [patient::class, 'contact'])
    ->name('patient.contact');

Route::get('/dashboard', function () {
    return view('users.patient.acceuil');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('admin.dashboard');

        Route::get('/statitique', [AdminDashboardController::class, 'statistique'])
            ->name('admin.statistique');

        Route::get('/listdocteur', [AdminDashboardController::class, 'listdocteur'])
            ->name('admin.listdocteur');

        Route::get('/ajout/docteur', [AdminDashboardController::class, 'ajouterdoc'])
            ->name('ajtdoc');

        // Route pour enregistrer un nouvel utilisateur
        Route::post('/listdocteur', [AdminDashboardController::class, 'store'])
            ->name('admin.store_docteur');

        Route::put('/admin/update_docteur/{id}', [AdminDashboardController::class, 'updateDocteur'])->name('admin.update_docteur');


        Route::get('/admin/docteur/{id}', [AdminDashboardController::class, 'modifier'])->name('admin.modifier');

        Route::get('/admin/supprimer/docteur/{id}', [AdminDashboardController::class, 'supprimerDocteur'])
            ->name('admin.supprimer.docteur');

        Route::get('/admin/staff/{id}', [AdminDashboardController::class, 'profile'])
            ->name('admin.profile');

        Route::post('/search', [search_controller::class, 'search'])
            ->name('search');
    });

    Route::prefix('doctor')->group(function () {
        Route::get('/dashboard', [DoctorDashboardController::class, 'index'])
            ->name('doctor.dashboard');

        Route::get('/disponibilites', [DoctorDashboardController::class, 'dispo'])
            ->name("doctor.dispo");

        Route::post('/disponibilites', [DoctorDashboardController::class, 'disponiblites'])
            ->name("doctor.store.dispo");

        Route::get('/listedisponibilités', [DoctorDashboardController::class, 'showdispo'])
            ->name("doctor.liste.dispo");
        Route::get('/Disponibilites/modifier{id}', [DoctorDashboardController::class, 'modifierdispo'])->name('edit_disponibilite');

        Route::post('/Disponibilites/modifier', [DoctorDashboardController::class, 'updateDispo'])
            ->name("doctor.updatedispo");
    });

    Route::prefix('infirmier')->group(function () {
        Route::get('/dashboard', [InfirmierDashboardController::class, 'index'])
            ->name('infirmier.dashboard');
    });

    Route::prefix('patient')->group(function () {




        Route::get('/dossier', [patient::class, 'dossier'])
            ->name('patient.dossier');

        Route::get('/rdv', [patient::class, 'rdv'])
            ->name('patient.rdv');
    });
});



require __DIR__ . '/auth.php';
