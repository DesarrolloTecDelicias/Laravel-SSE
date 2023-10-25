<?php

namespace App\Http\Livewire\Admin\Configuration;

use Livewire\Component;
use App\Models\User;
use App\Constants\Constants;
use App\Helpers\ModelHelper;
use App\Helpers\GlobalFunctions;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CompaniesConfigurationComponent extends Component
{
    protected $listeners = ['editCompany', 'deleteCompany', 'callConfirmationCompany'];
    public $modal = false;
    public $state = [];

    public function render()
    {
        return view('livewire.admin.configuration.companies-configuration-component');
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
        $validateData['role'] = Constants::ROLE['Company'];
        User::updateOrCreate(['id' => $idValidator], $validateData);

        $this->launchModal();
        $this->sendMessage($idValidator ? 'actualizada' : 'creada');
        $this->state = [];
    }

    public function editCompany(int $id)
    {
        $this->state = ModelHelper::modelToArray(User::class, $id);
        $this->launchModal();
    }

    public function callConfirmationCompany($id)
    {
        $company = ModelHelper::findModel(User::class, $id);
        $this->dispatchBrowserEvent('confirmation', [
            'name' => $company->name,
            'id' => $company->id,
            'event' => 'deleteCompany'
        ]);
    }

    public function deleteCompany(int $id)
    {
        ModelHelper::delete(User::class, $id);
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
            'message' => "Empresa {$message} correctamente",
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
