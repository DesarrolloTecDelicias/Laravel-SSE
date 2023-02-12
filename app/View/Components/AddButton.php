<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AddButton extends Component
{
    public $model;
    public $lastVowal;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($model, $lastVowal='a')
    {
        $this->model = $model;
        $this->lastVowal = $lastVowal;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.add-button');
    }
}
