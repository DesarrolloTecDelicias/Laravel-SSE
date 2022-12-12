<?php

namespace App\Http\Livewire\Admin\Methodology;

use App\Models\Career;
use Livewire\Component;
use App\Models\SurveyOne;
use App\Models\SurveyTwo;
use App\Models\SurveyFour;
use App\Models\SurveyFive;
use App\Models\SurveyThree;
use App\Constants\Constants;
use Illuminate\Support\Facades\Auth;

class General extends Component
{
    protected $listeners = ['addCareer', 'removeCareer'];
    public $state = [];
    public $surveys;
    //Dates
    public $dataFilterStart, $dataFilterEnd;
    //Query Collections
    public $qOne, $qTwo, $qThree, $qThreeWork, $qFour, $qFive;
    //Counts for query
    public $qOneCount, $qTwoCount, $qThreeCount, $qFourCount, $qFiveCount;
    //Instance of surveys
    protected $sOneInstance, $sTwoInstance, $sThreeInstance, $sFourInstance, $sFiveInstance;
    //Career(s)
    public $career;
    public $careers;
    public $careerSelected = [];

    public function render()
    {
        return view('livewire.admin.methodology.general');
    }

    public function mount()
    {
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
        $this->state['dataFilterStart'] = $this->dataFilterStart;
        $this->state['dataFilterEnd'] = $this->dataFilterEnd;
        $this->state['careers'] = $this->careerSelected;
        $this->createInstanceReports();
        session(['state' => $this->state]);
    }

    public function createInstanceReports()
    {
        unset($this->sOneInstance);
        unset($this->sTwoInstance);
        unset($this->sThreeInstance);
        unset($this->sFourInstance);
        unset($this->sFiveInstance);

        //Init surveys
        $this->sOneInstance = new SurveyOne();
        $this->sTwoInstance = new SurveyTwo();
        $this->sThreeInstance = new SurveyThree();
        $this->sFourInstance = new SurveyFour();
        $this->sFiveInstance = new SurveyFive();

        $this->surveys = [
            1 => ['instance' => $this->sOneInstance, 'query' => $this->qOne, 'count' => $this->qOneCount],
            2 => ['instance' => $this->sTwoInstance, 'query' => $this->qTwo, 'count' => $this->qTwoCount],
            3 => ['instance' => $this->sThreeInstance, 'query' => $this->qThree, 'count' => $this->qThreeCount],
            4 => ['instance' => $this->sFourInstance, 'query' => $this->qFour, 'count' => $this->qFourCount],
            5 => ['instance' => $this->sFiveInstance, 'query' => $this->qFive, 'count' => $this->qFiveCount],
        ];

        $this->fillQuery(1, 'qOne',  'qOneCount');
        $this->fillQuery(2, 'qTwo',  'qTwoCount');
        $this->fillQuery(3, 'qThree',  'qThreeCount');
        $this->fillQuery(4, 'qFour',  'qFourCount');
        $this->fillQuery(5, 'qFive',  'qFiveCount');

        $this->qThreeWork = $this->qThree->whereIn('do_for_living', array(
            Constants::DO_FOR_LIVING[0],
            Constants::DO_FOR_LIVING[2]
        ));

        $this->fillData();
    }

