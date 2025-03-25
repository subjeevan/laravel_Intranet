<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

abstract class HospitalController
{
    public function __construct(){

    $pcounts = HOSPITAL::leftJoin('HS_SUOR_SUBORG', 'GENINSCOUNT.PAVI_SUBORGID', '=', 'HS_SUOR_SUBORG.SUOR_BRANCHID')
    ->select('GENINSCOUNT.*', 'HS_SUOR_SUBORG.SUOR_BRANCHNAME')
    ->get();

   }
}
