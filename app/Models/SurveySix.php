<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\SurveyBase;

class SurveySix extends SurveyBase
{
    public function __construct()
    {
        $this->survey = 'survey_sixes';
        $this->title = 'Expectativas de desarrollo, superación profesional y de actualización.';
        $this->properties =
            [
                'organization_yes_no' => '¿Pertenece a organizaciones sociales?',
                'agency_yes_no' => '¿Pertenece a organismos de profesionistas?',
                'association_yes_no' => '¿Pertenece a asociaciones de egresados?',
            ];

        $this->graph = [
            'organization_yes_no',
            'agency_yes_no',
            'association_yes_no'
        ];
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
