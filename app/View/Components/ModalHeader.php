<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ModalHeader extends Component
{
    public $model;
    public $stateid;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($model, $stateid = false)
    {
        $this->model = $model;
        $this->stateid = $stateid;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal-header');
    }
}
