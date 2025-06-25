<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
       protected $connection = 'dh';
        protected $table = 'js_medirecord';
        public $timestamps = false;
}
