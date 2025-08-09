<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Download;
use Yajra\DataTables\DataTables;
use App\Models\Category;
use Monolog\Handler\ElasticaHandler;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class DownloadController extends Controller
{


    function __construct()
    {
        $this->middleware('permission:download-list|download-create|download-edit|download-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:download-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:download-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:download-delete', ['only' => ['destroy']]);
    }


    public function list(Request $request)
    {

        $model = Download::query();
        return DataTables::of($model)->toJson();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $downloads = Download::orderBy('id', 'desc')->paginate(20);
        return view('content.apps.download.index', compact('downloads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.apps.download.create');
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

        $download = Download::Create($data);
        $download->addAllMediaFromTokens();
        if ($download) {
            Alert::toast("Download Created Successfully", 'success');
            return redirect()->route('downloads.index');
        } else {
            Alert::toast('Fail to create new Download', 'error');
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
        $download = Download::findorfail($id);
        return view('content.apps.download.edit', compact('download'));
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
        unset($data['media']);

        Download::where('id', $id)->update($data);

        $download = Download::find($id);
        $download->addAllMediaFromTokens();

        Alert::toast("Download Upated Successfully", 'success');
        return redirect()->route('downloads.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Download::where('id', $id)->delete();
        Alert::toast("Download Deleted Successfully", 'success');
        return redirect()->route('downloads.index');
    }
}
