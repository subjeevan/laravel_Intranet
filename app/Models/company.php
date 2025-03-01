<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{

    protected $casts = [
        'contact' => 'array',
    ];
protected $fillable=[
    'name','image','contact','address','pan','email','website'
];



}
