<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\University;
use App\Models\Districts;
use Yajra\DataTables\DataTables;
use App\Helpers\Helper;
use App\Models\UniversityDetails;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class UniversityController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:download-list|download-create|download-edit|download-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:download-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:download-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:download-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function list(Request $request)
    {

        $model = University::query();
        return DataTables::of($model)->toJson();
    }
    
     public function index()
    {
        $universities = University::paginate(20);
        return view('content.apps.university.index', compact('universities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts = Districts::all();
        return view('content.apps.university.create', compact('districts'));
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
            'name' => 'required|unique:universities,name',
            'address' => 'required',
            'phone' => 'required|unique:universities,phone'
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


        $university = University::Create($data);
        $university->addAllMediaFromTokens();
        if ($university) {
            Alert::toast("University Created Successfully", 'success');
            return redirect()->route('universities.index');
        } else {
            Alert::toast('Fail to create new University', 'error');
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
        return redirect()->action([UniversityDetailsController::class, 'show'], ['id']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $districts = Districts::get(['id','name']);
        $university = University::where('id', $id)->firstOrFail();
        return view('content.apps.university.edit', compact('districts','university'));
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
            'name' => 'required|unique:universities,name,'. $id,
            'address' => 'required',
            'phone' => 'required|unique:universities,phone,' . $id
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


        $university = University::where('id', $id)->update($data);
        $university = University::find($id);
        $university->addAllMediaFromTokens();
        if ($university) {
            Alert::toast("University Updated Successfully", 'success');
            return redirect()->route('universities.index');
        } else {
            Alert::toast('Fail to update University', 'error');
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
        University::where('id', $id)->delete();
        Alert::toast("University Deleted Successfully", 'success');
        return redirect()->route('universities.index');
    }
}
