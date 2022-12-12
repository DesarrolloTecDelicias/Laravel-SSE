<?php

namespace App\Http\Livewire\Admin\Statistic\Company;

use Livewire\Component;
use App\Models\CompanySurveyOne;

class SurveyOneCompanyStatistic extends Component
{
    public $chartState = [];
    public $json;

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

    public function getQueryRaw($field)
    {
        return
        CompanySurveyOne::groupBy($field)
            ->selectRaw("count(*) as total, $field as label")
            ->get();
    }
}
