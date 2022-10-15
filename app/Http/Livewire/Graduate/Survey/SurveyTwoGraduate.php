<?php

namespace App\Http\Livewire\Graduate\Survey;

use Livewire\Component;
use App\Models\User;
use App\Models\SurveyTwo;
use App\Constants\Constants;
use App\Models\StudentSurvey;
use App\Helpers\GlobalFunctions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SurveyTwoGraduate extends Component
{
    public $goodBadQuestions;
    public $state = [
        'quality_teachers' => '', 'syllabus' => '', 'study_condition' => '',
        'experience' => '', 'study_emphasis' => '', 'participate_projects' => '',
    ];

    public function render()
    {
        return view('livewire.graduate.survey.survey-two-graduate');
    }

    public function mount()
    {
        $userInfo = SurveyTwo::where('user_id', Auth::user()->id)->get()->first();
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

        SurveyTwo::updateOrCreate(['id' => $idValidator], $validateData);
        StudentSurvey::where('user_id', $validateData['user_id'])->get()->first()
            ->surveyDone('survey_two_done');

        $messageState = $idValidator ? 'actualizada' : 'creada';
        $message= GlobalFunctions::surveyMessage('Pertenencia y Disponibilidad', $messageState);

        return redirect()->route('graduate.dashboard')->with($message);

    }

    public function rules()
    {
        return [
            'quality_teachers' => 'required',
            'syllabus' => 'required',
            'study_condition' => 'required',
            'experience' => 'required',
            'study_emphasis' => 'required',
            'participate_projects' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'quality_teachers.required' => GlobalFunctions::requiredMessage('calidad de los docentes'),
            'syllabus.required' => GlobalFunctions::requiredMessage('plan de estudios'),
            'study_condition.required' => GlobalFunctions::requiredMessage('satisfacción condiciones de estudio'),
            'experience.required' => GlobalFunctions::requiredMessage('experiencia obtenida de la residencia'),
            'study_emphasis.required' => GlobalFunctions::requiredMessage('énfasis a la investigación'),
            'participate_projects.required' => GlobalFunctions::requiredMessage('oportunidad de participar en proyectos'),
        ];
    }
}
