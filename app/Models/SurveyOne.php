<?php

namespace App\Models;

use App\Models\SurveyBase;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SurveyOne extends SurveyBase
{
    public function __construct()
    {
        $this->survey = 'survey_ones';
        $this->title = 'Perfil del egresado.';
        $this->properties =
        [
            'sex' => 'SEXO',
            'marital_status' => 'ESTADO CIVIL',
            'qualified' => 'TITULADO',
            'qualified_year' => 'AÑO DE TITULACIÓN',
            'income_month' => 'PERÍODO DE INGRESO',
            'income_year' => 'AÑO DE INGRESO',
            'career_id' => 'CARRERA',
            'specialty_id' => 'ESPECIALIDAD',
            'month' => 'PERÍODO DE EGRESO',
            'year' => 'AÑO DE EGRESO',
            'language_id' => 'OTRO IDIOMA',
            'percent_english' => 'PORCENTAJE DE CONOCIMIENTO DEL INGLÉS',
            'percent_another_language' => 'PORCENTAJE DE CONOCIMIENTO DE OTRO IDIOMA',
        ];

        $this->graph = [
            'sex',
            'marital_status',
            'qualified',
            'month',
            'year',
            'state',
            'career_id',
            'specialty_id',
            'percent_english',
        ];        
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
        'career_id',
        'specialty_id',
        'qualified',
        'qualified_year',
        'income_month',
        'income_year',
        'month',
        'year',
        'percent_english',
        'language_id',
        'percent_another_language',
        'software'
    ];

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function career()
    {
        return $this->belongsTo(Career::class);
    }

    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
