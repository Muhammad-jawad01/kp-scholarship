<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Helpers\Helper;
use App\Models\Districts;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class DistrictController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:district-list|district-create|district-edit|district-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:district-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:district-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:district-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = Districts::orderBy('id', 'desc')->paginate(20);
        return view('content.apps.district.index', compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.apps.district.create');
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
            'name' => 'required'
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

        $data = $request->except('_token');
        $district = Districts::create($data);
        if ($district) {
            Alert::toast("District Created Successfully", 'success');
            return redirect()->route('districts.index');
        } else {
            Alert::toast('Fail to create new District', 'error');
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
        $district = Districts::findOrFail($id);
        return view('content.apps.district.edit', compact('district'));
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
        $validations = Validator::make($request->except('_token'), [
            'name' => 'required|unique:districts,name,' . $id
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
        $district = Districts::where('id', $id)->update($data);
        if ($district) {
            Alert::toast("District Updated Successfully", 'success');
            return redirect()->route('districts.index');
        } else {
            Alert::toast('Fail to update District', 'error');
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
        Districts::where('id', $id)->delete();
        Alert::toast("District Deleted Successfully", 'success');
        return redirect()->route('districts.index');
    }
}
