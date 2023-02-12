<?php

namespace App\Http\Livewire\Tables\Admin\Catalogue;

use App\Models\Agreement;
use Mediconesystems\LivewireDatatables\Action;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class AgreementsTable extends LivewireDatatable
{
    public $model = Agreement::class;
    public $hideable = "select";

    public function builder()
    {
        return Agreement::query()
            ->join('users', 'users.id', 'agreements.user_id');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->hideable()
                ->defaultSort('asc'),

            Column::name('users.name')
                ->label('Empresa')
                ->hideable()
                ->filterable(),

            Column::name('name')
                ->label('Nombre del convenio')
                ->hideable()
                ->filterable(),

            Column::name('description')
                ->label('Descripción del convenio')
                ->hideable()
                ->filterable(),

            Column::name('type')
                ->label('Tipo de convenio')
                ->hideable()
                ->filterable(),

            DateColumn::name('created_at')
                ->label('Creada')
                ->hideable()
                ->filterable(),

            DateColumn::name('updated_at')
                ->label('Actualización')
                ->hideable()
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('table-actions.actions', [
                    'id' => $id,
                    'edit' => 'edit',
                    'delete' => 'callConfirmation'
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
                    Action::value('csv')->label('Exportar CSV')->export('Actividad_económica.csv'),
                    Action::value('html')->label('Exportar HTML')->export('Actividad_económica.html'),
                    Action::value('xls')->label('Exportar XLS')->export('Actividad_económica.xls')
                ];
            }),
        ];
    }
}
