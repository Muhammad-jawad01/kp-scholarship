<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DegreeCertificate;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class DegreeCertificatesController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:degree-certificate-list|degree-certificate-create|degree-certificate-edit|degree-certificate-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:degree-certificate-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:degree-certificate-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:degree-certificate-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $degree_certificates = DegreeCertificate::orderBy('id', 'desc')->paginate(20);
        return view('content.apps.degree-certificate.index', compact('degree_certificates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.apps.degree-certificate.create');
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

        $data = $request->except('_token', 'status');
        $data['status'] = $request->status ? true : false;
        $degree_certificate = DegreeCertificate::create($data);
        if ($degree_certificate) {
            Alert::toast("Degree/Certificate Created Successfully", 'success');
            return redirect()->route('degree-certificate.index');
        } else {
            Alert::toast('Fail to create new Degree/Certificate', 'error');
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
        $degree_certificate = DegreeCertificate::findorfail($id);
        return view('content.apps.degree-certificate.edit', compact('degree_certificate'));
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

        $data = $request->except('_token', 'status', '_method');
        $data['status'] = $request->status ? true : false;
        $degree_certificate = DegreeCertificate::where('id', $id)->update($data);
        if ($degree_certificate) {
            Alert::toast("Degree/Certificate Updated Successfully", 'success');
            return redirect()->route('degree-certificate.index');
        } else {
            Alert::toast('Fail to update Degree/Certificate', 'error');
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
        DegreeCertificate::where('id', $id)->delete();
        Alert::toast("Degree/Certificate Deleted Successfully", 'success');
        return redirect()->route('degree-certificate.index');
    }
}
