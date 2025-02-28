<?php

namespace App\Http\Controllers;

use App\Models\company;
use App\Models\local;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function home()
    {
        $link = local::all();
        $company = company::all()->first();
        return view('dashboard', compact('link', 'company'));
    }
}
