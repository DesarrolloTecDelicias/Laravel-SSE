<?php

namespace App\Http\Livewire\Admin\Methodology;

use App\Models\Career;
use Livewire\Component;
use App\Models\SurveyOne;
use App\Models\SurveyTwo;
use App\Models\SurveySix;
use App\Models\SurveyFour;
use App\Models\SurveyFive;
use App\Models\SurveyThree;
use App\Constants\Constants;
use App\Constants\SurveyConstants;
use Illuminate\Support\Facades\Auth;

class GeneralOption extends Component
{
    protected $listeners = [
        'addCareer', 'removeCareer', 'addSurvey',
        'removeSurvey'
    ];
    public $state = [];
    public $surveys;
    public $surveySelected = [];
    //Dates
    public $dataFilterStart, $dataFilterEnd;
    //Instance of surveys
    protected $sOneInstance, $sTwoInstance, $sThreeInstance, $sFourInstance, $sFiveInstance, $sSixInstance;
    //Career(s)
    public $career;
    public $careers;
    public $careerSelected = [];
    public $hashInstance;
    public $tab;

    public function render()
    {
        return view('livewire.admin.methodology.general-option');
    }

    public function mount()
    {
        $now = Date('Y-m-d');
        $date = strtotime("$now -6 year");
        $this->tab = 'pills-1';
        $this->dataFilterStart = Date('Y-m-d', $date);;
        $this->dataFilterEnd = $now;
        $this->surveys = SurveyConstants::$GRADUATE_SURVEY_NAME;
        for ($i = 1; $i <= 6; $i++) {
            $this->surveySelected[$i] = $i;
        }
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

    public function generateData()
    {
        $this->createInstanceReports();
        $this->filter();
    }

    public function filter()
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
        if (!$this->surveySelected) {
            $this->dispatchBrowserEvent(
                'message',
                [
                    'message' => "No se puede filtrar el reporte sin encuestas",
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
        session()->forget('state');
        session()->forget('json');
        $this->createInstanceReports();
        $this->state['dataFilterStart'] = $this->dataFilterStart;
        $this->state['dataFilterEnd'] = $this->dataFilterEnd;
        $this->state['careers'] = $this->careerSelected;
        $this->state['surveys'] = $this->surveySelected;
        $this->state['hashInstance'] =
            [
                1 => $this->sOneInstance,
                2 => $this->sTwoInstance,
                3 => $this->sThreeInstance,
                4 => $this->sFourInstance,
                5 => $this->sFiveInstance,
                6 => $this->sSixInstance,
            ];
        session(['state' => $this->state]);
    }

    public function createInstanceReports()
    {
        unset($this->sOneInstance);
        unset($this->sTwoInstance);
        unset($this->sThreeInstance);
        unset($this->sFourInstance);
        unset($this->sFiveInstance);
        unset($this->sSixInstance);

        //Init surveys
        $this->sOneInstance = new SurveyOne();
        $this->sTwoInstance = new SurveyTwo();
        $this->sThreeInstance = new SurveyThree();
        $this->sFourInstance = new SurveyFour();
        $this->sFiveInstance = new SurveyFive();
        $this->sSixInstance = new SurveySix();

        $this->hashInstance = [
            1 => $this->sOneInstance,
            2 => $this->sTwoInstance,
            3 => $this->sThreeInstance,
            4 => $this->sFourInstance,
            5 => $this->sFiveInstance,
            6 => $this->sSixInstance,
        ];

        $this->fillData();
    }

    public function fillData()
    {
        $this->sOneInstance->getAllPropertiesCount(
            $this->dataFilterStart,
            $this->dataFilterEnd,
            $this->careerSelected
        );
        $this->sTwoInstance->getAllPropertiesCount(
            $this->dataFilterStart,
            $this->dataFilterEnd,
            $this->careerSelected
        );
        $this->sThreeInstance->getAllPropertiesCount(
            $this->dataFilterStart,
            $this->dataFilterEnd,
            $this->careerSelected
        );
        $this->sFourInstance->getAllPropertiesCount(
            $this->dataFilterStart,
            $this->dataFilterEnd,
            $this->careerSelected
        );
        $this->sFiveInstance->getAllPropertiesCount(
            $this->dataFilterStart,
            $this->dataFilterEnd,
            $this->careerSelected
        );
        $this->sSixInstance->getAllPropertiesCount(
            $this->dataFilterStart,
            $this->dataFilterEnd,
            $this->careerSelected
        );
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

    public function addSurvey($value)
    {
        $idValidator = array_key_exists($value, $this->surveySelected);
        if (!$idValidator) $this->surveySelected[$value] = $value;
    }

    public function removeSurvey($value)
    {
        unset($this->surveySelected[$value]);
    }
}
