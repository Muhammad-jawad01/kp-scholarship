<?php

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Page;
use App\Models\Category;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index(Request $request)
    {
        $cond = [['status', 1]];
        if ($request->has('category')) {
            $category = Category::where('slug', $request->category)->first();
            array_push($cond, ['category_id', $category->id]);
        }
        $newslist = News::where($cond)->orderBy('id', 'desc')->paginate(6);
        return View('front.pages.news.index', compact('newslist'));
    }

    public function details($slug)
    {
        $pageData = Page::where('loadwithlink', 'News')->first();
        $news = News::where('slug', $slug)->firstorfail();
        $categories = Category::where('type', 'news')->where('status', 1)->get();
        $popularNews = News::all();

        return View('front.pages.news.details', compact('pageData', 'news', 'categories', 'popularNews'));
    }
}
