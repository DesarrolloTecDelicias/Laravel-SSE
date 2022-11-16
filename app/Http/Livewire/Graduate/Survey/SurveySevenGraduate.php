<?php

namespace App\Http\Livewire\Graduate\Survey;

use Livewire\Component;
use App\Models\User;
use App\Models\SurveySeven;
use App\Models\StudentSurvey;
use App\Helpers\GlobalFunctions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SurveySevenGraduate extends Component
{
    public $state = [];

    public function render()
    {
        return view('livewire.graduate.survey.survey-seven-graduate');
    }

    public function mount()
    {
        $userInfo = SurveySeven::where('user_id', Auth::user()->id)->get()->first();
        if ($userInfo) $this->state = $userInfo->toArray();
    }

    public function save()
    {
        $idValidator = array_key_exists('id', $this->state) ? $this->state['id'] : '';

        $validateData = Validator::make(
            $this->state,
            ['comments' => 'required'],
            ['comments.required' => 'Si vas a realizar un comentario te pedimos de favor que no sea un texto vacío']
        )->validate();

        $user = User::find(Auth::user()->id);
        $validateData['user_id'] = $user->id;
        $user->updateUserState();

        SurveySeven::updateOrCreate(['id' => $idValidator], $validateData);
        StudentSurvey::where('user_id', $validateData['user_id'])->get()->first()
            ->surveyDone('survey_seven_done');

        $messageState = $idValidator ? 'actualizada' : 'creada';
        $message = GlobalFunctions::surveyMessage('Comentarios y Sugerencias', $messageState);

        return redirect()->route('graduate.dashboard')->with($message);
    }
}
