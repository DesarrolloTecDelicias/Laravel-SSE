<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'type',
        'active',
    ];

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
