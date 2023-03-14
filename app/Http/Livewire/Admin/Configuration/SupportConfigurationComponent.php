<?php

namespace App\Http\Livewire\Admin\Configuration;

use App\Models\User;
use Livewire\Component;
use App\Constants\Constants;
use App\Helpers\ModelHelper;
use App\Helpers\GlobalFunctions;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SupportConfigurationComponent extends Component
{
    protected $listeners = ['editAdministrator', 'deleteAdministrator', 'callConfirmationAdministrator'];
    public $modal = false;
    public $state = [];
    public $careers = [];

    public function render()
    {
        return view('livewire.admin.configuration.support-configuration-component');
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
        $validateData['password'] = Hash::make($validateData['password']);
        $validateData['role'] = Constants::ROLE['Support'];
        User::updateOrCreate(['id' => $idValidator], $validateData);

        $this->launchModal();
        $this->sendMessage($idValidator ? 'actualizado' : 'creado');
        $this->state = [];
    }

    public function editAdministrator(int $id)
    {
        $this->state = ModelHelper::modelToArray(User::class, $id);
        $this->launchModal();
    }

    public function callConfirmationAdministrator($id)
    {
        $administrator = ModelHelper::findModel(User::class, $id);
        $this->dispatchBrowserEvent('confirmation', [
            'name' => $administrator->name,
            'id' => $administrator->id,
            'event' => 'deleteAdministrator'
        ]);
    }

    public function deleteAdministrator(int $id)
    {
        if ($id == 1) {
            $this->dispatchBrowserEvent('message', [
                'message' => "No se puede eliminar el administrador principal",
                'type' => 'error'
            ]);
            return;
        }
        ModelHelper::delete(User::class, $id);
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
            'message' => "Soporte {$message} correctamente",
            'type' => 'success'
        ]);

        $this->emit('refreshLivewireDatatable');
        $this->state = [];
    }

    public function rules()
    {
        $idValidator = array_key_exists('id', $this->state) ? $this->state['id'] : '';

        return [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $idValidator,
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => GlobalFunctions::requiredMessage('nombre'),
            'email.required' => GlobalFunctions::requiredMessage('email'),
            'email.unique' => GlobalFunctions::uniqueMessage('email'),
            'password.required' => GlobalFunctions::requiredMessage('contraseña'),
        ];
    }
}
