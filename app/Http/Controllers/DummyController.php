<?php

namespace App\Http\Controllers;
use App\Models\Dummy;

use Illuminate\Http\Request;

class DummyController extends Controller
{

    public function index(){
    $pcounts = Dummy::leftJoin('HS_SUOR_SUBORG', 'GENINSCOUNT.PAVI_SUBORGID', '=', 'HS_SUOR_SUBORG.SUOR_BRANCHID')
    ->select('GENINSCOUNT.*', 'HS_SUOR_SUBORG.SUOR_BRANCHNAME')
    ->get();
           return view('dummy', compact('pcounts'));
    }
}
