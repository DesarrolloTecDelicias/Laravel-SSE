<?php

namespace App\Http\Livewire\Admin\Statistic\Graduate;

use Livewire\Component;
use App\Models\SurveyThree;
use App\Helpers\GlobalFunctions;

class SurveyThreeGraduateStatistic extends Component
{
    public $chartState = [];
    public $json;

    public function render()
    {
        return view('livewire.admin.statistic.graduate.survey-three-graduate-statistic');
    }

    public function mount()
    {
        $doForLiving = SurveyThree::groupBy('do_for_living')->selectRaw('count(*) as total, do_for_living as label')->get();
        $speciality = $this->getQueryRaw("speciality", 'ESTUDIA');
        $longTakeJob = $this->getQueryRaw("long_take_job");

        $counts = SurveyThree::selectRaw(
            'SUM(competence1) as \'Competencias laborales\', 
            SUM(competence2) as \'Título Profesional\',
            SUM(competence3) as \'Examen de selección\',
            SUM(competence4) as \'Idioma Extranjero\',
            SUM(competence5) as \'Actitudes y habilidades\',
            SUM(competence6) as Ninguno'
        )->where('do_for_living', '=', 'ESTUDIA Y TRABAJA')
            ->orWhere('do_for_living', '=', 'TRABAJA')
            ->get()->toArray()[0];

        $countArray = GlobalFunctions::generateArrayStats($counts);

        $languageMostSpoken = $this->getQueryRaw("language_most_spoken");
        $seniority = $this->getQueryRaw("seniority");
        $seniority = $this->getQueryRaw("seniority");
        $salary = $this->getQueryRaw("salary");
        $year = $this->getQueryRaw("year");
        $managementLevel = $this->getQueryRaw("management_level");
        $jobCondition = $this->getQueryRaw("job_condition");
        $jobRelationship = $this->getQueryRaw("job_relationship");
        $businessStructure = $this->getQueryRaw("business_structure");
        $companySize = $this->getQueryRaw("company_size");
        $businessActivity = $this->getQueryRaw("business_activity_selector");

        $this->chartState['doForLiving'] = $doForLiving;
        $this->chartState['speciality'] = $speciality;
        $this->chartState['longTakeJob'] = $longTakeJob;
        $this->chartState['counts'] = $countArray;
        $this->chartState['languageMostSpoken'] = $languageMostSpoken;
        $this->chartState['seniority'] = $seniority;
        $this->chartState['salary'] = $salary;
        $this->chartState['managementLevel'] = $managementLevel;
        $this->chartState['jobCondition'] = $jobCondition;
        $this->chartState['jobRelationship'] = $jobRelationship;
        $this->chartState['businessStructure'] = $businessStructure;
        $this->chartState['companySize'] = $companySize;
        $this->chartState['year'] = $year;
        $this->chartState['businessActivity'] = $businessActivity;

        $this->json = json_encode($this->chartState, JSON_UNESCAPED_UNICODE);
    }

    public function getQueryRaw($field, $activity='TRABAJA')
    {
        return SurveyThree::where('do_for_living', 'ESTUDIA Y TRABAJA')
            ->orWhere('do_for_living', $activity)
            ->groupBy($field)->selectRaw("count(*) as total, $field as label")
            ->get();
    }
}
