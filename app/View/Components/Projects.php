<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Project;

class Projects extends Component
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
        // $projects = Project::orderBy('id', 'desc')->get();
        // return view('components.work-projects', compact('projects'));
    }
}