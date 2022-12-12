<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    protected $fillable = ['name', 'career_id'];

    use HasFactory;

    public function career()
    {
        return $this->belongsTo(Career::class);
    }
}
