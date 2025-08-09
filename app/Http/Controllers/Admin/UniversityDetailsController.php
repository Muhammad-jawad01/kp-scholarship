<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UniversityDetails;
use App\Models\University;
use Yajra\DataTables\DataTables;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class UniversityDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $universities = University::all();
        return view('content.apps.university-details.create', ['universities' => $universities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_offered' => 'required',
            'duration' => 'required',
            'fee' => 'required'
        ]);


        if ($validator->fails()) {
            $errors = $validator->errors();
            $errorDisplay = "";
            foreach ($errors->messages() as $key => $error) {
                $errorDisplay = $errorDisplay . '<br>' . $error[0];
            }
            Alert::toast($errorDisplay, 'error')->timerProgressBar();
            return redirect()->back();
        }


        $universityId = $request->university_id;
        $universityDetail = UniversityDetails::Create($request->except('_token'));
        if ($universityDetail) {
            Alert::toast("University Detail Created Successfully", 'success');
            return redirect()->route('university-details.show', [$universityId]);
        } else {
            Alert::toast('Fail to create new University Detail', 'error');
            return redirect()->back();
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
        $universities = University::all();
        $universityDetails = UniversityDetails::where('university_id', $id)->paginate(10);
        return view('content.apps.university-details.index', ['universities' => $universities, 'universityDetails' => $universityDetails]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $universities = University::all();
        $universityDetail = UniversityDetails::findOrFail($id);
        return view('content.apps.university-details.edit', ['universities' => $universities, 'universityDetail' => $universityDetail]);
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
        // $validator = Validator::make($request->except('_method', '_token'), [
        //     'couse_offered' => 'required',
        //     'duration' => 'required',
        //     'fee' => 'required'
        // ]);


        // if ($validator->fails()) {
        //     $errors = $validator->errors();
        //     $errorDisplay = "";
        //     foreach ($errors->messages() as $key => $error) {
        //         $errorDisplay = $errorDisplay . '<br>' . $error[0];
        //     }
        //     Alert::toast($errorDisplay, 'error')->timerProgressBar();
        //     return redirect()->back();
        // }

        $universityDetail = UniversityDetails::where('id', $id)->update($request->except('_method', '_token'));
        if ($universityDetail) {
            Alert::toast("University Detail Updated Successfully", 'success');
            return redirect()->route('university-details.show', [$id]);
        } else {
            Alert::toast('Fail to update University Detail', 'error');
            return redirect()->back();
        }

        //return $request->except('_method', '_token');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UniversityDetails::where('id', $id)->delete();
        Alert::toast("University Detail Deleted Successfully", 'success');
        return redirect()->route('university-details.show', [$id]);
    }
}
