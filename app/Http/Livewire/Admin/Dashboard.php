<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Constants\Constants;
use App\Helpers\GlobalFunctions;
use App\Models\User;
use App\Models\SurveyOne;
use App\Models\SurveyTwo;
use App\Models\SurveyThree;
use App\Models\StudentSurvey;
use Illuminate\Support\Carbon;

class Dashboard extends Component
{
    public $allUsers, $allCompanies, $surveyOneCount, $surveysPercentage, $newUsers, $relation, $notUsers, $career, $careerCount;
    public $chartState = [];
    public $json;

    public function render()
    {
        return GlobalFunctions::getRouteValidate('livewire.admin.dashboard');
    }

    public function mount()
    {
        $this->boxesInfo();
        $this->getChartInfo();
    }

    public function boxesInfo()
    {
        $this->allUsers = User::where('role', Constants::ROLE['Graduate'])->get()->count();
        $this->allCompanies = User::where('role', Constants::ROLE['Company'])->get()->count();
        $this->surveyOneCount = StudentSurvey::where('survey_one_done', true)
            ->get()->count();

        $surveys = StudentSurvey::where([
            ['survey_one_done', true],
            ['survey_two_done', true],
            ['survey_three_done', true],
            ['survey_four_done', true],
            ['survey_five_done', true],
            ['survey_six_done', true],
            ['survey_seven_done', true],
        ])->get()->count();

        $this->surveysPercentage = $this->allUsers == 0 ? 0 : round($surveys / $this->allUsers, 2) * 100;
        $this->relation = $this->allUsers == 0 ? 0 : round($this->surveyOneCount / $this->allUsers, 2) * 100;

        $this->newUsers = User::where('role', Constants::ROLE['Graduate'])
            ->whereMonth('created_at', Carbon::now()->month)
            ->get()->count() ?? '';

        $this->notUsers = StudentSurvey::where([
            ['survey_one_done', false],
            ['survey_two_done', false],
            ['survey_three_done', false],
            ['survey_four_done', false],
            ['survey_five_done', false],
            ['survey_six_done', false],
            ['survey_seven_done', false],
        ])->get()->count() ?? '';

        $school = SurveyOne::groupBy('career')
            ->selectRaw('count(*) as total, career as label')
            ->orderBy('total', 'desc')
            ->get();

        $this->career = $school[0]->label ?? '';
        $this->careerCount  = $school[0]->total ?? '';
    }

    public function getChartInfo()
    {
        $careers = SurveyOne::groupBy('career')
            ->selectRaw('count(*) as total, career as label')
            ->get();

        $sex = SurveyOne::groupBy('sex')
            ->selectRaw('count(*) as total, sex as label')
            ->get();

        $quality = SurveyTwo::groupBy('quality_teachers')
            ->selectRaw('count(*) as total, quality_teachers as label')
            ->get();

        $doForLiving = SurveyThree::groupBy('do_for_living')
            ->selectRaw('count(*) as total, do_for_living as label')
            ->get();

        $this->chartState['career'] = $careers;
        $this->chartState['sex'] = $sex;
        $this->chartState['quality'] = $quality;
        $this->chartState['doForLiving'] = $doForLiving;
        $this->json = json_encode($this->chartState, JSON_UNESCAPED_UNICODE);
    }

    public function toggleChart()
    {
        $this->dispatchBrowserEvent('updateChart');
    }
}
