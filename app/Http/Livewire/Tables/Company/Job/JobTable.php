<?php

namespace App\Http\Livewire\Tables\Company\Job;

use App\Models\Career;
use App\Models\CompanyJobs;
use Mediconesystems\LivewireDatatables\Action;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class JobTable extends LivewireDatatable
{
    public $model = CompanyJobs::class;
    public $userId = '';
    public $hideable = "select";

    public function builder()
    {
        return CompanyJobs::query()->join('careers', 'careers.id', 'company_jobs.id_career')
            ->where('id_user', $this->userId);
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->hideable()
                ->defaultSort('asc'),

            Column::name('title')
                ->label('Título del empleo')
                ->hideable()
                ->editable()
                ->filterable(),

            Column::name('description')
                ->label('Descripción')
                ->hideable()
                ->editable()
                ->filterable(),

            NumberColumn::name('salary')
                ->label('Salario')
                ->hideable()
                ->editable()
                ->filterable(),

            Column::name('careers.name')
                ->label('Carrera Preferente')
                ->hideable()
                ->filterable(Career::pluck('name')),

            DateColumn::name('created_at')
                ->label('Publicado')
                ->hideable()
                ->filterable(),

            DateColumn::name('updated_at')
                ->label('Actualización')
                ->hideable()
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('table-actions.postulate-actions', [
                    'id' => $id,
                    'view' => 'viewPostulates',
                    'edit' => 'editJob',
                    'delete' => 'callConfirmationJob'
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
                    Action::value('csv')->label('Exportar CSV')->export('Empleos.csv'),
                    Action::value('html')->label('Exportar HTML')->export('Empleos.html'),
                    // Action::value('pdf')->label('Exportar PDF')->export('Empleos.pdf'),
                    Action::value('xlsx')->label('Exportar XLSX')->export('Empleos.xlsx')
                ];
            }),
        ];
    }
}
