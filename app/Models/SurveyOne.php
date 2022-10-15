<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\SurveyBase;

class SurveyOne extends SurveyBase
{
    public function __construct()
    {
        $this->survey = 'survey_ones';
    }

    protected $fillable = [
        'user_id',
        'first_name',
        'fathers_surname',
        'mothers_surname',
        'control_number',
        'birthday',
        'curp',
        'sex',
        'marital_status',
        'address',
        'zip_code',
        'suburb',
        'state',
        'city',
        'municipality',
        'phone',
        'cellphone',
        'email',
        'career',
        'specialty',
        'qualified',
        'qualified_year',
        'income_month',
        'income_year',
        'month',
        'year',
        'year_qualified',
        'percent_english',
        'another_language',
        'percent_another_language',
        'software'
    ];

    use HasFactory;
}
