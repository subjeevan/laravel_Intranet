<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $connection = 'h';
    protected $table = 'GENINSCOUNT';
    public $timestamps = false;
}
