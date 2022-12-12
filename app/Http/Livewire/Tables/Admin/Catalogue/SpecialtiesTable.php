<?php

namespace App\Http\Livewire\Tables\Admin\Catalogue;

use App\Models\Specialty;
use App\Models\Career;
use Mediconesystems\LivewireDatatables\Action;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class SpecialtiesTable extends LivewireDatatable
{
    public $model = Specialty::class;
    public $hideable = "select";

    public function builder()
    {
        return Specialty::query()
            ->join('careers', 'careers.id', 'specialties.career_id');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->hideable()
                ->defaultSort('asc'),

            Column::name('specialties.name')
                ->label('Especialidad')
                ->hideable()
                ->filterable(),

            Column::name('careers.name')
                ->label('Carrera')
                ->filterable($this->careers)
                ->hideable(),

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
                    'edit' => 'editSpecialty',
                    'delete' => 'callConfirmationSpecialty'
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
                    Action::value('csv')->label('Exportar CSV')->export('Especialidades.csv'),
                    Action::value('html')->label('Exportar HTML')->export('Especialidades.html'),
                    // Action::value('pdf')->label('Exportar PDF')->export('Especialidades.pdf'),
                    Action::value('xls')->label('Exportar XLS')->export('Especialidades.xls')
                ];
            }),
        ];
    }

    public function getCareersProperty()
    {
        return Career::pluck('name');
    }
}
