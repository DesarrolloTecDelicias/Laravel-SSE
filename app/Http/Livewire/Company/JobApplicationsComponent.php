<?php

namespace App\Http\Livewire\Company;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Career;
use App\Models\CompanySurveyOne;;

use Livewire\Component;
use App\Constants\Constants;
use Livewire\WithFileUploads;
use App\Models\JobApplication;
use App\Helpers\GlobalFunctions;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class JobApplicationsComponent extends Component
{
    protected $listeners = ['changeType'];
    use WithFileUploads;
    public $state = ['type' => '', 'career_id' => '', 'period' => ''];
    public $careers = [], $months;
    public $image;
    public $schoolVisibility = false, $workVisibility = false;

    public function render()
    {
        return view('livewire.company.job-applications-component');
    }

    public function mount()
    {
        $this->careers = Career::all();
        $this->months = Constants::MONTH;
    }

    public function validateImage()
    {
        $idValidator = array_key_exists('id', $this->state) ? $this->state['id'] : '';
        $this->validate([
            'image' => $idValidator ? 'max:1024' : 'required|max:1024',
        ], [
            'image.required' => 'La imagen es requerida.',
            'image.max' => 'La imagen no puede exceder más de 1024 kilobytes.',
        ]);

        if ($idValidator) {
            if ($this->image != null) {
                $destinationPath = public_path();
                File::delete($destinationPath . '/storage/job_aplications/' . $this->state['photo_path']);
                $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
                $this->image->storeAs('job_aplications', $imageName);
                $this->state['photo_path'] = $imageName;
            }
            return;
        }

        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('job_aplications', $imageName);
        $this->state['photo_path'] = $imageName;
    }

    public function save()
    {
        $user = User::find(Auth::user()->id);
        $companySurvey = CompanySurveyOne::where('user_id', $user->id)->first();
        if ($companySurvey == null) {
            $message = array(
                'message' => "Debes completar la encuesta de la empresa para poder crear una solicitud de empleo.",
                'alert-type' => 'error'
            );
            return redirect()->route('company.survey.one')->with($message);
        }

        $idValidator = array_key_exists('id', $this->state) ? $this->state['id'] : '';

        $validateData = Validator::make(
            $this->state,
            $this->rules(),
            $this->messages()
        )->validate();
        $this->validateImage();

        $validateData['photo_path'] = $this->state['photo_path'];
        $validateData['period'] = $this->state['period'] == '' ? null : $this->state['period'];


        $validateData['user_id'] = $user->id;
        $validateData['status'] = 1;

        JobApplication::updateOrCreate(['id' => $idValidator], $validateData);

        $messageState = $idValidator ? 'actualizada' : 'creada';
        $message = GlobalFunctions::surveyMessage('Competencias Laborales', $messageState);

        return redirect()->route('company.application.table')->with($message);
    }

    public function changeType()
    {
        $value = $this->state['type'];
        $this->schoolVisibility = $value == 1;
        $this->workVisibility = $value == 2;
    }

    public function rules()
    {
        return [
            'type' => 'required',
            'career_id' => 'required',
            'name' => $this->state['type'] == 1 ? 'required' : '',
            'description' => $this->state['type'] == 1 ? 'required' : '',
            'period' => $this->state['type'] == 1 ? 'required' : '',
            'vacancies' => 'required',
            'benefits' => $this->state['type'] == 1 ? 'required' : '',
            'consultant_name' => $this->state['type'] == 1 ? 'required' : '',
            'consultant_phone' => $this->state['type'] == 1 ? 'required' : '',
            'consultant_email' => $this->state['type'] == 1 ? 'required' : '',
            'consultant_position' => $this->state['type'] == 1 ? 'required' : '',
            'in_charge_name' => $this->state['type'] == 1 ? 'required' : '',
            'in_charge_position' => $this->state['type'] == 1 ? 'required' : '',
            'area' => $this->state['type'] == 2 ? 'required' : '',
            'contact_name' => 'required',
            'contact_phone' => 'required',
            'contact_email' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'type.required' =>  GlobalFunctions::requiredMessage('Tipo de vacante'),
            'career_id.required' => GlobalFunctions::requiredMessage('carrera'),
            'name.required' => GlobalFunctions::formatMessage('nombre del proyecto'),
            'description.required' => GlobalFunctions::requiredMessage('descripción del proyecto'),
            'period.required' => GlobalFunctions::requiredMessage('periodo del proyecto'),
            'vacancies.required' => GlobalFunctions::requiredMessage('número de vacantes'),
            'benefits.required' => GlobalFunctions::requiredMessage('beneficios'),
            'consultant_name.required' => GlobalFunctions::requiredMessage('nombre de la persona que podría asesorar'),
            'consultant_phone.required' => GlobalFunctions::formatMessage('teléfono de la persona que podría asesorar'),
            'consultant_email.required' => GlobalFunctions::requiredMessage('correo de la persona que podría asesorar'),
            'consultant_position.required' => GlobalFunctions::requiredMessage('puesto de la persona que podría asesorar'),
            'in_charge_name.required' => GlobalFunctions::requiredMessage('nombre de la persona que firmará el acuerdo de trabajo'),
            'in_charge_position.required' => GlobalFunctions::requiredMessage('puesto de la persona que firmará el acuerdo de trabajo'),
            'area.required' => GlobalFunctions::requiredMessage('área de la vacante'),
            'contact_name.required' => GlobalFunctions::requiredMessage('nombre de la persona a quien contactarán los interesados'),
            'contact_phone.required' => GlobalFunctions::requiredMessage('teléfono de la persona a quien contactarán los interesados'),
            'contact_email.required' => GlobalFunctions::requiredMessage('correo de la persona a quien contactarán los interesados'),
        ];
    }
}
