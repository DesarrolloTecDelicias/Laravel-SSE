<?php

namespace App\Http\Livewire\Admin\Components;

use Livewire\Component;

class ReportComponent extends Component
{
    public $short;
    public $title;
    public $survey;

    public function render()
    {
        return view('livewire.admin.components.report-component');
    }
}
