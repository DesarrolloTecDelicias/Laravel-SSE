<?php

namespace App\Http\Livewire\Tables\Admin\Report;


use App\Models\Career;
use App\Models\Language;
use App\Models\Business;
use App\Models\SurveyThree;
use App\Constants\Constants;
use Mediconesystems\LivewireDatatables\Action;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Maatwebsite\Excel\Facades\Excel;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class SurveyThreeTable extends LivewireDatatable
{
    public $model = SurveyThree::class;
    public $hideable = "select";

    public function builder()
    {
        return SurveyThree::query()
            ->join('users', 'users.id', 'survey_threes.user_id');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->hideable()
                ->defaultSort('asc'),

            Column::name('users.name')
                ->label('Nombre egresado')
                ->hideable()
                ->filterable(),

            Column::name('users.fathers_surname')
                ->label('Apellido Paterno')
                ->hideable()
                ->filterable(),

            Column::name('users.mothers_surname')
                ->label('Apellido Materno')
                ->hideable()
                ->filterable(),

            Column::name('users.email')
                ->label('Correo Electrónico')
                ->hideable()
                ->filterable(),

            Column::name('users.control_number')
                ->label('Número de control')
                ->hideable()
                ->filterable(),

            NumberColumn::name('users.income_year')
                ->label('Año de Ingreso')
                ->hideable()
                ->filterable(),

            Column::name('users.income_month')
                ->label('Período de Ingreso')
                ->hideable()
                ->filterable(Constants::MONTH),

            NumberColumn::name('users.year_graduated')
                ->label('Año de egreso')
                ->hideable()
                ->filterable(),

            Column::name('users.month_graduated')
                ->label('Período de Egreso')
                ->hideable()
                ->filterable(Constants::MONTH),

            Column::name('users.career')
                ->label('Carrera de Egreso')
                ->hideable()
                ->filterable(Career::pluck('name'))
                ->exportCallback(function ($career) {
                    $value = mb_strtoupper($career, 'UTF-8');
                    return (string) $value;
                }),

            Column::name('do_for_living')
                ->label('Actividad a la que se dedica actualmente')
                ->hideable()
                ->filterable(Constants::DO_FOR_LIVING),

            Column::name('speciality')
                ->label('¿Qué están estudiando?')
                ->hideable()
                ->filterable(Constants::SPECIALITY),

            Column::name('school')
                ->label('Especialidad e Institución')
                ->hideable()
                ->filterable(),

            Column::name('long_take_job')
                ->label('Tiempo transcurrido para obtener el primer empleo')
                ->hideable()
                ->filterable(Constants::LONG_TAKE_JOB),

            Column::name('hear_about')
                ->label('Medio para obtener el empleo')
                ->hideable()
                ->filterable(Constants::HEAR_ABOUT),

            BooleanColumn::name("competence1")
                ->label('Competencias laborales')
                ->hideable()
                ->filterable(),

            BooleanColumn::name("competence2")
                ->label('Título Profesional')
                ->hideable()
                ->filterable(),

            BooleanColumn::name("competence3")
                ->label('Examen de selección')
                ->hideable()
                ->filterable(),

            BooleanColumn::name("competence4")
                ->label('Idioma Extranjero')
                ->hideable()
                ->filterable(),

            BooleanColumn::name("competence5")
                ->label('Actitudes y habilidades socio-comunicativas (principios y valores)')
                ->hideable()
                ->filterable(),

            BooleanColumn::name("competence6")
                ->label('Ninguno')
                ->hideable()
                ->filterable(),

            Column::name('language_most_spoken')
                ->label('Idioma que utiliza en su trabajo actual')
                ->hideable()
                ->filterable(Language::pluck('name')),

            NumberColumn::name('speak_percent')
                ->label('% Hablar')
                ->hideable()
                ->filterable(),

            NumberColumn::name('write_percent')
                ->label('% Escribir')
                ->hideable()
                ->filterable(),

            NumberColumn::name('read_percent')
                ->label('% Leer')
                ->hideable()
                ->filterable(),

            NumberColumn::name('listen_percent')
                ->label('% Escuchar')
                ->hideable()
                ->filterable(),

            Column::name('seniority')
                ->label('Antigüedad en el empleo actual')
                ->hideable()
                ->filterable(Constants::SENIORITY),

            NumberColumn::name('year')
                ->label('Año de ingreso')
                ->hideable()
                ->filterable(),

            Column::name('salary')
                ->label('Ingreso (Salario minimo diario)')
                ->hideable()
                ->filterable(Constants::SALARY),

            Column::name('management_level')
                ->label('Nivel jerárquico en el trabajo')
                ->hideable()
                ->filterable(Constants::MANAGEMENT_LEVEL),

            Column::name('job_condition')
                ->label('Condición de trabajo')
                ->hideable()
                ->filterable(Constants::JOB_CONDITION),

            NumberColumn::name('job_relationship')
                ->label('Relación del trabajo con su área de formación')
                ->hideable()
                ->filterable(),

            Column::name('business_name')
                ->label('Razón Social de la empresa')
                ->hideable()
                ->filterable(),

            Column::name('business_activity')
                ->label('Giro o actividad principal de la empresa u organismo')
                ->hideable()
                ->filterable(Business::pluck('name')),

            Column::name('address')
                ->label('Domicilio Empresa')
                ->hideable()
                ->filterable(),

            Column::name('zip')
                ->label('Código Postal Empresa')
                ->hideable()
                ->filterable(),

            Column::name('suburb')
                ->label('Colonia Empresa')
                ->hideable()
                ->filterable(),

            Column::name('state')
                ->label('Estado Empresa')
                ->hideable()
                ->filterable(),

            Column::name('city')
                ->label('Ciudad Empresa')
                ->hideable()
                ->filterable(),

            Column::name('municipality')
                ->label('Municipio Empresa')
                ->hideable()
                ->filterable(),

            Column::name('phone')
                ->label('Teléfono Empresa')
                ->hideable()
                ->filterable(),

            Column::name('fax')
                ->label('Fax Empresa')
                ->hideable()
                ->filterable(),

            Column::name('web_page')
                ->label('Página Web Empresa')
                ->hideable()
                ->filterable(),

            Column::name('boss_email')
                ->label('Correo electrónico del jefe inmediato')
                ->hideable()
                ->filterable(),

            Column::name('business_structure')
                ->label('Su empresa u organismo es')
                ->hideable()
                ->filterable(Constants::BUSINESS_STRUCTURE),

            Column::name('company_size')
                ->label('Tamaño de la empresa u organismo')
                ->hideable()
                ->filterable(Constants::COMPANY_SIZE),

            Column::name('business_activity_selector')
                ->label('Actividad económica de la empresa u organismo')
                ->hideable()
                ->filterable(Business::pluck('name')),

            DateColumn::name('created_at')
                ->label('Contestada')
                ->hideable()
                ->filterable(),

            DateColumn::name('updated_at')
                ->label('Actualizada')
                ->hideable()
                ->filterable(),
        ];
    }

    public function buildActions()
    {
        return [
            Action::groupBy('Opciones a Exportar', function () {
                return [
                    Action::value('csv')->label('Exportar CSV')->export('Ubicación_laboral_de_los_egresados.csv'),
                    Action::value('html')->label('Exportar HTML')->export('Ubicación_laboral_de_los_egresados.html'),
                    Action::value('xls')->label('Exportar XLS')->export('Ubicación_laboral_de_los_egresados.xls')
                ];
            }),
        ];
    }
}
