<?php

namespace App\Models\Global;

use Illuminate\Database\Eloquent\Model;

class Api extends Model
{
    protected $fillable = [
        'servicename',
        'url',
        'username',
        'password',
        'remoteuser',
        'partnerid',
        'locationid',
        'path1',
        'path2',
    ];
}
