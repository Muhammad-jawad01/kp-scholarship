<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Page;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::where(['is_deleted'=> 0])->orderBy('id', 'desc')->paginate(6);
        return View('front.pages.achievement.index', compact('events'));
    }



    public function details($id)
    {
        $pageData = Page::where('loadwithlink', 'Events')->first();
        $event = Event::leftJoin('districts', 'districts.id', '=', 'events.district_id')
                ->where('events.id', $id)
                ->select('events.*', 'districts.name')
                ->first();
        return View('front.pages.achievement.details', compact('pageData', 'event'));
    }
}