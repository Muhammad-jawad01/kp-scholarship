<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Link;

class Footer extends Component
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


        $importantLinks = Link::where([['type', 'important'], ['status', 1]])->get();
        $quickLinks = Link::where([['type', 'quick'], ['status', 1]])->get();
        $footerLinks = Link::where([['type', 'footer'], ['status', 1]])->get();
        return view('components.footer', compact('importantLinks', 'quickLinks', 'footerLinks'));
    }
}
