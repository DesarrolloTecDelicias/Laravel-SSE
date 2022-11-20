<?php

namespace App\Http\Livewire\Admin\Configuration;

use App\Constants\SurveyConstants;
use App\Mail\SurveyStatusMailable;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class GraduatesSurvey extends Component
{
    protected $listeners = ['sendEmail'];
    public function render()
    {
        return view('livewire.admin.configuration.graduates-survey');
    }

    public function sendEmail($userData)
    {
        $email = $userData['email'];
        $userData['school'] = env('SCHOOL_NAME');
        $userData['surveyDescription'] = SurveyConstants::$GRADUATE_SURVEY_NAME_BY_SURVEY_DONE;

        $newArray =  array_filter(
            $userData,
            function ($val) {
                return $val == 0;
            }
        );

        $userData['surveys'] = $newArray;
        $userData['url'] = env('PROJECT_URL');

        $correo = new SurveyStatusMailable($userData);
        Mail::to($email)->send($correo);

        $this->dispatchBrowserEvent('message', [
            'message' => "Correo enviado correctamente a $userData[name]",
            'type' => 'success'
        ]);
    }
}
