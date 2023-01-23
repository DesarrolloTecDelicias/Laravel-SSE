<?php

namespace App\Http\Livewire\Admin\Statistic\Graduate;

use App\Models\SurveyFour;
use App\Http\Livewire\Admin\Statistic\Graduate\GraduateBaseStatisticComponent;

class SurveyFourGraduateStatistic extends GraduateBaseStatisticComponent
{
    public function __construct()
    {
        $this->model = SurveyFour::class;
        $this->survey = 'survey_fours';
    }

    public function render()
    {
        return view('livewire.admin.statistic.graduate.survey-four-graduate-statistic');
    }

    public function getData()
    {
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
    }
}
