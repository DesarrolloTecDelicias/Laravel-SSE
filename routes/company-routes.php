<?php

use Illuminate\Support\Facades\Route;

/*** General Controllers ***/
use App\Http\Controllers\UserController;

/*** Company components ***/
use App\Http\Livewire\Company\DashboardCompany;
//Survey components
use App\Http\Livewire\Company\Survey\SurveyOneCompany;
use App\Http\Livewire\Company\Survey\SurveyTwoCompany;
use App\Http\Livewire\Company\Survey\SurveyThreeCompany;

Route::middleware(['auth:sanctum', 'verified', 'company'])
    ->prefix('empresa')
    ->group(function () {
        Route::get('/tablero', DashboardCompany::class)->name('company.dashboard');
        Route::get('/perfil', [UserController::class, 'profile'])->name('company.profile');

        Route::prefix('encuesta')->group(function () {
            Route::get('/datos', SurveyOneCompany::class)->name('company.survey.one');
            Route::get('/ubicacion', SurveyTwoCompany::class)->name('company.survey.two');
            Route::get('/competencias', SurveyThreeCompany::class)->name('company.survey.three');
        });
    });
