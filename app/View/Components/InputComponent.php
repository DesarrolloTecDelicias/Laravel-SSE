<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputComponent extends Component
{
    public $idInput;
    public $title;
    public $required;
    public $type;
    public $readonly;
    public $lg;
    public $md;
    public $sm;
    public $maxLength;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $idInput,
        $title,
        $required = true,
        $type = 'text',
        $readonly = false,
        $lg = "4",
        $md = "6",
        $sm = "6",
        $maxLength = '',
    ) {
        $this->idInput = $idInput;
        $this->title = $title;
        $this->required = $required;
        $this->type = $type;
        $this->readonly = $readonly;
        $this->lg = $lg;
        $this->md = $md;
        $this->sm = $sm;
        $this->maxLength = $maxLength;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input-component');
    }
}
