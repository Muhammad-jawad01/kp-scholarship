<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\College;
use App\Models\CollegeDetails;
use Yajra\DataTables\DataTables;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class CollegeDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $collegeDetails = CollegeDetails::where('college_id', 1)->paginate(10);
        return view('content.apps.college-details.index', ['collegeDetails' => $collegeDetails]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colleges = College::all();
        return view('content.apps.college-details.create', ['colleges' => $colleges]);
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


        $collegeId = $request->college_id;
        $data = $request->except('_token');
        $data['college_id'] = $collegeId;
        $collegeDetail = CollegeDetails::Create($data);
        if ($collegeDetail) {
            Alert::toast("College Detail Created Successfully", 'success');
            return redirect()->route('college-details.show', [$collegeId]);
        } else {
            Alert::toast('Fail to create new College Detail', 'error');
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
        $this->collegeId = $id;
        //$colleges = College::all();
        $collegeDetails = CollegeDetails::where('college_id', $id)->paginate(10);
        return view('content.apps.college-details.index', ['collegeDetails' => $collegeDetails]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $colleges = College::all();
        $collegeDetail = CollegeDetails::findOrFail($id);
        return view('content.apps.college-details.edit', ['colleges' => $colleges, 'collegeDetail' => $collegeDetail]);
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

        $collegeDetail = CollegeDetails::where('id', $id)->update($request->except('_method', '_token'));
        if ($collegeDetail) {
            Alert::toast("College Detail Updated Successfully", 'success');
            return redirect()->route('college-details.show', [$id]);
        } else {
            Alert::toast('Fail to update College Detail', 'error');
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
        CollegeDetails::where('id', $id)->delete();
        Alert::toast("College Detail Deleted Successfully", 'success');
        return redirect()->route('college-details.index');
    }
}
