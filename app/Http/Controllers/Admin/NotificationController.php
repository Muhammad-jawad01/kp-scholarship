<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use Yajra\DataTables\DataTables;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class NotificationController extends Controller
{


    function __construct()
    {
        $this->middleware('permission:notification-list|notification-create|notification-edit|notification-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:notification-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:notification-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:notification-delete', ['only' => ['destroy']]);
    }


    public function list(Request $request)
    {

        $model = Notification::query();
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
        //     // return datatables()->eloquent(Notification::query())->toJson();

        // }
        $notifications = Notification::orderBy('id', 'desc')->paginate(20);
        return view('content.apps.notification.index', compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.apps.notification.create');
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
            foreach ($errors->messages() as $key => $error) {
                Alert::toast($error[0], 'error');
            }
            return redirect()->back();
        }

        $data = $request->all();
        $data['status'] = Helper::switchToDb($request->status);
        unset($data['_token']);
        $notification = Notification::Create($data);
        if ($notification) {
            Alert::toast("Notifications Created Successfully", 'success');
            return redirect()->route('notifications.index');
        } else {
            Alert::toast('Fail to crate new Notifications', 'error');
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
        $notification = Notification::findorfail($id);
        return view('content.apps.notification.edit', compact('notification'));
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
            foreach ($errors->messages() as $key => $error) {
                Alert::toast($error[0], 'error');
            }
            return redirect()->back();
        }

        $data = $request->all();
        $data['status'] = Helper::switchToDb($request->status);
        unset($data['_token']);
        unset($data['_method']);

        $notification = Notification::where('id', $id)->update($data);
        if ($notification) {
            Alert::toast("Notifications Upated Successfully", 'success');
            return redirect()->route('notifications.index');
        } else {
            Alert::toast('Fail to crate new Notifications', 'error');
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
        Notification::where('id', $id)->delete();
        Alert::toast("Notifications Deleted Successfully", 'success');
        return redirect()->route('notifications.index');
    }
}
