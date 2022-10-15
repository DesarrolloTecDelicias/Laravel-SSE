<?php

namespace App\Http\Livewire\Graduate\Survey;

use Livewire\Component;
use App\Models\User;
use App\Models\SurveySix;
use App\Constants\Constants;
use App\Models\StudentSurvey;
use App\Helpers\GlobalFunctions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SurveySixGraduate extends Component
{
    public $yesNoOptions;
    public $state = [
        'organization_yes_no' => '', 'organization' => '', 'agency_yes_no' => '',
        'agency' => '', 'association_yes_no' => '', 'association' => ''
    ];
    public $organizationActive = false, $agencyActive = false, $associationActive = false;

    public function render()
    {
        return view('livewire.graduate.survey.survey-six-graduate');
    }

    public function mount()
    {
        $userInfo = SurveySix::where('user_id', Auth::user()->id)->get()->first();
        if ($userInfo) {
            $this->state = $userInfo->toArray();
            $this->organizationActive = $this->state['organization'] != '';
            $this->agencyActive = $this->state['agency'] != '';
            $this->associationActive = $this->state['association'] != '';
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

        if ($validateData['organization'] == '' && $validateData['organization_yes_no'] == Constants::YES_NO[0]) {
            $this->dispatchBrowserEvent('message', [
                'message' => "Si seleccionó que sí organizaciones, debe ingresar el nombre de las organizaciones",
                'type' => 'error'
            ]);
            return;
        }

        if ($validateData['agency'] == '' && $validateData['agency_yes_no'] == Constants::YES_NO[0]) {
            $this->dispatchBrowserEvent('message', [
                'message' => "Si seleccionó que sí organismos, debe ingresar el nombre de los organismos",
                'type' => 'error'
            ]);
            return;
        }

        if ($validateData['association'] == '' && $validateData['association_yes_no'] == Constants::YES_NO[0]) {
            $this->dispatchBrowserEvent('message', [
                'message' => "Si seleccionó que sí asociaciones, debe ingresar el nombre de las asociaciones",
                'type' => 'error'
            ]);
            return;
        }

        $validateData['organization'] = $validateData['organization_yes_no'] == Constants::YES_NO[0]
            ? $validateData['organization'] : null;

        $validateData['agency'] = $validateData['agency_yes_no'] == Constants::YES_NO[0]
            ? $validateData['agency'] : null;

        $validateData['association'] = $validateData['association_yes_no'] == Constants::YES_NO[0]
            ? $validateData['association'] : null;

        $user = User::find(Auth::user()->id);
        $validateData['user_id'] = $user->id;
        $user->updateUserState();

        SurveySix::updateOrCreate(['id' => $idValidator], $validateData);
        StudentSurvey::where('user_id', $validateData['user_id'])->get()->first()
            ->surveyDone('survey_six_done');

        $messageState = $idValidator ? 'actualizada' : 'creada';
        $message = GlobalFunctions::surveyMessage('Participación Social', $messageState);

        return redirect()->route('graduate.dashboard')->with($message);
    }

    public function active()
    {
        $this->organizationActive = $this->state['organization_yes_no'] == Constants::YES_NO[0];
        $this->agencyActive = $this->state['agency_yes_no'] == Constants::YES_NO[0];
        $this->associationActive = $this->state['association_yes_no'] == Constants::YES_NO[0];
    }

    public function rules()
    {
        return [
            'organization_yes_no' => 'required',
            'organization' => '',
            'agency_yes_no' => 'required',
            'agency' => '',
            'association_yes_no' => 'required',
            'association' => '',
        ];
    }

    public function messages()
    {
        return [
            'organization_yes_no.required' => GlobalFunctions::requiredMessage('organizaciones sociales'),
            'agency_yes_no.required' => GlobalFunctions::requiredMessage('organismos'),
            'association_yes_no.required' => GlobalFunctions::requiredMessage('asosiación'),
        ];
    }
}
