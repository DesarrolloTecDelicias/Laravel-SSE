<?php

namespace App\Http\Livewire\Tables\Admin\Report;

use App\Constants\Constants;
use App\Models\CompanySurveyThree;
use Mediconesystems\LivewireDatatables\Action;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class SurveyThreeCompanyTable extends LivewireDatatable
{
    public $model = CompanySurveyThree::class;
    public $hideable = "select";

    public function builder()
    {
        return CompanySurveyThree::query()
        ->join('users', 'users.id', 'company_survey_threes.user_id');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->hideable()
                ->defaultSort('asc'),

            Column::name('users.name')
                ->label('Nombre de la empresa')
                ->hideable()
                ->filterable(),

            Column::name('resolve_conflicts')
                ->label('Habilidad para resolver conflictos')
                ->hideable()
                ->filterable(Constants::LEVEL_ACTIVITIES_NUMBERS),

            Column::name('orthography')
                ->label('Ortografía y redacción de documentos')
                ->hideable()
                ->filterable(Constants::LEVEL_ACTIVITIES_NUMBERS),

            Column::name('process_improvement')
                ->label('Mejora de procesos')
                ->hideable()
                ->filterable(Constants::LEVEL_ACTIVITIES_NUMBERS),

            Column::name('teamwork')
                ->label('Trabajo en equipo')
                ->hideable()
                ->filterable(Constants::LEVEL_ACTIVITIES_NUMBERS),

            Column::name('time_management')
                ->label('Habilidad para administrar tiempo')
                ->hideable()
                ->filterable(Constants::LEVEL_ACTIVITIES_NUMBERS),

            Column::name('security')
                ->label('Seguridad personal')
                ->hideable()
                ->filterable(Constants::LEVEL_ACTIVITIES_NUMBERS),

            Column::name('ease_speech')
                ->label('Facilidad de palabral')
                ->hideable()
                ->filterable(Constants::LEVEL_ACTIVITIES_NUMBERS),

            Column::name('project_management')
                ->label('Gestión de proyectos')
                ->hideable()
                ->filterable(Constants::LEVEL_ACTIVITIES_NUMBERS),

            Column::name('puntuality')
                ->label('Puntualidad y asistencia')
                ->hideable()
                ->filterable(Constants::LEVEL_ACTIVITIES_NUMBERS),

            Column::name('rules')
                ->label('Cumplimiento de las normas')
                ->hideable()
                ->filterable(Constants::LEVEL_ACTIVITIES_NUMBERS),

            Column::name('integration_work')
                ->label('Integración al trabajo')
                ->hideable()
                ->filterable(Constants::LEVEL_ACTIVITIES_NUMBERS),

            Column::name('creativity')
                ->label('Creatividad e innovación')
                ->hideable()
                ->filterable(Constants::LEVEL_ACTIVITIES_NUMBERS),

            Column::name('bargaining')
                ->label('Capacidad de negociación')
                ->hideable()
                ->filterable(Constants::LEVEL_ACTIVITIES_NUMBERS),

            Column::name('abstraction')
                ->label('Abstracción, análisis y síntesis')
                ->hideable()
                ->filterable(Constants::LEVEL_ACTIVITIES_NUMBERS),

            Column::name('leadership')
                ->label('Liderazgo y toma de decisión')
                ->hideable()
                ->filterable(Constants::LEVEL_ACTIVITIES_NUMBERS),

            Column::name('changes')
                ->label('Adaptar al cambio')
                ->hideable()
                ->filterable(Constants::LEVEL_ACTIVITIES_NUMBERS),

            Column::name('job_performance')
                ->label('Desempeño laboral')
                ->hideable()
                ->filterable(Constants::GOOD_BAD_QUESTION),

            Column::name('requirement')
                ->label('Sugerencias')
                ->hideable()
                ->filterable(),

            Column::name('comments')
                ->label('Comentarios y sugerencias')
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
                    Action::value('csv')->label('Exportar CSV')->export('Competencias_laborales.csv'),
                    Action::value('html')->label('Exportar HTML')->export('Competencias_laborales.html'),
                    Action::value('xls')->label('Exportar XLS')->export('Competencias_laborales.xls')
                ];
            }),
        ];
    }
}
