<?php

namespace App\Http\Livewire\Admin\Catalogue;

use App\Models\Career;
use App\Models\SurveyOne;
use App\Models\CompanySurveyTwo;
use App\Helpers\GlobalFunctions;
use Illuminate\Support\Facades\Validator;
use App\Http\Livewire\Admin\Catalogue\CatalogueBase;

class CareerComponent extends CatalogueBase
{
    public function __construct()
    {
        $this->catalogue = 'Carrera';
        $this->lastVowal = 'a';
        $this->model = Career::class;
    }

    public function render()
    {
        return view('livewire.admin.catalogue.career-component');
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
        $this->clear();
    }

    public function delete(int $id)
    {
        $surveyOne = SurveyOne::where('career_id', $id)->get();
        $companySurveyTwo = CompanySurveyTwo::where('career_id', $id)->get();
        if ($surveyOne->count() > 0 || $companySurveyTwo->count() > 0) {
            $this->dispatchBrowserEvent('message', [
                'message' => "No se puede eliminar esta carrera porque está siendo utilizada en una encuesta, eso podría afectar a la integridad de los datos. Contacte con el administrador del sistema.",
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
