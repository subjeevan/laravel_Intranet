<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $connection = 'pis';
    protected $table = 'VW_LEAVEREQUEST';
    public $timestamps = false;
}

