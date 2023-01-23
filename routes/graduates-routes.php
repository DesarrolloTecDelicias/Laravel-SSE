<?php

use Illuminate\Support\Facades\Route;

/*** General Controllers ***/

use App\Http\Controllers\UserController;

/*** Graduate components ***/

use App\Http\Livewire\Graduate\DashboardGraduate;

//Survey components
use App\Http\Livewire\Graduate\Survey\SurveyOneGraduate;
use App\Http\Livewire\Graduate\Survey\SurveyTwoGraduate;
use App\Http\Livewire\Graduate\Survey\SurveyThreeGraduate;
use App\Http\Livewire\Graduate\Survey\SurveyFourGraduate;
use App\Http\Livewire\Graduate\Survey\SurveyFiveGraduate;
use App\Http\Livewire\Graduate\Survey\SurveySixGraduate;
use App\Http\Livewire\Graduate\Survey\SurveySevenGraduate;

Route::middleware(['auth:sanctum', 'verified', 'graduate'])
    ->prefix('egresado')
    ->group(function () {
        Route::get('/tablero', DashboardGraduate::class)->name('graduate.dashboard');
        Route::get('/perfil', [UserController::class, 'profile'])->name('graduate.profile');

        Route::prefix('encuesta')->group(function () {
            Route::get('/perfil', SurveyOneGraduate::class)->name('graduate.survey.one');
            Route::get('/pertinencia', SurveyTwoGraduate::class)->name('graduate.survey.two');
            Route::get('/ubicacion', SurveyThreeGraduate::class)->name('graduate.survey.three');
            Route::get('/desempeno', SurveyFourGraduate::class)->name('graduate.survey.four');
            Route::get('/expectativas', SurveyFiveGraduate::class)->name('graduate.survey.five');
            Route::get('/partipacion', SurveySixGraduate::class)->name('graduate.survey.six');
            Route::get('/comentarios', SurveySevenGraduate::class)->name('graduate.survey.seven');
        });
    });
