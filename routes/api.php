<?php

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PatientController;
use App\Http\Controllers\API\AutenticarController;
use App\Http\Controllers\API\AuthorController;
use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\BookStatusController;
use App\Models\BookStatus;

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


// Ruta para registrar usuarios
Route::post('registro', [AutenticarController::class, 'registro']);
// Ruta para hacer login al sistema y crear el token
Route::post('login', [AutenticarController::class, 'acceso']);
// Ruta para salir del sistema y eliminar el token. Debe de estar dentro del middleware sanctum
// Recordar que para probar la api en postman cuando implementamos sanctum y protegemos con el middleware sanctum las rutas
// debemos de agregar en los headers la key Authorization y en la variable poner la palabra Bearer (espacio) + tokenCreado
Route::group(['middleware' => ['auth:sanctum']], function () {
    // Muevo aqui las rutas de paciente(s) para que sólo los usuarios que tienen token, las puedan ver
    Route::get('pacientes', [PatientController::class, 'index']);
    Route::post('pacientes', [PatientController::class, 'store']);
    Route::get('paciente/{patient}', [PatientController::class, 'show']);
    Route::put('paciente/{patient}', [PatientController::class, 'update']);
    Route::delete('paciente/{patient}', [PatientController::class, 'destroy']);
    Route::post('logout', [AutenticarController::class, 'cerrarSesion']);
});

// Todas las rutas se pueden reorganizar en
// Route::apiResource('pacientes', PatientController::class);

// Rutas para los libros
Route::apiResource('books', BookController::class);
Route::apiResource('book_statuses', BookStatusController::class);
Route::apiResource('authors', AuthorController::class);
