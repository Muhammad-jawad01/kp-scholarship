<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Districts;
use App\Models\Event;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use App\Models\EventLink;

class EventController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:event-list|event-create|event-edit|event-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:event-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:event-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:event-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::leftJoin('districts', 'districts.id', '=', 'events.district_id')
                      ->select('events.*', 'districts.name')
                      ->orderBy('id', 'desc')
                      ->paginate(20);
        return view('content.apps.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts = Districts::all(['id', 'name']);
        return view('content.apps.events.create', compact('districts'));
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
            'title' => 'required|unique:events,title',
            'event_category' => 'required',
            'audience' => 'numeric',
            'participants' => 'numeric',
            // 'latitude' => 'required|numeric',
            // 'longitude' => 'required|numeric',
            'venue' => 'required',
            'start' => 'required'
            //'end' => 'required|after_or_equal:start'
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
        $data['social_links'] = str_replace(' ', '',$data['social_links']);
        $event = Event::Create($data);
        $event->addAllMediaFromTokens();
        if ($event) 
        {
            Alert::toast("Event Created Successfully", 'success');
            return redirect()->route('events.index');
        }
        else 
        {
            Alert::toast('Fail to create new Event', 'error');
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
        $event = Event::findOrFail($id);
        $districts = Districts::where('id', '<>', $event->district_id)->get(['id', 'name']);
        $district = Districts::find($event->district_id);
        $eventLinks = explode(',', $event->social_links);
        return view('content.apps.events.edit', compact('districts', 'event', 'eventLinks','district'));
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
            'title' => 'required|unique:events,title,' . $id,
            'event_category' => 'required',
            'audience' => 'numeric',
            'participants' => 'numeric',
            // 'latitude' => 'required|numeric',
            // 'longitude' => 'required|numeric',
            'venue' => 'required',
            'start' => 'required',
            //'end' => 'required|after_or_equal:start'
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
        $data['social_links'] = str_replace(' ', '',$data['social_links']);
        $event = Event::where('id', $id)->update($data);
        if ($event) {
            $event = Event::find($id);
            $event->addAllMediaFromTokens();
            Alert::toast("Event Updated Successfully", 'success');
            return redirect()->route('events.index');
        } else {
            Alert::toast('Fail to Update Event', 'error');
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
        Event::where('id', $id)->delete();
        Alert::toast("Event Deleted Successfully", 'success');
        return redirect()->route('events.index');
    }

    public function event_details($id)
    {
        $event = Event::leftJoin('districts', 'districts.id', '=', 'events.district_id')
                    ->where('events.id', $id)
                    ->select('events.*', 'districts.name')
                    ->first();

        return view('content.apps.events.details', compact('event'));
    }
}
