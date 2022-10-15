<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\SurveyBase;

class SurveyTwo extends SurveyBase
{
    public function __construct()
    {
        $this->survey = 'survey_twos';
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

}
