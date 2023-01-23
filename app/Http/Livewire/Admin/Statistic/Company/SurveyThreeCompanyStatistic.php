<?php

namespace App\Http\Livewire\Admin\Statistic\Company;

use App\Models\CompanySurveyThree;
use App\Helpers\GlobalFunctions;
use App\Http\Livewire\Admin\Statistic\Company\CompanyBaseStatisticComponent;

class SurveyThreeCompanyStatistic extends CompanyBaseStatisticComponent
{
    public function __construct()
    {
        $this->model = CompanySurveyThree::class;
        $this->survey = 'company_survey_threes';
    }

    public function render()
    {
        return view('livewire.admin.statistic.company.survey-three-company-statistic');
    }

    public function mount()
    {
        $averages = CompanySurveyThree::selectRaw(
            'ROUND(avg(resolve_conflicts),2) as \'Resolver conflictos\', 
            ROUND(avg(orthography),2) as \'Ortografía y redacción\',
            ROUND(avg(process_improvement),2) as \'Mejora de procesos\',
            ROUND(avg(teamwork),2) as \'Trabajo en equipo\',
            ROUND(avg(time_management),2) as \'Administrar tiempo\',
            ROUND(avg(security),2) as \'Seguridad personal\',
            ROUND(avg(ease_speech),2) as \'Facilidad de palabra\',
            ROUND(avg(project_management),2) as \'Gestión de proyectos\',
            ROUND(avg(puntuality),2) as \'Puntualidad y asistencia\',
            ROUND(avg(rules),2) as \'Cumplimiento de normas\',
            ROUND(avg(integration_work),2) as \'Integración al trabajo\',
            ROUND(avg(creativity),2) as \'Creatividad e innovación\',
            ROUND(avg(bargaining),2) as \'Capacidad de negociación\',
            ROUND(avg(abstraction),2) as \'Abstracción, análisis\',
            ROUND(avg(leadership),2) as \'Liderazgo\',
            ROUND(avg(changes),2) as \'Adaptar al cambio\''
        )
            ->get()->toArray()[0];

        $this->chartState['averagesArray'] = GlobalFunctions::generateArrayStats($averages);
        $this->chartState['resolveConflicts'] = $this->getQueryRaw('resolve_conflicts');
        $this->chartState['orthography'] = $this->getQueryRaw('orthography');
        $this->chartState['processImprovement'] = $this->getQueryRaw('process_improvement');
        $this->chartState['teamwork'] = $this->getQueryRaw('teamwork');
        $this->chartState['timeManagement'] = $this->getQueryRaw('time_management');
        $this->chartState['security'] = $this->getQueryRaw('security');
        $this->chartState['easeSpeech'] = $this->getQueryRaw('ease_speech');
        $this->chartState['projectManagement'] = $this->getQueryRaw('project_management');
        $this->chartState['puntuality'] = $this->getQueryRaw('puntuality');
        $this->chartState['rules'] = $this->getQueryRaw('rules');
        $this->chartState['integrationWork'] = $this->getQueryRaw('integration_work');
        $this->chartState['creativity'] = $this->getQueryRaw('creativity');
        $this->chartState['bargaining'] = $this->getQueryRaw('bargaining');
        $this->chartState['abstraction'] = $this->getQueryRaw('abstraction');
        $this->chartState['leadership'] = $this->getQueryRaw('leadership');
        $this->chartState['changes'] = $this->getQueryRaw('changes');
        $this->chartState['jobPerformance'] = $this->getQueryRaw('job_performance');

        $this->json = json_encode($this->chartState, JSON_UNESCAPED_UNICODE);
    }
}
