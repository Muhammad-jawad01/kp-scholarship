<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompetitionSubCategories;
use App\Models\CompetitionCategory;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Helper;
use App\Models\LevelsOrStages;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Application;
use Yajra\Datatables\Datatables;

class CompetitionSubCategoriesController extends Controller
{


    public function getapplications(Request $request)
    {
        $search = $request->search;
        $cond = [];
        if ($request->has('event_id')) {
            $cond['competition_sub_category_id'] = $request->event_id;
        }
        if ($search == '') {
            $data = Application::where($cond)->with('participant')->whereHas('participant', function ($query) {
                return $query->limit(20);
            })->get();
        } else {
            $data = Application::where($cond)->with('participant')->whereHas('participant', function ($query, $search) {
                return $query->orderby('name', 'asc')->where('name', 'like', '%' . $search . '%')->limit(20);
            })->get();
        }



        $response = [];

        foreach ($data as $row) {
            $response[] = array(
                "id" => $row->id,
                "text" => $row->participant->name
            );
        }
        return response()->json($response);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories = CompetitionSubCategories::leftJoin('competition_categories', 'competition_categories.id', '=', 'competition_sub_categories.competition_category_id')
                        ->select('competition_sub_categories.*', 'competition_categories.title as categoryTitle')
                        ->orderBy('id', 'desc')
                        ->paginate(10);
        return view('content.apps.competition-sub-categories.index', compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CompetitionCategory::orderBy('id', 'desc')->select('id', 'title')->get();
        return view('content.apps.competition-sub-categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validations = Validator::make(
            $data,
            [
                'title' => 'required',
                'event_type' => 'required'
                //'competition_category_id' => 'required'
            ],
            [
                'competition_category_id.required' => 'Competition Category is required'
            ]
        );

        if ($validations->fails()) {
            $errors = $validations->errors();
            $errorDisplay = "";
            foreach ($errors->messages() as $key => $error) {
                $errorDisplay = $errorDisplay . '<br>' . $error[0];
            }
            Alert::toast($errorDisplay, 'error')->timerProgressBar();
            return redirect()->back();
        }

        unset($data['_token']);
        $eventType = $request->event_type;
        if ($eventType == 'District Wise') {
            $data['event_type'] = 1;
        } else {
            unset($data['competition_category_id']);
            $data['event_type'] = 2;
        }
        $data['status'] = Helper::switchToDb($request->status);
        $category = CompetitionSubCategories::Create($data);
        if ($category) {
            $level = LevelsOrStages::Create([
                'competition_sub_category_id' => $category->id,
                'title' => 'Initial',
                'initial' => '1'
            ]);
            if ($level) {
                Alert::toast("Event Created Successfully", 'success');
                return redirect()->route('competition-sub-categories.index');
            } else {
                Alert::toast('Fail to create new Event', 'error');
                return redirect()->back();
            }
        } else {
            Alert::toast('Fail to create new Event', 'error');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $totalLevels = LevelsOrStages::where('competition_sub_category_id', $id)->count();
        $eventId = $id;
        $totalApplications = Application::where('competition_sub_category_id', $id)->count('id');

        if ($request->ajax()) {
            $data = Application::select('*')->with('participant')->where('competition_sub_category_id', $id);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('participants.show', $row->participant_id) . '" class="edit btn btn-primary btn-sm">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('content.apps.competition-sub-categories.show', compact('id', 'totalLevels', 'eventId', 'totalApplications'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $subCategory = CompetitionSubCategories::findOrFail($id);
        $category = CompetitionCategory::where('id', $subCategory->competition_category_id)->value('title');
        $categories = CompetitionCategory::orderBy('id', 'desc')->select('id', 'title')->get();
        return view('content.apps.competition-sub-categories.edit', compact('subCategory', 'category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $validations = Validator::make(
            $data,
            [
                'title' => 'required',
                'event_type' => 'required'
                //'competition_category_id' => 'required'
            ],
            [
                'competition_category_id.required' => 'Competition Category is required'
            ]
        );

        if ($validations->fails()) {
            $errors = $validations->errors();
            $errorDisplay = "";
            foreach ($errors->messages() as $key => $error) {
                $errorDisplay = $errorDisplay . '<br>' . $error[0];
            }
            Alert::toast($errorDisplay, 'error')->timerProgressBar();
            return redirect()->back();
        }

        unset($data['_token']);
        unset($data['_method']);
        $eventType = $request->event_type;
        if ($eventType == 'District Wise') {
            $data['event_type'] = 1;
        } else {
            unset($data['competition_category_id']);
            $data['event_type'] = 2;
        }
        $data['status'] = Helper::switchToDb($request->status);
        $category = CompetitionSubCategories::where('id', $id)->update($data);
        if ($category) {
            Alert::toast("Event Updated Successfully", 'success');
            return redirect()->route('competition-sub-categories.index');
        } else {
            Alert::toast('Fail to update Event', 'error');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CompetitionSubCategories::where('id', $id)->delete();
        Alert::toast("Event Deleted Successfully", 'success');
        return redirect()->route('competition-sub-categories.index');
    }
}
