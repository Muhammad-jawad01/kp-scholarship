<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Page;

class InnerPageHeader extends Component
{

    public $page, $slug;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($page, $slug = null)
    {
        $this->page = $page;
        $this->slug = $slug;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        if (!empty($this->slug)) {
            $pageData = Page::where('slug', $this->slug)->first();
        } else {
            $pageData = Page::where('loadwithlink', $this->page)->first();
        }

        return view('components.inner-page-header', compact('pageData'));
    }
}
