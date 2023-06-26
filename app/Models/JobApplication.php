<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $fillable = [
        'user_id',
        'photo_path',
        'type',
        'career_id',
        'name',
        'description',
        'period',
        'vacancies',
        'benefits',
        'consultant_name',
        'consultant_phone',
        'consultant_email',
        'consultant_position',
        'in_charge_name',
        'in_charge_position',
        'area',
        'contact_name',
        'contact_phone',
        'contact_email',
        'status'
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
}
