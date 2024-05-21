<?php

use App\Http\Controllers\contries;
use App\Http\Controllers\mypatient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/pays/{pays}/etats', [contries::class, 'getEtats']);

Route::get('/specialites/{specialite}/medecins', [mypatient::class, 'getMedecinsBySpecialite']);

Route::get('/medecins/{medecinId}/disponibilites', [mypatient::class, 'getDisponibilites']);

Route::get('/get-prix-consultation/{specialiteId}', [mypatient::class, 'getPrixConsultation']);

Route::post('/update-payment-data', [mypatient::class, 'updatePaymentData'])->name('payement');
