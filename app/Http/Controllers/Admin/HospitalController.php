<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hospital;
use Yajra\DataTables\DataTables;
use App\Helpers\Helper;
use App\Models\District;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class HospitalController extends Controller
{


    function __construct()
    {
        $this->middleware('permission:hospital-list|hospital-create|hospital-edit|hospital-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:hospital-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:hospital-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:hospital-delete', ['only' => ['destroy']]);
    }


    public function list(Request $request)
    {

        $model = Hospital::query();
        return DataTables::of($model)->toJson();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $hospitals = Hospital::paginate(20);
        return view('content.apps.hospital.index', compact('hospitals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $districts = District::where('disable_enable_status', 1)->pluck('district_name', 'district_id');
        return view('content.apps.hospital.create', compact('districts'));
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
            'category' => 'required',
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
        unset($data['_token']);
        $data['status'] = Helper::switchToDb($request->status);

        $hospital = Hospital::Create($data);
        $hospital->addAllMediaFromTokens();
        if ($hospital) {
            Alert::toast("Hospital Created Successfully", 'success');
            return redirect()->route('hospitals.index');
        } else {
            Alert::toast('Fail to crate new Hospital', 'error');
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
        $hospital = Hospital::findorfail($id);
        $districts = District::where('disable_enable_status', 1)->pluck('district_name', 'district_id');
        return view('content.apps.hospital.edit', compact('hospital', 'districts'));
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
        $validator = Validator::make($request->all(), [
            'category' => 'required',
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
        unset($data['_token']);
        unset($data['_method']);
        unset($data['media']);
        $data['status'] = Helper::switchToDb($request->status);
        $Hospital = Hospital::where('id', $id)->update($data);

        $hospital = Hospital::find($id);
        $hospital->addAllMediaFromTokens();
        if ($Hospital) {
            Alert::toast("Hospital Upated Successfully", 'success');
            return redirect()->route('hospitals.index');
        } else {
            Alert::toast('Fail to crate new Hospital', 'error');
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
        Hospital::where('id', $id)->delete();
        Alert::toast("Hospital Deleted Successfully", 'success');
        return redirect()->route('hospitals.index');
    }
}
