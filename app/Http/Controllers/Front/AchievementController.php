<?php

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;
use App\Models\events;
use App\Models\Page;
use App\Models\Category;
use App\Models\Event;

class eventsController extends Controller
{

    public function index()
    {
        $events = Event::where('is_deleted', 0)->paginate(6);
        return View('front.pages.achievement.index', compact('events'));
    }

    public function details($slug)
    {
        $pageData = Page::where('loadwithlink', 'newsDetails')->first();
        $events = Event::where('slug', $slug)->firstorfail();
        return View('front.pages.achievement.details', compact('pageData', 'events'));
    }
}
