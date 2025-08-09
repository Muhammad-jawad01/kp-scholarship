<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Alert;
use Yajra\DataTables\DataTables;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert as SweetAlert;

class AlertController extends Controller
{


    function __construct()
    {
        $this->middleware('permission:alert-list|alert-create|alert-edit|alert-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:alert-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:alert-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:alert-delete', ['only' => ['destroy']]);
    }


    public function list(Request $request)
    {

        $model = Alert::query();
        return DataTables::of($model)->toJson();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $alerts = Alert::orderBy('id', 'desc')->paginate(20);
        return view('content.apps.alert.index', compact('alerts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.apps.alert.create');
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
            'title' => 'required',
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
        $data['status'] = Helper::switchToDb($request->status);
        unset($data['_token']);
        $alert = Alert::Create($data);
        if ($alert) {
            SweetAlert::toast("Alerts Created Successfully", 'success');
            return redirect()->route('alerts.index');
        } else {
            SweetAlert::toast('Fail to crate new Alerts', 'error');
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
        $alert = Alert::findorfail($id);
        return view('content.apps.alert.edit', compact('alert'));
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
            'title' => 'required',
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
        $data['status'] = Helper::switchToDb($request->status);
        unset($data['_token']);
        unset($data['_method']);

        $alert = Alert::where('id', $id)->update($data);
        if ($alert) {
            SweetAlert::toast("Alerts Upated Successfully", 'success');
            return redirect()->route('alerts.index');
        } else {
            SweetAlert::toast('Fail to crate new Alerts', 'error');
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
        Alert::where('id', $id)->delete();
        SweetAlert::toast("Alerts Deleted Successfully", 'success');
        return redirect()->route('alerts.index');
    }
}
