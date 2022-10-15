<?php

namespace App\Http\Livewire\Graduate\Survey;

use Livewire\Component;
use App\Models\User;
use App\Models\SurveyFour;
use App\Constants\Constants;
use App\Models\StudentSurvey;
use App\Helpers\GlobalFunctions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SurveyFourGraduate extends Component
{
    public $levelActivities, $levelActivitiesTwo;
    public $state = [
        'efficiency_work_activities' => '', 'academic_training' => '', 'usefulness_professional_residence' => '',
        'study_area' => '', 'title' => '', 'experience' => '', 'job_competence' => '',
        'positioning' => '', 'languages' => '', 'recommendations' => '',
        'personality' => '', 'leadership' => '', 'others' => ''
    ];

    public function render()
    {
        return view('livewire.graduate.survey.survey-four-graduate');
    }

    public function mount()
    {
        $userInfo = SurveyFour::where('user_id', Auth::user()->id)->get()->first();
        if ($userInfo) $this->state = $userInfo->toArray();
        $this->levelActivities = Constants::LEVEL_ACTIVITIES;
        $this->levelActivitiesTwo = Constants::LEVEL_ACTIVITIES_TWO;
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

        SurveyFour::updateOrCreate(['id' => $idValidator], $validateData);
        StudentSurvey::where('user_id', $validateData['user_id'])->get()->first()
            ->surveyDone('survey_four_done');

        $messageState = $idValidator ? 'actualizada' : 'creada';
        $message = GlobalFunctions::surveyMessage('Desempeño Profesional', $messageState);

        return redirect()->route('graduate.dashboard')->with($message);
    }

    public function rules()
    {
        return [
            'efficiency_work_activities' => 'required',
            'academic_training' => 'required',
            'usefulness_professional_residence' => 'required',
            'study_area' => 'required',
            'title' => 'required',
            'experience' => 'required',
            'job_competence' => 'required',
            'positioning' => 'required',
            'languages' => 'required',
            'recommendations' => 'required',
            'personality' => 'required',
            'leadership' => 'required',
            'others' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'efficiency_work_activities.required' => GlobalFunctions::requiredMessage('eficiencia para realizar las actividades laborales'),
            'academic_training.required' => GlobalFunctions::requiredMessage('formación académica'),
            'usefulness_professional_residence.required' => GlobalFunctions::requiredMessage('utilidad de las residencias profesionales'),
            'study_area.required' => GlobalFunctions::requiredMessage('área o campo de estudio'),
            'title.required' => GlobalFunctions::requiredMessage('titulación'),
            'experience.required' => GlobalFunctions::requiredMessage('experiencia laboral / práctica'),
            'job_competence.required' => GlobalFunctions::requiredMessage('competencia laboral'),
            'positioning.required' => GlobalFunctions::requiredMessage('posicionamiento de la institución de egreso'),
            'languages.required' => GlobalFunctions::requiredMessage('conocimiento de idiomas extranjeros'),
            'recommendations.required' => GlobalFunctions::requiredMessage('recomendaciones / referencias'),
            'personality.required' => GlobalFunctions::requiredMessage('personalidad / actitudes'),
            'leadership.required' => GlobalFunctions::requiredMessage('capacidad de liderazgo'),
            'others.required' => GlobalFunctions::requiredMessage('otros aspectos'),
        ];
    }
}
