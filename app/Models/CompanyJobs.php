<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyJobs extends Model
{
    protected $fillable = [
        'title',
        'description',
        'salary',
        'id_user',
        'id_career',
    ];

    public function company()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    use HasFactory;
}
