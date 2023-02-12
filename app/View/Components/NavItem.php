<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NavItem extends Component
{
    public $route;
    public $routename;
    public $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($route, $routename, $title)
    {
        $this->route = $route;
        $this->routename = $routename;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.nav-item');
    }
}
