<?php

namespace App\Http\Controllers;

use App\Models\company;
use App\Models\local;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function home()
    {
        $intranetdatas = local::where('type','intranet')->get();
        $internetdatas=local::where('type','internet')->get();
        $company = company::all()->first();
        return view('dashboard', compact('intranetdatas','internetdatas', 'company'));
    }
}
