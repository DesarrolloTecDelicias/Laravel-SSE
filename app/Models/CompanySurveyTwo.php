<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanySurveyTwo extends Model
{
    protected $fillable = [
        'user_id',
        'number_graduates',
        'congruence',
        'competence1',
        'competence2',
        'competence3',
        'competence4',
        'competence5',
        'competence6',
        'competence7',
        'competence8',
        'career_id'
    ];

    public function company()
    {
        return $this->belongsTo(User::class);
    }

    public function career()
    {
        return $this->belongsTo(Career::class);
    }

    use HasFactory;
}
