<?php

namespace App\Http\Controllers\Front;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Download;
use App\Models\Category;
use App\Models\Page;

class DownloadController extends Controller
{

    public function index($slug)
    {
        $pageData = Page::where('slug', 'download')->first();
        $category = Category::where('slug', $slug)->firstorfail();
        $downloads = Download::where([['status', 1], ['category_id', $category->id]])->get();
        return View('front.pages.download.index', compact('downloads', 'category','pageData'));
    }
}