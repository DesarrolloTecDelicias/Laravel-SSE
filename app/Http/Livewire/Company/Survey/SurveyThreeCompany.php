<?php

namespace App\Http\Livewire\Company\Survey;

use Livewire\Component;
use App\Models\User;
use App\Constants\Constants;
use App\Models\CompanySurvey;
use App\Helpers\GlobalFunctions;
use App\Models\CompanySurveyThree;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SurveyThreeCompany extends Component
{
    public $goodBadQuestions;
    public $state = [
        'resolve_conflicts' => '', 'orthography' => '', 'process_improvement' => '',
        'teamwork' => '', 'time_management' => '', 'security' => '',
        'ease_speech' => '', 'project_management' => '', 'puntuality' => '',
        'rules' => '', 'integration_work' => '', 'creativity' => '',
        'bargaining' => '', 'abstraction' => '', 'leadership' => '',
        'changes' => '', 'job_performance' => '',
    ];

    public function render()
    {
        return view('livewire.company.survey.survey-three-company');
    }

    public function mount()
    {
        $userInfo = CompanySurveyThree::where('user_id', Auth::user()->id)->get()->first();
        if ($userInfo) $this->state = $userInfo->toArray();
        $this->goodBadQuestions = Constants::GOOD_BAD_QUESTION;
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

        CompanySurveyThree::updateOrCreate(['id' => $idValidator], $validateData);
        CompanySurvey::where('user_id', $validateData['user_id'])->get()->first()
            ->surveyDone('survey_three_company_done');

        $messageState = $idValidator ? 'actualizada' : 'creada';
        $message = GlobalFunctions::surveyMessage('Competencias Laborales', $messageState);

        return redirect()->route('company.dashboard')->with($message);
    }

    public function rules()
    {
        return [
            'resolve_conflicts' => 'required',
            'orthography' => 'required',
            'process_improvement' => 'required',
            'teamwork' => 'required',
            'time_management' => 'required',
            'security' => 'required',
            'ease_speech' => 'required',
            'project_management' => 'required',
            'puntuality' => 'required',
            'rules' => 'required',
            'integration_work' => 'required',
            'creativity' => 'required',
            'bargaining' => 'required',
            'abstraction' => 'required',
            'leadership' => 'required',
            'changes' => 'required',
            'job_performance' => 'required',
            'requirement' => 'required',
            'comments' => ''
        ];
    }

    public function messages()
    {
        return [
            'resolve_conflicts.required' => GlobalFunctions::requiredMessage('resolver conflictos'),
            'orthography.required' => GlobalFunctions::requiredMessage('ortografía y redacción'),
            'process_improvement.required' => GlobalFunctions::requiredMessage('mejora de procesos'),
            'teamwork.required' => GlobalFunctions::requiredMessage('trabajo en equipo'),
            'time_management.required' => GlobalFunctions::requiredMessage('administrar tiempo'),
            'security.required' => GlobalFunctions::requiredMessage('seguridad personal'),
            'ease_speech.required' => GlobalFunctions::requiredMessage('facilidad de palabra'),
            'project_management.required' => GlobalFunctions::requiredMessage('gestión de proyectos'),
            'puntuality.required' => GlobalFunctions::requiredMessage('puntualidad y asistencia'),
            'rules.required' => GlobalFunctions::requiredMessage('cumplimiento de las normas'),
            'integration_work.required' => GlobalFunctions::requiredMessage('integración al trabajo'),
            'creativity.required' => GlobalFunctions::requiredMessage('creatividad e innovación'),
            'bargaining.required' => GlobalFunctions::requiredMessage('capacidad de negociación'),
            'abstraction.required' => GlobalFunctions::requiredMessage('abstracción, análisis y síntesis'),
            'leadership.required' => GlobalFunctions::requiredMessage('liderazgo y toma de decisión'),
            'changes.required' => GlobalFunctions::requiredMessage('adaptar al cambio'),
            'job_performance.required' => GlobalFunctions::requiredMessage('desempeño laboral'),
            'requirement.required' => GlobalFunctions::requiredMessage('mejorar la formación'),
        ];
    }
}
