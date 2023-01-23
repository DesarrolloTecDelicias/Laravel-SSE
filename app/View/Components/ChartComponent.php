<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ChartComponent extends Component
{
    public $idChart;
    public $description;
    public $title;
    public $lg;
    public $md;
    public $sm;
    public $height;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $idChart,
        $description,
        $title,
        $lg = "12",
        $md = "12",
        $sm = "12",
        $height = 500
    ) {
        $this->lg = $lg;
        $this->md = $md;
        $this->sm = $sm;
        $this->description = $description;
        $this->idChart = $idChart;
        $this->title = $title;
        $this->height = $height;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.chart-component');
    }
}
