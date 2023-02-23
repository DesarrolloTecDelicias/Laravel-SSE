<?php

namespace App\Http\Livewire\Company\Survey;

use App\Models\User;
use App\Models\Career;
use Livewire\Component;
use App\Constants\Constants;
use App\Models\CompanySurvey;
use App\Helpers\GlobalFunctions;
use App\Models\CompanySurveyTwo;
use Illuminate\Support\Facades\Auth;
use App\Models\CompanyGraduatesWorking;
use Illuminate\Support\Facades\Validator;


class SurveyTwoCompany extends Component
{
    public $numberGraduates, $levels, $congruences, $careers;
    public $careersArray = [0 => '', 1 => '', 2 => '', 3 => '', 4 => '', 5 => '', 6 => '', 7 => '', 8 => '', 9 => '', 10 => ''];
    public $levelsArray = [0 => '', 1 => '', 2 => '', 3 => '', 4 => '', 5 => '', 6 => '', 7 => '', 8 => '', 9 => '', 10 => ''];
    public $totalsArray = [0 => '', 1 => '', 2 => '', 3 => '', 4 => '', 5 => '', 6 => '', 7 => '', 8 => '', 9 => '', 10 => ''];
    public $state = [
        'number_graduates' => '', 'congruence' => '', 'career_id' => '',
        'competence1' => 0, 'competence2' => 0, 'competence3' => 0,
        'competence4' => 0, 'competence5' => 0, 'competence6' => 0,
        'competence7' => 0, 'competence8' => 0,
    ];
    public $inputs = [];
    public $i = 0;

    public function render()
    {
        return view('livewire.company.survey.survey-two-company');
    }

    public function mount()
    {
        $userInfo = CompanySurveyTwo::where('user_id', Auth::user()->id)->get()->first();

        if ($userInfo) {
            $graduatesWorking = CompanyGraduatesWorking::where('company_survey_id', $userInfo->id)->get();
            $this->state = $userInfo->toArray();

            foreach ($graduatesWorking as $value) {
                $this->levelsArray[$this->i] = $value->level;
                $this->careersArray[$this->i] = $value->career;
                $this->totalsArray[$this->i] = $value->total;

                $this->i = $this->i + 1;
                if ($graduatesWorking->count() != $this->i) {
                    array_push($this->inputs, $this->i);
                }
            }
        } else {
            $this->state['email'] = Auth::user()->email;
        }

        $this->numberGraduates = Constants::NUMBER_GRADUATES;
        $this->levels = Constants::LEVEL;
        $this->congruences = Constants::CONGRUENCE;
        $this->careers = Career::all();
    }

    public function save()
    {
        $idValidator = array_key_exists('id', $this->state) ? $this->state['id'] : '';
        $validateData = Validator::make(
            $this->state,
            $this->rules(),
            $this->messages()
        )->validate();


        $user = User::find(Auth::user()->id);
        $validateData['user_id'] = $user->id;
        $user->updateUserState();

        $data = CompanySurveyTwo::updateOrCreate(['id' => $idValidator], $validateData);
        CompanySurvey::where('user_id', $validateData['user_id'])->get()->first()
            ->surveyDone('survey_two_company_done');

        CompanyGraduatesWorking::where('company_survey_id', $data->id)->delete();

        for ($i = 0; $i <= 10; $i++) {
            if ($this->careersArray[$i] != '') {
                $dataStudent = new CompanyGraduatesWorking();
                $dataStudent->company_survey_id = $data->id;
                $dataStudent->career = $this->careersArray[$i];
                $dataStudent->level = $this->levelsArray[$i];
                $dataStudent->total = trim($this->totalsArray[$i]);
                $dataStudent->save();
            }
        }

        $messageState = $idValidator ? 'actualizada' : 'creada';
        $message = GlobalFunctions::surveyMessage('Ubicación laboral de los egresados', $messageState);

        return redirect()->route('company.dashboard')->with($message);
    }

    public function add($i)
    {
        if ($i < 10) {
            $i = $i + 1;
            $this->i = $i;
            array_push($this->inputs, $i);
        }
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
        $this->careersArray[$i + 1] = '';
        $this->levelsArray[$i + 1] = '';
        $this->totalsArray[$i + 1] = '';
    }

    public function rules()
    {
        return [
            'number_graduates' => 'required',
            'congruence' => 'required',
            'competence1' => '',
            'competence2' => '',
            'competence3' => '',
            'competence4' => '',
            'competence5' => '',
            'competence6' => '',
            'competence7' => '',
            'competence8' => '',
            'career_id' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'number_graduates.required' => GlobalFunctions::requiredMessage('número de profesionistas'),
            'congruence.required' => GlobalFunctions::requiredMessage('congruencia entre perfil profesional y función que desarrollan'),
            'career_id.required' => GlobalFunctions::requiredMessage('carrera que demanda'),
        ];
    }
}
