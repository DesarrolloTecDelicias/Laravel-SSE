<?php

use Illuminate\Support\Facades\Route;

/*** General Controllers ***/

use App\Http\Controllers\RouteController;

Route::get('/', [RouteController::class, 'maintenance'])->name('maintenance');

Route::any('{catchall}', [RouteController::class, 'notFound'])->where('catchall', '.*');