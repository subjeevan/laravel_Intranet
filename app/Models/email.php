<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class email extends Model
{
    protected $fillable = [
        'username',
        'department',
        'email',
        'location'
    ];
}
