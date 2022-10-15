<?php

namespace App\Http\Livewire\Company\Job;

use Livewire\Component;
use App\Models\Postulate;
use App\Models\CompanyJobs;
use Illuminate\Support\Facades\Auth;

class PostulateComponents extends Component
{
    public $tab;
    public $jobs = [];

    public function render()
    {
        return view('livewire.company.job.postulate-components');
    }

    public function mount()
    {
        $this->tab = 'pills-job';
        $this->jobs = CompanyJobs::where('id_user', Auth::user()->id)->get();
    }
}
