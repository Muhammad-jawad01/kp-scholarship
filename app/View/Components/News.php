<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\News as NewsModel;

class News extends Component
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

        $news = NewsModel::leftJoin('categories', 'categories.id', '=', 'news.category_id')
                           ->where('news.status', 1)
                           ->select('news.*', 'categories.title as categoryTitle')
                           ->orderBy('id', 'desc')
                           ->get();
        return view('components.news', compact('news'));
    }
}
