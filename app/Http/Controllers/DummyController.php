<?php

namespace App\Http\Controllers;
use App\Models\Dummy;
use App\Models\MedicalSummary;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Pratiksh\Nepalidate\Facades\NepaliDate;

class DummyController extends Controller
{

    public function index(){

    $nepaliDates=app('nepali_dates');
    $pcounts = Dummy::leftJoin('HS_SUOR_SUBORG', 'GENINSCOUNT.PAVI_SUBORGID', '=', 'HS_SUOR_SUBORG.SUOR_BRANCHID')
    ->select('GENINSCOUNT.*', 'HS_SUOR_SUBORG.SUOR_BRANCHNAME')
    ->get();
    $dreports2day = MedicalSummary::where('visitdate', $nepaliDates['todaybs'])->get();
    $dreportsyday = MedicalSummary::where('visitdate', $nepaliDates['yesterdaybs'])->get();

           return view('dummy', compact('dreportsyday','dreports2day','pcounts'));
    }

    public function dateconverter(Request $request){
        $date=$request->selected_date;
        $carbonDate = Carbon::parse($date);
        $ndate=nepaliDate($carbonDate);
        return($ndate);
    }
    public function report(){
        $regdata=DB::connection('h')
        ->table('VW_CL_OPDPATIENTVISITEDLIST')
        ->where('visitdate','2081/12/27')
        ->get();
        return view('report',compact('regdata'));

    }
}
