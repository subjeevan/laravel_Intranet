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
    {   $tdayengdate=Carbon::now();
        $tomengdate=Carbon::tomorrow();
        $today=NepaliDate::create($tdayengdate)->toBS(); // 2078-4-21
        $tomorrow = NepaliDate::create($tomengdate)->toBS();
        $ntoday = str_replace('-', '/', $today);
        $intranetdatas = local::where('type', 'intranet')->get();
        $internetdatas = local::where('type', 'internet')->get();
        $emails = email::all();
        $extensions = extensions::all();
        $date=$ntoday;
        $suborgid=1;
        $pcounts = Hospital::leftJoin('HS_SUOR_SUBORG', 'GENINSCOUNT.PAVI_SUBORGID', '=', 'HS_SUOR_SUBORG.SUOR_BRANCHID')
            ->select('GENINSCOUNT.*', 'HS_SUOR_SUBORG.SUOR_BRANCHNAME')
            ->get();
            $docvisits = DB::connection('h')
                ->table('VW_CL_OPDPATIENTVISITEDLIST')
                ->select('docname', DB::raw('count(patientid) as patient_count'))
                ->where('VISITDATE', $date)
                ->where('suborgid', $suborgid)
                ->groupBy('docname')
                ->orderBy('patient_count','desc')
                ->get();
        $admissions = Admissions::select([
                'CURDEPNAME as dept',
                DB::raw("SUM(CASE WHEN SCHEMENAME = 'SOCIAL HEALTH INSURANCE' THEN 1 ELSE 0 END) as Insurance"),
                DB::raw("SUM(CASE WHEN SCHEMENAME != 'SOCIAL HEALTH INSURANCE' THEN 1 ELSE 0 END) as General"),
                DB::raw("SUM(CASE WHEN CAMPID IS NOT NULL THEN 1 ELSE 0 END) as CAMP"),
                DB::raw("SUM(CASE WHEN CAMPID IS NULL THEN 1 ELSE 0 END) as HOSPITAL"),
                DB::raw('COUNT(INPATIENTIDSTR) as count'),
            ])
            ->where('ISDISCHARGED', 'N')
            ->groupBy('CURDEPNAME')
            ->get();

        $otbooks=Otbook::select('OTBO_SURGERYTYPE as Surgerytype',DB::raw('count(OTBO_PATIENTID) as count'))->where('OTBO_PLANDATE',$date)->groupby('OTBO_SURGERYTYPE')-> orderby('count','desc')->get();
        return view('dashboard', compact('docvisits',   'pcounts', 'intranetdatas', 'internetdatas',  'emails', 'extensions','otbooks','admissions'));
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
        $cred=Api::all();
        return($cred);

        return view('apitest');
    }

    public function calander(){
        return view('calander');
    }
}
