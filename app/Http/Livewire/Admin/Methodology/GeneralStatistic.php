<?php

namespace App\Http\Livewire\Admin\Methodology;

use App\Models\Career;
use Livewire\Component;
use App\Models\SurveyOne;
use App\Models\SurveyTwo;
use App\Models\SurveyFour;
use App\Models\SurveyThree;
use App\Constants\Constants;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GeneralStatistic extends Component
{
    public $state = [];
    public $surveys;
    public $chartState = [];
    public $json;
    //Dates
    public $dataFilterStart, $dataFilterEnd;
    //Query Collections
    public $qOne, $qTwo, $qThree, $qThreeWork, $qFour;
    //Counts for query
    public $qOneCount, $qTwoCount, $qThreeCount, $qFourCount;
    //Instance of surveys
    protected $sOneInstance, $sTwoInstance, $sThreeInstance, $sFourInstance;
    //Career(s)
    public $career;
    public $careers;

    public function render()
    {
        return view('livewire.admin.methodology.general-statistic');
    }

    public function mount()
    {
        $this->dataFilterStart = '2020-11-28';
        $this->dataFilterEnd = Date('Y-m-d');
        $this->careers = Career::pluck('name');
        $this->career = Auth::user()->role == Constants::ROLE['Committee']
            ? (is_null(Auth::user()->career)
                ? $this->careers[0]
                : Auth::user()->career)
            : $this->careers[0];

        $this->createInstanceReports();
        $this->generateStatistics();
        $this->filter();
        $value = session('state');
    }

    public function filter()
    {

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
        $this->state['career'] = $this->career;
        session(['state' => $this->state]);
        session(['json' => $this->json]);
    }

    public function createInstanceReports()
    {
        //Init surveys
        $this->sOneInstance = new SurveyOne();
        $this->sTwoInstance = new SurveyTwo();
        $this->sThreeInstance = new SurveyThree();
        $this->sFourInstance = new SurveyFour();

        $this->surveys = [
            1 => ['instance' => $this->sOneInstance, 'query' => $this->qOne, 'count' => $this->qOneCount],
            2 => ['instance' => $this->sTwoInstance, 'query' => $this->qTwo, 'count' => $this->qTwoCount],
            3 => ['instance' => $this->sThreeInstance, 'query' => $this->qThree, 'count' => $this->qThreeCount],
            4 => ['instance' => $this->sFourInstance, 'query' => $this->qFour, 'count' => $this->qFourCount],
        ];

        $this->fillQuery(1, 'qOne',  'qOneCount');
        $this->fillQuery(2, 'qTwo',  'qTwoCount');
        $this->fillQuery(3, 'qThree',  'qThreeCount');
        $this->fillQuery(4, 'qFour',  'qFourCount');

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

        $this->$query = $instance->getReportInstance(
            $this->dataFilterStart,
            $this->dataFilterEnd,
            $this->career
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

    public function generateStatistics()
    {
        //Survey One Query
        $english = $this->getQueryStatistic(SurveyOne::class, 'percent_english');
        $qualified = $this->getQueryStatistic(SurveyOne::class, 'qualified');

        //Survey Two Query
        $qualityTeachers = $this->getQueryStatistic(SurveyTwo::class, 'quality_teachers');
        $syllabus = $this->getQueryStatistic(SurveyTwo::class, 'syllabus');
        $participateProjects = $this->getQueryStatistic(SurveyTwo::class, 'participate_projects');
        $studyEmphasis = $this->getQueryStatistic(SurveyTwo::class, 'study_emphasis');
        $studyCondition = $this->getQueryStatistic(SurveyTwo::class, 'study_condition');
        $experience = $this->getQueryStatistic(SurveyTwo::class, 'experience');

        //Survey Three Query
        $doForLiving = $this->getQueryStatistic(SurveyThree::class, 'do_for_living');
        $longTakeJob = $this->getQueryStatistic(SurveyThree::class, 'long_take_job');
        $hearAbout = $this->getQueryStatistic(SurveyThree::class, 'hear_about');
        $workTime = $this->getQueryStatistic(SurveyThree::class, 'do_for_living');
        $managementLevel = $this->getQueryStatistic(SurveyThree::class, 'management_level');

        //Survey Four Query
        $efficiencyWorkActivities = $this->getQueryStatistic(SurveyFour::class, 'efficiency_work_activities');
        $jobRelationship = $this->getQueryStatistic(SurveyThree::class, 'job_relationship');
        $usefulnessProfessionalResidence = $this->getQueryStatistic(SurveyFour::class, 'usefulness_professional_residence');
        $academicTraining = $this->getQueryStatistic(SurveyFour::class, 'academic_training');
        
        $this->chartState['english'] = $english;
        $this->chartState['qualified'] = $qualified;

        $this->chartState['qualityTeachers'] = $qualityTeachers;
        $this->chartState['syllabus'] = $syllabus;
        $this->chartState['participateProjects'] = $participateProjects;
        $this->chartState['studyEmphasis'] = $studyEmphasis;
        $this->chartState['studyCondition'] = $studyCondition;
        $this->chartState['experience'] = $experience;

        $this->chartState['doForLiving'] = $doForLiving;
        $this->chartState['longTakeJob'] = $longTakeJob;
        $this->chartState['workTime'] = $workTime;
        $this->chartState['hearAbout'] = $hearAbout;
        $this->chartState['managementLevel'] = $managementLevel;

        $this->chartState['efficiencyWorkActivities'] = $efficiencyWorkActivities;
        $this->chartState['jobRelationship'] = $jobRelationship;
        $this->chartState['usefulnessProfessionalResidence'] = $usefulnessProfessionalResidence;
        $this->chartState['academicTraining'] = $academicTraining;
        
        $this->json = json_encode($this->chartState, JSON_UNESCAPED_UNICODE);
    }

    public function getQueryStatistic($survey, $label, $array = [])
    {
        return $survey::groupBy($label)
            ->selectRaw("count(*) as total, $label as label")
            ->whereNotNull($label) 
            ->where($array)
            ->orderBy(DB::raw("ABS($label)"))
            ->get();
    }

    public function drawTitle($title)
    {
        return "<tr>
                    <td colspan=\"4\" class=\"bg-tec text-white text-bold\">$title</td>
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

    public function drawChartColumn($id, $title, $colspan = 1)
    {
        return "<td class=\"align-middle\" colspan=\"$colspan\">
                    <div class=\"d-flex justify-content-center flex-wrap\">
                        <span class=\"w-100 text-center text-bold\">$title</span>
                        <div class=\"chartjs-size-monitor\">
                            <div class=\"chartjs-size-monitor-expand\">
                                <div class=\"\"></div>
                            </div>
                            <div class=\"chartjs-size-monitor-shrink\">
                                <div class=\"\"></div>
                            </div>
                        </div>
                        <canvas id=\"$id\" width=\"150\" height=\"150\"
                        class=\"chartjs-render-monitor pie-style\"></canvas>
                    </div>
                </td>";
    }

    function sub($a, $b)
    {
        return intval($a) - intval($b);
    }
}
