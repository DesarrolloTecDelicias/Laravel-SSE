<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\SurveyBase;

class SurveyTwo extends SurveyBase
{
    public function __construct()
    {
        $this->survey = 'survey_twos';
        $this->title = 'Pertinencia y disponibilidad de medio y recursos para el aprendizaje.';
        $this->properties =
            [
                'quality_teachers' => 'CALIDAD DE LOS DOCENTES',
                'syllabus' => 'PLAN DE ESTUDIOS',
                'study_condition' => 'SATISFACCIÓN CONDICIONES DE ESTUDIO (INFRAESTRUCTURA)',
                'experience' => 'EXPERIENCIA OBTENIDA A TRAVÉS DE LA RESIDENCIA PROFESIONAL',
                'study_emphasis' => 'ÉNFASIS QUE SE LE PRESENTABA A LA INVESTIGACIÓN DENTRO DEL PROCESO DE ENSEÑANZA',
                'participate_projects' => 'OPORTUNIAD DE PARTICIPAR EN PROYECTOS DE INVESTIGACIÓN Y DESAROLLO',
            ];
    }

    protected $fillable = [
        'user_id',
        'quality_teachers',
        'syllabus',
        'study_condition',
        'experience',
        'study_emphasis',
        'participate_projects'
    ];

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
