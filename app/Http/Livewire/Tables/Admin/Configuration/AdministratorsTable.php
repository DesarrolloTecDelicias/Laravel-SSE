<?php

namespace App\Http\Livewire\Tables\Admin\Configuration;

use App\Models\User;
use App\Constants\Constants;
use Mediconesystems\LivewireDatatables\Action;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class AdministratorsTable extends LivewireDatatable
{
    public $model = User::class;
    public $hideable = "select";

    public function builder()
    {
        return User::query()->where('role', Constants::ROLE['Administrator'])
            ->orWhere('role', Constants::ROLE['Committee']);
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->hideable()
                ->defaultSort('asc'),

            Column::name('name')
                ->label('Nombre Usuario')
                ->hideable()
                ->editable()
                ->filterable(),

            Column::name('email')
                ->label('Correo Electrónico')
                ->hideable()
                ->filterable(),

            Column::name('career')
                ->label('Carrera perteneciente')
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
                    'edit' => 'editAdministrator',
                    'delete' => 'callConfirmationAdministrator'
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
                    Action::value('csv')->label('Exportar CSV')->export('Administradores.csv'),
                    Action::value('html')->label('Exportar HTML')->export('Administradores.html'),
                    Action::value('xls')->label('Exportar XLS')->export('Administradores.xls')
                ];
            }),
        ];
    }
}
