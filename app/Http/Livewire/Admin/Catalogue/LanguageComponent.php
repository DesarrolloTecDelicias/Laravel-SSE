<?php

namespace App\Http\Livewire\Admin\Catalogue;

use App\Models\Language;
use App\Models\SurveyOne;
use App\Models\SurveyThree;
use App\Helpers\GlobalFunctions;
use Illuminate\Support\Facades\Validator;
use App\Http\Livewire\Admin\Catalogue\CatalogueBase;

class LanguageComponent extends CatalogueBase
{
    public function __construct()
    {
        $this->catalogue = 'Lenguaje';
        $this->lastVowal = 'o';
        $this->model = Language::class;
    }

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
        $this->clear();
    }

    public function delete(int $id)
    {
        $surveyOne = SurveyOne::where('language_id', $id)->get();
        $surveyThree = SurveyThree::where('language_id', $id)->get();
        if ($surveyOne->count() > 0 || $surveyThree->count() > 0) {
            $this->dispatchBrowserEvent('message', [
                'message' => "No se puede eliminar el lenguaje porque está siendo utilizado en una encuesta, eso podría afectar a la integridad de los datos. Contacte con el administrador del sistema.",
                'type' => 'error'
            ]);
            return;
        }
        $this->model::findOrFail($id)->delete();
        $this->sendMessage("eliminad{$this->lastVowal}");
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
