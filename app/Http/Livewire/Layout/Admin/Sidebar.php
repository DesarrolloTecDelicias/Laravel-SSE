<?php

namespace App\Http\Livewire\Layout\Admin;

use Request;
use Livewire\Component;
use Illuminate\Support\Facades\Route;

class Sidebar extends Component
{
    public $prefix, $segments, $routeName, $lastSegment;

    public function render()
    {
        return view('livewire.layout.admin.sidebar');
    }

    public function mount()
    {
        $this->prefix = request()->route()->getPrefix();
        $this->segments = Request::segments();
        $this->routeName = Route::currentRouteName();
        $this->lastSegment = last($this->segments);
    }

    public function openMenu($route)
    {
        $prefix = request()->route()->getPrefix();
        return str_contains($prefix, $route)
            ? 'menu-is-opening menu-open' : '';
    }

    function thirdLevelValidation($route, $name, $type)
    {
        switch ($type) {
            case 'active':
                return ($this->lastSegment == $name && str_contains($this->prefix, $route))
                    ? 'active' : '';
                break;

            case 'icon':
                return ($this->lastSegment == $name && str_contains($this->prefix, $route))
                    ? 'fa-dot-circle' : 'fa-circle';
                break;
        }
    }
}
