<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\SurveyBase;

class SurveyFour extends SurveyBase
{
    public function __construct()
    {
        $this->survey = 'survey_fours';
        $this->title = 'Desempeño profesional de los egresados.';
        $this->properties =
            [
                'efficiency_work_activities' => 'Eficiencia para realizar las actividades laborales, en relación con su formación académica',
                'academic_training' => 'Cómo califica su formación académica con respecto a su desempeño laboral',
                'usefulness_professional_residence' => 'Utilidad de las residencias profesionales o prácticas profesionales para su desarrollo laboral y profesional',
                'study_area' => 'Área o Campo de Estudio',
                'title' => 'Titulación',
                'experience' => 'Experiencia Laboral / Práctica (antes de egresar)',
                'job_competence' => 'Competencia Laboral: Resolver problemas, análisis, aprendizaje, trabajo en equipo',
                'positioning' => 'Posicionamiento de la Institución de Egreso',
                'languages' => 'Conocimiento de Idiomas Extranjeros',
                'recommendations' => 'Recomendaciones / Referencias',
                'personality' => 'Personalidad / Actitudes',
                'leadership' => 'Capacidad de liderazgo',
                'others' => 'Otros Aspectos',
            ];
    }

    protected $fillable = [
        'user_id',
        'efficiency_work_activities',
        'academic_training',
        'usefulness_professional_residence',
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

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
