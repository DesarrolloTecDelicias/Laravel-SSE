<?php

namespace App\Http\Livewire\Tables\Admin\Configuration;

use App\Models\User;
use App\Constants\Constants;
use Mediconesystems\LivewireDatatables\Action;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class GraduatesTable extends LivewireDatatable
{
    public $model = User::class;
    public $hideable = "select";

    public function builder()
    {
        return User::query()->where('role', Constants::ROLE['Graduate']);
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->hideable()
                ->defaultSort('asc'),

            Column::name('name')
                ->label('Nombre Egresado')
                ->hideable()
                ->filterable(),

            Column::name('fathers_surname')
                ->label('Apellido Paterno')
                ->hideable()
                ->filterable(),

            Column::name('mothers_surname')
                ->label('Apellido Materno')
                ->hideable()
                ->filterable(),

            Column::name('control_number')
                ->label('Número de control')
                ->hideable()
                ->filterable(),

            Column::name('email')
                ->label('Correo Electrónico')
                ->hideable()
                ->filterable(),

            NumberColumn::name('year_graduated')
                ->label('Año de egreso')
                ->hideable()
                ->filterable(),

            DateColumn::name('created_at')
                ->label('Registrado')
                ->hideable()
                ->filterable(),

            DateColumn::name('updated_at')
                ->label('Actualización')
                ->hideable()
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('table-actions.actions', [
                    'id' => $id,
                    'edit' => 'editGraduate',
                    'delete' => 'callConfirmationGraduate'
                ]);
            })
                ->label('Acciones')
                ->unsortable()
                ->hideable()
                ->excludeFromExport(),
        ];
    }

    public function buildActions()
    {
        return [
            Action::groupBy('Opciones a Exportar', function () {
                return [
                    Action::value('csv')->label('Exportar CSV')->export('Egresados.csv'),
                    Action::value('html')->label('Exportar HTML')->export('Egresados.html'),
                    // Action::value('pdf')->label('Exportar PDF')->export('Egresados.pdf'),
                    Action::value('xls')->label('Exportar XLS')->export('Egresados.xls')
                ];
            }),
        ];
    }
}
