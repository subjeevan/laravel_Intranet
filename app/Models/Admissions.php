<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admissions extends Model
{
    protected $connection = 'h';
    protected $table = 'VW_HS_ADMNPATIENTCURRENTINFO';
    public $timestamps = false;
}
