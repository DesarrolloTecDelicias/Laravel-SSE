<?php

namespace App\Http\Livewire\Admin\Statistic\Graduate;

use Livewire\Component;
use App\Models\SurveyTwo;

class SurveyTwoGraduateStatistic extends Component
{
    public $chartState = [];
    public $json;

    public function render()
    {
        return view('livewire.admin.statistic.graduate.survey-two-graduate-statistic');
    }

    public function mount()
    {
        $this->chartState['qualityTeachers'] = $this->getQueryRaw("quality_teachers");
        $this->chartState['syllabus'] = $this->getQueryRaw("syllabus");
        $this->chartState['studyCondition'] = $this->getQueryRaw("study_condition");
        $this->chartState['experience'] = $this->getQueryRaw("experience");
        $this->chartState['studyEmphasis'] = $this->getQueryRaw("study_emphasis");
        $this->chartState['participateProjects'] = $this->getQueryRaw("participate_projects");
        $this->json = json_encode($this->chartState, JSON_UNESCAPED_UNICODE);
    }

    public function getQueryRaw($field)
    {
        return
            SurveyTwo::groupBy($field)
            ->selectRaw("count(*) as total, $field as label")
            ->get();
    }
}
