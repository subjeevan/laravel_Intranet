<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $connection = 'ora_hospital'; // Uses HOSPITAL_USER schema
    protected $table = 'GENINSCOUNT';
    public $timestamps = false;
}
