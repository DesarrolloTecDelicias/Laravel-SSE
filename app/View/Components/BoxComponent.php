<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BoxComponent extends Component
{
    public $value;
    public $title;
    public $icon;
    public $route;
    public $bg;
    public $lg;
    public $md;
    public $sm;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $value,
        $title,
        $icon,
        $route,
        $bg,
        $lg = "3",
        $md = "6",
        $sm = "12"
    ) {
        $this->value = $value;
        $this->title = $title;
        $this->icon = $icon;
        $this->route = $route;
        $this->bg = $bg;
        $this->lg = $lg;
        $this->md = $md;
        $this->sm = $sm;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.box-component');
    }
}
