<?php

namespace App\Http\Livewire\Admin\Statistic\Graduate;

use Livewire\Component;
use App\Models\SurveyFour;
use App\Helpers\GlobalFunctions;

class SurveyFourGraduateStatistic extends Component
{
    public $chartState = [];
    public $json;

    public function render()
    {
        return view('livewire.admin.statistic.graduate.survey-four-graduate-statistic');
    }

    public function mount()
    {
        $this->chartState['efficiencyWorkActivities'] = $this->getQueryRaw('efficiency_work_activities');
        $this->chartState['academicTraining'] = $this->getQueryRaw('academic_training');
        $this->chartState['usefulnessProfessionalResidence'] = $this->getQueryRaw('usefulness_professional_residence');

        $averages = SurveyFour::selectRaw(
            'ROUND(avg(study_area),2) as \'Área de estudio\', 
            ROUND(avg(title),2) as Titulación,
            ROUND(avg(experience),2) as \'Experiencia Laboral\',
            ROUND(avg(job_competence),2) as \'Competencia Laboral\',
            ROUND(avg(positioning),2) as Posicionamiento,
            ROUND(avg(languages),2) as \'Idiomas Extranjeros\',
            ROUND(avg(recommendations),2) as Recomendaciones,
            ROUND(avg(personality),2) as Personalidad,
            ROUND(avg(leadership),2) as \'Capacidad de liderazgo\',
            ROUND(avg(others),2) as Otros'
        )
            ->get()->toArray()[0];

        $this->chartState['averagesArray'] = GlobalFunctions::generateArrayStats($averages);
        $this->chartState['studyArea'] = $this->getQueryRaw('study_area');
        $this->chartState['title'] = $this->getQueryRaw('title');
        $this->chartState['experience'] = $this->getQueryRaw('experience');
        $this->chartState['jobCompetence'] = $this->getQueryRaw('job_competence');
        $this->chartState['positioning'] = $this->getQueryRaw('positioning');
        $this->chartState['languages'] = $this->getQueryRaw('languages');
        $this->chartState['recommendations'] = $this->getQueryRaw('recommendations');
        $this->chartState['personality'] = $this->getQueryRaw('personality');
        $this->chartState['leadership'] = $this->getQueryRaw('leadership');
        $this->chartState['others'] = $this->getQueryRaw('others');

        $this->json = json_encode($this->chartState, JSON_UNESCAPED_UNICODE);
    }

    public function getQueryRaw($field)
    {
        return SurveyFour::groupBy($field)
            ->selectRaw("count(*) as total, $field as label")
            ->get();
    }
}
