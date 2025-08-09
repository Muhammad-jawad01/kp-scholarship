<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class FullCalenderController extends Controller
{
   /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Request $request, $category)
    {
  
        if($request->ajax()) {
       
            //  $data = Event::whereDate('start', '>=', $request->start)
            //            ->whereDate('end',   '<=', $request->end)
            //            ->get(['id', 'title', 'start', 'end']);
  
             $data = Event::with('media')->leftJoin('districts', 'districts.id' , '=', 'events.district_id')
                            ->where('event_category', $category)
                            ->select('events.*', 'districts.name')
                            ->get();
  
             return response()->json($data);
        }
  
        return view('events');
    }
 
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function ajax(Request $request)
    {
 
        switch ($request->type) {
           case 'add':
              $event = Event::create([
                  'title' => $request->title,
                  'start' => $request->start,
                  'end' => $request->end,
              ]);
 
              return response()->json($event);
             break;
  
           case 'update':
              $event = Event::find($request->id)->update([
                  'title' => $request->title,
                  'start' => $request->start,
                  'end' => $request->end,
              ]);
 
              return response()->json($event);
             break;
  
           case 'delete':
              $event = Event::find($request->id)->delete();
  
              return response()->json($event);
             break;
             
           default:
             # code...
             break;
        }
    }
}
