<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $fillable = ['name'];

    public function specialties()
    {
        return $this->hasMany(Specialty::class);
    }
    
    use HasFactory;
}
