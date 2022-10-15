<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyGraduatesWorking extends Model
{
    protected $fillable = [
        'company_survey_id',
        'career',
        'level',
        'total'
    ];
    
    use HasFactory;
}
