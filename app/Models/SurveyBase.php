<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SurveyBase extends Model
{
    protected $survey;

    use HasFactory;

    public function getReportInstance($start, $end, $career)
    {
        $yearStart = date('Y', strtotime($start));
        $monthStart = date('m', strtotime($start));
        $yearEnd = date('Y', strtotime($end));
        $monthEnd = date('m', strtotime($end));

        $subtraction = $yearEnd - $yearStart;
        $array = array(0, 1);
        $regexStart = $monthStart <= 6 ? 'ENERO-JUNIO|AGOSTO-DICIEMBRE' : 'AGOSTO-DICIEMBRE';
        $regexEnd = $monthEnd < 6
            ? '^(?!(ENERO-JUNIO|AGOSTO-DICIEMBRE)$).+$'
            : ($monthEnd ==  12
                ? 'ENERO-JUNIO|AGOSTO-DICIEMBRE'
                : 'ENERO-JUNIO');

        if (!in_array($subtraction, $array)) {

            //Start date
            $a = $this->survey == 'survey_ones'
                ? self::where('career', $career == "TODAS" ? '<>' : 'like', $career)
                ->whereBetween('year', [$yearStart + 1, $yearEnd - 1])
                ->get()

                : self::join('survey_ones', 'survey_ones.user_id', "{$this->survey}.user_id")
                ->where('survey_ones.career', $career == "TODAS" ? '<>' : 'like', $career)
                ->whereBetween('survey_ones.year', [$yearStart + 1, $yearEnd - 1])
                ->get();

            //Date Start
            $b = $this->survey == 'survey_ones'
                ?
                self::where([
                    ['career', $career == "TODAS" ? '<>' : 'like', $career],
                    ['year', '=', $yearStart],
                    ['month', 'REGEXP', $regexStart]
                ])
                ->get()
                ->merge($a)
                :
                self::join('survey_ones', 'survey_ones.user_id', "{$this->survey}.user_id")
                ->where([
                    ['survey_ones.career', $career == "TODAS" ? '<>' : 'like', $career],
                    ['survey_ones.year', '=', $yearStart],
                    ['survey_ones.month', 'REGEXP', $regexStart]
                ])
                ->get()
                ->merge($a);
        } else {

            //Date Start
            $b = $this->survey == 'survey_ones'
                ? self::where([
                    ['career', $career == "TODAS" ? '<>' : 'like', $career],
                    ['year', '=', $yearStart],
                    ['month', 'REGEXP', $regexStart]
                ])
                ->get()
                : self::join('survey_ones', 'survey_ones.user_id', "{$this->survey}.user_id")
                ->where([
                    ['survey_ones.career', $career == "TODAS" ? '<>' : 'like', $career],
                    ['survey_ones.year', '=', $yearStart],
                    ['survey_ones.month', 'REGEXP', $regexStart]
                ])
                ->get();
        }

        //Date end
        $c = $this->survey == 'survey_ones'
            ? self::where([
                ['career', $career == "TODAS" ? '<>' : 'like', $career],
                ['year', '=', $yearEnd],
                ['month', 'REGEXP', $regexEnd]
            ])
            ->get()
            ->merge($b)

            : self::join('survey_ones', 'survey_ones.user_id', "{$this->survey}.user_id")
            ->where([
                ['survey_ones.career', $career == "TODAS" ? '<>' : 'like', $career],
                ['survey_ones.year', '=', $yearEnd],
                ['survey_ones.month', 'REGEXP', $regexEnd]
            ])
            ->get()
            ->merge($b);

        return $c;
    }

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
            ->whereIn("users.career", $careersIn)
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

    public function getGeneralReportByDate($start, $end, $career)
    {
        $from = date($start);
        $to = date($end);

        $a = self::join('users', 'users.id', "{$this->survey}.user_id")
            ->where("users.career", $career == "TODAS" ? '<>' : 'like', $career)
            ->whereBetween("{$this->survey}.created_at", [$from, $to])
            ->get();

        return $a;
    }
}
