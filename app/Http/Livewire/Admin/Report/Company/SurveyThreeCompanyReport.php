<?php

namespace App\Http\Livewire\Admin\Report\Company;

use App\Models\CompanySurveyThree;
use Livewire\Component;

class SurveyThreeCompanyReport extends Component
{
    protected $listeners = ['showComments'];
    public $modal = false;
    public $comment = null;
    public $type = 1;

    public function render()
    {
        return view('livewire.admin.report.company.survey-three-company-report');
    }
    
    public function showComments($id, $type)
    {
        $this->type = $type;
        $this->comment = CompanySurveyThree::find($id);
        $this->launchModal();
    }

    public function launchModal()
    {
        $this->modal = !$this->modal;
        $this->dispatchBrowserEvent('openModal', ['modal' => $this->modal]);
    }
}
