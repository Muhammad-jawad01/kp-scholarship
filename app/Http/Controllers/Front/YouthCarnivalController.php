<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\CompetitionCategory;
use App\Models\Participant;
use App\Models\Application;
use App\Models\LevelsOrStages;
use App\Models\CompetitionSubCategories;
use App\Models\EventResult;
use Illuminate\Support\Facades\Validator;
use LDAP\Result;
use RealRashid\SweetAlert\Facades\Alert;

class YouthCarnivalController extends Controller
{


    public function result(Request $request)
    {
        return view('front.pages.youth_carnival.result');
    }


    public function getResult(Request $request)
    {

        $result = EventResult::where(['level_id' => $request->level_or_stage_id, 'district_id' => $request->district_id])->first();

        if ($result) {
            $url = $result->getFirstMediaUrl('result');

            if (!empty($url)) {
                return redirect($url);
            } else {
                Alert::toast('Sorry No Result Found', 'error')->timerProgressBar();
                return redirect()->back();
            }
        } else {
            Alert::toast('Sorry No Result Found', 'error')->timerProgressBar();
            return redirect()->back();
        }
    }

    public function check_cnic(Request $request)
    {
        $response = ['response' => 'fail', 'message' => 'cnic record not found'];
        $data = Participant::where('cnic_form_b', $request->cnic)->first();
        if ($data) {
            $response = ['response' => 'success', 'message' => 'cnic record found'];
        }

        return response()->json($response);
    }


    public function getCompetitionCategory(Request $request)
    {
        $search = $request->search;
        if ($search == '') {
            $data =  CompetitionCategory::orderby('title', 'asc')->limit(20)->get();
        } else {
            $data = CompetitionCategory::orderby('title', 'asc')->where('name', 'like', '%' . $search . '%')->limit(20)->get();
        }

        $response = [['id' => '0', 'text' => 'Divisional']];

        foreach ($data as $row) {
            $response[] = array(
                "id" => $row->id,
                "text" => $row->title
            );
        }
        return response()->json($response);
    }


    public function getSubCompetitionCategory(Request $request)
    {
        $data = [];
        if ($request->has('competition_category_id')) {
            if ($request->competition_category_id == '0') {
                $data =  CompetitionSubCategories::where('event_type', 2)->orderby('title', 'asc')->get();
            } else {
                $data =  CompetitionSubCategories::where('competition_category_id', $request->competition_category_id)->orderby('title', 'asc')->get();
            }
        }

        return response()->json($data);
    }

    public function getLevelCompetitionCategory(Request $request)
    {
        $data = [];
        if ($request->has('competition_sub_category_id')) {
            $data =  LevelsOrStages::where('competition_sub_category_id', $request->competition_sub_category_id)->orderby('title', 'asc')->get();
        }

        return response()->json($data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageData = Page::where('slug', 'organization-registration')->firstorfail();
        $categories =  CompetitionCategory::orderby('title', 'asc')->where('status', 1)->get();
        $divisionalActivities = CompetitionSubCategories::where(['event_type' => 2, 'status' => 1])->orderBy('id', 'desc')->get();
        return view('front.pages.youth_carnival.form', compact('pageData', 'categories', 'divisionalActivities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'father_name' => 'required',
            'date_of_birth' => 'required',
            'cnic_form_b' => 'required|unique:participants,cnic_form_b',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $errorDisplay = "";
            foreach ($errors->messages() as $key => $error) {
                $errorDisplay = $errorDisplay . '<br>' . $error[0];
            }
            Alert::toast($errorDisplay, 'error')->timerProgressBar();
            return redirect()->back()->withInput();
        }
        // save Participant Data
        $participant = new Participant();
        $participant->fill($request->all());
        $participant->save();

        if ($request->has('divisional_activity')) {
            $dis_Data = CompetitionSubCategories::where('id', $request->divisional_activity)->first();
            if ($dis_Data) {
                $application = new Application();
                $level = LevelsOrStages::where(['competition_sub_category_id' => $dis_Data->id, 'initial' => 1])->first();
                $application->district_id = $request->district_id;
                $application->participant_id  = $participant->id;
                $application->competition_sub_category_id  = $dis_Data->id;
                $application->levels_or_stage_id = $level->id;
                $application->event_type = $dis_Data->event_type;
                $application->save();
            }
        }

        $events = $request->events;
        foreach ($events as $key => $event) {
            if (!empty($event[0])) {
                $event_Data = CompetitionSubCategories::where('id', $event[0])->first();
                if ($event_Data) {
                    $application = new Application();
                    $level = LevelsOrStages::where(['competition_sub_category_id' => $event_Data->id, 'initial' => 1])->first();
                    if ($level) {
                        $application->levels_or_stage_id = $level->id;
                    }
                    $application->district_id = $request->district_id;
                    $application->participant_id  = $participant->id;
                    $application->competition_category_id = $key;
                    $application->competition_sub_category_id  = $event_Data->id;
                    $application->event_type = $event_Data->event_type;
                    $application->save();
                }
            }
        }

        Alert::toast('Application submit successfully', 'success')->timerProgressBar();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
