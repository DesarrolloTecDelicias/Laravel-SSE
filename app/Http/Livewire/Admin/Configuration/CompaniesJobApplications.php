<?php

namespace App\Http\Livewire\Admin\Configuration;

use Livewire\Component;
use App\Models\JobApplication;
use Illuminate\Support\Facades\File;

class CompaniesJobApplications extends Component
{
    public $listeners = ['active', 'inactive', 'delete', 'callConfirmation'];

    public function render()
    {
        return view('livewire.admin.configuration.companies-job-applications');
    }

    public function sendMessage(string $message)
    {
        $this->dispatchBrowserEvent('message', [
            'message' => "Oferta de trabajo {$message} correctamente",
            'type' => 'success'
        ]);

        $this->emit('refreshLivewireDatatable');
    }

    public function active(int $id)
    {
        $model = JobApplication::findOrFail($id);
        $model->update(['status' => 1]);
        $this->sendMessage("activada");
    }

    public function callConfirmation($id)
    {
        $model = JobApplication::findOrFail($id);;
        $this->dispatchBrowserEvent('confirmation', [
            'name' => "Aplicación de Trabajo",
            'id' => $model->id,
            'event' => 'delete'
        ]);
    }

    public function inactive(int $id)
    {
        $model = JobApplication::findOrFail($id);
        $model->update(['status' => 0]);
        $this->sendMessage("desactivada");
    }

    public function delete(int $id)
    {
        $model = JobApplication::findOrFail($id);
        $destinationPath = public_path();
        File::delete($destinationPath . '/storage/job_aplications/' . $model['photo_path']);
        $model->delete();
        $this->sendMessage("eliminada");
    }
}
