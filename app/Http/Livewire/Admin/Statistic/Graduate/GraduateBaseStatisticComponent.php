<?php

namespace App\Http\Livewire\Admin\Statistic\Graduate;

use App\Models\Career;
use Livewire\Component;
use App\Constants\Constants;
use Illuminate\Support\Facades\Auth;

abstract class GraduateBaseStatisticComponent extends Component
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
    //Career(s)
    public $career;
    public $careers;
    public $careerSelected = [];
    public $query;
    public $properties;

    abstract function render();

    public function createInstanceReports()
    {
        unset($this->surveyInstance);
        $this->query = null;
        //Init surveys
        $this->surveyInstance = new $this->model();
        $this->query = $this->surveyInstance->getGeneralReport(
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

        if($this->extra) $this->getExtraData();
    }

    public function getExtraData(){}

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
