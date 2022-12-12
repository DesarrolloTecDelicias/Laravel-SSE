<?php

namespace App\Http\Livewire\Tables\Admin\Report;


use App\Models\Career;
use App\Models\SurveyFive;
use App\Constants\Constants;
use Mediconesystems\LivewireDatatables\Action;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class SurveyFiveTable extends LivewireDatatable
{
    public $model = SurveyFive::class;
    public $hideable = "select";

    public function builder()
    {
        return SurveyFive::query()
            ->join('users', 'users.id', 'survey_fives.user_id')
            ->join('careers', 'careers.id', 'users.career_id')
            ->whereNotNull('users.income_year');
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

            Column::name('careers.name')
                ->label('Carrera de Egreso')
                ->hideable()
                ->filterable(Career::pluck('name')),

            Column::name('courses_yes_no')
                ->label('¿Le gustaria tomar cursos de actualización?')
                ->hideable()
                ->filterable(Constants::YES_NO),

            Column::name('courses')
                ->label('Mencionar cursos')
                ->hideable()
                ->filterable(),

            Column::name('master_yes_no')
                ->label('¿Le gustaria tomar algún posgrado?')
                ->hideable()
                ->filterable(Constants::YES_NO),

            Column::name('master')
                ->label('Posgrado')
                ->hideable()
                ->filterable(),

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
                    Action::value('csv')->label('Exportar CSV')->export('Expectativas_de_desarrollo.csv'),
                    Action::value('html')->label('Exportar HTML')->export('Expectativas_de_desarrollo.html'),
                    Action::value('xls')->label('Exportar XLS')->export('Expectativas_de_desarrollo.xls')
                ];
            }),
        ];
    }
}
