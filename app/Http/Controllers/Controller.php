<?php

namespace App\Http\Controllers;

use App\Models\company;

abstract class Controller
{
    public function __construct()
    {
        $company = company::all()->first();
        view()->share('company', $company);
    }
}
