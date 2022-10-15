<?php

namespace App\Http\Livewire\Graduate;

use Livewire\Component;
use App\Models\StudentSurvey;
use Illuminate\Support\Facades\Auth;

class DashboardGraduate extends Component
{
    public $graduateSurvey;

    public function render()
    {
        return view('livewire.graduate.dashboard-graduate');
    }

    public function mount()
    {
        $this->graduateSurvey = StudentSurvey::where('user_id', Auth::user()->id)->get()->first();
    }

    function checkSurvey($userSurveyCheck)
    {
        $verified =  $this->graduateSurvey[$userSurveyCheck];
        $check = '<i class="fas fa-check-circle text-success" style="font-size: 25px;"></i>';
        $loader = '<div class="loaderSquare"> <span></span><span></span><span></span> </div>';
        return $verified == true ? $check : $loader;;
    }
}
