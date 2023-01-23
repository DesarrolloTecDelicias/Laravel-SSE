<?php

namespace App\Models;

use App\Models\User;
use App\Models\Career;
use App\Models\Language;
use App\Models\Business;
use App\Models\Specialty;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

abstract class SurveyBase extends Model
{
    protected $survey;
    public $title;
    public $properties;
    public $options;
    public $total;
    protected $questions = [];
    protected $graph = [];

    public $external =  [
        'career_id',
        'specialty_id',
        'language_id',
        'user_id',
        'business_id',
        'competence1',
        'competence2',
        'competence3',
        'competence4',
        'competence5',
        'competence6'
    ];

    use HasFactory;

    public function getGeneralReport($start, $end, $careers)
    {
        $yearStart = date('Y', strtotime($start));
        $monthStart = date('m', strtotime($start));
        $yearEnd = date('Y', strtotime($end));
        $monthEnd = date('m', strtotime($end));
        $careersIn = array();
        foreach ($careers as $career) {
            array_push($careersIn, $career);
        }

        $a = self::join('users', 'users.id', "{$this->survey}.user_id")
            ->where('users.role', 'graduate')
            ->whereIn("users.career_id", $careersIn)
            ->whereBetween('users.income_year', [$yearStart, $yearEnd])
            ->whereBetween('users.year_graduated', [$yearStart, $yearEnd])
            ->get();

        foreach ($a as $key => $value) if ($value['income_year'] == $yearStart) {
            if ($monthStart > 6) {
                if ($value['income_month'] == 'ENERO-JUNIO') $a->forget($key);
            }
        }

        foreach ($a as $key => $value) if ($value['year_graduated'] == $yearEnd) {
            if ($monthEnd <= 6) {
                if ($value['month_graduated'] == 'AGOSTO-DICIEMBRE') $a->forget($key);
            }
        }

        return $a;
    }

    protected function getName($key, $value)
    {
        switch ($key) {
            case 'career_id':
                return Career::find($value)->name;
                break;
            case 'specialty_id':
                return Specialty::find($value)->name;
                break;
            case 'language_id':
                return Language::find($value)->name;
                break;
            case 'user_id':
                return User::find($value)->name;
                break;
            case 'business_id':
                return Business::find($value)->name;
                break;
            case str_contains($key, 'competence'):
                return $value ? 'Sí' : 'No';
                break;
        }
    }

    public function getAllPropertiesCount($start, $end, $careers)
    {
        $yearStart = date('Y', strtotime($start));
        $monthStart = date('m', strtotime($start));
        $yearEnd = date('Y', strtotime($end));
        $monthEnd = date('m', strtotime($end));
        $careersIn = array();
        foreach ($careers as $career) {
            array_push($careersIn, $career);
        }

        $a = self::join('users', 'users.id', "{$this->survey}.user_id")
            ->where('users.role', 'graduate')
            ->whereIn("users.career_id", $careersIn)
            ->whereNotNull('users.income_year')
            ->whereBetween('users.income_year', [$yearStart, $yearEnd])
            ->whereBetween('users.year_graduated', [$yearStart, $yearEnd])
            ->get();

        foreach ($a as $key => $value) if ($value['income_year'] == $yearStart) {
            if ($monthStart > 6) {
                if ($value['income_month'] == 'ENERO-JUNIO') $a->forget($key);
            }
        }

        foreach ($a as $key => $value) if ($value['year_graduated'] == $yearEnd) {
            if ($monthEnd <= 6) {
                if ($value['month_graduated'] == 'AGOSTO-DICIEMBRE') $a->forget($key);
            }
        }

        $count = $a->count();
        $c1 = $a->where('do_for_living', 'TRABAJA')->count();
        $c2 = $a->where('do_for_living', 'ESTUDIA Y TRABAJA')->count();
        $countWork = $c1 + $c2;
        $this->total = $count;

        foreach ($this->properties as $key => $property) {

            $options = $a->pluck($key)->unique()->values()->all();
            //ignore emptys or null values
            $options = array_filter($options, function ($value) {
                return $value !== null && $value !== '';
            });

            $values = array();
            foreach ($options as $option) {
                $optionCount = $a->where($key, $option)
                ->whereNotNull($key)->count();
                //check if key is in external array
                if (in_array($key, $this->external)) {
                    $newOption = $this->getName($key, $option);
                    $values[$newOption]['quantity'] = $optionCount;

                    if ($key != 'do_for_living' && $this->survey == 'survey_threes') {
                        $values[$newOption]['percentage'] = round($optionCount / $countWork * 100, 2);
                    } else {
                        $values[$newOption]['percentage'] = round($optionCount / $count * 100, 2);
                    }
                } else {
                    $values[$option]['quantity'] = $optionCount;

                    if ($key != 'do_for_living' && $this->survey == 'survey_threes') {
                        $values[$option]['percentage'] = round($optionCount / $countWork * 100, 2);
                    } else {
                        $values[$option]['percentage'] = round($optionCount / $count * 100, 2);
                    }
                }
            }
            $this->options[$property] = $values;
        }
    }

    public function getQuestions(){
        $questions = $this->fillable;
        array_shift($questions);
        return $questions;
    }

    public function getGraph(){
        return $this->graph;
    }
}
