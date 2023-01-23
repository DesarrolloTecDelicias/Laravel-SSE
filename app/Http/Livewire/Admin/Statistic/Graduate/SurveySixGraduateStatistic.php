<?php

namespace App\Http\Livewire\Admin\Statistic\Graduate;

use App\Models\SurveySix;
use App\Http\Livewire\Admin\Statistic\Graduate\GraduateBaseStatisticComponent;

class SurveySixGraduateStatistic extends GraduateBaseStatisticComponent
{
    public $organization, $agency, $association;

    public function __construct()
    {
        $this->model = SurveySix::class;
        $this->survey = 'survey_sixes';
        $this->extra = true;
    }

    public function render()
    {
        return view('livewire.admin.statistic.graduate.survey-six-graduate-statistic');
    }

    public function getExtraData()
    {
        $this->organization = SurveySix::selectRaw('id, organization')->where('organization_yes_no', '=', "SÍ")->get();
        $this->agency = SurveySix::selectRaw('id, agency')->where('agency_yes_no', '=', "SÍ")->get();
        $this->association = SurveySix::selectRaw('id, association')->where('association_yes_no', '=', "SÍ")->get();
    }
}
