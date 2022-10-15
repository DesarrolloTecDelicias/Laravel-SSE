<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\SurveyBase;

class SurveySix extends SurveyBase
{
    public function __construct()
    {
        $this->survey = 'survey_sixes';
    }

    protected $fillable = [
        'user_id',
        'organization_yes_no',
        'organization',
        'agency_yes_no',
        'agency',
        'association_yes_no',
        'association',
    ];

    use HasFactory;
}
