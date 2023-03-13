<?php

namespace App\Http\Livewire\Admin\Statistic\Graduate;

use App\Constants\Constants;
use App\Models\SurveyThree;
use App\Models\Career;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SurveyThreeGraduateStatistic extends Component
{
    protected $listeners = ['addCareer', 'removeCareer'];
    public $chartState = [];
    public $json;
    public $model;
    public $survey;
    public $extra = false;
    public $updateMethod = 'updateChart';

    //Dates
    public $dataFilterStart, $dataFilterEnd;
    //Instance of surveys
    protected $surveyInstance;
    protected $surveyInstance2;
    //Career(s)
    public $career;
    public $careers;
    public $careerSelected = [];
    public $query;
    public $properties;
    public $query2;
    public $properties2;

    public function __construct(){
        $this->model = SurveyThree::class;
        $this->survey = 'survey_threes';
    }

    public function render()
    {
        return view('livewire.admin.statistic.graduate.survey-three-graduate-statistic');
    }

    public function createInstanceReports()
    {
        unset($this->surveyInstance);
        unset($this->surveyInstance2);
        $this->query = null;
        $this->query2 = null;
        //Init surveys
        $this->surveyInstance = new $this->model();
        $this->query = $this->surveyInstance->getGeneralReportSurveyThreeWork(
            $this->dataFilterStart,
            $this->dataFilterEnd,
            $this->careerSelected
        );

        $this->surveyInstance2 = new $this->model();
        $this->query2 = $this->surveyInstance2->getGeneralReport(
            $this->dataFilterStart,
            $this->dataFilterEnd,
            $this->careerSelected
        );
    }

    public function filter($update = false)
    {
        if (!$this->careerSelected) {
            $this->dispatchBrowserEvent(
                'message',
                [
                    'message' => "No se puede filtrar el reporte sin carrera(s)",
                    'type' => 'error'
                ]
            );
            return;
        }
        if ($this->dataFilterStart > $this->dataFilterEnd) {
            $this->dispatchBrowserEvent(
                'message',
                [
                    'message' => "La fecha inicial no puede ser mayor a la fecha final",
                    'type' => 'error'
                ]
            );
            return;
        }
        $this->createInstanceReports();

        if ($update) {
            $newData = $this->query;
            $properties = $this->properties;
            $this->dispatchBrowserEvent($this->updateMethod, [
                'data' => $newData,
                'properties' => $properties
            ]);

            $newData2 = $this->query2;
            $properties2 = $this->properties2;
            $this->dispatchBrowserEvent($this->updateMethod, [
                'data' => $newData2,
                'properties' => $properties2
            ]);
        }
    }

    public function generateData()
    {
        $this->filter();
    }

    public function mount()
    {
        $survey = new $this->model();
        $this->properties = $survey->getGraph();
        $this->properties2 = $survey->getGraph2();
        $now = Date('Y-m-d');
        $date = strtotime("$now -6 year");
        $this->dataFilterStart = Date('Y-m-d', $date);;
        $this->dataFilterEnd = $now;
        $this->careers = Career::all();
        if (Auth::user()->role == Constants::ROLE['Committee']) {
            $careerValue = Auth::user()->career_id;
            $this->careerSelected[$careerValue] = $careerValue;
        } else {
            foreach ($this->careers as $career) {
                $this->careerSelected[$career->id] = $career->id;
            }
        }
        $this->generateData();
    }

    public function changeChart()
    {
        $this->filter(true);
    }

    public function addCareer($value)
    {
        $idValidator = array_key_exists($value, $this->careerSelected);
        if (!$idValidator) $this->careerSelected[$value] = $value;
    }

    public function removeCareer($value)
    {
        unset($this->careerSelected[$value]);
    }

}
