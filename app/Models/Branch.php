<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable=[
        'name',
    'contact',
    'remoteid',
    'username',
    'password',
    'isp1',
    'speed',
    'price',
    'isp2'

    ];
}