    public function fillData()
    {
        $firstFilter = Constants::GOOD_BAD_QUESTION[0];

        //Survey One
        $this->returnPercentageFilter('percent_english', 60, '>=', 1);
        $this->returnPercentageFilter('qualified', "SÍ", 'like', 1);

        //Survey Two
        $this->returnPercentageFilter('quality_teachers', $firstFilter,  'like', 2);
        $this->returnPercentageFilter('syllabus', $firstFilter, 'like', 2);
        $this->returnPercentageFilter('participate_projects', $firstFilter, 'like', 2);
        $this->returnPercentageFilter('study_emphasis', $firstFilter, 'like', 2);
        $this->returnPercentageFilter('study_condition', $firstFilter, 'like', 2);
        $this->returnPercentageFilter('experience', $firstFilter, 'like', 2);
        $this->returnPercentageFilter('management_level', 'TÉCNICO', '<>', 3);

        //Survey Three
        $this->returnPercentageFilterIn('long_take_job', array(
            Constants::LONG_TAKE_JOB[0],
            Constants::LONG_TAKE_JOB[1],
            Constants::LONG_TAKE_JOB[2]
        ),  'qThreeWork');

        $this->returnPercentageFilterIn('hear_about', array(
            Constants::HEAR_ABOUT[0],
        ),  'qThreeWork');

        $this->returnPercentageFilterIn('job_relationship', array(
            '70', '80', '90', '100'
        ), 'qThreeWork');

        $this->state['working'] = $this->qThreeCount == 0 ? 0 : round($this->qThreeWork->count() / $this->qThree->count(), 2) * 100;

        $this->returnPercentageFilterIn('do_for_living', array(
            Constants::DO_FOR_LIVING[1],
            Constants::DO_FOR_LIVING[2]
        ), 'qThree');

        //Survey Four
        $this->returnPercentageFilterIn('efficiency_work_activities', array(
            'MUY EFICIENTE', 'EFICIENTE'
        ),  'qFour');

        $this->state['valorization'] =
            $this->qFourCount == 0 ? 0 : round(
                $this->qFour->where(
                    ['study_area', '=', true],
                    ['title', '=', true],
                    ['experience', '=', true],
                    ['job_competence', '=', true],
                    ['positioning', '=', true],
                    ['languages', '=', true],
                    ['recommendations', '=', true],
                    ['personality', '=', true],
                    ['leadership', '=', true],
                    ['others', '=', true],
                )->count() / $this->qFourCount,
                2
            ) * 100;

        $this->returnPercentageFilterIn('usefulness_professional_residence', array(
            'EXCELENTE', 'BUENO'
        ), 'qFour');

        $this->returnPercentageFilter('academic_training', 'PÉSIMO', 'like', 4);
    }

    public function returnPercentageFilter(
        $column,
        $filter,
        $operator,
        $survey
    ) {
        $query = $this->surveys[$survey]['query'];
        $count = $this->surveys[$survey]['count'];

        $this->state[$column] = $count == 0
            ? 0
            : round(
                $query->where("$column", $operator, $filter)
                    ->count() / $count,
                2
            ) * 100;
    }

    public function returnPercentageFilterIn($column, $array, $query)
    {
        $this->state[$column] =
            $this->$query->count() == 0 ? 0 : round(
                $this->$query
                    ->whereIn("$column", $array)
                    ->count() / $this->$query->count(),
                2
            ) * 100;
    }

    public function fillQuery($survey, $query, $queryCount)
    {
        $instance = $this->surveys[$survey]['instance'];
        $this->$query = null;
        $this->$query = $instance->getGeneralReport(
            $this->dataFilterStart,
            $this->dataFilterEnd,
            $this->careerSelected
        );

        $this->$queryCount = $this->$query->count();
    }

    public function returnPercentText($value)
    {
        return ($value ? $value : '0') . '%';
    }

    public function textClass($value, $comparativeValue)
    {
        return $value - $comparativeValue < 0
            ? 'text-danger'
            : ($value - $comparativeValue == 0
                ? 'text-info'
                : 'text-success');
    }

    public function drawTitle($title, $countValue)
    {
        $surveys = [
            1 => ['count' => $this->qOneCount],
            2 => ['count' => $this->qTwoCount],
            3 => ['count' => $this->qThreeCount],
            4 => ['count' => $this->qFourCount],
            5 => ['count' => $this->qFiveCount],
        ];
        $count = $surveys[$countValue]['count'];
        return "<tr>
                    <td colspan=\"4\" class=\"bg-tec text-white text-bold\">
                    $title
                    <br />
                    Un total de: $count egresado(s) respondió esta encuesta
                    </td>
                </tr>";
    }

    public function drawColumn($title, $description = "", $stateValue = "", $number = 0, $invert = 0)
    {
        $column = "<tr> <td>$title</td>";
        if ($description) {
            $column .= "<td class=\"text-justify\">$description</td>";
            $column .= "<td class=\"align-middle text-center\">
                            <span contenteditable>" . $this->returnPercentText($this->state[$stateValue]) . "</span>
                        </td>";
            if ($invert) {
                $column .= "<td class=\"align-middle text-center " . $this->textClass($number, $this->state[$stateValue]) . "\">
                                <span contenteditable>" . $this->sub($number, $this->state[$stateValue]) . "</span>
                            </td>";
            } else {
                $column .= "<td class=\"align-middle text-center " . $this->textClass($this->state[$stateValue], $number) . "\">
                                <span contenteditable>" . $this->sub($this->state[$stateValue], $number) . "</span>
                            </td>";
            }
        } else {
            $column .=
                "<td class=\"align-middle text-center\">S/D.</td>
                <td class=\"align-middle text-center\">S/D.</td>
                <td class=\"align-middle text-center\">S/D.</td>";
        }
        $column .= "</tr>";

        return $column;
    }

    function sub($a, $b)
    {
        return intval($a) - intval($b);
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
