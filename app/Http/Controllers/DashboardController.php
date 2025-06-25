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
use App\Models\Leave;
use App\Models\News;
use App\Models\Otbook;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Pratiksh\Nepalidate\Facades\NepaliDate;
use RealRashid\SweetAlert\Facades\Alert;

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
        $docvisits = DB::connection('h')
            ->table('VW_CL_OPDPATIENTVISITEDLIST')
            ->select('docname', DB::raw('count(patientid) as patient_count'))
            ->where('VISITDATE', $nepaliDates['todaybs'])
            ->where('suborgid', $suborgid)
            ->groupBy('docname')
            ->orderBy('patient_count', 'desc')
            ->get();
        $pcounts = Hospital::leftJoin('HS_SUOR_SUBORG', 'GENINSCOUNT.PAVI_SUBORGID', '=', 'HS_SUOR_SUBORG.SUOR_BRANCHID')
            ->select('GENINSCOUNT.*', 'HS_SUOR_SUBORG.SUOR_BRANCHNAME')
            ->where('VISITDATEAD', $nepaliDates['todayad'])
            ->orderby('newgen', 'desc')
            ->get();
        $tdayleaves = DB::connection('pis')
            ->table('leaverequest as LR')
            ->join('Staff as S', 'S.staffid', '=', 'LR.staffid')
            ->leftJoin('Pisdepartment as PD', 'S.Departmentid', '=', 'PD.DEPARTMENTID')
            ->leftJoin('Staffgroup as SG', 'S.STAFFGROUPID', '=', 'SG.STAFFGROUPID')
            ->where('LR.status', '=', 'N')
            // Get leaves that *include* today:
            ->where('LR.FROMDATEAD', '=', $nepaliDates['todayad'])
            ->orwhere('LR.TODATEAD', '=', $nepaliDates['todayad'])
            ->select([
                'S.Staffname',
                'PD.DEPARTMENTNAME',
                'LR.FROMDATEVS as RequestFromDateVs',
                'LR.FROMDATEAD as RequestFromDateAD',
                'LR.TODATEVS as RequestToDateVs',
                'LR.TODATEAD as RequestToDateAD',
            ])
            ->orderBy('LR.TrandateVs')
            ->get();
        $tomleaves = DB::connection('pis')
            ->table('leaverequest as LR')
            ->join('Staff as S', 'S.staffid', '=', 'LR.staffid')
            ->leftJoin('Pisdepartment as PD', 'S.Departmentid', '=', 'PD.DEPARTMENTID')
            ->leftJoin('Staffgroup as SG', 'S.STAFFGROUPID', '=', 'SG.STAFFGROUPID')
            ->where('LR.status', '=', 'N')
            // Get leaves that *include* tomorrow:
            ->where('LR.FROMDATEAD', '=', $nepaliDates['tomorrowad'])
            ->orwhere('LR.TODATEAD', '=', $nepaliDates['tomorrowad'])
            ->select([
                'S.Staffname',
                'PD.DEPARTMENTNAME',
                'LR.FROMDATEVS as RequestFromDateVs',
                'LR.FROMDATEAD as RequestFromDateAD',
                'LR.TODATEVS as RequestToDateVs',
                'LR.TODATEAD as RequestToDateAD',
            ])
            ->orderBy('LR.TrandateVs')
            ->get();
        $uregcounts = DB::connection('h')
            ->table('hs_pavi_patientvisit')
            ->leftJoin('hs_usma_usermain', 'hs_pavi_patientvisit.PAVI_DATAPOSTBY', '=', 'hs_usma_usermain.USMA_USERID')
            ->leftJoin('hs_dept_department', 'hs_pavi_patientvisit.pavi_depid', '=', 'hs_dept_department.DEPT_DEPID')
            ->leftJoin('HS_SUOR_SUBORG', 'hs_pavi_patientvisit.PAVI_SUBORGID', '=', 'HS_SUOR_SUBORG.SUOR_ID')
            ->where('hs_pavi_patientvisit.pavi_visitdate', $nepaliDates['todaybs'])
            ->whereIn('hs_pavi_patientvisit.pavi_depid', [1, 2, 13])
            ->where('HS_SUOR_SUBORG.SUOR_BRANCHNAME', 'BEH')
            ->groupBy('hs_usma_usermain.USMA_FULLNAME') // Corrected GROUP BY
            ->select(
                'hs_usma_usermain.USMA_FULLNAME',
                DB::raw("COUNT(CASE WHEN PAVI_PATIENTCATEGORY = 'INS' THEN 1 END) AS Ins"),
                DB::raw("COUNT(CASE WHEN PAVI_PATIENTCATEGORY = 'GEN' THEN 1 END) AS Gen"),
                DB::raw("SUM(CASE WHEN PAVI_VISITCOUNT >= 2 THEN 1 ELSE 0 END) AS Old"), // Corrected Old/New
                DB::raw("SUM(CASE WHEN PAVI_VISITCOUNT = 1 THEN 1 ELSE 0 END) AS New")  // Corrected Old/New
            )
            ->get();
        // return($uregcounts);

        $uploaded = DB::connection('h')
            ->table('hs_incf_insuranceclaimfile as h')
            ->leftJoin('hs_usma_usermain as u', 'h.INCF_UPLOADEDBY', '=', 'u.usma_userid')
            ->whereIn('h.INCF_CLAIMCODE', function ($query) {
                $query->select('CLAIM_CODE')
                    ->from('VW_HS_INSPATIENTDETAILINFO')
                    ->whereBetween('VISITDATE', ['2081/07/01', '2081/12/28']);
            })
            ->whereBetween('h.incf_uploadeddate', ['2082/02/30', '2082/03/21'])
            ->groupBy('u.usma_fullname')
            ->select(
                'u.USMA_FULLNAME',
                DB::raw('COUNT(DISTINCT h.incf_claimcode) as distinct_claim_count')
            )
            ->orderBy('distinct_claim_count', 'desc')
            ->get();
        // return($uploaded);
        // $tdyuploaded = DB::connection('h')
        //     ->table('hs_incf_insuranceclaimfile as h')
        //     ->leftJoin('hs_usma_usermain as u', 'h.INCF_UPLOADEDBY', '=', 'u.usma_userid')
        //     ->where('h.incf_uploadeddate', '=', $nepaliDates['todaybs'])
        //     ->where('INCF_CREATEDDATE','=',)
        //     ->groupBy('u.usma_fullname')
        //     ->select(
        //         'u.USMA_FULLNAME',
        //         DB::raw('COUNT(DISTINCT h.incf_claimcode) as distinct_claim_count')
        //     )
        //     ->orderBy('distinct_claim_count', 'desc')
        //     ->get();
        $medentered = DB::connection('h')
            ->table('JS_MEDIRECORD')
            ->leftJoin('hs_usma_usermain', 'ENTEREDBY', '=', 'USMA_USERID')
            ->where('visitdate', '=', $nepaliDates['todaybs'])
            ->where('SUOR_BRANCHNAME', '=', 'BEH')
            ->groupBy('usma_username', 'suor_branchname')
            ->select(
                'usma_username',
                'suor_branchname as branch',
                DB::raw('COUNT(DISTINCT patientid) as patient_count')
            )
            ->get();
        return view('dashboard', compact('uploaded', 'medentered', 'uregcounts', 'tdayleaves', 'tomleaves', 'docvisits', 'pcounts', 'intranetdatas', 'internetdatas',  'emails', 'extensions'));
    }
    public function admindashboard()
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
        return view('admindashboard', compact('totaladmissions', 'totalinsurance', 'totalgeneral', 'totalcamp', 'totalhospitaladmissions', 'otcount', 'docvisits',   'pcounts', 'intranetdatas', 'internetdatas',  'emails', 'extensions', 'otbooks', 'admissions'));
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
        $cred = Api::find(1);
        // dd($cred->url); // "dd" = dump and die
        // dd($cred->username); // "dd" = dump and die
        // dd($cred->password); // "dd" = dump and die
        // dd($cred->remoteuser); // "dd" = dump and die
        // dd($cred->path1); // "dd" = dump and die
        if (!$cred) {
            return response()->json(['error' => 'API credentials not found'], 404);
        }

        $fullUrl = $cred->url . $cred->path1;

        // Start timer
        $startTime = microtime(true);

        // Perform API request
        $response = Http::withBasicAuth($cred->username, $cred->password)
            ->withHeaders([
                'Remote-User' => $cred->remoteuser,
            ])
            ->get($fullUrl);

        // End timer
        $endTime = microtime(true);

        // Calculate duration in milliseconds
        $totalMilliseconds = ($endTime - $startTime) * 1000;

        // Break down into min/sec/ms
        $minutes = floor($totalMilliseconds / 60000);
        $seconds = floor(($totalMilliseconds % 60000) / 1000);
        $milliseconds = round($totalMilliseconds % 1000);

        $responseTimeFormatted = "{$minutes} min {$seconds} sec {$milliseconds} ms";
        $data = $response->json();

        // Handle success/failure response
        $data = $response->json(); // This is the top-level associative array

        if (
            $response->successful() &&
            isset($data['entries']) &&
            is_array($data['entries']) &&
            isset($data['entries'][0])
        ) {
            $first = $data['entries'][0];
            $code = $first['Code'] ?? 'N/A';
            $name = $first['Name'] ?? 'N/A';

            Alert::success(
                '✅ API Success',
                "Code: $code Name: $name Response Time: $responseTimeFormatted "
            )
                ->persistent();
        } else {
            Alert::error(
                '❌ API Failed',
                "Code: $code Name: $name Response Time: $responseTimeFormatted "
            )
                ->persistent();
        }

        return redirect()->back();

        return redirect()->back();
    }

    public function calander()
    {
        return view('calander');
    }
}
