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
        'most_demanded_career'
    ];

    public function company()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    use HasFactory;
}
