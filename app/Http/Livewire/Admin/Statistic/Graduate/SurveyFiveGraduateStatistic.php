<?php

namespace App\Http\Livewire\Admin\Statistic\Graduate;

use App\Models\SurveyFive;
use App\Http\Livewire\Admin\Statistic\Graduate\GraduateBaseStatisticComponent;

class SurveyFiveGraduateStatistic extends GraduateBaseStatisticComponent
{
    public $courses, $master;

    public function __construct()
    {
        $this->model = SurveyFive::class;
        $this->survey = 'survey_fives';
        $this->extra = true;
    }

    public function render()
    {
        return view('livewire.admin.statistic.graduate.survey-five-graduate-statistic');
    }

    public function getExtraData()
    {
        $this->courses = SurveyFive::selectRaw('id, courses')->where('courses_yes_no', '=', "SÍ")->get();
        $this->master = SurveyFive::selectRaw('id, master')->where('master_yes_no', '=', "SÍ")->get();
    }
}
