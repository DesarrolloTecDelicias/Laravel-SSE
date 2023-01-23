<?php

namespace App\Http\Livewire\Admin\Statistic\Graduate;

use App\Models\Career;
use App\Models\Specialty;
use App\Models\SurveyOne;
use App\Http\Livewire\Admin\Statistic\Graduate\GraduateBaseStatisticComponent;

class SurveyOneGraduateStatistic extends GraduateBaseStatisticComponent
{
    public $careersData;
    public $specialtiesData;
    public function __construct()
    {
        $this->model = SurveyOne::class;
        $this->survey = 'survey_ones';
        $this->extra = true;
        $this->updateMethod = 'updateChartCustom';
    }

    public function render()
    {
        return view('livewire.admin.statistic.graduate.survey-one-graduate-statistic');
    }

    public function getExtraData(){
        $careers = Career::selectRaw('id, name')->get();
        foreach ($careers as $career) {
            $this->careersData[$career->id] = $career->name;
        }
        $specialties = Specialty::selectRaw('id, name')->get();
        foreach ($specialties as $specialty) {
            $this->specialtiesData[$specialty->id] = $specialty->name;
        }
    }

}
