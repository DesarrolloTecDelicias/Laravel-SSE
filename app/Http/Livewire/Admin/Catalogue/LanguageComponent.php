<?php

namespace App\Http\Livewire\Admin\Catalogue;

use Livewire\Component;
use App\Models\Language;
use App\Helpers\ModelHelper;
use App\Helpers\GlobalFunctions;
use Illuminate\Support\Facades\Validator;

class LanguageComponent extends Component
{
    protected $listeners = ['editLanguage', 'deleteLanguage', 'callConfirmationLanguage'];
    public $modal = false;
    public $state = [];

    public function render()
    {
        return view('livewire.admin.catalogue.language-component');
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

        Language::updateOrCreate(['id' => $idValidator], $validateData);

        $this->launchModal();
        $this->sendMessage($idValidator ? 'actualizado' : 'creado');
    }

    public function editLanguage(int $id)
    {
        $this->state = ModelHelper::modelToArray(Language::class, $id);
        $this->launchModal();
    }

    public function callConfirmationLanguage($id)
    {
        $language = ModelHelper::findModel(Language::class, $id);
        $this->dispatchBrowserEvent('confirmation', [
            'name' => $language->name,
            'id' => $language->id,
            'event' => 'deleteLanguage'
        ]);
    }

    public function deleteLanguage(int $id)
    {
        ModelHelper::delete(Language::class, $id);
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
            'message' => "Lenguaje {$message} correctamente",
            'type' => 'success'
        ]);

        $this->emit('refreshLivewireDatatable');
        $this->state = [];
    }

    public function rules()
    {
        $idValidator = array_key_exists('id', $this->state) ? $this->state['id'] : '';

        return [
            'name' => 'required|unique:languages,name,' . $idValidator,
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
