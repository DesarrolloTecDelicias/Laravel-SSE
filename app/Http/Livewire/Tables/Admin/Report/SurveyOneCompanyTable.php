<?php

namespace App\Http\Livewire\Tables\Admin\Report;

use App\Models\Business;
use App\Models\CompanySurveyOne;
use App\Constants\Constants;
use Mediconesystems\LivewireDatatables\Action;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class SurveyOneCompanyTable extends LivewireDatatable
{
    public $model = CompanySurveyOne::class;
    public $hideable = "select";

    public function builder()
    {
        return CompanySurveyOne::query()
            ->join('businesses', 'businesses.id', 'company_survey_ones.business_id');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->hideable()
                ->defaultSort('asc'),

            Column::name('business_name')
                ->label('Nombre de la empresa')
                ->hideable()
                ->filterable(),

            Column::name('email')
                ->label('Correo electrónico')
                ->hideable()
                ->filterable(),

            Column::name('address')
                ->label('Dirección')
                ->hideable()
                ->filterable(),

            Column::name('zip')
                ->label('Código Postal')
                ->hideable()
                ->filterable(),

            Column::name('suburb')
                ->label('Colonia')
                ->hideable()
                ->filterable(),

            Column::name('state')
                ->label('Estado')
                ->hideable()
                ->filterable(),

            Column::name('city')
                ->label('Ciudad')
                ->hideable()
                ->filterable(),

            Column::name('municipality')
                ->label('Municipio')
                ->hideable()
                ->filterable(),

            Column::name('phone')
                ->label('Teléfono')
                ->hideable()
                ->filterable(),

            Column::name('business_structure')
                ->label('Su empresa u organismo es')
                ->hideable()
                ->filterable(Constants::BUSINESS_STRUCTURE),

            Column::name('company_size')
                ->label('Tamaño de la empresa u organismo')
                ->hideable()
                ->filterable(Constants::COMPANY_SIZE),

            Column::name('businesses.name')
                ->label('Actividad económica de la empresa u organismo')
                ->hideable()
                ->filterable(Business::pluck('name')),

            DateColumn::name('created_at')
                ->label('Contestada')
                ->hideable()
                ->filterable(),

            DateColumn::name('updated_at')
                ->label('Actualizada')
                ->hideable()
                ->filterable(),
        ];
    }

    public function buildActions()
    {
        return [
            Action::groupBy('Opciones a Exportar', function () {
                return [
                    Action::value('csv')->label('Exportar CSV')->export('Datos_generales.csv'),
                    Action::value('html')->label('Exportar HTML')->export('Datos_generales.html'),
                    Action::value('xls')->label('Exportar XLS')->export('Datos_generales.xls')
                ];
            }),
        ];
    }
}
