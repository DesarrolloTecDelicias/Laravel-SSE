<?php

namespace App\Http\Livewire\Admin\Catalogue;

use Livewire\Component;

abstract class CatalogueBase  extends Component
{
    public $catalogue = '';
    public $lastVowal = '';

    public $modal = false;
    public $state = [];
    public $initialState = [];
    public $listeners = ['edit', 'delete', 'callConfirmation'];
    public $model;

    public function edit(int $id)
    {
        $this->state = $this->model::findOrFail($id)->toArray();
        $this->launchModal();
    }

    public function callConfirmation($id)
    {
        $model = $this->model::findOrFail($id);;
        $this->dispatchBrowserEvent('confirmation', [
            'name' => $model->name,
            'id' => $model->id,
            'event' => 'delete'
        ]);
    }

    public function sendMessage(string $message)
    {
        $this->dispatchBrowserEvent('message', [
            'message' => "{$this->catalogue} {$message} correctamente",
            'type' => 'success'
        ]);

        $this->emit('refreshLivewireDatatable');
        $this->state = [];
    }

    public function launchModal()
    {
        $this->modal = !$this->modal;
        $this->modal == false ? $this->state = [] : null;
        $this->dispatchBrowserEvent('openModal', ['modal' => $this->modal]);
    }

    public function clear(){
        $this->state = $this->initialState;
    }

    abstract public function render();

    abstract public function rules();

    abstract public function messages();

    abstract public function save();
}
