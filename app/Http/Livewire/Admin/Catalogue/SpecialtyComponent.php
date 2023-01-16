<?php

namespace App\Http\Livewire\Admin\Catalogue;

use Livewire\Component;
use App\Models\Career;
use App\Models\Specialty;
use App\Helpers\ModelHelper;
use App\Helpers\GlobalFunctions;
use Illuminate\Support\Facades\Validator;

class SpecialtyComponent extends Component
{
    protected $listeners = ['editSpecialty', 'deleteSpecialty', 'callConfirmationSpecialty'];
    public $modal = false;
    public $state = ['career_id' => ''];
    public $careers = [];

    public function render()
    {
        return view('livewire.admin.catalogue.specialty-component');
    }

    public function mount()
    {
        $this->careers = Career::all();
    }

    public function save()
    {
        $idValidator = array_key_exists('id', $this->state) ? $this->state['id'] : '';

        $validateData = Validator::make(
            $this->state,
            $this->rules(),
            $this->messages()
        )->validate();

        $validateData['name'] = mb_strtoupper($validateData['name'], 'UTF-8');

        Specialty::updateOrCreate(['id' => $idValidator], $validateData);

        $this->launchModal();
        $this->sendMessage($idValidator ? 'actualizada' : 'creada');
        $this->state = ['career_id' => ''];
    }

    public function editSpecialty(int $id)
    {
        $this->state = ModelHelper::modelToArray(Specialty::class, $id);
        $this->launchModal();
    }

    public function callConfirmationSpecialty($id)
    {
        $specialty = ModelHelper::findModel(Specialty::class, $id);
        $this->dispatchBrowserEvent('confirmation', [
            'name' => $specialty->name,
            'id' => $specialty->id,
            'event' => 'deleteSpecialty'
        ]);
    }

    public function deleteSpecialty(int $id)
    {
        ModelHelper::delete(Specialty::class, $id);
        $this->sendMessage('eliminada');
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
            'message' => "Especialidad {$message} correctamente",
            'type' => 'success'
        ]);

        $this->emit('refreshLivewireDatatable');
        $this->state = [];
    }

    public function rules()
    {
        $idValidator = array_key_exists('id', $this->state) ? $this->state['id'] : '';

        return [
            'name' => 'required|unique:specialties,name,' . $idValidator,
            'career_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => GlobalFunctions::requiredMessage('nombre'),
            'name.unique' => GlobalFunctions::uniqueMessage('nombre'),
            'career_id.required' => GlobalFunctions::requiredMessage('carrera'),
        ];
    }
}
