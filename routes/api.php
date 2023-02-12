<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobApplicationsController;
use App\Http\Controllers\CareerController;
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

Route::prefix('vacantes')->group(function () {
    Route::get('/obtenerTodos', [JobApplicationsController::class, 'getAll']);
    Route::get('/obtenerPorId/{id}', [JobApplicationsController::class, 'getById']);
    Route::get('/obtenerPorIdUsuario/{id}', [JobApplicationsController::class, 'getByUserId']);
    Route::get('/obtenerPorIdCarrera/{id}', [JobApplicationsController::class, 'getByCareerId']);
});


Route::prefix('carreras')->group(function () {
    Route::get('/obtenerTodos', [CareerController::class, 'getAll']);
    Route::get('/obtenerPorId/{id}', [CareerController::class, 'getById']);
});
