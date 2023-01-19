<?php

namespace App\Http\Livewire\Tables\Admin\Report;

use App\Models\Career;
use App\Models\SurveyFour;
use App\Constants\Constants;
use Mediconesystems\LivewireDatatables\Action;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class SurveyFourTable extends LivewireDatatable
{
    public $model = SurveyTwo::class;
    public $hideable = "select";

    public function builder()
    {
        $role = auth()->user()->role;
        if ($role == Constants::ROLE['Committee']) {
            $career = auth()->user()->career_id;
            return SurveyFour::query()
                ->join('users', 'users.id', 'survey_fours.user_id')
                ->join('careers', 'careers.id', 'users.career_id')
                ->where('users.career_id', $career)
                ->whereNotNull('users.income_year');
        } else {
            return SurveyFour::query()
                ->join('users', 'users.id', 'survey_fours.user_id')
                ->join('careers', 'careers.id', 'users.career_id')
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

            Column::name('careers.name')
                ->label('Carrera de Egreso')
                ->hideable()
                ->filterable(Career::pluck('name')),

            Column::name('efficiency_work_activities')
                ->label('Eficiencia para realizar las actividades laborales, en relación con su formación académica')
                ->hideable()
                ->filterable(Constants::LEVEL_ACTIVITIES),

            Column::name('academic_training')
                ->label('Cómo califica su formación académica con respecto a su desempeño laboral')
                ->hideable()
                ->filterable(Constants::LEVEL_ACTIVITIES_TWO),

            Column::name('usefulness_professional_residence')
                ->label('Utilidad de las residencias profesionales o prácticas profesionales para su desarrollo laboral y profesional')
                ->hideable()
                ->filterable(Constants::LEVEL_ACTIVITIES_TWO),

            Column::name('study_area')
                ->label('Área o Campo de Estudio')
                ->hideable()
                ->filterable(Constants::LEVEL_ACTIVITIES_NUMBERS),

            Column::name('title')
                ->label('Titulación')
                ->hideable()
                ->filterable(Constants::LEVEL_ACTIVITIES_NUMBERS),

            Column::name('experience')
                ->label('Experiencia Laboral / Práctica (antes de egresar)')
                ->hideable()
                ->filterable(Constants::LEVEL_ACTIVITIES_NUMBERS),

            Column::name('job_competence')
                ->label('Competencia Laboral: Resolver problemas, análisis, aprendizaje, trabajo en equipo, etc.')
                ->hideable()
                ->filterable(Constants::LEVEL_ACTIVITIES_NUMBERS),

            Column::name('positioning')
                ->label('Posicionamiento de la Institución de Egreso')
                ->hideable()
                ->filterable(Constants::LEVEL_ACTIVITIES_NUMBERS),

            Column::name('languages')
                ->label('Conocimiento de Idiomas Extranjeros')
                ->hideable()
                ->filterable(Constants::LEVEL_ACTIVITIES_NUMBERS),

            Column::name('recommendations')
                ->label('Recomendaciones / Referencias')
                ->hideable()
                ->filterable(Constants::LEVEL_ACTIVITIES_NUMBERS),

            Column::name('personality')
                ->label('Personalidad / Actitudes')
                ->hideable()
                ->filterable(Constants::LEVEL_ACTIVITIES_NUMBERS),

            Column::name('leadership')
                ->label('Capacidad de liderazgo')
                ->hideable()
                ->filterable(Constants::LEVEL_ACTIVITIES_NUMBERS),

            Column::name('others')
                ->label('Otros')
                ->hideable()
                ->filterable(Constants::LEVEL_ACTIVITIES_NUMBERS),

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
                    Action::value('csv')->label('Exportar CSV')->export('Desempeño_profesional_de_los_egresados.csv'),
                    Action::value('html')->label('Exportar HTML')->export('Desempeño_profesional_de_los_egresados.html'),
                    Action::value('xls')->label('Exportar XLS')->export('Desempeño_profesional_de_los_egresados.xls')
                ];
            }),
        ];
    }
}
