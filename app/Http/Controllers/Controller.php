<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use App\Models\company;

abstract class Controller
{
    public function __construct()
    {
        $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $company = company::all()->first();
        $hostip = getenv('remote_addr');

        View::share([
            'company' => $company,
            'hostname' => $hostname,
            'hostip' => $hostip,
        ]);
    }
}
