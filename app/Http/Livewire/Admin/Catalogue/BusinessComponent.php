<?php

namespace App\Http\Livewire\Admin\Catalogue;

use App\Models\Business;
use App\Models\CompanySurveyOne;
use App\Models\SurveyThree;
use App\Helpers\GlobalFunctions;
use Illuminate\Support\Facades\Validator;
use App\Http\Livewire\Admin\Catalogue\CatalogueBase;

class BusinessComponent extends CatalogueBase
{
    public function __construct()
    {
        $this->catalogue = 'Actividad Económica';
        $this->lastVowal = 'a';
        $this->model = Business::class;
    }

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
        $this->clear();
    }

    public function delete(int $id)
    {
        $companySurveyOne = CompanySurveyOne::where('business_id', $id)->get();
        $surveyThree = SurveyThree::where('business_id', $id)->get();
        if ($companySurveyOne->count() > 0 || $surveyThree->count() > 0) {
            $this->dispatchBrowserEvent('message', [
                'message' => "No se puede eliminar esta actividad porque está siendo utilizada en una encuesta, eso podría afectar a la integridad de los datos. Contacte con el administrador del sistema.",
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
