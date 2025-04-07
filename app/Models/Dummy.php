<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dummy extends Model
{
    protected $connection = 'dh';
    protected $table = 'GENINSCOUNT';
    public $timestamps = false;
}
