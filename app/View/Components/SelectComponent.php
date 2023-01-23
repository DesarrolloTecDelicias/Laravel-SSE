<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SelectComponent extends Component
{
    public $idInput;
    public $title;
    public $short;
    public $required;
    public $lg;
    public $md;
    public $sm;
    public $options = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $idInput,
        $title,
        $short = 'opción',
        $required = true,
        $lg = "4",
        $md = "6",
        $sm = "6",
        $options = [],
    ) {
        $this->idInput = $idInput;
        $this->title = $title;
        $this->short = $short;
        $this->required = $required;
        $this->lg = $lg;
        $this->md = $md;
        $this->sm = $sm;
        $this->options = $options;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.select-component');
    }
}
