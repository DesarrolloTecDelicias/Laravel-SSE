<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\SurveyBase;
use App\Constants\Constants;

class SurveyThree extends SurveyBase
{
    use HasFactory;
    public function __construct()
    {
        $this->survey = 'survey_threes';
        $this->title = 'Ubicación laboral de los egresados.';
        $this->properties =
            [
                'do_for_living' => 'ACTIVIDAD A LA QUE SE DEDICA ACTUALMENTE',
                'speciality' => 'QUÉ ESTÁN ESTUDIANDO LOS EGRESADOS',
                'long_take_job' => 'TIEMPO TRANSCURRIDO PARA OBTENER EL PRIMER EMPLEO',
                'hear_about' => 'MEDIO PARA OBTENER EL EMPLEO',
                'competence1' => 'COMPETENCIAS LABORALES',
                'competence2' => 'TÍTULO PROFESIONAL',
                'competence3' => 'EXAMEN DE SELECCIÓN',
                'competence4' => 'IDIOMA EXTRANJERO',
                'competence5' => 'ACTITUDES Y HABILIDADES SOCIO-COMUNICATIVAS (PRINCIPIOS Y VALORES)',
                'competence6' => 'NINGUNO',
                'language_id' => 'IDIOMA QUE UTILIZA EN SU TRABAJO ACTUAL',
                'seniority' => 'ANTIGÜEDAD EN EL EMPLEO ACTUAL',
                'year' => 'AÑO DE INGRESO',
                'salary' => 'INGRESO (SALARIO MINIMO DIARIO)',
                'management_level' => 'NIVEL JERÁRQUICO EN EL TRABAJO',
                'job_condition' => 'CONDICIÓN DE TRABAJO',
                'job_relationship' => 'RELACIÓN DEL TRABAJO CON SU ÁREA DE FORMACIÓN',
                'business_structure' => 'SU EMPRESA U ORGANIMSO ES',
                'company_size' => 'TAMAÑO DE LA EMPRESA U ORGANISMO',
                'business_id' => 'ACTIVIDAD ECONÓMICA DE LA EMPRESA U ORGANISMO',
            ];

        $this->graph = [
            'long_take_job',
            //'language_id',
            'seniority',
            'year',
            'salary',
            'management_level',
            'job_condition',
            'job_relationship',
            'business_structure',
            'company_size',
            //'business_id'
        ];

        $this->graph2 = ['do_for_living'];

        $this->graph3 = ['speciality'];
    }

    protected $fillable = [
        'user_id',
        'do_for_living',
        'speciality',
        'school',
        'long_take_job',
        'hear_about',
        'competence1',
        'competence2',
        'competence3',
        'competence4',
        'competence5',
        'competence6',
        'language_id',
        'speak_percent',
        'write_percent',
        'read_percent',
        'listen_percent',
        'seniority',
        'year',
        'salary',
        'management_level',
        'job_condition',
        'job_relationship',
        'business_name',
        'business_activity',
        'address',
        'zip',
        'suburb',
        'state',
        'city',
        'municipality',
        'phone',
        'fax',
        'web_page',
        'boss_email',
        'business_structure',
        'company_size',
        'business_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function getGeneralReportSurveyThreeWork($start, $end, $careers)
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
            ->whereNotNull('users.income_year')
            ->whereNotNull('survey_threes.long_take_job')
            ->whereBetween('users.income_year', [$yearStart, $yearEnd])
            ->whereBetween('users.year_graduated', [$yearStart, $yearEnd])
            ->where([
                ['users.role', Constants::ROLE['Graduate']]
            ])

            ->whereIn("users.career_id", $careersIn)
            ->get();


        foreach ($a as $key => $value) {
           if ($key === 'do_for_living' && $value == Constants::DO_FOR_LIVING[1]) {
                $a->forget($key);
            }
            if ($key === 'do_for_living' && $value == Constants::DO_FOR_LIVING[3]) {
                $a->forget($key);
            } 
            if ($value['income_year'] == $yearStart) {
                if ($monthStart > 6) {
                    if ($value['income_month'] == 'ENERO-JUNIO') {
                        $a->forget($key);
                    }
                }
            }
        }

        foreach ($a as $key => $value) {
            if ($key === 'do_for_living' && $value == Constants::DO_FOR_LIVING[1]) {
                $a->forget($key);
            }
            if ($key === 'do_for_living' && $value == Constants::DO_FOR_LIVING[3]) {
                $a->forget($key);
            } 
            if ($value['year_graduated'] == $yearEnd) {
                if ($monthEnd <= 6) {
                    if ($value['month_graduated'] == 'AGOSTO-DICIEMBRE') {
                        $a->forget($key);
                    }
                }
            }
        }

        return $a;
    }

    public function getGeneralReportSurveyThreeSchool($start, $end, $careers)
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
            ->where('users.role', Constants::ROLE['Graduate'])
            ->whereNotNull('users.income_year')
            ->whereBetween('users.income_year', [$yearStart, $yearEnd])
            ->whereBetween('users.year_graduated', [$yearStart, $yearEnd])
            ->orWhere('survey_threes.do_for_living', Constants::DO_FOR_LIVING[2])
            ->orWhere('survey_threes.do_for_living', Constants::DO_FOR_LIVING[1])
            ->whereIn("users.career_id", $careersIn)
            ->get();


        foreach ($a as $key => $value) {
            if ($value['income_year'] == $yearStart) {
                if ($monthStart > 6) {
                    if ($value['income_month'] == 'ENERO-JUNIO') {
                        $a->forget($key);
                    }
                }
            }
        }

        foreach ($a as $key => $value) {
            if ($value['year_graduated'] == $yearEnd) {
                if ($monthEnd <= 6) {
                    if ($value['month_graduated'] == 'AGOSTO-DICIEMBRE') {
                        $a->forget($key);
                    }
                }
            }
        }

        return $a;
    }
}
