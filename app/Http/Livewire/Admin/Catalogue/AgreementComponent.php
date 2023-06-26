<?php

namespace App\Http\Livewire\Admin\Catalogue;

use App\Models\User;
use App\Models\Agreement;
use App\Constants\Constants;
use App\Helpers\GlobalFunctions;
use Illuminate\Support\Facades\Validator;
use App\Http\Livewire\Admin\Catalogue\CatalogueBase;

class AgreementComponent extends CatalogueBase
{
    public $companies = [];
    public function __construct()
    {
        $this->catalogue = 'Convenio';
        $this->lastVowal = 'o';
        $this->model = Agreement::class;
        $this->state['user_id'] = '';
        $this->state['type'] = '';
    }

    public function render()
    {
        return view('livewire.admin.catalogue.agreement-component');
    }

    public function mount()
    {
        $this->companies = User::where('role', Constants::ROLE['Company'])->get();
    }

    public function save()
    {
        $idValidator = array_key_exists('id', $this->state) ? $this->state['id'] : '';
        $validateData = Validator::make(
            $this->state,
            $this->rules(),
            $this->messages()
        )->validate();

        Agreement::updateOrCreate(['id' => $idValidator], $validateData);

        $this->launchModal();
        $this->sendMessage($idValidator ? 'actualizada' : 'creada');
        $this->clear();
        $this->state = [
            'user_id' => '',
            'type' => '',
        ];
    }

    public function delete(int $id)
    {
        $this->model::findOrFail($id)->delete();
        $this->sendMessage("eliminad{$this->lastVowal}");
    }

    public function rules()
    {
        return [
            'user_id' => 'required',
            'name' => 'required',
            'description' =>'required',
            'type' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => GlobalFunctions::requiredMessage('empresa'),
            'name.required' => GlobalFunctions::requiredMessage('nombre'),
            'description.required' => GlobalFunctions::requiredMessage('descripción'),
            'type.required' => GlobalFunctions::requiredMessage('tipo'),
        ];
    }
}
