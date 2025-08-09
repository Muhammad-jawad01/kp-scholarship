<?php

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Page;
use App\Models\Category;

class ProjectController extends Controller
{

    public function index()
    {
        $pageData = Page::where('loadwithlink', 'Projects')->first();
        $projects = Project::paginate(3);
        return View('front.pages.project.index', compact('pageData', 'projects'));
    }

    public function details($slug)
    {
        $pageData = Page::where('loadwithlink', 'Projects')->first();
        $project = Project::where('slug', $slug)->firstorfail();
        return View('front.pages.project.details', compact('pageData', 'project'));
    }
}
