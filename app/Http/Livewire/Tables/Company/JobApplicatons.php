<?php

namespace App\Http\Livewire\Tables\Company;

use App\Models\JobApplication;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\Action;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class JobApplicatons extends LivewireDatatable
{
    public $model = JobApplication::class;
    public $hideable = "select";

    public function builder()
    {
        return JobApplication::query()
            ->where('user_id', Auth::user()->id)
            ->join('careers', 'careers.id', 'job_applications.career_id');
    }

    public function columns()
    {
        return [
            Column::callback(['type'], function ($type) {
                $value = $type == 1 ? "Residencia" : "Trabajo";
                return $value;
            })
                ->label('Tipo de formato')
                ->hideable()
                ->unsortable()
                ->exportCallback(['type'], function ($type) {
                    $value = $type == 1 ? "Residencia" : "Trabajo";
                    return $value;
                }),
            Column::callback(['photo_path'], function ($photo_path) {
                return view('table-actions.image', [
                    'photo' => 'storage/job_aplications/' . $photo_path,
                    'name' => $photo_path
                ]);
            })
                ->label('Vista Imagen')
                ->unsortable()
                ->hideable()
                ->excludeFromExport(),
            Column::name('careers.name')
                ->label('Perfil Requerido')
                ->hideable()
                ->filterable(),

            Column::name('vacancies')
                ->label('Número de vacantes')
                ->hideable()
                ->filterable(),

            Column::name('name')
                ->label('Nombre del Proyecto')
                ->hideable()
                ->filterable(),

            Column::name('description')
                ->label('Descripción de la problemática a resolver')
                ->hideable()
                ->filterable(),

            Column::name('period')
                ->label('Período Proyectado')
                ->hideable()
                ->filterable(),

            Column::name('benefits')
                ->label('Beneficios o algún tipo de apoyo')
                ->hideable()
                ->filterable(),

            Column::name('consultant_name')
                ->label('Nombre de la persona que podría Asesorar')
                ->hideable()
                ->filterable(),

            Column::name('consultant_phone')
                ->label('Teléfono de la persona que podría Asesorar')
                ->hideable()
                ->filterable(),

            Column::name('consultant_email')
                ->label('Correo de la persona que podría Asesorar')
                ->hideable()
                ->filterable(),

            Column::name('consultant_position')
                ->label('Puesto de la persona que podría Asesorar')
                ->hideable()
                ->filterable(),

            Column::name('in_charge_name')
                ->label('Nombre de la persona que se encargará del proyecto')
                ->hideable()
                ->filterable(),

            Column::name('in_charge_position')
                ->label('Puesto de la persona que se encargará del proyecto')
                ->hideable()
                ->filterable(),

            Column::name('area')
                ->label('Área de la vacante')
                ->hideable()
                ->filterable(),

            Column::name('contact_name')
                ->label('Nombre de la persona a quien contactarán')
                ->hideable()
                ->filterable(),

            Column::name('contact_phone')
                ->label('Teléfono de la persona a quien contactarán')
                ->hideable()
                ->filterable(),

            Column::name('contact_email')
                ->label('Correo de la persona a quien contactarán')
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
                return view('table-actions.actions-with-route', [
                    'id' => $id,
                    'route' => route('company.application.edit', $id),
                    'delete' => 'callConfirmation'
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
                    Action::value('xls')->label('Exportar XLS')->export('Carreras.xls')
                ];
            }),
        ];
    }
}
