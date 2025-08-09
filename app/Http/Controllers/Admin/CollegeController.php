<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\College;
use App\Models\CollegeDetails;
use Yajra\DataTables\DataTables;
use App\Helpers\Helper;
use App\Models\Districts;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colleges = College::paginate(20);
        return view('content.apps.college.index', compact('colleges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts = Districts::all(['id', 'name']);
        return view('content.apps.college.create', compact('districts'));
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
            'name' => 'required|unique:colleges,name',
            'address' => 'required',
            'phone' => 'required|unique:colleges,phone'
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

        $data = $request->all();
        $data['district_id'] = $request->district;
        $data['organized_by'] = $request->organized_by;
        $data['is_deleted'] = $request->status == 1 ? false : true;
        $data['prospectus_path'] = 'xyz.pdf';
        unset($data['_token']);


        $college = College::Create($data);
        $college->addAllMediaFromTokens();
        if ($college) {
            Alert::toast("College Created Successfully", 'success');
            return redirect()->route('colleges.index');
        } else {
            Alert::toast('Fail to create new College', 'error');
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
        return redirect()->action([College::class, 'show'], ['id']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $districts = Districts::all(['id', 'name']);
        $college = College::findOrFail($id);
        return view('content.apps.college.edit', compact('districts','college'));
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
        $validator = Validator::make($request->except('_method'), [
            'name' => 'required|unique:colleges,name,'. $id,
            'address' => 'required',
            'phone' => 'required|unique:colleges,phone,' . $id
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

        $data = $request->except('_method');
        $data['district_id'] = $request->district_id;
        $data['organized_by'] = $request->organized_by;
        $data['is_deleted'] = $request->status == 1 ? false : true;
        $data['prospectus_path'] = 'xyz.pdf';
        unset($data['_token']);
        unset($data['media']);
        unset($data['status']);


        $college = College::where('id', $id)->update($data);
        $college = College::find($id);
        $college->addAllMediaFromTokens();
        if ($college) {
            Alert::toast("College Updated Successfully", 'success');
            return redirect()->route('colleges.index');
        } else {
            Alert::toast('Fail to update College', 'error');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        College::where('id', $id)->delete();
        Alert::toast("College Deleted Successfully", 'success');
        return redirect()->route('colleges.index');
    }
}
