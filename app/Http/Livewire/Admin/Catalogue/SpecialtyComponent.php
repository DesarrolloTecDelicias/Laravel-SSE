<?php

namespace App\Http\Livewire\Admin\Catalogue;

use App\Models\Career;
use App\Models\Specialty;
use App\Models\SurveyOne;
use App\Helpers\GlobalFunctions;
use Illuminate\Support\Facades\Validator;
use App\Http\Livewire\Admin\Catalogue\CatalogueBase;

class SpecialtyComponent extends CatalogueBase
{
    public function __construct()
    {
        $this->catalogue = 'Especialidad';
        $this->lastVowal = 'a';
        $this->model = Specialty::class;
        $this->state = ['career_id' => ''];
        $this->initialState = ['career_id' => ''];
    }

    public $careers = [];

    public function render()
    {
        return view('livewire.admin.catalogue.specialty-component');
    }

    public function mount()
    {
        $this->careers = Career::all();
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

        Specialty::updateOrCreate(['id' => $idValidator], $validateData);

        $this->launchModal();
        $this->sendMessage($idValidator ? 'actualizada' : 'creada');
        $this->clear();
    }

    public function delete(int $id)
    {
        $surveyOne = SurveyOne::where('career_id', $id)->get();
        if ($surveyOne->count() > 0) {
            $this->dispatchBrowserEvent('message', [
                'message' => "No se puede eliminar esta especialidad porque está siendo utilizada en una encuesta, eso podría afectar a la integridad de los datos. Contacte con el administrador del sistema.",
                'type' => 'error'
            ]);
            return;
        }
        $this->model::findOrFail($id)->delete();
        $this->sendMessage("eliminad{$this->lastVowal}");
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'career_id' => 'required',
            'reticle' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => GlobalFunctions::requiredMessage('nombre'),
            'career_id.required' => GlobalFunctions::requiredMessage('carrera'),
            'reticle.required' => GlobalFunctions::requiredMessage('retícula'),
        ];
    }
}
