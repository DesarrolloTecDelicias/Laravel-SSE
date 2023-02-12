<?php

use Illuminate\Support\Facades\Route;

/*** General Controllers ***/

use App\Http\Controllers\RouteController;
use App\Http\Controllers\UserController;

/*** Admin components ***/

use App\Http\Livewire\Admin\Dashboard;

//Catalogue components
use App\Http\Livewire\Admin\Catalogue\CareerComponent;
use App\Http\Livewire\Admin\Catalogue\LanguageComponent;
use App\Http\Livewire\Admin\Catalogue\BusinessComponent;
use App\Http\Livewire\Admin\Catalogue\SpecialtyComponent;
use App\Http\Livewire\Admin\Catalogue\AgreementComponent;

//Configuration components
use App\Http\Livewire\Admin\Configuration\CompanySurvey;
use App\Http\Livewire\Admin\Configuration\GraduatesSurvey;
use App\Http\Livewire\Admin\Configuration\GraduatesConfigurationComponent;
use App\Http\Livewire\Admin\Configuration\CompaniesConfigurationComponent;
use App\Http\Livewire\Admin\Configuration\AdministratorsConfigurationComponent;

//Report components
use App\Http\Livewire\Admin\Report\Graduate\SurveyOneGraduateReport;
use App\Http\Livewire\Admin\Report\Graduate\SurveyTwoGraduateReport;
use App\Http\Livewire\Admin\Report\Graduate\SurveyThreeGraduateReport;
use App\Http\Livewire\Admin\Report\Graduate\SurveyFourGraduateReport;
use App\Http\Livewire\Admin\Report\Graduate\SurveyFiveGraduateReport;
use App\Http\Livewire\Admin\Report\Graduate\SurveySixGraduateReport;
use App\Http\Livewire\Admin\Report\Graduate\SurveySevenGraduateReport;
use App\Http\Livewire\Admin\Report\Company\SurveyOneCompanyReport;
use App\Http\Livewire\Admin\Report\Company\SurveyTwoCompanyReport;
use App\Http\Livewire\Admin\Report\Company\SurveyThreeCompanyReport;

//Statistic components
use App\Http\Livewire\Admin\Statistic\Graduate\SurveyOneGraduateStatistic;
use App\Http\Livewire\Admin\Statistic\Graduate\SurveyTwoGraduateStatistic;
use App\Http\Livewire\Admin\Statistic\Graduate\SurveyThreeGraduateStatistic;
use App\Http\Livewire\Admin\Statistic\Graduate\SurveyFourGraduateStatistic;
use App\Http\Livewire\Admin\Statistic\Graduate\SurveyFiveGraduateStatistic;
use App\Http\Livewire\Admin\Statistic\Graduate\SurveySixGraduateStatistic;
use App\Http\Livewire\Admin\Statistic\Company\SurveyOneCompanyStatistic;
use App\Http\Livewire\Admin\Statistic\Company\SurveyTwoCompanyStatistic;
use App\Http\Livewire\Admin\Statistic\Company\SurveyThreeCompanyStatistic;

//Emails
use App\Http\Livewire\Admin\Email\EmailTemplate;
use App\Http\Livewire\Admin\Email\EmailCompanyTemplate;

//Methodology components
use App\Http\Livewire\Admin\Methodology\General;
use App\Http\Livewire\Admin\Methodology\GeneralOption;
use App\Http\Livewire\Admin\Methodology\GeneralStatistic;


