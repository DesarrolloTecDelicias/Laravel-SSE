<?php

use Illuminate\Support\Facades\Route;

/*** General Controllers ***/

use App\Http\Controllers\RouteController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Auth\ResetPassword;


/*** Admin components ***/

use App\Http\Livewire\Admin\Dashboard;

//Catalogue components
use App\Http\Livewire\Admin\Catalogue\CareerComponent;
use App\Http\Livewire\Admin\Catalogue\LanguageComponent;
use App\Http\Livewire\Admin\Catalogue\BusinessComponent;
use App\Http\Livewire\Admin\Catalogue\SpecialtyComponent;

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


/*** Company components ***/

use App\Http\Livewire\Company\DashboardCompany;
//Survey components
use App\Http\Livewire\Company\Survey\SurveyOneCompany;
use App\Http\Livewire\Company\Survey\SurveyTwoCompany;
use App\Http\Livewire\Company\Survey\SurveyThreeCompany;


Route::get('/', [RouteController::class, 'index'])->name('welcome');
Route::get('/restaurar-contraseña', ResetPassword::class)->name('forgot.password');

Route::get('/salir', [RouteController::class, 'logout'])->name('logout');

Route::prefix('registro')->group(function () {
    Route::get('/egresado', [RouteController::class, 'graduateRegistration'])->name('graduate.register');
    Route::get('/empresa', [RouteController::class, 'companyRegistration'])->name('company.register');
});

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/verificar', [RouteController::class, 'verfied'])
    ->name('verified.user');

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

        /***************** Configuration ******************/
        Route::prefix('configuracion')->group(function () {
            Route::get('/egresados', GraduatesConfigurationComponent::class)->name('configuration.graduates');
            Route::get('/egresados/encuestas', GraduatesSurvey::class)->name('configuration.graduates.surveys');
            Route::get('/empresas', CompaniesConfigurationComponent::class)->name('configuration.companies');
            Route::get('/empresas/encuestas', CompanySurvey::class)->name('configuration.company.surveys');
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
