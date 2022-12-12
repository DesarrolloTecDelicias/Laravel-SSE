<?php

namespace App\Http\Livewire\Company\Survey;

use App\Models\User;
use Livewire\Component;
use App\Models\Business;
use App\Constants\Constants;
use App\Models\CompanySurvey;
use App\Helpers\GlobalFunctions;
use App\Models\CompanySurveyOne;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SurveyOneCompany extends Component
{
    public $businessActivity = [], $companySize, $businessStructure;
    public $state = ['business_structure' => '', 'company_size' => '', 'business_id' => ''];

    public function render()
    {
        return view('livewire.company.survey.survey-one-company');
    }

    public function mount()
    {
        $userInfo = CompanySurveyOne::where('user_id', Auth::user()->id)->get()->first();
        if ($userInfo) {
            $this->state = $userInfo->toArray();
        } else {
            $this->state['email'] = Auth::user()->email;
            $this->state['business_name'] = Auth::user()->name;
        }

        $this->businessActivity = Business::all();
        $this->companySize = Constants::COMPANY_SIZE;
        $this->businessStructure = Constants::BUSINESS_STRUCTURE;
    }

    public function save()
    {
        $idValidator = array_key_exists('id', $this->state) ? $this->state['id'] : '';

        $validateData = Validator::make(
            $this->state,
            $this->rules(),
            $this->messages()
        )->validate();

        $validateData['business_name'] = mb_strtoupper($validateData['business_name'], 'UTF-8');

        $user = User::find(Auth::user()->id);
        $validateData['user_id'] = $user->id;
        $user->updateUserState();

        CompanySurveyOne::updateOrCreate(['id' => $idValidator], $validateData);
        CompanySurvey::where('user_id', $validateData['user_id'])->get()->first()
            ->surveyDone('survey_one_company_done');

        $messageState = $idValidator ? 'actualizada' : 'creada';
        $message = GlobalFunctions::surveyMessage('Datos Generales', $messageState);

        return redirect()->route('company.dashboard')->with($message);
    }

    public function rules()
    {
        return [
            'business_name' => 'required',
            'address' => 'required',
            'zip' => 'required',
            'suburb' => 'required',
            'state' => 'required',
            'city' => 'required',
            'municipality' => 'required',
            'phone' => 'required|digits:10',
            'email' =>
            ['required', 'string', 'email', 'max:255'],
            'business_structure' => 'required',
            'company_size' => 'required',
            'business_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'business_name.required' => GlobalFunctions::requiredMessage('razón social'),
            'address.required' =>  GlobalFunctions::requiredMessage('dirección'),
            'zip_code.required' => GlobalFunctions::requiredMessage('código postal'),
            'zip_code.digits' => GlobalFunctions::formatMessage('código postal'),
            'suburb.required' => GlobalFunctions::requiredMessage('colonia'),
            'state.required' => GlobalFunctions::requiredMessage('estado'),
            'city.required' => GlobalFunctions::requiredMessage('ciudad'),
            'municipality.required' => GlobalFunctions::requiredMessage('municipio'),
            'phone.required' => GlobalFunctions::requiredMessage('teléfono'),
            'phone.digits' => GlobalFunctions::formatMessage('teléfono'),
            'email.required' => GlobalFunctions::requiredMessage('email'),
            'business_structure.required' => GlobalFunctions::requiredMessage('estructura de la empresa'),
            'company_size.required' => GlobalFunctions::requiredMessage('tamaño de la empresa'),
            'business_id.required' => GlobalFunctions::requiredMessage('actividad económica'),
        ];
    }
}
