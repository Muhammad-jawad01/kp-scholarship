<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Team;
use Yajra\DataTables\DataTables;
use App\Helpers\Helper;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class TeamController extends Controller
{





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $teams = Team::where('status', 1)->where('type', 'team')->paginate(20);
        return view('front.pages.team.index', compact('teams'));
    }
}
