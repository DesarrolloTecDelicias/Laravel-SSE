<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanySurveyOne extends Model
{
    protected $fillable = [
        'user_id',
        'business_name',
        'address',
        'zip',
        'suburb',
        'state',
        'city',
        'municipality',
        'phone',
        'email',
        'business_structure',
        'company_size',
        'business_id'
    ];

    public function company()
    {
        return $this->belongsTo(User::class);
    }

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    use HasFactory;
}
