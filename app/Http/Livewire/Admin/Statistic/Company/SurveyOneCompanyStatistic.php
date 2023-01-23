<?php

namespace App\Http\Livewire\Admin\Statistic\Company;

use App\Models\CompanySurveyOne;
use App\Http\Livewire\Admin\Statistic\Company\CompanyBaseStatisticComponent;

class SurveyOneCompanyStatistic extends CompanyBaseStatisticComponent
{
    public function __construct()
    {
        $this->model = CompanySurveyOne::class;
        $this->survey = 'company_survey_ones';
    }

    public function render()
    {
        return view('livewire.admin.statistic.company.survey-one-company-statistic');
    }

    public function mount()
    {
        $this->chartState['state'] = $this->getQueryRaw("state");
        $this->chartState['businessStructure'] = $this->getQueryRaw("business_structure");
        $this->chartState['companySize'] = $this->getQueryRaw("company_size");
        $this->chartState['businessActivity'] =
        CompanySurveyOne::groupBy("business_id")
            ->selectRaw("count(*) as total, businesses.name as label")
            ->join('businesses', 'businesses.id', 'company_survey_ones.business_id')
            ->get();
        $this->json = json_encode($this->chartState, JSON_UNESCAPED_UNICODE);
    }
}
