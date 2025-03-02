<?php

namespace App\Http\Controllers;

use App\Models\company;
use App\Models\local;
use App\Models\email;
use App\Models\extensions;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function home()
    {
        $intranetdatas = local::where('type', 'intranet')->get();
        $internetdatas = local::where('type', 'internet')->get();
        $company = company::all()->first();
        $emails=email::all();
        $extensions=extensions::all();

        return view('dashboard', compact('intranetdatas', 'internetdatas', 'company','emails','extensions'));
    }

    public function guides(){
        return view('guides');
    }
}
