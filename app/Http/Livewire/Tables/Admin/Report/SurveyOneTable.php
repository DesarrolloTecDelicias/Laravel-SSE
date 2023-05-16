<?php

namespace App\Http\Livewire\Tables\Admin\Report;

use App\Models\Career;
use App\Models\Language;
use App\Models\SurveyOne;
use App\Models\Specialty;
use App\Constants\Constants;
use Mediconesystems\LivewireDatatables\Action;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class SurveyOneTable extends LivewireDatatable
{
    public $model = SurveyOne::class;
    public $hideable = "select";

    public function builder()
    {
        $role = auth()->user()->role;
        if ($role == Constants::ROLE['Committee']) {
            $career = auth()->user()->career_id;
            return SurveyOne::query()
                ->join('users', 'users.id', 'survey_ones.user_id')
                ->join('careers', 'careers.id', 'survey_ones.career_id')
                ->join('languages', 'languages.id', 'survey_ones.language_id')
                ->where('survey_ones.career_id', $career)
                ->whereNotNull('users.income_year');
        } else {
            return SurveyOne::query()
                ->join('users', 'users.id', 'survey_ones.user_id')
                ->join('careers', 'careers.id', 'survey_ones.career_id')
                ->join('languages', 'languages.id', 'survey_ones.language_id')
                ->whereNotNull('users.income_year');
        }
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->hideable()
                ->defaultSort('asc'),

            Column::name('first_name')
                ->label('Nombre(s)')
                ->hideable()
                ->filterable(),

            Column::name('fathers_surname')
                ->label('Apellido Paterno')
                ->hideable()
                ->filterable(),

            Column::name('mothers_surname')
                ->label('Apellido Materno')
                ->hideable()
                ->filterable(),

            Column::name('control_number')
                ->label('Número de Control')
                ->hideable()
                ->filterable(),

            DateColumn::name('birthday')
                ->label('Fecha de nacimiento')
                ->filterable(),

            Column::name('curp')
                ->label('CURP')
                ->hideable()
                ->filterable(),

            Column::name('sex')
                ->label('Sexo')
                ->hideable()
                ->filterable(Constants::SEX),

            Column::name('marital_status')
                ->label('Estado Civil')
                ->hideable()
                ->filterable(Constants::MARITAL_STATUS),

            Column::name('address')
                ->label('Dirección')
                ->hideable()
                ->filterable(),

            Column::name('zip_code')
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

            Column::name('cellphone')
                ->label('Celular')
                ->hideable()
                ->filterable(),

            Column::name('email')
                ->label('Correo Electrónico')
                ->hideable()
                ->filterable(),

            Column::name('careers.name')
                ->label('Carrera')
                ->hideable()
                ->filterable(Career::pluck('name')),

            Column::callback(['specialty_id'], function ($specialty_id) {
                $specialty = Specialty::find($specialty_id);
                return $specialty == null ? '' : strval($specialty->name);
            })
                ->label('Especialidad')
                ->hideable()
                ->exportCallback(function ($specialty_id) {
                $specialty = Specialty::find($specialty_id);
                    return $specialty == null ? '' : strval($specialty->name);
                })
                ->filterable(),

            Column::name('specialties.name')
                ->label('Especialidad')
                ->hideable()
                ->filterable(Specialty::pluck('name')),

            Column::name('income_month')
                ->label('Período de ingreso')
                ->hideable()
                ->filterable(Constants::MONTH),

            NumberColumn::name('income_year')
                ->label('Año de ingreso')
                ->hideable()
                ->filterable(),

            Column::name('month')
                ->label('Período de Egreso')
                ->hideable()
                ->filterable(Constants::MONTH),

            NumberColumn::name('year')
                ->label('Año de egreso')
                ->hideable()
                ->filterable(),

            Column::name('qualified')
                ->label('¿Está titulado?')
                ->hideable()
                ->filterable(Constants::YES_NO),

            NumberColumn::name('qualified_year')
                ->label('Año de titulación')
                ->hideable()
                ->filterable(),

            NumberColumn::name('percent_english')
                ->label('Porcentaje de inglés')
                ->hideable()
                ->filterable(),

            Column::name('languages.name')
                ->label('Otra lengua')
                ->hideable()
                ->filterable(Language::pluck('name')),

            NumberColumn::name('percent_another_language')
                ->label('Porcentaje de otra lengua')
                ->hideable()
                ->filterable(),

            Column::name('software')
                ->label('Software')
                ->hideable()
                ->filterable(),

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
                    Action::value('csv')->label('Exportar CSV')->export('Perfil_del_Egresado.csv'),
                    Action::value('html')->label('Exportar HTML')->export('Perfil_del_Egresado.html'),
                    Action::value('xls')->label('Exportar XLS')->export('Perfil_del_Egresado.xls')
                ];
            }),
        ];
    }
}
