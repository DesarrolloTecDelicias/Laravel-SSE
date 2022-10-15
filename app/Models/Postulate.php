<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulate extends Model
{
    protected $fillable = ['job_id', 'graduate_id'];

    public function graduate()
    {
        return $this->belongsTo(User::class, 'graduate_id', 'id');
    }

    use HasFactory;
}
