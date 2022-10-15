<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\SurveyBase;

class SurveyFour extends SurveyBase
{
    public function __construct()
    {
        $this->survey = 'survey_fours';
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

}
