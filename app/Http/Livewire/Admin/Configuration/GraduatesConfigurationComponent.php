<?php

namespace App\Http\Livewire\Admin\Configuration;

use Livewire\Component;
use App\Models\User;
use App\Models\Career;
use App\Constants\Constants;
use App\Helpers\ModelHelper;
use App\Helpers\GlobalFunctions;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class GraduatesConfigurationComponent extends Component
{
    protected $listeners = ['editGraduate', 'deleteGraduate', 'callConfirmationGraduate'];
    public $modal = false;
    public $state = ['income_year' => '', 'income_month' => '', 'year_graduated' => '', 'month_graduated' => '', 'career_id' => ''];

    public function render()
    {
        return view('livewire.admin.configuration.graduates-configuration-component');
    }

    public function mount()
    {
        $this->months = Constants::MONTH;
        $this->careers = Career::all();
    }

    public function clean(){
        $this->state =
        ['income_year' => '', 'income_month' => '', 'year_graduated' => '', 'month_graduated' => '', 'career_id' => ''];
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
        $validateData['fathers_surname'] = mb_strtoupper($validateData['fathers_surname'], 'UTF-8');
        $validateData['mothers_surname'] = mb_strtoupper($validateData['mothers_surname'], 'UTF-8');
        $validateData['password'] = Hash::make($validateData['password']);
        User::updateOrCreate(['id' => $idValidator], $validateData);

        $this->launchModal();
        $this->sendMessage($idValidator ? 'actualizado' : 'creado');
        $this->clean();
    }

    public function editGraduate(int $id)
    {
        $this->state = ModelHelper::modelToArray(User::class, $id);
        $this->launchModal();
    }

    public function callConfirmationGraduate($id)
    {
        $graduate = ModelHelper::findModel(User::class, $id);
        $this->dispatchBrowserEvent('confirmation', [
            'name' => $graduate->name,
            'id' => $graduate->id,
            'event' => 'deleteGraduate'
        ]);
    }

    public function deleteGraduate(int $id)
    {
        ModelHelper::delete(Graduate::class, $id);
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
            'message' => "Egresado {$message} correctamente",
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
            'fathers_surname' => 'required',
            'mothers_surname' => 'required',
            'email' => 'required|unique:users,email,' . $idValidator,
            'password' => 'required',
            'income_year' => 'required',
            'income_month' => 'required',
            'year_graduated' => 'required',
            'month_graduated' => 'required',
            'career_id' => 'required',
            'control_number' => ['required', 'unique:users,control_number,' . $idValidator, 'regex:/^[C]?[B]?[0-9]{8,10}$/']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => GlobalFunctions::requiredMessage('nombre'),
            'fathers_surname.required' => GlobalFunctions::requiredMessage('apellido paterno'),
            'mothers_surname.required' => GlobalFunctions::requiredMessage('apellido materno'),
            'email.required' => GlobalFunctions::requiredMessage('email'),
            'email.unique' => GlobalFunctions::uniqueMessage('email'),
            'password.required' => GlobalFunctions::requiredMessage('contraseña'),
            'income_year.required' => GlobalFunctions::requiredMessage('año de ingreso'),
            'income_month.required' => GlobalFunctions::requiredMessage('período de ingreso'),
            'month_graduated.required' => GlobalFunctions::requiredMessage('período de egreso'),
            'year_graduated.required' => GlobalFunctions::requiredMessage('año de egreso'),
            'career_id.required' => GlobalFunctions::requiredMessage('carrera'),
            'control_number.required' => GlobalFunctions::requiredMessage('número de control'),
            'control_number.unique' => GlobalFunctions::uniqueMessage('número de control'),
            'control_number.regex' => GlobalFunctions::formatMessage('número de control'),
        ];
    }
}
