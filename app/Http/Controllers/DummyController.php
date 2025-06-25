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

    public function index()
    {

        $nepaliDates = app('nepali_dates');
        $pcounts = Dummy::leftJoin('HS_SUOR_SUBORG', 'GENINSCOUNT.PAVI_SUBORGID', '=', 'HS_SUOR_SUBORG.SUOR_BRANCHID')
            ->select('GENINSCOUNT.*', 'HS_SUOR_SUBORG.SUOR_BRANCHNAME')
            ->where('VISITDATEAD', $nepaliDates['todayad'])
            ->orderby('newgen', 'desc')
            ->get();
        $dreports2day = MedicalSummary::where('visitdate', $nepaliDates['todaybs'])->get();
        $dreportsyday = MedicalSummary::where('visitdate', $nepaliDates['yesterdaybs'])->get();
        $opticalsales = DB::connection('do')
            ->table('salemaster')
            ->leftJoin('counter', 'counter.DEPARTMENTID', '=', 'salemaster.counterid') // Qualified join columns for clarity
            ->where('salemaster.BILLDATE', '=', $nepaliDates['todaybs']) // Qualified where column for clarity
            ->groupBy('counter.DEPARTMENTNAME') // Qualified group by column for clarity
            ->select(
                'counter.DEPARTMENTNAME', // Qualified select column for clarity
                DB::raw('COUNT(salemaster.BILL_NO) as bill_count') // Qualified count column for clarity
            )
            // ->dumpRawSql()

            ->get();
        // return ($opticalsales);
        $pharsales = DB::connection('dp')
            ->table('salemaster')
            ->leftJoin('counter', 'DEPARTMENTID', '=', 'counterid')
            ->where('BILLDATE', '=', $nepaliDates['todaybs'])
            ->groupBy('DEPARTMENTNAME')
            ->select(
                'DEPARTMENTNAME',
                DB::raw('COUNT(BILL_NO) as bill_count')
            )
            // ->ddRawSql();
            // ->dumpRawSql()
            ->get();
        // return ($pharsales);

        return view('dummy', compact('pharsales', 'opticalsales', 'dreportsyday', 'dreports2day', 'pcounts'));
    }

    public function dateconverter(Request $request)
    {
        $date = $request->selected_date;
        $carbonDate = Carbon::parse($date);
        $ndate = nepaliDate($carbonDate);
        return ($ndate);
    }
    public function report()
    {
        $regdata = DB::connection('h')
            ->table('VW_CL_OPDPATIENTVISITEDLIST')
            ->where('visitdate', $nepaliDates['todaybs'])
            ->get();
        return view('report', compact('regdata'));
    }
}
