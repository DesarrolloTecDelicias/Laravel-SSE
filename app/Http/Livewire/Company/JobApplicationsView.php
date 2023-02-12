<?php

namespace App\Http\Livewire\Company;

use Livewire\Component;
use App\Models\JobApplication;
use Illuminate\Support\Facades\File;

class JobApplicationsView extends Component
{
    public $listeners = ['edit', 'delete', 'callConfirmation'];
    public function callConfirmation($id)
    {
        $model = JobApplication::findOrFail($id);;
        $this->dispatchBrowserEvent('confirmation', [
            'name' => "Aplicación de Trabajo",
            'id' => $model->id,
            'event' => 'delete'
        ]);
    }

    public function delete(int $id)
    {
        $model = JobApplication::findOrFail($id);
        $destinationPath = public_path();
        File::delete($destinationPath . '/storage/job_aplications/' . $model['photo_path']);
        $model->delete();
        $this->sendMessage("eliminada");
    }

    public function sendMessage(string $message)
    {
        $this->dispatchBrowserEvent('message', [
            'message' => "Aplicación de Trabajo {$message} correctamente",
            'type' => 'success'
        ]);

        $this->emit('refreshLivewireDatatable');
    }

    public function render()
    {
        return view('livewire.company.job-applications-view');
    }
}
