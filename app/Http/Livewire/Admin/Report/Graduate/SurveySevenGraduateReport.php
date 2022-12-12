<?php

namespace App\Http\Livewire\Admin\Report\Graduate;

use Livewire\Component;
use App\Models\SurveySeven;

class SurveySevenGraduateReport extends Component
{
    protected $listeners = ['showComments'];
    public $modal = false;
    public $comment = null;

    public function render()
    {
        return view('livewire.admin.report.graduate.survey-seven-graduate-report');
    }

    public function showComments($id)
    {
        $this->comment = SurveySeven::find($id);
        $this->launchModal();
    }

    public function launchModal()
    {
        $this->modal = !$this->modal;
        $this->dispatchBrowserEvent('openModal', ['modal' => $this->modal]);
    }
}
