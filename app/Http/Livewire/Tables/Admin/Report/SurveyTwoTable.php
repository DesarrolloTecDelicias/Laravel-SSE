<?php

namespace App\Http\Livewire\Tables\Admin\Report;

use App\Models\Career;
use App\Models\SurveyTwo;
use App\Constants\Constants;
use Mediconesystems\LivewireDatatables\Action;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class SurveyTwoTable extends LivewireDatatable
{
    public $model = SurveyTwo::class;
    public $hideable = "select";

    public function builder()
    {
        return SurveyTwo::query()
            ->join('users', 'users.id', 'survey_twos.user_id');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->hideable()
                ->defaultSort('asc'),

            Column::name('users.name')
                ->label('Nombre egresado')
                ->hideable()
                ->filterable(),

            Column::name('users.fathers_surname')
                ->label('Apellido Paterno')
                ->hideable()
                ->filterable(),

            Column::name('users.mothers_surname')
                ->label('Apellido Materno')
                ->hideable()
                ->filterable(),

            Column::name('users.email')
                ->label('Correo Electrónico')
                ->hideable()
                ->filterable(),

            Column::name('users.control_number')
                ->label('Número de control')
                ->hideable()
                ->filterable(),

            NumberColumn::name('users.income_year')
                ->label('Año de Ingreso')
                ->hideable()
                ->filterable(),

            Column::name('users.income_month')
                ->label('Período de Ingreso')
                ->hideable()
                ->filterable(Constants::MONTH),

            NumberColumn::name('users.year_graduated')
                ->label('Año de egreso')
                ->hideable()
                ->filterable(),

            Column::name('users.month_graduated')
                ->label('Período de Egreso')
                ->hideable()
                ->filterable(Constants::MONTH),

            Column::name('users.career')
                ->label('Carrera de Egreso')
                ->hideable()
                ->filterable(Career::pluck('name')),

            Column::name('quality_teachers')
                ->label('Calidad de docentes')
                ->hideable()
                ->filterable(Constants::GOOD_BAD_QUESTION),

            Column::name('syllabus')
                ->label('Plan de estudios')
                ->hideable()
                ->filterable(Constants::GOOD_BAD_QUESTION),

            Column::name('study_condition')
                ->label('Satisfacción condiciones de estudio (infraestructura)')
                ->hideable()
                ->filterable(Constants::GOOD_BAD_QUESTION),

            Column::name('experience')
                ->label('Experiencia obtenida a través de la residencia profesional')
                ->hideable()
                ->filterable(Constants::GOOD_BAD_QUESTION),

            Column::name('study_emphasis')
                ->label('Énfasis que se le prestaba a la investigación dentro del proceso de enseñanza')
                ->hideable()
                ->filterable(Constants::GOOD_BAD_QUESTION),

            Column::name('participate_projects')
                ->label('Oportunidad de participar en proyectos de investigación y desarrollo')
                ->hideable()
                ->filterable(Constants::GOOD_BAD_QUESTION),

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
                    Action::value('csv')->label('Exportar CSV')->export('Pertinencia_disponibilidad.csv'),
                    Action::value('html')->label('Exportar HTML')->export('Pertinencia_disponibilidad.html'),
                    Action::value('xls')->label('Exportar XLS')->export('Pertinencia_disponibilidad.xls')
                ];
            }),
        ];
    }
}
