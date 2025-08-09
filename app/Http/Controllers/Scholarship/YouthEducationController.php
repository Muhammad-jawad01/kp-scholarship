<?php

namespace App\Http\Controllers\Scholarship;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\YouthEducation;
use App\Models\DegreeCertificate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class YouthEducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Make it dynamic
        $youth_name = "Salman Qazi";
        // $youth_education = YouthEducation::leftJoin('degree_certificates', 'degree_certificates.id', 'youth_education.degree_certificate_id')
        //     ->where('youth_education.youth_id', 2)
        //     ->select('youth_education.*', 'degree_certificates.name')
        //     ->get();
        return view('youth.youth-education.index', compact('youth_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $youth_name = 'Salman Qazi';
        $degrees_certificates = DegreeCertificate::all();
        return view('youth.youth-education.create', compact('youth_name', 'degrees_certificates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validations = Validator::make($request->all(), [
            'degree_certificate' => 'required',
            'university_board' => 'required',
            'obtained_marks' => 'required|numeric',
            'total_marks' => 'required|numeric',
            'percentage' => 'required'
        ]);

        if ($validations->fails()) {
            return redirect()->back()->withInput()->withErrors($validations->errors());
        } else {
            $data = $request->except('_token', 'degree_certificate');
            $data['youth_id'] = 2;
            $data['degree_certificate_id'] = $request->degree_certificate;
            $youth_education = DB::table('youth_education')->insert($data);
            if ($youth_education) {
                return redirect()->route('education.index');
            } else {
                //Show error message
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $youth_name = 'Salman Qazi';
        $degrees_certificates = DegreeCertificate::all();
        $youth_education = YouthEducation::where('id', $id)->get();
        return view('youth.youth-education.edit', compact('youth_name', 'degrees_certificates', 'youth_education'));
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
        return $request->all();
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

    // ajax request
    public function addEducation(Request $request)
    {

        $data = $request->all();


        $data['user_id'] = \Auth::User()->id;
        unset($data['id']);
        $isNew = true;
        if ($request->id == null) {
            $isNew = true;
            $education = YouthEducation::create($data);
            $education->degree = $education->getDegreeAttribute();
        } else {
            // update record
            //$name = '';
            $education = YouthEducation::where('id', $request->id)->update($data);
            $education = YouthEducation::find($request->id);
            $education->degree = $education->getDegreeAttribute();
            $isNew = false;
        }

        if ($education) {
            $response = ['response' => 'success', 'education' => $education, 'isNew' => $isNew];
        } else {
            $response = ['response' => 'fail', 'education' => null, 'isNew' => $isNew];
        }

        return response()->json($response);
    }

    public function removeEducation(Request $request)
    {
        $education = YouthEducation::destroy($request->id);
        if ($education) {
            $response = ['response' => 'success'];
        } else {
            $response = ['response' => 'fail'];
        }

        return response()->json($response);
    }

    public function editEducation($id)
    {
        $education = YouthEducation::where(['user_id' => \Auth::User()->id, 'id' => $id])->first();
        if ($education) {
            $response = ['response' => 'success', 'education' => $education];
        } else {
            $response = ['response' => 'fail', 'education' => null];
        }
        return response()->json($response);
    }
}
