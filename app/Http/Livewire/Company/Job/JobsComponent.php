<?php

namespace App\Http\Livewire\Company\Job;

use Livewire\Component;
use App\Models\Career;
use App\Models\Postulate;
use App\Models\CompanyJobs;
use App\Helpers\ModelHelper;
use App\Helpers\GlobalFunctions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class JobsComponent extends Component
{
    protected $listeners = ['editJob', 'deleteJob', 'callConfirmationJob', 'viewPostulates'];
    public $modal = false, $postulateModal = false;
    public $state = ['id_career' => ''];
    public $careers = [], $postulates = [];
    public $companyId;

    public function render()
    {
        return view('livewire.company.job.jobs-component');
    }

    public function mount()
    {
        $this->careers = Career::all();
        $this->companyId = Auth::user()->id;
    }

    public function save()
    {
        $idValidator = array_key_exists('id', $this->state) ? $this->state['id'] : '';

        $validateData = Validator::make(
            $this->state,
            $this->rules(),
            $this->messages()
        )->validate();

        $validateData['id_user'] = Auth::user()->id;
        CompanyJobs::updateOrCreate(['id' => $idValidator], $validateData);

        $this->launchModal();
        $this->sendMessage($idValidator ? 'actualizado' : 'creado');
    }

    public function editJob(int $id)
    {
        $this->state = ModelHelper::modelToArray(CompanyJobs::class, $id);
        $this->launchModal();
    }

    public function callConfirmationJob($id)
    {
        $job = ModelHelper::findModel(CompanyJobs::class, $id);
        $this->dispatchBrowserEvent('confirmation', [
            'name' => $job->name,
            'id' => $job->id,
            'event' => 'deleteJob'
        ]);
    }

    public function deleteJob(int $id)
    {
        ModelHelper::delete(CompanyJobs::class, $id);
        Postulate::where('job_id', $id)->delete();
        $this->sendMessage('eliminado');
    }

    public function launchModal()
    {
        $this->modal = !$this->modal;
        $this->modal == false ? $this->state = [] : null;
        $this->dispatchBrowserEvent('openModal', ['modal' => $this->modal]);
    }

    public function sendMessage(string $message)
    {
        $this->dispatchBrowserEvent('message', [
            'message' => "Empleo {$message} correctamente",
            'type' => 'success'
        ]);

        $this->emit('refreshLivewireDatatable');
        $this->state = [];
    }

    public function viewPostulates(int $id)
    {
        $this->postulates = Postulate::where('job_id', $id)->with('graduate')->get();
        $this->launchPostulateModal();
    }

    public function launchPostulateModal()
    {
        $this->postulateModal = !$this->postulateModal;
        // $this->postulateModal == false ? $this->postulates = [] : null;
        $this->dispatchBrowserEvent('openModal', ['modal' => $this->postulateModal]);
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required|max:255',
            'salary' => 'required',
            'id_career' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => GlobalFunctions::requiredMessage('título del empleo'),
            'description.required' => GlobalFunctions::requiredMessage('descripción'),
            'description.max' => GlobalFunctions::formatMessage('descripción'),
            'salary.required' => GlobalFunctions::requiredMessage('salario'),
            'id_career.required' => GlobalFunctions::requiredMessage('carrera preferente'),
        ];
    }
}
