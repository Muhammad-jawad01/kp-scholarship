<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Link;
use Yajra\DataTables\DataTables;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class LinkController extends Controller
{


    function __construct()
    {
        $this->middleware('permission:link-list|link-create|link-edit|link-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:link-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:link-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:link-delete', ['only' => ['destroy']]);
    }


    public function list(Request $request)
    {
        $model = Link::query();
        return DataTables::of($model)->toJson();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $links = Link::orderBy('id', 'desc')->paginate(20);
        return view('content.apps.link.index', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.apps.link.create');
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
        $link = Link::Create($data);
        if ($link) {
            Alert::toast("links Created Successfully", 'success');
            return redirect()->route('links.index');
        } else {
            Alert::toast('Fail to crate new links', 'error');
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
        $link = Link::findorfail($id);
        return view('content.apps.link.edit', compact('link'));
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

        $link = Link::where('id', $id)->update($data);
        if ($link) {
            Alert::toast("links Upated Successfully", 'success');
            return redirect()->route('links.index');
        } else {
            Alert::toast('Fail to crate new links', 'error');
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
        Link::where('id', $id)->delete();
        Alert::toast("links Deleted Successfully", 'success');
        return redirect()->route('links.index');
    }
}
