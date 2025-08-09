<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hospital;
use Yajra\DataTables\DataTables;
use App\Helpers\Helper;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class HospitalController extends Controller
{





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $slug)
    {
        $category = Category::where('slug', $slug)->firstorfail();
        $hospitals = Hospital::where('category_id', $category->id)->paginate(20);
        return view('front.pages.hospitals.index', compact('hospitals', 'category'));
    }
}
