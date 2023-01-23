<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\SurveyBase;

class SurveyThree extends SurveyBase
{
    public function __construct()
    {
        $this->survey = 'survey_threes';
        $this->title = 'Ubicación laboral de los egresados.';
        $this->properties =
            [
                'do_for_living' => 'ACTIVIDAD A LA QUE SE DEDICA ACTUALMENTE',
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
            'do_for_living',
            'speciality',
            'long_take_job',
            'study_area',
            'title',
            'experience',
            'job_competence',
            'positioning',
            'languages',
            'recommendations',
            'personality',
            'leadership',
            'others'
        ];            
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

    use HasFactory;

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
}
