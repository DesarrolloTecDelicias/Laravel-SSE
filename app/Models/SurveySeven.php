<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\SurveyBase;

class SurveySeven extends SurveyBase
{
    public function __construct()
    {
        $this->survey = 'survey_sevens';
    }

    protected $fillable = ['user_id', 'comments'];
    
    use HasFactory;
}
