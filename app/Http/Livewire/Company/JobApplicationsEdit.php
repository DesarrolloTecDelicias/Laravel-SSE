<?php

namespace App\Http\Livewire\Company;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Career;
use Livewire\Component;
use App\Constants\Constants;
use Livewire\WithFileUploads;
use App\Models\JobApplication;
use App\Helpers\GlobalFunctions;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class JobApplicationsEdit extends Component
{
    protected $listeners = ['changeType'];
    public $applicationId;
    use WithFileUploads;
    public $state = ['type' => '', 'career_id' => '', 'period' => ''];
    public $careers = [], $months;
    public $image;
    public $schoolVisibility = false, $workVisibility = false;

    public function render()
    {
        return view('livewire.company.job-applications-edit');
    }

    public function mount()
    {
        $this->image = null;
        $application = JobApplication::find($this->applicationId);
        if (Auth::user()->id != $application->user_id) {
            $message = array(
                'message' => "No cuentas con los permisos para acceder a esta sección.",
                'alert-type' => 'error'
            );
            return redirect()->route('company.dashboard')->with($message);
        }
        $this->state = $application->toArray();
        if ($this->state['type'] == 2) {
            $this->state['period'] = '';
        }
        $this->changeType();
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
        $idValidator = array_key_exists('id', $this->state) ? $this->state['id'] : '';

        $validateData = Validator::make(
            $this->state,
            $this->rules(),
            $this->messages()
        )->validate();
        $this->validateImage();

        $validateData['photo_path'] = $this->state['photo_path'];

        $user = User::find(Auth::user()->id);
        $validateData['user_id'] = $user->id;

        if ($validateData['type'] == 2) {
            $validateData['name'] = null;
            $validateData['description'] = null;
            $validateData['period'] = null;
            $validateData['consultant_name'] = null;
            $validateData['consultant_phone'] = null;
            $validateData['consultant_email'] = null;
            $validateData['consultant_position'] = null;
            $validateData['in_charge_name'] = null;
            $validateData['in_charge_position'] = null;
        } else if ($validateData['type'] == 1) {
            $validateData['area'] = null;
        }

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
