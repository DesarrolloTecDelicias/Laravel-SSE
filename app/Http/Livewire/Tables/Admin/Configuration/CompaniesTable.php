<?php

namespace App\Http\Livewire\Tables\Admin\Configuration;

use App\Models\User;
use App\Constants\Constants;
use Mediconesystems\LivewireDatatables\Action;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class CompaniesTable extends LivewireDatatable
{
    public $model = User::class;
    public $hideable = "select";

    public function builder()
    {
        return User::query()->where('role', Constants::ROLE['Company']);
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->hideable()
                ->defaultSort('asc'),

            Column::name('name')
                ->label('Razón Social')
                ->hideable()
                ->editable()
                ->filterable(),

            Column::name('email')
                ->label('Correo Electrónico')
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
                    'edit' => 'editCompany',
                    'delete' => 'callConfirmationCompany'
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
                    Action::value('csv')->label('Exportar CSV')->export('Empresas.csv'),
                    Action::value('html')->label('Exportar HTML')->export('Empresas.html'),
                    // Action::value('pdf')->label('Exportar PDF')->export('Empresas.pdf'),
                    Action::value('xls')->label('Exportar XLS')->export('Empresas.xls')
                ];
            }),
        ];
    }
}
