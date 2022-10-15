<?php

namespace App\Http\Livewire\Company;

use Livewire\Component;
use App\Models\Postulate;
use App\Models\CompanyJobs;
use App\Models\CompanySurvey;
use Illuminate\Support\Facades\Auth;

class DashboardCompany extends Component
{
    public $companySurvey, $jobs, $postulates, $surveyDone;

    public function render()
    {
        return view('livewire.company.dashboard-company');
    }

    public function mount()
    {
        $this->jobs = CompanyJobs::where('id_user', Auth::user()->id)->get()->count();
        $this->postulates = Postulate::join('company_jobs', 'company_jobs.id', 'postulates.job_id')
            ->where('company_jobs.id_user', Auth::user()->id)
            ->get()->count();
        $this->surveyDone = empty(CompanySurvey::where([
            ['user_id', Auth::user()->id],
            ['survey_one_company_done', true],
            ['survey_two_company_done', true],
            ['survey_three_company_done', true],
        ])->get()->first()) ? true : false;
        $this->companySurvey = CompanySurvey::where('user_id', Auth::user()->id)->get()->first();
    }

    function checkSurvey($userSurveyCheck)
    {
        $verified =  $this->companySurvey[$userSurveyCheck];
        $check = '<i class="fas fa-check-circle text-success" style="font-size: 25px;"></i>';
        $loader = '<div class="loaderSquare"> <span></span><span></span><span></span> </div>';
        return $verified == true ? $check : $loader;;
    }
}
