<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Category;

class Header extends Component
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

        $downloads = Category::where([['status', 1], ['type', 'download']])->get();
        return view('components.header', compact('downloads'));
    }
}
