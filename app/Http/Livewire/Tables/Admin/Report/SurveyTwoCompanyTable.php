<?php

namespace App\Http\Livewire\Tables\Admin\Report;

use App\Models\CompanySurveyTwo;
use Mediconesystems\LivewireDatatables\Action;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class SurveyTwoCompanyTable extends LivewireDatatable
{    public $model = CompanySurveyTwo::class;
    public $hideable = "select";

    public function builder()
    {
        return CompanySurveyTwo::query()->join('users', 'users.id', 'company_survey_twos.user_id');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->hideable()
                ->defaultSort('asc'),

            Column::name('users.name')
                ->label('Nombre de la empresa')
                ->hideable()
                ->filterable(),

            Column::name('number_graduates')
                ->label('Número de Profesionistas')
                ->hideable()
                ->filterable(),

            Column::name('congruence')
                ->label('Congruencia')
                ->hideable()
                ->filterable(),

            // Column::name('requirements')
            //     ->label('Requisito')
            //     ->hideable()
            //     ->filterable(),

            Column::name('most_demanded_career')
                ->label('Carrera Demandada')
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
                    Action::value('csv')->label('Exportar CSV')->export('Ubicacion_laboral.csv'),
                    Action::value('html')->label('Exportar HTML')->export('Ubicacion_laboral.html'),
                    Action::value('xls')->label('Exportar XLS')->export('Ubicacion_laboral.xls')
                ];
            }),
        ];
    }

}
