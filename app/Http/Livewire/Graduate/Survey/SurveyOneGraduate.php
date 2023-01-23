<?php

namespace App\Http\Livewire\Graduate\Survey;

use Livewire\Component;
use App\Models\User;
use App\Models\Career;
use App\Models\Language;
use App\Models\Specialty;
use App\Models\SurveyOne;
use App\Constants\Constants;
use App\Models\StudentSurvey;
use App\Helpers\GlobalFunctions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SurveyOneGraduate extends Component
{
    public $career;
    public $careers = [], $specialties = [], $languages = [], $sexes, $maritalStatus, $yesNoOptions, $months, $years, $yearsIncome;
    public $state = [
        'career_id' => '', 'specialty_id' => '', 'sex' => '',
        'marital_status' => '', 'qualified' => '', 'month' => '',
        'income_month' => '', 'income_year' => '', 'year' => '',
        'percent_english' => 0, 'language_id' => '', 'qualified_year' => '',
        'phone' => '', 'cellphone'=> '',
        'percent_another_language' => 0
    ];
    public $qualifiedState = false;

    public function render()
    {
        return view('livewire.graduate.survey.survey-one-graduate');
    }

    public function mount()
    {
        $userInfo = SurveyOne::where('user_id', Auth::user()->id)->get()->first();
        if ($userInfo) {
            $this->specialties = Specialty::where('career_id', $userInfo->career_id)->get();
            $this->state = $userInfo->toArray();
            $this->state['qualified_year'] = $this->state['qualified_year'] ?? '';
            $this->state['income_month'] = $this->state['income_month'] ?? '';
            $this->state['income_year'] = $this->state['income_year'] ?? '';
            $this->handleQualified();
        } else {
            $user = Auth::user();
            $this->state['first_name'] = $user->name;
            $this->state['fathers_surname'] = $user->fathers_surname;
            $this->state['mothers_surname'] = $user->mothers_surname;
            $this->state['email'] = $user->email;
            $this->state['control_number'] = $user->control_number;
            $this->state['income_month'] = $user->income_month ?? '';
            $this->state['month'] = $user->month_graduated ?? '';
            $this->state['year'] = $user->year_graduated ?? '';
            $this->state['income_year'] = $user->income_year ?? '';
            $this->state['career_id'] = $user->career_id ?? '';
            $this->getSpecialties();
        }

        $this->careers = Career::all();
        $this->languages = Language::where([['name', '<>', 'ESPAÑOL'], ['name', '<>', 'INGLÉS']])->get();
        $this->sexes = Constants::SEX;
        $this->maritalStatus = Constants::MARITAL_STATUS;
        $this->yesNoOptions = Constants::YES_NO;
        $this->months = Constants::MONTH;

        $this->years = array();
        $this->yearsIncome = array();
        
        for ($i = 1990; $i <= Date('Y'); $i++){
            if(!($i == Date('Y'))) array_push($this->yearsIncome, $i);
            array_push($this->years, $i);
        }
    }

    public function getSpecialties()
    {
        $this->specialties = [];
        $this->specialties = Specialty::where('career_id', $this->state['career_id'])->get();
    }

    public function save()
    {
        $idValidator = array_key_exists('id', $this->state) ? $this->state['id'] : '';

        $validateData = Validator::make(
            $this->state,
            $this->rules(),
            $this->messages()
        )->validate();

        $validateData['first_name'] = mb_strtoupper($validateData['first_name'], 'UTF-8');
        $validateData['fathers_surname'] = mb_strtoupper($validateData['fathers_surname'], 'UTF-8');
        $validateData['mothers_surname'] = mb_strtoupper($validateData['mothers_surname'], 'UTF-8');
        $validateData['email'] = Auth::user()->email;
        $validateData['control_number'] = Auth::user()->control_number;
        $anotherLanguage = Language::all()->sortBy('id')->first();
        $validateData['percent_another_language'] = $anotherLanguage->id == $validateData['language_id'] ? '0' : $validateData['percent_another_language'];

        $user = User::find(Auth::user()->id);
        $validateData['user_id'] = $user->id;
        $user->updateUserState();

        SurveyOne::updateOrCreate(['id' => $idValidator], $validateData);
        $user['fathers_surname'] = $validateData['fathers_surname'];
        $user['mothers_surname'] = $validateData['mothers_surname'];
        $user->save();
        
        StudentSurvey::where('user_id', $validateData['user_id'])->get()->first()
            ->surveyDone('survey_one_done');

        $messageState = $idValidator ? 'actualizada' : 'creada';
        $message = GlobalFunctions::surveyMessage('Perfil del Egresado', $messageState);

        return redirect()->route('graduate.dashboard')->with($message);
    }

    public function minus($string)
    {
        if ($this->state[$string] == 0) return;
        $this->state[$string] -= 10;
    }

    public function plus($string)
    {
        if ($this->state[$string] == 100) return;
        $this->state[$string] += 10;
    }

    public function rules()
    {
        $idValidator = array_key_exists('id', $this->state) ? $this->state['id'] : '';

        return [
            'first_name' => 'required',
            'fathers_surname' => 'required',
            'mothers_surname' => 'required',
            'control_number' => ['required', 'regex:/^[C]?[B]?[0-9]{8,10}$/', 'unique:survey_ones,control_number,' . $idValidator],
            'birthday' => 'required|date',
            'curp' => [
                'required', 'unique:survey_ones,curp,' . $idValidator,
                'regex:/(^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$)/'
            ],
            'sex' => 'required',
            'marital_status' => 'required',
            'address' => 'required',
            'zip_code' => 'required',
            'suburb' => 'required',
            'state' => 'required',
            'city' => 'required',
            'municipality' => 'required',
            'phone' => $this->state['phone'] != '' ? 'digits:10' : '',
            'cellphone' => 'required|digits:10',
            'career_id' => 'required',
            'specialty_id' => 'required',
            'qualified' => 'required',
            'qualified_year' => $this->state['qualified'] == 'SÍ' ? 'required|digits:4' : '',
            'income_month' => 'required',
            'income_year' => 'required|digits:4',
            'month' => 'required',
            'year' => 'required|digits:4',
            'percent_english' => 'required',
            'language_id' => 'required',
            'percent_another_language' => 'required',
            'software' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => GlobalFunctions::requiredMessage('nombre(s)'),
            'fathers_surname.required' => GlobalFunctions::requiredMessage('apellido paterno'),
            'mothers_surname.required' => GlobalFunctions::requiredMessage('apellido materno'),
            'control_number.required' => GlobalFunctions::requiredMessage('número de control'),
            'control_number.regex' => GlobalFunctions::formatMessage('número de control'),
            'control_number.unique' => GlobalFunctions::uniqueMessage('número de control'),
            'birthday.required' => GlobalFunctions::requiredMessage('fecha de nacimiento'),
            'sex.required' => GlobalFunctions::requiredMessage('sexo'),
            'marital_status.required' => GlobalFunctions::requiredMessage('estado civil'),
            'address.required' =>  GlobalFunctions::requiredMessage('dirección'),
            'zip_code.required' => GlobalFunctions::requiredMessage('código postal'),
            'zip_code.digits' => GlobalFunctions::formatMessage('código postal'),
            'suburb.required' => GlobalFunctions::requiredMessage('colonia'),
            'state.required' => GlobalFunctions::requiredMessage('estado'),
            'city.required' => GlobalFunctions::requiredMessage('ciudad'),
            'municipality.required' => GlobalFunctions::requiredMessage('municipio'),
            'phone.digits' => GlobalFunctions::formatMessage('teléfono'),
            'cellphone.required' => GlobalFunctions::requiredMessage('teléfono celular'),
            'cellphone.digits' => GlobalFunctions::formatMessage('teléfono celular'),
            'career_id.required' => GlobalFunctions::requiredMessage('carerra'),
            'specialty_id.required' => GlobalFunctions::requiredMessage('especialidad'),
            'qualified.required' => GlobalFunctions::requiredMessage('titulado'),
            'qualified_year.required' => GlobalFunctions::requiredMessage('año de titulado'),
            'income_month.required' => GlobalFunctions::requiredMessage('período de ingreso'),
            'income_year.required' => GlobalFunctions::requiredMessage('año de ingreso'),
            'month.required' => GlobalFunctions::requiredMessage('período de egreso'),
            'year.required' => GlobalFunctions::requiredMessage('año de egreso'),
            'percent_english.required' => GlobalFunctions::requiredMessage('porcentaje de inglés'),
            'language_id.required' => GlobalFunctions::requiredMessage('otro idioma'),
            'percent_another_language.required' => GlobalFunctions::requiredMessage('porcentaje otro idioma'),
        ];
    }

    public function handleQualified()
    {
        $this->qualifiedState = $this->state['qualified'] == 'SÍ';
    }
}
