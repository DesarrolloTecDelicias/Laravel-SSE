<?php

namespace App\Http\Livewire\Admin\Statistic\Graduate;

use Livewire\Component;
use App\Models\SurveyFive;

class SurveyFiveGraduateStatistic extends Component
{
    public $chartState = [];
    public $json;
    public $courses, $master;
    
    public function render()
    {
        return view('livewire.admin.statistic.graduate.survey-five-graduate-statistic');
    }

    public function mount()
    {
        $this->chartState['coursesYesNo'] = $this->getQueryRaw('courses_yes_no');
        $this->chartState['masterYesNo'] = $this->getQueryRaw('master_yes_no');
        $this->courses = SurveyFive::selectRaw('id, courses')->where('courses_yes_no', '=', "SÍ")->get();
        $this->master = SurveyFive::selectRaw('id, master')->where('master_yes_no', '=', "SÍ")->get();

        $this->json = json_encode($this->chartState, JSON_UNESCAPED_UNICODE);
    }

    public function getQueryRaw($field)
    {
        return SurveyFive::groupBy($field)
            ->selectRaw("count(*) as total, $field as label")
            ->get();
    }
}
