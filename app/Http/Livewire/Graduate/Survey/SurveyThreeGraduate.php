<?php

namespace App\Http\Livewire\Graduate\Survey;

use Livewire\Component;
use App\Models\User;
use App\Models\Language;
use App\Models\Business;
use App\Models\SurveyThree;
use App\Constants\Constants;
use App\Models\StudentSurvey;
use App\Helpers\GlobalFunctions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SurveyThreeGraduate extends Component
{
    public $doForLiving, $specialty, $longTakeJob, $hearAbout, $languages = [],
        $seniority, $salary, $managementLevel, $jobCondition, $businessActivity,
        $companySize, $businessStructure;
    public $schoolVisibility = false, $workVisibility = false;
    public $state = [
        'do_for_living' => '', 'speciality' => '', 'long_take_job' => '',
        'competence1' => 0, 'competence2' => 0, 'competence3' => 0, 'competence4' => 0,
        'competence5' => 0, 'competence6' => 0,
        'hear_about' => '', 'language_id' => '', 'speak_percent' => 0,
        'write_percent' => 0, 'read_percent' => 0, 'listen_percent' => 0,
        'seniority' => '', 'year' => '', 'salary' => '',
        'management_level' => '', 'job_condition' => '', 'job_relationship' => '',
        'business_structure' => '',
        'company_size' => '',
        'business_name' => '',
        'business_activity' => '',
        'address' => '',
        'zip' => '',
        'suburb' => '',
        'state' => '',
        'city' => '',
        'municipality' => '',
        'phone' => '',
        'fax' => '',
        'web_page' => '',
        'boss_email' => '',
        'business_id' => '',
    ];
    public $percentValues = array("speak_percent", "write_percent", "read_percent", "listen_percent");

    public function render()
    {
        return view('livewire.graduate.survey.survey-three-graduate');
    }

    public function mount()
    {
        $userInfo = SurveyThree::where('user_id', Auth::user()->id)->get()->first();
        if ($userInfo) {
            $this->state = $userInfo->toArray();
            $this->changeActivity();
            foreach ($this->state as $key => $value) {
                if (is_null($value) && in_array($key, $this->percentValues)) {
                    $this->state[$key] = 0;
                    continue;
                }
                if (is_null($value)) $this->state[$key] = '';
            }
        }

        $this->doForLiving = Constants::DO_FOR_LIVING;
        $this->specialty = Constants::SPECIALITY;
        $this->longTakeJob = Constants::LONG_TAKE_JOB;
        $this->hearAbout = Constants::HEAR_ABOUT;
        $this->languages = Language::all();
        $this->seniority = Constants::SENIORITY;
        $this->salary = Constants::SALARY;
        $this->managementLevel = Constants::MANAGEMENT_LEVEL;
        $this->jobCondition = Constants::JOB_CONDITION;
        $this->businessActivity = Business::all();
        $this->companySize = Constants::COMPANY_SIZE;
        $this->businessStructure = Constants::BUSINESS_STRUCTURE;
    }

    public function validateValues($key, $validator)
    {
        $this->state[$key] = $validator ? ($this->state[$key] ? $this->state[$key] : null) : null;
    }

    public function save()
    {
        $idValidator = array_key_exists('id', $this->state) ? $this->state['id'] : '';

        Validator::make(
            $this->state,
            ['do_for_living' => 'required'],
            ['do_for_living.required' => GlobalFunctions::requiredMessage('actividad')]
        )->validate();

        if ($this->schoolVisibility) {
            Validator::make(
                $this->state,
                ['speciality' => 'required', 'school' => 'required'],
                [
                    'speciality.required' => GlobalFunctions::requiredMessage('qué estudia'),
                    'school.required' => GlobalFunctions::requiredMessage('especialidad e institución')
                ]
            )->validate();
        }

        if ($this->workVisibility) {
            Validator::make(
                $this->state,
                $this->rules(),
                $this->messages()
            )->validate();
        }

        $school = $this->schoolVisibility;
        $work = $this->workVisibility;
        $this->validateValues('speciality', $school);
        $this->validateValues('school', $school);
        $this->validateValues('long_take_job', $work);
        $this->validateValues('hear_about', $work);
        $this->validateValues('competence1', $work);
        $this->validateValues('competence2', $work);
        $this->validateValues('competence3', $work);
        $this->validateValues('competence4', $work);
        $this->validateValues('competence5', $work);
        $this->validateValues('competence6', $work);
        $this->validateValues('language_id', $work);
        $this->validateValues('speak_percent', $work);
        $this->validateValues('write_percent', $work);
        $this->validateValues('read_percent', $work);
        $this->validateValues('listen_percent', $work);
        $this->validateValues('seniority', $work);
        $this->validateValues('year', $work);
        $this->validateValues('salary', $work);
        $this->validateValues('management_level', $work);
        $this->validateValues('job_condition', $work);
        $this->validateValues('job_relationship', $work);
        $this->validateValues('business_name', $work);
        $this->validateValues('business_activity', $work);
        $this->validateValues('address', $work);
        $this->validateValues('zip', $work);
        $this->validateValues('suburb', $work);
        $this->validateValues('state', $work);
        $this->validateValues('city', $work);
        $this->validateValues('municipality', $work);
        $this->validateValues('phone', $work);
        $this->validateValues('fax', $work);
        $this->validateValues('web_page', $work);
        $this->validateValues('boss_email', $work);
        $this->validateValues('business_structure', $work);
        $this->validateValues('company_size', $work);
        $this->validateValues('business_id', $work);

        $validateData = $this->state;
        $user = User::find(Auth::user()->id);
        $validateData['user_id'] = $user->id;
        $user->updateUserState();

        SurveyThree::updateOrCreate(['id' => $idValidator], $validateData);
        StudentSurvey::where('user_id', $validateData['user_id'])->get()->first()
            ->surveyDone('survey_three_done');

        $messageState = $idValidator ? 'actualizada' : 'creada';
        $message = GlobalFunctions::surveyMessage('Ubicación Laboral', $messageState);

        return redirect()->route('graduate.dashboard')->with($message);
    }

    public function changeActivity()
    {
        $value = $this->state['do_for_living'];
        $this->schoolVisibility = ($value == Constants::DO_FOR_LIVING[1] || $value == Constants::DO_FOR_LIVING[2]);
        $this->workVisibility = ($value == Constants::DO_FOR_LIVING[0] || $value == Constants::DO_FOR_LIVING[2]);
    }

    public function minus($string)
    {
        if ($this->state[$string] == 0) return;
        $this->state[$string] -= 10;
    }

    public function plus(String $string)
    {
        if ($this->state[$string] == 100) return;
        $this->state[$string] += 10;
    }

    public function rules()
    {
        return [
            'long_take_job' => 'required',
            'hear_about' => 'required',
            'competence1' => '',
            'competence2' => '',
            'competence3' => '',
            'competence4' => '',
            'competence5' => '',
            'competence6' => '',
            'language_id' => 'required',
            'speak_percent' => 'required',
            'write_percent' => 'required',
            'read_percent' => 'required',
            'listen_percent' => 'required',
            'seniority' => 'required',
            'year' => 'required',
            'salary' => 'required',
            'management_level' => 'required',
            'job_condition' => 'required',
            'job_relationship' => 'required',
            'business_name' => 'required',
            'business_activity' => 'required',
            'address' => 'required',
            'zip' => 'required',
            'suburb' => 'required',
            'state' => 'required',
            'city' => 'required',
            'municipality' => 'required',
            'phone' => 'required|digits:10',
            'fax' => 'regex:/^\+?[0-9]+$/',
            'web_page' => 'regex:/^(http(s?):\/\/)?(www\.)+[a-zA-Z0-9\.\-\_]+(\.[a-zA-Z]{2,3})+(\/[a-zA-Z0-9\_\-\s\.\/\?\%\#\&\=]*)?$/',
            'boss_email' => 'regex:/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/',
            'business_structure' => 'required',
            'company_size' => 'required',
            'business_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'long_take_job.required' => GlobalFunctions::requiredMessage('tiempo transcurrido para obtener el primer empleo'),
            'hear_about.required' => GlobalFunctions::requiredMessage('medio para obtener el empleo'),
            'language_id.required' => GlobalFunctions::requiredMessage('idioma empleado'),
            'seniority.required' => GlobalFunctions::requiredMessage('antigüedad de empleo'),
            'year.required' => GlobalFunctions::requiredMessage('año de ingreso'),
            'salary.required' => GlobalFunctions::requiredMessage('ingreso'),
            'management_level.required' => GlobalFunctions::requiredMessage('nivel jerárquico'),
            'job_condition.required' => GlobalFunctions::requiredMessage('condición de trabajo'),
            'job_relationship.required' => GlobalFunctions::requiredMessage('relación del trabajo'),
            'business_name.required' => GlobalFunctions::requiredMessage('razón social'),
            'business_activity.required' => GlobalFunctions::requiredMessage('giro o actividad'),
            'address.required' => GlobalFunctions::requiredMessage('domicilio'),
            'zip.required' => GlobalFunctions::requiredMessage('código postal'),
            'suburb.required' => GlobalFunctions::requiredMessage('colonia'),
            'state.required' => GlobalFunctions::requiredMessage('estado'),
            'city.required' => GlobalFunctions::requiredMessage('ciudad'),
            'municipality.required' => GlobalFunctions::requiredMessage('municipio'),
            'phone.required' => GlobalFunctions::requiredMessage('teléfono'),
            'phone.digits' => GlobalFunctions::formatMessage('teléfono'),
            'fax.regex' => GlobalFunctions::formatMessage('fax'),
            'web_page.regex' => GlobalFunctions::formatMessage('página web'),
            'boss_email.regex' => GlobalFunctions::formatMessage('correo de jefe'),
            'business_structure.required' => GlobalFunctions::requiredMessage('estructura de la empresa'),
            'company_size.required' => GlobalFunctions::requiredMessage('tamaño de la empresa'),
            'business_activity_selector.required' => GlobalFunctions::requiredMessage('actividad económica'),
        ];
    }
}