Route::middleware(['auth:sanctum', 'verified', 'admin'])
    ->prefix('administrador')
    ->group(function () {
        Route::get('/tablero', Dashboard::class)->name('admin.dashboard');
        Route::get('/perfil', [UserController::class, 'profile'])->name('admin.profile');

        /***************** Catalogue ******************/
        Route::prefix('catalogo')->group(function () {
            Route::get('/carrera', CareerComponent::class)->name('catalogue.career');
            Route::get('/especialidad', SpecialtyComponent::class)->name('catalogue.specialty');
            Route::get('/lenguaje', LanguageComponent::class)->name('catalogue.language');
            Route::get('/actividad/economica', BusinessComponent::class)->name('catalogue.business');
        });

        /***************** Email ******************/
        Route::prefix('correo')->group(function () {
            Route::get('/aviso', EmailTemplate::class)->name('email.advice');
            Route::get('/aviso-empresa', EmailCompanyTemplate::class)->name('email.advice.company');
        });

        /***************** Graduates ******************/
        Route::prefix('egresados')->group(function () {
            Route::get('/', GraduatesConfigurationComponent::class)->name('graduates.graduates');
            Route::get('/encuestas', GraduatesSurvey::class)->name('graduates.graduates.surveys');
        });

        /***************** Company ******************/
        Route::prefix('empresas')->group(function () {
            Route::get('/', CompaniesConfigurationComponent::class)->name('company.companies');
            Route::get('/encuestas', CompanySurvey::class)->name('company.company.surveys');
            Route::get('/convenios', AgreementComponent::class)->name('company.agreements');
        });

        /***************** Configuration ******************/
        Route::prefix('configuracion')->group(function () {
            Route::get('/administradores', AdministratorsConfigurationComponent::class)->name('configuration.administrators');
        });

        /***************** Report ******************/
        Route::prefix('reporte')->group(function () {
            Route::prefix('egresado')->group(function () {
                Route::get('/perfil', SurveyOneGraduateReport::class)->name('report.graduate.survey.one');
                Route::get('/pertinencia', SurveyTwoGraduateReport::class)->name('report.graduate.survey.two');
                Route::get('/ubicacion', SurveyThreeGraduateReport::class)->name('report.graduate.survey.three');
                Route::get('/desempeno', SurveyFourGraduateReport::class)->name('report.graduate.survey.four');
                Route::get('/expectativas', SurveyFiveGraduateReport::class)->name('report.graduate.survey.five');
                Route::get('/participacion', SurveySixGraduateReport::class)->name('report.graduate.survey.six');
                Route::get('/comentarios', SurveySevenGraduateReport::class)->name('report.graduate.survey.seven');
            });

            Route::prefix('empresa')->group(function () {
                Route::get('/datos', SurveyOneCompanyReport::class)->name('report.company.survey.one');
                Route::get('/ubicacion', SurveyTwoCompanyReport::class)->name('report.company.survey.two');
                Route::get('/competencias', SurveyThreeCompanyReport::class)->name('report.company.survey.three');
            });
        });

        /***************** Statistics ******************/
        Route::prefix('estadistica')->group(function () {
            Route::prefix('egresado')->group(function () {
                Route::get('/perfil', SurveyOneGraduateStatistic::class)->name('statistic.graduate.survey.one');
                Route::get('/pertinencia', SurveyTwoGraduateStatistic::class)->name('statistic.graduate.survey.two');
                Route::get('/ubicacion', SurveyThreeGraduateStatistic::class)->name('statistic.graduate.survey.three');
                Route::get('/desempeno', SurveyFourGraduateStatistic::class)->name('statistic.graduate.survey.four');
                Route::get('/expectativas', SurveyFiveGraduateStatistic::class)->name('statistic.graduate.survey.five');
                Route::get('/participacion', SurveySixGraduateStatistic::class)->name('statistic.graduate.survey.six');
            });

            Route::prefix('empresa')->group(function () {
                Route::get('/datos', SurveyOneCompanyStatistic::class)->name('statistic.company.survey.one');
                Route::get('/ubicacion', SurveyTwoCompanyStatistic::class)->name('statistic.company.survey.two');
                Route::get('/competencias', SurveyThreeCompanyStatistic::class)->name('statistic.company.survey.three');
            });
        });

        /***************** Methodology ******************/
        Route::prefix('metodologia')->group(function () {
            Route::prefix('pdf')->group(function () {
                Route::get('/cohorte', [RouteController::class, 'pdf'])->name('pdf');
                Route::get('/opciones', [RouteController::class, 'pdfOption'])->name('pdf.options');
            });

            Route::prefix('general')->group(function () {
                Route::get('/cohorte', General::class)->name('methodology.general');
                Route::get('/opciones', GeneralOption::class)->name('methodology.options');
                Route::get('/cohorte/grafica', GeneralStatistic::class)->name('methodology.general.statistics');
            });
        });
    });
