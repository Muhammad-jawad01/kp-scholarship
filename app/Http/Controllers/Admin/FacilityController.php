<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\Districts;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class FacilityController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:facility-list|facility-create|facility-edit|facility-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:facility-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:facility-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:facility-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facilities = Facility::leftJoin('districts', 'districts.id', '=', 'facilities.district_id')
                      ->select('facilities.*', 'districts.name')
                      ->OrderBy('id', 'desc')
                      ->paginate(20);
        return view('content.apps.facilities.index', compact('facilities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts = Districts::all(['id', 'name']);
        return view('content.apps.facilities.create', compact('districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validations = Validator::make($request->except('_token'), [
            'facility' => 'required|unique:facilities,facility',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'address' => 'required',
            'phone' => 'required|unique:facilities,phone'
        ]);

        if ($validations->fails()) {
            $errors = $validations->errors();
            $errorDisplay = "";
            foreach ($errors->messages() as $key => $error) {
                $errorDisplay = $errorDisplay . '<br>' . $error[0];
            }
            Alert::toast($errorDisplay, 'error')->timerProgressBar();
            return redirect()->back();
        }

        $district_id = $request->district;
        $data = $request->except('_token');
        $data['district_id'] = $district_id;
        $data['is_deleted'] = $request->status ? 0 : 1;
        unset($data['status']);
        $facility = Facility::Create($data);
        $facility->addAllMediaFromTokens();
        if ($facility) {
            Alert::toast("Facility Created Successfully", 'success');
            return redirect()->route('facilities.index');
        } else {
            Alert::toast('Fail to create new Facility', 'error');
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
        $districts = Districts::all(['id', 'name']);
        $facility = Facility::findOrFail($id);
        $districts = Districts::where('id', '<>', $facility->district_id)->get(['id', 'name']);
        $district = Districts::find($facility->district_id);
        return view('content.apps.facilities.edit', compact('districts', 'facility', 'district'));
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
        $validations = Validator::make($request->except('_token', '_method'), [
            'facility' => 'required|unique:facilities,facility,' . $id,
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'address' => 'required',
            'phone' => 'required|unique:facilities,phone,' . $id
        ]);

        if ($validations->fails()) {
            $errors = $validations->errors();
            $errorDisplay = "";
            foreach ($errors->messages() as $key => $error) {
                $errorDisplay = $errorDisplay . '<br>' . $error[0];
            }
            Alert::toast($errorDisplay, 'error')->timerProgressBar();
            return redirect()->back();
        }

        $data = $request->except('_token', '_method');
        $data['is_deleted'] = $request->status ? 0 : 1;
        unset($data['status']);
        unset($data['media']);
        $facility = Facility::where('id', $id)->update($data);
        if ($facility) {
            $facility = Facility::find($id);
            $facility->addAllMediaFromTokens();
            Alert::toast("Facility Updated Successfully", 'success');
            return redirect()->route('facilities.index');
        } else {
            Alert::toast('Fail to Update Facility', 'error');
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
        Facility::where('id', $id)->delete();
        Alert::toast("Facility Deleted Successfully", 'success');
        return redirect()->route('facilities.index');
    }

    public function facility_details($id)
    {
        $facility = Facility::leftJoin('districts', 'districts.id', '=', 'facilities.district_id')
                    ->where('facilities.id', $id)
                    ->select('facilities.*', 'districts.name')
                    ->first();

        return view('content.apps.facilities.details', compact('facility'));
    }
}
