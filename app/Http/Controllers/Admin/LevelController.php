<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LevelsOrStages;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Helpers\Helper;
use App\Models\Application;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->id;
        $levels = LevelsOrStages::where('competition_sub_category_id', $id)->paginate(10);
        return view('content.apps.level.index', compact('levels', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = $request->id;
        return view('content.apps.level.create', compact('id'));
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
            'title' => 'required'
        ]);

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
        $data['status'] = Helper::switchToDb($request->status);
        $initialCount = LevelsOrStages::where('competition_sub_category_id', $request->competition_sub_category_id)->count();
        $initialCount = $initialCount + 1;
        $data['initial'] = $initialCount;
        $category = LevelsOrStages::Create($data);
        if ($category) {
            Alert::toast("Level Created Successfully", 'success');
            return redirect()->route('levels.index', ['id' => $request->competition_sub_category_id]);
        } else {
            Alert::toast('Fail to create new Level', 'error');
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
    public function edit(Request $request, $id)
    {
        if ($request->upload_result == 'true') {
            $allowResultUploading = true;
        } else {
            $allowResultUploading = false;
        }
        $level = LevelsOrStages::findOrFail($id);
        $levels = LevelsOrStages::where('competition_sub_category_id', $level->competition_sub_category_id)->orderBy('id', 'desc')->get();
        return view('content.apps.level.edit', compact('level', 'allowResultUploading', 'levels'));
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

        if ($request->level > -1) {
            $validations = Validator::make($data, [
                'new_level' => 'required|min: 3'
            ]);

            if ($validations->fails()) {
                $errors = $validations->errors();
                $errorDisplay = "";
                foreach ($errors->messages() as $key => $error) {
                    $errorDisplay = $errorDisplay . '<br>' . $error[0];
                }
                Alert::toast($errorDisplay, 'error')->timerProgressBar();
                return redirect()->back();
            }
        }

        unset($data['_token']);
        unset($data['_method']);
        unset($data['media']);
        unset($data['level']);
        unset($data['new_level']);
        unset($data['participant']);

        $data['status'] = Helper::switchToDb($request->status);
        $category = LevelsOrStages::where('id', $id)->update($data);
        if ($category) {
            $level = LevelsOrStages::find($id);
            if ($request->has('media')) {
                $level->addAllMediaFromTokens();

                if ($request->level > -1) {
                    if ($request->level == 0) {
                        // Create New Level
                        $initial = LevelsOrStages::where('competition_sub_category_id', $level->competition_sub_category_id)->count('initial');
                        $newLevel = LevelsOrStages::create([
                            'competition_sub_category_id' => $level->competition_sub_category_id,
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
                    return redirect()->route('levels.index', ['id' => $level->competition_sub_category_id]);
                }
            }
            Alert::toast("Level Updated Successfully", 'success');
            return redirect()->route('levels.index', ['id' => $level->competition_sub_category_id]);
        } else {
            Alert::toast('Fail to update Level', 'error');
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
        $level = LevelsOrStages::find($id);
        LevelsOrStages::where('id', $id)->delete();
        Alert::toast("Level Deleted Successfully", 'success');
        return redirect()->route('levels.index', ['id' => $level->competition_sub_category_id]);
    }
}
