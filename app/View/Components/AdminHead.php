<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Team;

class AdminHead extends Component
{

    public $limit;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($limit = 3)
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
        $administratives = Team::where('status', 1)->where('type', 'addministrator')->get();
        return view('components.adminhead', compact('administratives'));
    }
}
