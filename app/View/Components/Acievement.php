<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Achievement;
use App\Models\News as NewsModel;

use App\Models\Event;

class Acievement extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        // $achievements = Achievement::where('status', 1)->get();
        // return view('components.acievement', compact('achievements'));
                $news = NewsModel::leftJoin('categories', 'categories.id', '=', 'news.category_id')
                           ->where('news.status', 1)
                           ->select('news.*', 'categories.title as categoryTitle')
                           ->orderBy('id', 'desc')
                           ->get();
        $events = array();
        $sportEvents = Event::where(['is_deleted' => 0, 'event_category' => 'sports'])->orderBy('id','desc')->limit(3)->get();
        $youthAffairsEvents = Event::where(['is_deleted' => 0, 'event_category' => 'youth-affairs'])->orderBy('id','desc')->limit(3)->get();
        foreach($sportEvents as $sportEvent)
        {
            $events[] = $sportEvent;
        }
        foreach($youthAffairsEvents as $youthAffairsEvent)
        {
            $events[] = $youthAffairsEvent;
        }
        return view('components.acievement', compact('events','news'));
    }
}