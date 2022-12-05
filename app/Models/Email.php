<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $fillable = [
        'type_id',
        'body',
        'type_user_id'
    ];

    use HasFactory;
}
