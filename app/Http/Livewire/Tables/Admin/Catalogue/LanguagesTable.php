<?php

namespace App\Http\Livewire\Tables\Admin\Catalogue;

use App\Models\Language;
use Mediconesystems\LivewireDatatables\Action;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class LanguagesTable extends LivewireDatatable
{
    public $model = Language::class;
    public $hideable = "select";

    public function builder()
    {
        return Language::query();
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->hideable()
                ->defaultSort('asc'),

            Column::name('name')
                ->label('Lenguaje')
                ->hideable()
                ->filterable(),

            DateColumn::name('created_at')
                ->label('Creado')
                ->hideable()
                ->filterable(),

            DateColumn::name('updated_at')
                ->label('Actualización')
                ->hideable()
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('table-actions.actions', [
                    'id' => $id,
                    'edit' => 'editLanguage',
                    'delete' => 'callConfirmationLanguage'
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
                    Action::value('csv')->label('Exportar CSV')->export('Lenguajes.csv'),
                    Action::value('html')->label('Exportar HTML')->export('Lenguajes.html'),
                    // Action::value('pdf')->label('Exportar PDF')->export('Lenguajes.pdf'),
                    Action::value('xls')->label('Exportar XLS')->export('Lenguajes.xls')
                ];
            }),
        ];
    }
}
