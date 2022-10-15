<?php

namespace App\Http\Livewire\Graduate\Survey;

use Livewire\Component;
use App\Models\User;
use App\Models\SurveyFive;
use App\Constants\Constants;
use App\Models\StudentSurvey;
use App\Helpers\GlobalFunctions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SurveyFiveGraduate extends Component
{
    public $yesNoOptions;
    public $state = [
        'courses_yes_no' => '', 'courses' => '', 'master_yes_no' => '', 'master' => ''
    ];
    public $coursesActive = false, $mastersActive = false;

    public function render()
    {
        return view('livewire.graduate.survey.survey-five-graduate');
    }

    public function mount()
    {
        $userInfo = SurveyFive::where('user_id', Auth::user()->id)->get()->first();
        if ($userInfo) {
            $this->state = $userInfo->toArray();
            $this->coursesActive = $this->state['courses'] != '';
            $this->mastersActive = $this->state['master'] != '';
        }

        $this->yesNoOptions = Constants::YES_NO;
    }

    public function save()
    {
        $idValidator = array_key_exists('id', $this->state) ? $this->state['id'] : '';

        $validateData = Validator::make(
            $this->state,
            $this->rules(),
            $this->messages()
        )->validate();

        if ($validateData['courses'] == '' && $validateData['courses_yes_no'] == Constants::YES_NO[0]) {
            $this->dispatchBrowserEvent('message', [
                'message' => "Si seleccionó que sí los cursos, debe ingresar una descripción de los cursos que esté interesado",
                'type' => 'error'
            ]);
            return;
        }

        if ($validateData['master'] == '' && $validateData['master_yes_no'] == Constants::YES_NO[0]) {
            $this->dispatchBrowserEvent('message', [
                'message' => "Si seleccionó que sí los posgrados, debe ingresar una descripción de los posgrados que esté interesado",
                'type' => 'error'
            ]);
            return;
        }

        $validateData['courses'] = $validateData['courses_yes_no'] == Constants::YES_NO[0]
            ? $validateData['courses'] : null;

        $validateData['master'] = $validateData['master_yes_no'] == Constants::YES_NO[0]
            ? $validateData['master'] : null;

        $user = User::find(Auth::user()->id);
        $validateData['user_id'] = $user->id;
        $user->updateUserState();

        SurveyFive::updateOrCreate(['id' => $idValidator], $validateData);
        StudentSurvey::where('user_id', $validateData['user_id'])->get()->first()
            ->surveyDone('survey_five_done');

        $messageState = $idValidator ? 'actualizada' : 'creada';
        $message = GlobalFunctions::surveyMessage('Expéctativas y Actualización', $messageState);

        return redirect()->route('graduate.dashboard')->with($message);
    }

    public function active()
    {
        $this->coursesActive = $this->state['courses_yes_no'] == Constants::YES_NO[0];
        $this->mastersActive = $this->state['master_yes_no'] == Constants::YES_NO[0];
    }

    public function rules()
    {
        return [
            'courses_yes_no' => 'required',
            'courses' => '',
            'master_yes_no' => 'required',
            'master' => '',
        ];
    }

    public function messages()
    {
        return [
            'courses_yes_no.required' => GlobalFunctions::requiredMessage('cursos de actualización'),
            'master_yes_no.required' => GlobalFunctions::requiredMessage('posgrado'),
        ];
    }
}
