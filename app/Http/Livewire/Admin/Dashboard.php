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
        $survey3 = SurveyThree::where('do_for_living', 'TRABAJA')
        ->whereNull('long_take_job')
        ->get();

        foreach ($survey3 as $survey) {
            $survey->do_for_living = 'NO ESTUDIA NI TRABAJA';
            $survey->competence1 = null;
            $survey->competence2 = null;
            $survey->competence3 = null;
            $survey->competence4 = null;
            $survey->competence5 = null;
            $survey->competence6 = null;

            $survey->speak_percent = null;
            $survey->write_percent = null;
            $survey->read_percent = null;
            $survey->listen_percent = null;
            $survey->job_relationship = null;
            $survey->fax = null;
            $survey->web_page = null;
            $survey->boss_email = null;
            
            $survey->save();
        }

        $survey4 = SurveyThree::where('do_for_living', 'ESTUDIA')
        ->whereNull('speciality')
        ->get();

        foreach ($survey4 as $survey) {
            $survey->do_for_living = 'NO ESTUDIA NI TRABAJA';
            $survey->speciality = null;
            $survey->school = null;
            $survey->competence1 = null;
            $survey->competence2 = null;
            $survey->competence3 = null;
            $survey->competence4 = null;
            $survey->competence5 = null;
            $survey->competence6 = null;

            $survey->speak_percent = null;
            $survey->write_percent = null;
            $survey->read_percent = null;
            $survey->listen_percent = null;
            $survey->job_relationship = null;
            $survey->fax = null;
            $survey->web_page = null;
            $survey->boss_email = null;

            $survey->save();
        }
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
            ->whereYear('created_at', Carbon::now()->year)
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

        $school = SurveyOne::groupBy('career_id')
        ->join('careers', 'careers.id', 'survey_ones.career_id')
            ->selectRaw('count(*) as totalLabel, careers.name as label')
            ->orderBy('totalLabel', 'desc')
            ->get();

        $this->career = $school[0]->label ?? '';
        $this->careerCount  = $school[0]->totalLabel ?? '';
    }

    public function getChartInfo()
    {
        $careers = SurveyOne::groupBy('career_id')
            ->join('careers', 'careers.id', 'survey_ones.career_id')
            ->selectRaw('count(*) as total, careers.name as label')
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
