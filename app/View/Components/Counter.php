<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;
use App\Models\Hospital;

class Counter extends Component
{

    public $limit;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($limit = 4)
    {
        $this->limit = $limit;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        $categories = Category::where([['status', 1], ['type', 'hospital']])->get();
        return view('components.counter', compact('categories'));
    }
}
