<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FilterChart extends Component
{
    public $careers;
    public $selected;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($careers, $selected = [])
    {
        $this->careers = $careers;
        $this->selected = $selected;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.filter-chart');
    }
}
