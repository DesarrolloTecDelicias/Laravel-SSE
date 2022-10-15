<?php

namespace App\Http\Livewire\Admin\Statistic\Graduate;

use Livewire\Component;
use App\Models\SurveySix;

class SurveySixGraduateStatistic extends Component
{
    public $chartState = [];
    public $json;
    public $organization, $agency, $association;

    public function render()
    {
        return view('livewire.admin.statistic.graduate.survey-six-graduate-statistic');
    }

    public function mount()
    {
        $this->chartState['organizationYesNo'] = $this->getQueryRaw('organization_yes_no');
        $this->organization = SurveySix::selectRaw('id, organization')->where('organization_yes_no', '=', "SÍ")->get();

        $this->chartState['agencyYesNo'] = $this->getQueryRaw('agency_yes_no');
        $this->agency = SurveySix::selectRaw('id, agency')->where('agency_yes_no', '=', "SÍ")->get();

        $this->chartState['associationYesNo'] = $this->getQueryRaw('association_yes_no');
        $this->association = SurveySix::selectRaw('id, association')->where('association_yes_no', '=', "SÍ")->get();

        $this->json = json_encode($this->chartState, JSON_UNESCAPED_UNICODE);
    }

    public function getQueryRaw($field)
    {
        return SurveySix::groupBy($field)
            ->selectRaw("count(*) as total, $field as label")
            ->get();
    }
}
