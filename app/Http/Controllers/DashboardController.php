<?php

namespace App\Http\Controllers;

use App\Models\company;
use App\Models\Download;
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
        $company = company::all();
        $emails = email::all();
        $extensions = extensions::all();

        return view('dashboard', compact('intranetdatas', 'internetdatas', 'company', 'emails', 'extensions'));
    }

    public function guides()
    {
        $hvideos = Download::where('type','hvideo')->get();
        $svideos = Download::where('type','svideo')->get();
        $files = Download::where('type','file')->get();
        $docs = Download::where('type','doc')->get();

        return view('guides', compact('files','svideos','hvideos','docs'));
    }
    public function changepwd(){
        return view('changepassword');
    }
}
