<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Expense;
use App\Models\University;
use App\Models\Family_info;
use Illuminate\Http\Request;
use App\Models\Scholarship_assets;
use App\Models\Applicant_education;
use App\Http\Controllers\Controller;
use App\Models\Scholarship_documents;
use App\Models\ScholarshipApplications;
use App\Models\Applicant_financial_record;
use App\Exports\ReportExport;
use Illuminate\Support\Collection;


use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $universities = University::all();
        $report = null;
        if (request()->has('status')) {
            $status = request()->status;
            $uni_id = request()->uni_id;
            $applied_year = request()->applied_year;
            $cond = ['university_id' => $uni_id, 'applied_year' => $applied_year, 'status' => $status];
            $report = ScholarshipApplications::where($cond)->paginate(10);
            if (request()->action == 'download') {
                // return redirect()->route('download.excel', ['report' => $report]);

                return redirect()->route('download.excel', [
                    'status' => $status,
                    'uni_id' => $uni_id,
                    'applied_year' => $applied_year,
                ]);
            }
        }
        if (auth()->user() && auth()->user()->hasRole('uni_admin')) {
            $universities = $universities->where('id', auth()->user()->university_id);
        }

        return view('content.apps.report.index', compact('universities', 'report'));
    }
    public function index2()
    {
        $report = null;
        if (request()->has('user_cnic')) {
            $nic = request()->user_cnic;
            $user = User::where('nic',$nic)->first();}
            $report =$user->scholarshipApplications;
            $user_edu = Applicant_education::whereUserId($user->id)->get();
            $expense = Expense::whereUserId($user->id)->first();
            $applicant_fn_r = Applicant_financial_record::where(['user_id' => $user->id, 'expense_id' => $expense->id ?? 0])->get();
            $scholarship_assets = Scholarship_assets::where(['user_id' => $user->id, 'expense_id' => $expense->id ?? 0])->get();
            $family_info = Family_info::whereUserId($user->id)->first();
            $scholarship_documents = Scholarship_documents::whereUserId($user->id)->first();
            $data['user_edu'] = $user_edu;
            $data['expense'] = $expense;
            $data['applicant_fn_r'] = $applicant_fn_r;
            $data['scholarship_documents'] = $scholarship_documents;
            $data['scholarship_assets'] = $scholarship_assets;
            $data['family_info'] = $family_info;
            $mediaArray = [
            'last_fee' => $scholarship_documents->getMedia('last_fee'),
            'agreement_rent' => $scholarship_documents->getMedia('agreement_rent'),
            'bills' => $scholarship_documents->getMedia('bills'),
            'income_slip' => $scholarship_documents->getMedia('income_slip'),
            'p_nic' => $scholarship_documents->getMedia('p_nic'),
            'applicant_nic' => $scholarship_documents->getMedia('applicant_nic'),
            'medical_bills' => $scholarship_documents->getMedia('medical_bills'),
            'applicant_img' => $scholarship_documents->getMedia('applicant_img'),
        ];
        return view('content.apps.report.show', compact('report', 'user', 'data', 'mediaArray'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function export(Request $request)
    {
        $status = $request->input('status');
        $uni_id = $request->input('uni_id');
        $applied_year = $request->input('applied_year');
        // $cond = ['university_id' => $uni_id, 'applied_year' => $applied_year, 'status' => $status];
                $cond = ['applied_year' => $applied_year, 'status' => $status];

        if (!empty($uni_id)) {
            $cond['university_id'] = $uni_id;
        }

        $report = ScholarshipApplications::where($cond)->get();
        $export = new ReportExport($report);

        return Excel::download($export, 'report.xlsx');
    }


    public function downloadExcel($report)
    {
        $reportData = [];

        // foreach ($report as $value) {
        //     $user = User::find($value->user_id);

        //     if (!$user) {
        //         continue; // Skip if the user is not found
        //     }
        //     $user_edu = Applicant_education::where('user_id', $value->user_id)->get();
        //     // $expense = Expense::where('user_id', $value->user_id)->first();
        //     // $applicant_fn_r = Applicant_financial_record::where('user_id', $value->user_id)->get();
        //     // $scholarship_assets = Scholarship_assets::where('user_id', $value->user_id)->get();
        //     // $family_info = Family_info::where('user_id', $value->user_id)->first();
        //     // $scholarship_documents = Scholarship_documents::where('user_id', $value->user_id)->first();
        //     $reportData[] = [
        //         'User' => $user->name ?? '',
        //         'Education' => $user_edu->toArray(),
        //         // 'Expense' => $expense ? $expense->toArray() : null,
        //         // 'Financial Records' => $applicant_fn_r->toArray(),
        //         // 'Scholarship Assets' => $scholarship_assets->toArray(),
        //         // 'Family Info' => $family_info ? $family_info->toArray() : null,
        //         // 'Scholarship Documents' => $scholarship_documents ? $scholarship_documents->toArray() : null,
        //     ];
        // }



        // $reportCollection = new Collection($expense);

        // $data = Charity::select("charity_name")->withCount(self::COINS)->where('venue_id', $id)->orderby('charity_name', 'desc')->get();
        // $res = $data->sortByDesc("coins_count");
        // return Excel::download(new CharityExport($res), 'charity_members.xlsx');



        return Excel::download(new ReportExport($report), 'report.xlsx');
    }



    public function create()
    {
        //
    }

    public function show($id)
    {
        $report = ScholarshipApplications::findorfail($id);
        $user = User::where('id', $report->user_id)->first();
        $user_edu = Applicant_education::whereUserId($report->user_id)->get();
        $expense = Expense::whereUserId($report->user_id)->first();
        $applicant_fn_r = Applicant_financial_record::where(['user_id' => $report->user_id, 'expense_id' => $expense->id ?? 0])->get();
        $scholarship_assets = Scholarship_assets::where(['user_id' => $report->user_id, 'expense_id' => $expense->id ?? 0])->get();
        $family_info = Family_info::whereUserId($report->user_id)->first();
        $scholarship_documents = Scholarship_documents::whereUserId($report->user_id)->first();
        $data['user_edu'] = $user_edu;
        $data['expense'] = $expense;
        $data['applicant_fn_r'] = $applicant_fn_r;
        $data['scholarship_documents'] = $scholarship_documents;
        $data['scholarship_assets'] = $scholarship_assets;
        $data['family_info'] = $family_info;
        $mediaArray = [
            'last_fee' => $scholarship_documents->getMedia('last_fee'),
            'agreement_rent' => $scholarship_documents->getMedia('agreement_rent'),
            'bills' => $scholarship_documents->getMedia('bills'),
            'income_slip' => $scholarship_documents->getMedia('income_slip'),
            'p_nic' => $scholarship_documents->getMedia('p_nic'),
            'applicant_nic' => $scholarship_documents->getMedia('applicant_nic'),
            'medical_bills' => $scholarship_documents->getMedia('medical_bills'),
            'applicant_img' => $scholarship_documents->getMedia('applicant_img'),
        ];
        return view('content.apps.report.show', compact('report', 'user', 'data', 'mediaArray'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //
    }
}
