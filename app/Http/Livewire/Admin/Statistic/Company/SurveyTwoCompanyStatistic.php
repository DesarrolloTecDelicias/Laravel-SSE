<?php

namespace App\Http\Livewire\Admin\Statistic\Company;

use App\Helpers\GlobalFunctions;
use App\Models\CompanySurveyTwo;
use App\Models\CompanyGraduatesWorking;
use App\Http\Livewire\Admin\Statistic\Company\CompanyBaseStatisticComponent;

class SurveyTwoCompanyStatistic extends CompanyBaseStatisticComponent
{
    public function __construct()
    {
        $this->model = CompanySurveyTwo::class;
        $this->survey = 'company_survey_twos';
    }

    public function render()
    {
        return view('livewire.admin.statistic.company.survey-two-company-statistic');
    }

    public function mount()
    {
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
        $this->chartState['mostDemandedCareer'] =
            CompanySurveyTwo::groupBy('career_id')
            ->selectRaw("count(*) as total, careers.name as label")
            ->join('careers', 'careers.id', 'company_survey_twos.career_id')
            ->get();

        $this->json = json_encode($this->chartState, JSON_UNESCAPED_UNICODE);
    }
}
