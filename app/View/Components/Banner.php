<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Slide;
use App\Models\News as NewsModel;
use RakibDevs\Weather\Weather as WeatherApi;
use Illuminate\Support\Carbon;
use App\Models\Weather;


class Banner extends Component
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

        $date = new Carbon;

        $weather = Weather::where('created_at', '>=', $date->format('Y-m-d H:00:00'))->first();
        // if (!$weather) {
        //     $wt = new WeatherApi();
        //     $info = $wt->getCurrentByCity('peshawar');
        //     Weather::truncate();
        //     $weather = Weather::Create(['response' => json_encode($info)]);
        // }


        $slides = Slide::where("status", 1)->get();
        $newsupdates = NewsModel::where('status', 1)->get();
        return view('components.banner', compact('slides', 'newsupdates', 'weather'));
    }
}