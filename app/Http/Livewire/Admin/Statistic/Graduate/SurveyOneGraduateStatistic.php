<?php

namespace App\Http\Livewire\Admin\Statistic\Graduate;

use Livewire\Component;
use App\Models\SurveyOne;
use Illuminate\Support\Facades\DB;

class SurveyOneGraduateStatistic extends Component
{
    public $chartState = [];
    public $json;

    public function render()
    {
        return view('livewire.admin.statistic.graduate.survey-one-graduate-statistic');
    }

    public function mount()
    {
        $sex = SurveyOne::groupBy('sex')->selectRaw('count(*) as total, sex as label')->get();
        $maritalStatus = SurveyOne::groupBy('marital_status')->selectRaw('count(*) as total, marital_status as label')->get();
        $qualified = SurveyOne::groupBy('qualified')->selectRaw('count(*) as total, qualified as label')->get();
        $month = SurveyOne::groupBy('month')->selectRaw('count(*) as total, month as label')->get();
        $year = SurveyOne::groupBy('year')->selectRaw('count(*) as total, year as label')->get();
        $state = SurveyOne::groupBy('state')->selectRaw('count(*) as total, state as label')->get();
        $career = SurveyOne::join('careers', 'careers.id', '=', 'survey_ones.career_id')
            ->groupBy('career_id')->selectRaw('count(*) as total, careers.name as label')->get();
        $specialty = SurveyOne::join('specialties', 'specialties.id', '=', 'survey_ones.specialty_id')
            ->groupBy('specialty_id')->selectRaw('count(*) as total, specialties.name as label')->get();
        $english = SurveyOne::groupBy('percent_english')->selectRaw('count(*) as total, percent_english as label')
            ->orderBy(DB::raw('ABS(label)'))->get();

        $this->chartState['sex'] = $sex;
        $this->chartState['maritalStatus'] = $maritalStatus;
        $this->chartState['qualified'] = $qualified;
        $this->chartState['month'] = $month;
        $this->chartState['year'] = $year;
        $this->chartState['state'] = $state;
        $this->chartState['career'] = $career;
        $this->chartState['specialty'] = $specialty;
        $this->chartState['english'] = $english;
        $this->json = json_encode($this->chartState, JSON_UNESCAPED_UNICODE);
    }
}
