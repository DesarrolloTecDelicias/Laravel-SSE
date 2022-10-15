<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSurvey extends Model
{
    protected $fillable = [
        'user_id',
        'survey_one_done',
        'survey_two_done',
        'survey_three_done',
        'survey_four_done',
        'survey_five_done',
        'survey_six_done',
        'survey_seven_done'
    ];

    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function surveyDone($survey){
        $this[$survey] = true;
        $this->save();
    }
}
