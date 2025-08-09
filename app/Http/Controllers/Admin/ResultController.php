<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompetitionSubCategories;
use Illuminate\Http\Request;
use App\Models\LevelsOrStages;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\EventResult;
use App\Models\Application;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $cond = [];
        $querys = $request->all();
        foreach ($querys as $key => $query) {
            $cond[$key] = $query;
        }
        $results = EventResult::where($cond)->orderBy('id', 'desc')->paginate(10);
        return view('content.apps.result.index', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $levels = LevelsOrStages::orderBy('id', 'desc')->where('id', $request->level_id)->get();
        return view('content.apps.result.create', compact('levels'));
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
        $validations = Validator::make($data, [
            'level_id' => 'required',

        ]);

        if ($validations->fails()) {
            $errors = $validations->errors();
            foreach ($errors->messages() as $key => $error) {
                Alert::toast($error[0], 'error');
            }
            return redirect()->back();
        }

        $result = new EventResult();
        $result->fill($request->all());
        $result->save();


        $result->addAllMediaFromTokens();
        if ($result) {
            if ($request->level > -1) {
                if ($request->level == 0) {
                    // Create New Level
                    $initial = LevelsOrStages::where('competition_sub_category_id', $request->competition_sub_category_id)->count('initial');
                    $newLevel = LevelsOrStages::create([
                        'competition_sub_category_id' => $request->competition_sub_category_id,
                        'title' => $request->new_level,
                        'status' => 1,
                        'initial' => $initial + 1
                    ]);

                    $request->level = $newLevel->id;
                }

                $levelId = $request->level;
                foreach ($request->participant as $p) {
                    $application = Application::where('id', $p)->first();
                    $old = Application::where(['participant_id' => $application->participant_id, 'levels_or_stage_id' => $application->levels_or_stage_id])->first();
                    if (!$old) {
                        $newApplication = $application->replicate();
                        $newApplication->levels_or_stage_id = $levelId; // the new project_id
                        $newApplication->save();
                    }
                }
                Alert::toast("Result Uploaded and Participants Move to Next Level Successfully", 'success');
                return redirect()->route('result.index', ['level_id' => $request->level]);
            }
            Alert::toast("Result Created Successfully", 'success');
            return redirect()->route('result.index');
        } else {
            Alert::toast('Fail to create new result', 'error');
            return redirect()->back();
        }
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
        $result = EventResult::where('id', $id)->first();
        
        $levels = LevelsOrStages::orderBy('id', 'desc')->where('competition_sub_category_id', $result->competition_sub_category_id)->get();
        $applications = Application::where('levels_or_stage_id', $result->level_id)->get();
        return view('content.apps.result.edit', compact('result', 'applications','levels'));
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
        $result = EventResult::where('id', $id)->first();
        EventResult::where('id', $id)->delete();
        Application::where('levels_or_stage_id', $result->level_id)->delete();
        Alert::toast("Result Deleted Successfully", 'success');
        return redirect()->back();
    }
}
