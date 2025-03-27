<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use App\Models\company;
use App\Models\Hospital;

abstract class Controller
{
    public function __construct()
    {
        $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $company = company::all()->first();
        $hostip = getenv('remote_addr');
        $pcounts = HOSPITAL::leftJoin('HS_SUOR_SUBORG', 'GENINSCOUNT.PAVI_SUBORGID', '=', 'HS_SUOR_SUBORG.SUOR_BRANCHID')
            ->select('GENINSCOUNT.*', 'HS_SUOR_SUBORG.SUOR_BRANCHNAME')
            ->get();
        // $pcounts = [];
        View::share([
            'company' => $company,
            'hostname' => $hostname,
            'hostip' => $hostip,
            'pcounts' => $pcounts,
        ]);
    }
}
