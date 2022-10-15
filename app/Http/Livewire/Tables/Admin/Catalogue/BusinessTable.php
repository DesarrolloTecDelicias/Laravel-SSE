<?php

namespace App\Http\Livewire\Tables\Admin\Catalogue;

use App\Models\Business;
use Mediconesystems\LivewireDatatables\Action;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class BusinessTable extends LivewireDatatable
{
    public $model = Business::class;
    public $hideable = "select";

    public function builder()
    {
        return Business::query();
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->hideable()
                ->defaultSort('asc'),

            Column::name('name')
                ->label('Actividad económica')
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
                    'edit' => 'editBusiness',
                    'delete' => 'callConfirmationBusiness'
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
                    // Action::value('pdf')->label('Exportar PDF')->export('Actividad_económica.pdf'),
                    Action::value('xls')->label('Exportar XLS')->export('Actividad_económica.xls')
                ];
            }),
        ];
    }
}
