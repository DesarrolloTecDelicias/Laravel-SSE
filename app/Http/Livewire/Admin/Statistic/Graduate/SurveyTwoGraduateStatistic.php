<?php

namespace App\Http\Livewire\Admin\Statistic\Graduate;

use App\Models\SurveyTwo;
use App\Http\Livewire\Admin\Statistic\Graduate\GraduateBaseStatisticComponent;

class SurveyTwoGraduateStatistic extends GraduateBaseStatisticComponent
{
    public function __construct(){
        $this->model = SurveyTwo::class;
        $this->survey = 'survey_twos';
    }

    public function render()
    {
        return view('livewire.admin.statistic.graduate.survey-two-graduate-statistic');
    }
}
