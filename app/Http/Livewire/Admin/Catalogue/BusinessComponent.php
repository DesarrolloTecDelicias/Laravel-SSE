<?php

namespace App\Http\Livewire\Admin\Catalogue;

use Livewire\Component;
use App\Models\Business;
use App\Helpers\ModelHelper;
use App\Helpers\GlobalFunctions;
use Illuminate\Support\Facades\Validator;

class BusinessComponent extends Component
{
    protected $listeners = ['editBusiness', 'deleteBusiness', 'callConfirmationBusiness'];
    public $modal = false;
    public $state = [];

    public function render()
    {
        return view('livewire.admin.catalogue.business-component');
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

        Business::updateOrCreate(['id' => $idValidator], $validateData);

        $this->launchModal();
        $this->sendMessage($idValidator ? 'actualizada' : 'creada');
    }

    public function editBusiness(int $id)
    {
        $this->state = ModelHelper::modelToArray(Business::class, $id);
        $this->launchModal();
    }

    public function callConfirmationBusiness($id)
    {
        $business = ModelHelper::findModel(Business::class, $id);
        $this->dispatchBrowserEvent('confirmation', [
            'name' => $business->name,
            'id' => $business->id,
            'event' => 'deleteBusiness'
        ]);
    }

    public function deleteBusiness(int $id)
    {
        ModelHelper::delete(Business::class, $id);
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
            'message' => "Actividad económica {$message} correctamente",
            'type' => 'success'
        ]);

        $this->emit('refreshLivewireDatatable');
        $this->state = [];
    }

    public function rules()
    {
        $idValidator = array_key_exists('id', $this->state) ? $this->state['id'] : '';

        return [
            'name' => 'required|unique:businesses,name,' . $idValidator,
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
