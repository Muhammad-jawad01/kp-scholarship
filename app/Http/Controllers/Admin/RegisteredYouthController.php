<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Districts;
use App\Models\YouthEducation;
use App\Models\YouthExperience;
use PDF;

class RegisteredYouthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registered_youth = User::leftJoin('districts', 'districts.id', '=', 'users.domicile_district_id')
                            ->where('users.type', '=', 'youth')
                            ->select('users.*', 'districts.name as district')
                            ->orderBy('id', 'desc')
                            ->paginate(10);
        return view('content.apps.registered-youth.index', compact('registered_youth'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $youth = User::leftJoin('districts', 'districts.id', '=', 'users.domicile_district_id')
                ->where([['users.type', '=', 'youth'],
                        ['users.id', $id]])
                ->select('users.*', 'districts.name as district')
                ->firstorfail();
        $experiences = YouthExperience::where('user_id', $id)->get();
        $educations = YouthEducation::Join('degree_certificates', 'degree_certificates.id', '=', 'youth_education.degree_certificate_id')
                    ->where(['youth_education.user_id' => $id])
                    ->select('youth_education.*', 'degree_certificates.name as degree')
                    ->get();

        return view('content.apps.registered-youth.details', compact('youth', 'experiences', 'educations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // Search
    public function search(Request $request)
    {
        $_gender = $request->gender;
        $_religion = $request->religion;
        $_disabilityStatus = $request->disability_status;

        if($_gender == null && $_religion == null && $_disabilityStatus == null)
        {
            $registered_youth = User::leftJoin('districts', 'districts.id', '=', 'users.domicile_district_id')
                                ->where('users.type', 'youth')
                                ->select('users.*', 'districts.name as district')
                                ->orderBy('id', 'desc')
                                ->get();

            $request->session()->put('register_youth', $registered_youth);
            return view('content.apps.registered-youth.index', compact('registered_youth'));
                                
        }
        else if($_gender != null && $_religion == null && $_disabilityStatus == null)
        {
            $registered_youth = User::leftJoin('districts', 'districts.id', '=', 'users.domicile_district_id')
                                ->where([
                                    ['users.type' , 'youth'],
                                    ['users.gender', $_gender]
                                ])
                                ->select('users.*', 'districts.name as district')
                                ->orderBy('id', 'desc')
                                ->get();

            $request->session()->put('register_youth', $registered_youth);
            return view('content.apps.registered-youth.index', compact('registered_youth'));
        }
        else if($_gender != null && $_religion != null && $_disabilityStatus == null)
        {
            $registered_youth = User::leftJoin('districts', 'districts.id', '=', 'users.domicile_district_id')
                                ->where([
                                    ['users.type' , 'youth'],
                                    ['users.gender', $_gender],
                                    ['users.religion', $_religion]
                                ])
                                ->select('users.*', 'districts.name as district')
                                ->orderBy('id', 'desc')
                                ->get();
                                $request->session()->put('register_youth', $registered_youth);
                                return view('content.apps.registered-youth.index', compact('registered_youth'));
        }
        else if($_gender != null && $_religion == null && $_disabilityStatus != null)
        {
            $registered_youth = User::leftJoin('districts', 'districts.id', '=', 'users.domicile_district_id')
                                ->where([
                                    ['users.type' , 'youth'],
                                    ['users.gender', $_gender],
                                    ['users.disability_status', $_disabilityStatus]
                                ])
                                ->select('users.*', 'districts.name as district')
                                ->orderBy('id', 'desc')
                                ->get();
            $request->session()->put('register_youth', $registered_youth);
            return view('content.apps.registered-youth.index', compact('registered_youth'));
        }
        else if($_gender == null && $_religion != null && $_disabilityStatus == null)
        {
            $registered_youth = User::leftJoin('districts', 'districts.id', '=', 'users.domicile_district_id')
                                ->where([
                                    ['users.type' , 'youth'],
                                    ['users.religion', $_religion],
                                ])
                                ->select('users.*', 'districts.name as district')
                                ->orderBy('id', 'desc')
                                ->get();
            $request->session()->put('register_youth', $registered_youth);
            return view('content.apps.registered-youth.index', compact('registered_youth'));
        }
        else if($_gender == null && $_religion != null && $_disabilityStatus != null)
        {
            $registered_youth = User::leftJoin('districts', 'districts.id', '=', 'users.domicile_district_id')
                                ->where([
                                    ['users.type' , 'youth'],
                                    ['users.religion', $_religion],
                                    ['users.disability_status', $_disabilityStatus]
                                ])
                                ->select('users.*', 'districts.name as district')
                                ->orderBy('id', 'desc')
                                ->get();
            $request->session()->put('register_youth', $registered_youth);
            return view('content.apps.registered-youth.index', compact('registered_youth'));
        }
        else if($_gender == null && $_religion == null && $_disabilityStatus != null)
        {
            $registered_youth = User::leftJoin('districts', 'districts.id', '=', 'users.domicile_district_id')
                                ->where([
                                    ['users.type' , 'youth'],
                                    ['users.disability_status', $_disabilityStatus]
                                ])
                                ->select('users.*', 'districts.name as district')
                                ->orderBy('id', 'desc')
                                ->get();
            $request->session()->put('register_youth', $registered_youth);
            return view('content.apps.registered-youth.index', compact('registered_youth'));
            
        }
        else
        {
            $registered_youth = User::leftJoin('districts', 'districts.id', '=', 'users.domicile_district_id')
                                ->where([
                                    ['users.type' , 'youth'],
                                    ['users.gender', $_gender],
                                    ['users.religion', $_religion],
                                    ['users.disability_status', $_disabilityStatus]
                                ])
                                ->select('users.*', 'districts.name as district')
                                ->orderBy('id', 'desc')
                                ->get();
            $request->session()->put('register_youth', $registered_youth);
            return view('content.apps.registered-youth.index', compact('registered_youth'));
            
        }
    }

    public function getReport(Request $request)
    {
        $register_youth = $request->session()->get('register_youth');
        $pdf = PDF::loadView('content.apps.registered-youth.report', ['register_youth' => $register_youth]);
        return $pdf->download('registered-youth-report.pdf');
    }
}
