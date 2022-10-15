<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SurveyBase;
class SurveyFive extends SurveyBase
{
    public function __construct()
    {
        $this->survey = 'survey_fives';
    }

    protected $fillable = [
        'user_id',
        'courses_yes_no',
        'courses',
        'master_yes_no',
        'master'
    ];

    use HasFactory;
}
