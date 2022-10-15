<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanySurvey extends Model
{
    protected $fillable = [
        'user_id',
        'survey_one_company_done',
        'survey_two_company_done',
        'survey_three_company_done'
    ];
    
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function surveyDone($survey)
    {
        $this[$survey] = true;
        $this->save();
    }
}
