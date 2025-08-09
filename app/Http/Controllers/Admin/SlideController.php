<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slide;
use Yajra\DataTables\DataTables;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class SlideController extends Controller
{


    function __construct()
    {
        $this->middleware('permission:setting-list|setting-create|setting-edit|setting-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:setting-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:setting-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:setting-delete', ['only' => ['destroy']]);
    }


    public function list(Request $request)
    {

        $model = Slide::query();
        return DataTables::of($model)->toJson();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if ($request->ajax()) {
        //     // return datatables()->eloquent(Slide::query())->toJson();

        // }
        $slides = Slide::orderBy('id', 'desc')->paginate(20);
        return view('content.apps.slide.index', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.apps.slide.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        // $validator = Validator::make($request->all(), [
        //     'en_title' => 'min:3',
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

        $data = $request->all();
        $data['status'] = Helper::switchToDb($request->status);
        unset($data['_token']);


        $slide = Slide::Create($data);
        $slide->addAllMediaFromTokens();
        if ($slide) {
            Alert::toast("Slide Created Successfully", 'success');
            return redirect()->route('slides.index');
        } else {
            Alert::toast('Fail to crate new slide', 'error');
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
        $slide = Slide::findorfail($id);
        return view('content.apps.slide.edit', compact('slide'));
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
        // $validator = Validator::make($request->all(), [
        //     'en_title' => 'required',
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

        $data = $request->all();
        $data['status'] = Helper::switchToDb($request->status);
        unset($data['_token']);
        unset($data['_method']);
        unset($data['media']);
        unset($data['slide']);


        $slide = Slide::where('id', $id)->update($data);
        // dd($slide);

        $slide = Slide::find($id);
        $slide->addAllMediaFromTokens();
        if ($slide) {
            Alert::toast("Slide Upated Successfully", 'success');
            return redirect()->route('slides.index');
        } else {
            Alert::toast('Fail to crate new slide', 'error');
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
        Slide::where('id', $id)->delete();
        Alert::toast("Slide Deleted Successfully", 'success');
        return redirect()->route('slides.index');
    }
}