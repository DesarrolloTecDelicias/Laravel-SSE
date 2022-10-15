<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\SurveyBase;

class SurveyThree extends SurveyBase
{
    public function __construct()
    {
        $this->survey = 'survey_threes';
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
        'language_most_spoken',
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
        'business_activity_selector',
    ];

    use HasFactory;
}
