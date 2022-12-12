<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanySurveyThree extends Model
{
    protected $fillable = [
        'user_id',
        'resolve_conflicts',
        'orthography',
        'process_improvement',
        'teamwork',
        'time_management',
        'security',
        'ease_speech',
        'project_management',
        'puntuality',
        'rules',
        'integration_work',
        'creativity',
        'bargaining',
        'abstraction',
        'leadership',
        'changes',
        'job_performance',
        'requirement',
        'comments'
    ];

    public function company()
    {
        return $this->belongsTo(User::class);
    }

    use HasFactory;
}
