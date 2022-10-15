<?php

namespace App\Http\Livewire\Admin\Catalogue;

use App\Models\Career;
use Livewire\Component;
use App\Constants\Constants;
use App\Helpers\ModelHelper;
use App\Helpers\GlobalFunctions;
use Illuminate\Support\Facades\Validator;

class CareerComponent extends Component
{
    protected $listeners = ['editCareer', 'deleteCareer', 'callConfirmationCareer'];
    public $modal = false;
    public $state = [];
    public $degrees = ['degree' => ''];

    public function render()
    {
        return view('livewire.admin.catalogue.career-component');
    }

    public function mount()
    {
        $this->degrees = Constants::DEGREE;
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

        Career::updateOrCreate(['id' => $idValidator], $validateData);

        $this->launchModal();
        $this->sendMessage($idValidator ? 'actualizada' : 'creada');
    }

    public function editCareer(int $id)
    {
        $this->state = ModelHelper::modelToArray(Career::class, $id);
        $this->launchModal();
    }

    public function callConfirmationCareer($id)
    {
        $career = ModelHelper::findModel(Career::class, $id);
        $this->dispatchBrowserEvent('confirmation', [
            'name' => $career->name,
            'id' => $career->id,
            'event' => 'deleteCareer'
        ]);
    }

    public function deleteCareer(int $id)
    {
        ModelHelper::delete(Career::class, $id);
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
            'message' => "Carrera {$message} correctamente",
            'type' => 'success'
        ]);
        $this->emit('refreshLivewireDatatable');
        $this->state = [];
    }

    public function rules()
    {
        $idValidator = array_key_exists('id', $this->state) ? $this->state['id'] : '';

        return [
            'name' => 'required|unique:careers,name,' . $idValidator,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => GlobalFunctions::requiredMessage('nombre'),
            'name.unique' => GlobalFunctions::uniqueMessage('nombre'),
        ];
    }
}
