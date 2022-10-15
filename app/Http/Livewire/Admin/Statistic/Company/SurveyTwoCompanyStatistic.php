<?php

namespace App\Http\Livewire\Admin\Statistic\Company;

use Livewire\Component;
use App\Helpers\GlobalFunctions;
use App\Models\CompanySurveyTwo;
use App\Models\CompanyGraduatesWorking;

class SurveyTwoCompanyStatistic extends Component
{
    public $chartState = [];
    public $json;

    public function render()
    {
        return view('livewire.admin.statistic.company.survey-two-company-statistic');
    }

    public function mount(){
        $counts = CompanySurveyTwo::selectRaw(
            'SUM(competence1) as \'Área de estudio\', 
            SUM(competence2) as \'Títulación\',
            SUM(competence3) as \'Experiencia Laboral\',
            SUM(competence4) as \'Posicionamiento institución egreso\',
            SUM(competence5) as \'Conocimiento de idiomas\',
            SUM(competence6) as \'Recomendaciones/Referencias\',
            SUM(competence7) as \'Personalidad/Actitudes\',
            SUM(competence8) as \'Liderazgo\''
        )
            ->get()->toArray()[0];

        $this->chartState['counts'] = GlobalFunctions::generateArrayStats($counts);
        $this->chartState['careers'] = CompanyGraduatesWorking::groupBy('career')->selectRaw('sum(total) as total, career as label')->get();
        $this->chartState['congruence'] = $this->getQueryRaw('congruence');
        $this->chartState['numberGraduates'] = $this->getQueryRaw('number_graduates');
        $this->chartState['mostDemandedCareer'] = $this->getQueryRaw('most_demanded_career');
        
        $this->json = json_encode($this->chartState, JSON_UNESCAPED_UNICODE);
    }

    public function getQueryRaw($field)
    {
        return CompanySurveyTwo::groupBy($field)
            ->selectRaw("count(*) as total, $field as label")
            ->get();
    }
}
