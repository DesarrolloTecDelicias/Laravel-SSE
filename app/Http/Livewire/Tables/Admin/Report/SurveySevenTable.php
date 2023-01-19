<?php

namespace App\Http\Livewire\Tables\Admin\Report;

use App\Models\Career;
use App\Models\SurveySeven;
use App\Constants\Constants;
use Mediconesystems\LivewireDatatables\Action;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class SurveySevenTable extends LivewireDatatable
{
    public $model = SurveySeven::class;
    public $hideable = "select";

    public function builder()
    {
        $role = auth()->user()->role;
        if ($role == Constants::ROLE['Committee']) {
            $career = auth()->user()->career_id;
            return SurveySeven::query()
                ->join('users', 'users.id', 'survey_sevens.user_id')
                ->join('careers', 'careers.id', 'users.career_id')
                ->where('users.career_id', $career)
                ->whereNotNull('users.income_year');
        } else {
            return SurveySeven::query()
                ->join('users', 'users.id', 'survey_sevens.user_id')
                ->join('careers', 'careers.id', 'users.career_id')
                ->whereNotNull('users.income_year');
        }
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

            Column::callback(['comments'], function ($comments) {
                return view('table-actions.long-text', [
                    'text' => $comments
                ]);
            })
                ->label('Comentario Corto')
                ->unsortable()
                ->hideable()
                ->filterable()
                ->exportCallback(function ($comments) {
                    return (string) $comments;
                }),

            Column::callback(['id'], function ($id) {
                return view('table-actions.open-text', [
                    'show' => 'showComments',
                    'id' => $id
                ]);
            })
                ->label('Mostrar comentario')
                ->unsortable()
                ->hideable()
                ->excludeFromExport(),

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
                    Action::value('csv')->label('Exportar CSV')->export('Comentarios.csv'),
                    Action::value('html')->label('Exportar HTML')->export('Comentarios.html'),
                    Action::value('xls')->label('Exportar XLS')->export('Comentarios.xls')
                ];
            }),
        ];
    }
}
