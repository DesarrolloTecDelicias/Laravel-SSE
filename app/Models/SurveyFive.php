<?php

namespace App\Models;

use App\Models\SurveyBase;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SurveyFive extends SurveyBase
{
    public function __construct()
    {
        $this->survey = 'survey_fives';
        $this->title = 'Expectativas de desarrollo, superación profesional y de actualización.';
        $this->properties =
            [
                'courses_yes_no' => '¿Le gustaria tomar cursos de actualización?',
                'master_yes_no' => '¿Le gustaria tomar algún posgrado?',
            ];
    }

    protected $fillable = [
        'user_id',
        'courses_yes_no',
        'courses',
        'master_yes_no',
        'master'
    ];

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
