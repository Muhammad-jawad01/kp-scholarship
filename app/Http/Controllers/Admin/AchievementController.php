<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Achievement;
use Yajra\DataTables\DataTables;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AchievementController extends Controller
{


    function __construct()
    {
        $this->middleware('permission:achievement-list|achievement-create|achievement-edit|achievement-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:achievement-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:achievement-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:achievement-delete', ['only' => ['destroy']]);
    }


    public function list(Request $request)
    {

        $model = Achievement::query();
        return DataTables::of($model)->toJson();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $achievements = Achievement::orderBy('id', 'desc')->paginate(20);
        return view('content.apps.achievement.index', compact('achievements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.apps.achievement.create');
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
            // 'description' => 'required',
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


        $achievement = Achievement::Create($data);
        $achievement->addAllMediaFromTokens();
        if ($achievement) {
            Alert::toast("Achievement Created Successfully", 'success');
            return redirect()->route('achievements.index');
        } else {
            Alert::toast('Fail to crate new Achievement', 'error');
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
        $achievement = Achievement::findorfail($id);
        return view('content.apps.achievement.edit', compact('achievement'));
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

        $achievement = Achievement::where('id', $id)->update($data);

        $achievement = Achievement::find($id);
        $achievement->addAllMediaFromTokens();
        if ($achievement) {
            Alert::toast("Achievement Upated Successfully", 'success');
            return redirect()->route('achievements.index');
        } else {
            Alert::toast('Fail to crate new Achievement', 'error');
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
        Achievement::where('id', $id)->delete();
        Alert::toast("Achievement Deleted Successfully", 'success');
        return redirect()->route('achievements.index');
    }
}
