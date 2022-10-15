<?php

namespace App\Http\Livewire\Tables\Admin\Catalogue;

use App\Models\Career;
use Mediconesystems\LivewireDatatables\Action;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class CareersTable extends LivewireDatatable
{
    public $model = Career::class;
    public $hideable = "select";

    public function builder()
    {
        return Career::query();
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->hideable()
                ->defaultSort('asc'),

            Column::name('name')
                ->label('Carrera')
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
                    'edit' => 'editCareer',
                    'delete' => 'callConfirmationCareer'
                ]);
            })
                ->label('Acciones')
                ->hideable()
                ->unsortable()
                ->excludeFromExport(),
        ];
    }

    public function buildActions()
    {
        return [
            Action::groupBy('Opciones a Exportar', function () {
                return [
                    Action::value('csv')->label('Exportar CSV')->export('Carreras.csv'),
                    Action::value('html')->label('Exportar HTML')->export('Carreras.html'),
                    // Action::value('pdf')->label('Exportar PDF')->export('Carreras.pdf'),
                    Action::value('xls')->label('Exportar XLS')->export('Carreras.xls')
                ];
            }),
        ];
    }
}
