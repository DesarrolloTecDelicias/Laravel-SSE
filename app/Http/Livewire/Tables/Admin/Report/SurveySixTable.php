<?php

namespace App\Http\Livewire\Tables\Admin\Report;

use App\Models\Career;
use App\Models\SurveySix;
use App\Constants\Constants;
use Mediconesystems\LivewireDatatables\Action;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class SurveySixTable extends LivewireDatatable
{
    public $model = SurveySix::class;
    public $hideable = "select";

    public function builder()
    {
        return SurveySix::query()
            ->join('users', 'users.id', 'survey_sixes.user_id');
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
                ->filterable(Career::pluck('name')),

            Column::name('organization_yes_no')
                ->label('¿Pertenece a organizaciones sociales?')
                ->hideable()
                ->filterable(Constants::YES_NO),

            Column::name('organization')
                ->label('Mencionar organizaciones')
                ->hideable()
                ->filterable(),

            Column::name('agency_yes_no')
                ->label('¿Pertenece a organismos de profesionistas?')
                ->hideable()
                ->filterable(Constants::YES_NO),

            Column::name('agency')
                ->label('Mencionar organismos')
                ->hideable()
                ->filterable(),

            Column::name('association_yes_no')
                ->label('¿Pertenece a asociaciones de egresados?')
                ->hideable()
                ->filterable(Constants::YES_NO),

            Column::name('association')
                ->label('Mencionar asociación')
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
                    Action::value('csv')->label('Exportar CSV')->export('Participación_social_de_los_egresados.csv'),
                    Action::value('html')->label('Exportar HTML')->export('Participación_social_de_los_egresados.html'),
                    Action::value('xls')->label('Exportar XLS')->export('Participación_social_de_los_egresados.xls')
                ];
            }),
        ];
    }
}
