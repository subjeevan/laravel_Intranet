<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use App\Models\company;
use App\Models\Hospital;
use App\Models\News;

abstract class Controller
{
    public function __construct()
    {
        $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $company = company::all()->first();
        $hostip = getenv('remote_addr');
        $newses = News::where('created_at','>=',now()->subdays(7))->get();

        View::share([
            'company' => $company,
            'hostname' => $hostname,
            'hostip' => $hostip,
            'newses'=>$newses
        ]);
    }
}
