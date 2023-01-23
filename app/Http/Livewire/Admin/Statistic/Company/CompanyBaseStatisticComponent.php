<?php

namespace App\Http\Livewire\Admin\Statistic\Company;

use Livewire\Component;

abstract class CompanyBaseStatisticComponent extends Component
{
    public $chartState = [];
    public $json;
    public $model;
    public $survey;

    abstract function render();
    abstract function mount();

    public function getQueryRaw($field)
    {
        return
            $this->model::groupBy($field)
            ->selectRaw("count(*) as total, 
            concat(
                $field,': ', count(*), ' (',
                round(count(*) *(100/(select count(*) from {$this->survey})), 2),
                '%)'
                ) as label")
            ->get();
    }

    public function setJsonData()
    {
        $this->json = json_encode($this->chartState, JSON_UNESCAPED_UNICODE);
    }

    public function fillBaseQuestions()
    {
        $survey = new $this->model();
        $questions = $survey->getQuestions();
        foreach ($questions as $value) {
            $this->chartState[$value] = $this->getQueryRaw($value);
        }
        $this->setJsonData();
    }
}
