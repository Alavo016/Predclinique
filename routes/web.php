<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\contries;
use App\Http\Controllers\Departement;
use App\Http\Controllers\DoctorDashboardController;
use App\Http\Controllers\Infirmier;
use App\Http\Controllers\InfirmierDashboardController;
use App\Http\Controllers\mypatient;
use App\Http\Controllers\patient;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\search_controller;
use App\Http\Controllers\Specialités;
use App\Models\Specialites;
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

Route::post('/update-payment-data', [mypatient::class, 'updatePaymentData']);

Route::get('/faqs', [patient::class, 'faqs'])
    ->name('patient.faqs');

Route::get('/contact', [patient::class, 'contact'])
    ->name('patient.contact');

    Route::resource('/dashboard', mypatient::class)->middleware(['auth', 'verified'])->names('patient');

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

        Route::resource('/infirmier',Infirmier::class)->names('adm_infirmier');

        Route::resource('/patient', Patient::class)->names('adm_Patient');


       Route::resource('/Specialites',Departement::class)->names('adm_specialites');











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

        Route::get('/Disponibilites/modifier{id}', [DoctorDashboardController::class, 'modifierdisponi'])->name('edit_disponibilite');

        Route::put('/Disponibilites/modifier/{id}',[DoctorDashboardController::class,"updateDispo"])
                ->name('updateDispo');

        Route::delete('/disponibilites/{id}', [DoctorDashboardController::class,"destroydispo"])->name('disponibilites.destroy');

    });

    Route::prefix('infirmier')->group(function () {
        Route::get('/dashboard', [InfirmierDashboardController::class, 'index'])
            ->name('infirmier.dashboard');
    });

    Route::prefix('patient')->group(function () {


        Route::resource('Patient',mypatient::class)->names("patient");

        Route::get('/dossier', [patient::class, 'dossier'])
            ->name('patient.dossier');

        Route::get('/rdv', [patient::class, 'rdv'])
            ->name('patient.rdv');

        Route::get('/statistique',[mypatient::class, "statistique"])
            ->name('patient.statistique');

        Route::get('/Rendez-Vous', [mypatient::class, "rendez_vous"])
            ->name('patient.rdv');

        Route::post('/Rendez-Vous',[mypatient::class, "submitAppointmentForm"])
            ->name('patient.rdv_form');

        Route::get('/user/{id}/edit_password', [mypatient::class,"modipass"]
        )->name('mdpass');





    });
});



require __DIR__ . '/auth.php';
