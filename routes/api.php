<?php

use App\Http\Controllers\API\PatientController;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('pacientes', [PatientController::class, 'index']);
Route::post('pacientes', [PatientController::class, 'store']);
Route::get('paciente/{patient}', [PatientController::class, 'show']);
Route::put('paciente/{patient}', [PatientController::class, 'update']);
Route::delete('paciente/{patient}', [PatientController::class, 'destroy']);

// Todas las rutas se pueden reorganizar en
// Route::apiResource('pacientes', PatientController::class);
