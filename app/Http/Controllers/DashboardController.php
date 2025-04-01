<?php

namespace App\Http\Controllers;

use App\Models\company;
use App\Models\Download;
use App\Models\local;
use App\Models\email;
use App\Models\extensions;
use App\Models\Hospital;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Pratiksh\Nepalidate\Facades\NepaliDate;


class DashboardController extends Controller
{

    public function home()
    {
        $today=NepaliDate::create(\Carbon\Carbon::now())->toBS(); // 2078-4-21
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
        $newses = News::where('created_at','>=',now()->subdays(7))->get();
        return view('dashboard', compact('docvisits',   'pcounts','newses', 'intranetdatas', 'internetdatas',  'emails', 'extensions'));
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

        return view('apitest');
    }
}
