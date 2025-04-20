<?php

namespace App\Http\Controllers;

use App\Models\Admissions;
use App\Models\company;
use App\Models\Download;
use App\Models\local;
use App\Models\email;
use App\Models\extensions;
use App\Models\Global\Api;
use App\Models\Hospital;
use App\Models\News;
use App\Models\Otbook;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Pratiksh\Nepalidate\Facades\NepaliDate;


class DashboardController extends Controller
{

    public function home()
    {
        $nepaliDates = app('nepali_dates');
        // return($nepaliDates['todaybs']);
        $intranetdatas = local::where('type', 'intranet')->get();
        $sevenDaysAgo = Carbon::today()->subDays(4);

        $intranetdatas = $intranetdatas->map(function ($item) use ($sevenDaysAgo) {
            // Assuming your update column is named 'update'
            $item->blink = $item->updated_at && Carbon::parse($item->updated_at)->greaterThanOrEqualTo($sevenDaysAgo);
            return $item;
        });
        $internetdatas = local::where('type', 'internet')->get();
        $emails = email::all();
        $extensions = extensions::all();
        $suborgid = 1;
        $pcounts = Hospital::leftJoin('HS_SUOR_SUBORG', 'GENINSCOUNT.PAVI_SUBORGID', '=', 'HS_SUOR_SUBORG.SUOR_BRANCHID')
            ->select('GENINSCOUNT.*', 'HS_SUOR_SUBORG.SUOR_BRANCHNAME')
            ->where('VISITDATEAD', $nepaliDates['todayad'])
            ->get();
        $docvisits = DB::connection('h')
            ->table('VW_CL_OPDPATIENTVISITEDLIST')
            ->select('docname', DB::raw('count(patientid) as patient_count'))
            ->where('VISITDATE', $nepaliDates['todaybs'])
            ->where('suborgid', $suborgid)
            ->groupBy('docname')
            ->orderBy('patient_count', 'desc')
            ->get();
        $admissions = Admissions::select([
            'CURDEPNAME as dept',
            DB::raw("SUM(CASE WHEN SCHEMENAME = 'SOCIAL HEALTH INSURANCE' THEN 1 ELSE 0 END) as Insurance"),
            DB::raw("SUM(CASE WHEN SCHEMENAME != 'SOCIAL HEALTH INSURANCE' THEN 1 ELSE 0 END) as General"),
            DB::raw("SUM(CASE WHEN CAMPID IS NOT NULL THEN 1 ELSE 0 END) as CAMP"),
            DB::raw("SUM(CASE WHEN CAMPID IS NULL THEN 1 ELSE 0 END) as hospital"),
            DB::raw('COUNT(INPATIENTIDSTR) as count'),
        ])
            ->where('ISDISCHARGED', 'N')
            ->groupBy('CURDEPNAME')
            ->get();
        $totaladmissions = $admissions->sum('count');
        $totalinsurance = $admissions->sum('insurance');
        $totalgeneral = $admissions->sum('general');
        $totalcamp = $admissions->sum('camp');
        $totalhospitaladmissions = $admissions->sum('hospital');

        $otbooks = Otbook::select('OTBO_SURGERYTYPE as Surgerytype', DB::raw('count(OTBO_PATIENTID) as count'))->where('OTBO_PLANDATE', $nepaliDates['todaybs'])->groupby('OTBO_SURGERYTYPE')->orderby('count', 'desc')->get();
        $otcount = Otbook::select(DB::raw('count(OTBO_PATIENTID) as count'))->where('OTBO_PLANDATE', $nepaliDates['todaybs'])->first();
        // return($otcount);

        return view('dashboard', compact( 'totaladmissions', 'totalinsurance', 'totalgeneral', 'totalcamp', 'totalhospitaladmissions', 'otcount', 'docvisits',   'pcounts', 'intranetdatas', 'internetdatas',  'emails', 'extensions', 'otbooks', 'admissions'));
    }
    public function guides()
    {
        $hvideos = Download::where('type', 'hvideo')->get();
        $svideos = Download::where('type', 'svideo')->get();
        $files = Download::where('type', 'file')->get();
        $docs = Download::where('type', 'doc')->get();
        return view('guides', compact('files', 'svideos', 'hvideos', 'docs'));
    }
    public function changepwd()
    {
        return view('changepassword');
    }

    public function apitest()
    {
        $cred = Api::all();
        return ($cred);

        return view('apitest');
    }

    public function calander()
    {
        return view('calander');
    }
}
