<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Models\Gallary;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class GallaryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:gallary-list|gallary-create|gallary-edit|gallary-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:gallary-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:gallary-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:gallary-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallaries = Gallary::orderBy('id', 'desc')->paginate(10);
        return view('content.apps.gallary.index', compact('gallaries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.apps.gallary.create');
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
            'description' => 'max:255|required',
            'status' => 'required',
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

        $gallary = Gallary::Create($data);
        $gallary->addAllMediaFromTokens();
        if ($gallary) {
            Alert::toast("Gallary Created Successfully", 'success');
            return redirect()->route('galleries.index');
        } else {
            Alert::toast('Fail to create new gallary', 'error');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallary  $gallary
     * @return \Illuminate\Http\Response
     */
    public function show(Gallary $gallary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallary  $gallary
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $gallary = Gallary::findorfail($id);

        return view('content.apps.gallary.edit', compact('gallary'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallary  $gallary
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
        unset($data['media']);

        $gallary = Gallary::where('id', $id)->update($data);

        if ($gallary) {
            $gallary = Gallary::find($id);
            $gallary->addAllMediaFromTokens();
            Alert::toast("Gallary Updated Successfully", 'success');
            return redirect()->route('galleries.index');
        } else {
            Alert::toast('Fail to update gallary', 'error');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallary  $gallary
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallary = Gallary::where('id', $id)->delete();
        if ($gallary) {
            Alert::toast("Gallary Deleted Successfully", 'success');
            return redirect()->route('galleries.index');
        } else {
            Alert::toast('Fail to delete gallary', 'error');
            return redirect()->back();
        }
    }
}
