<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalSummary extends Model
{
    protected $connection = 'dh';
    protected $table = 'behmedrecsum';
    public $timestamps = false;
}
