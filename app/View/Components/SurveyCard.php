<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SurveyCard extends Component
{
    public $survey;
    public $number;
    public $icon;
    public $route;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($survey, $number, $icon, $route)
    {
        $this->survey = $survey;
        $this->number = $number;
        $this->icon = $icon;
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.survey-card');
    }
}
