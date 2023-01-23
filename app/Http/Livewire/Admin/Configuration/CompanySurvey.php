<?php

namespace App\Http\Livewire\Admin\Configuration;

use App\Models\Email;
use Livewire\Component;
use App\Constants\EmailConstant;
use App\Constants\SurveyConstants;
use App\Mail\SurveyStatusMailable;
use Illuminate\Support\Facades\Mail;

class CompanySurvey extends Component
{
    protected $listeners = ['sendEmail'];

    public function render()
    {
        return view('livewire.admin.configuration.company-survey');
    }

    public function sendEmail($userData)
    {
        $emailTemplate = Email::where([
            ['type_id', EmailConstant::ADVICE],
            ['type_user_id', EmailConstant::COMPANY]
        ])->first()->body;

        $email = $userData['email'];

        $emailTemplate = str_replace("{{ \$email }}", $email, $emailTemplate);
        $emailTemplate = str_replace("{{ \$empresa }}", $userData['name'], $emailTemplate);
        $emailTemplate = str_replace("{{ \$escuela }}", env('SCHOOL_NAME'), $emailTemplate);
        $emailTemplate = str_replace("{{ \$enlace }}", env('PROJECT_URL'), $emailTemplate);
        $surveyDescription = SurveyConstants::$COMPANY_SURVEY_NAME_BY_SURVEY_DONE;
        $message = "<ul>";

        $newArray =  array_filter(
            $userData['surveys'],
            function ($val) {
                return $val == 0;
            }
        );

        foreach ($newArray as $key => $value) {
            $message .= "<li>" . $surveyDescription[$key] . "</li>";
        }
        $message .= "</ul>";

        $emailTemplate = str_replace("{{ \$encuestas }}", $message, $emailTemplate);

        $correo = new SurveyStatusMailable($emailTemplate);
        Mail::to($email)->send($correo);

        $this->dispatchBrowserEvent('message', [
            'message' => "Correo enviado correctamente a $userData[name]",
            'type' => 'success'
        ]);
    }
}
