<?php

namespace App\Http\Controllers\Scholarship;

use App\Http\Controllers\Controller;
use App\Models\YouthEducation;
use App\Models\YouthInfo;
use App\Models\YouthExperience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class YouthExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Make it dynamic
        $youth_name = "Salman Qazi";

        return view('youth.youth-experience.index', compact('youth_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('youth.youth-experience.create')->with('youth_name', 'Salman Qazi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validations = Validator::make($request->all(), [
            'company' => 'required|min:3',
            'designation' => 'required',
            'starting_date' => 'required',
            'ending_date' => 'required'
        ], [
            //'starting_date.lt' => 'Starting Date must be less than ending date.',
            //'ending_date.gt' => 'Ending Date must be greater than starting date.'
        ]);

        if ($validations->fails()) {
            return redirect()->back()->withInput()->withErrors($validations->errors());
        } else {
            $data = $request->except('_token');
            // Make it dynamic
            $data['youth_id'] = 2;
            $youth_experience = DB::table('youth_experiences')->insert($data);
            if ($youth_experience) {
                return redirect()->route('experience.index')->with('youth_name', 'Salman Qazi');
            } else {
                //Show Error Message
            }
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
        $youth_name = "Salman Qazi";
        $youth_experience = YouthExperience::where('id', $id)->first();
        return view('youth.youth-experience.edit', compact('youth_name', 'youth_experience'));
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
        $validations = Validator::make($request->all(), [
            'company' => 'required|min:3',
            'designation' => 'required',
            'starting_date' => 'required',
            'ending_date' => 'required'
        ], [
            //'starting_date.lt' => 'Starting Date must be less than ending date.',
            //'ending_date.gt' => 'Ending Date must be greater than starting date.'
        ]);

        if ($validations->fails()) {
            return redirect()->back()->withInput()->withErrors($validations->errors());
        } else {
            $data = $request->except('_token', '_method');
            // Make it dynamic
            $data['youth_id'] = 2;
            $youth_experience = DB::table('youth_experiences')->where('id', $id)->update($data);;
            if ($youth_experience) {
                return redirect()->route('experience.index')->with('youth_name', 'Salman Qazi');
            } else {
                //Show Error Message
            }
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
        DB::table('youth_experiences')->delete($id);
        return redirect()->route('experience.index');
    }


    // ajax request
    public function addExperience(Request $request)
    {

        $data = $request->all();
        $starting_date = $data['starting_date'];
        $ending_date = $data['ending_date'];
        $isNew = true;

        if($request->id == null)
        {
            // Add Experience
            $userId = \Auth::User()->id;
            $data['user_id'] = $userId;
            unset($data['id']);
            $check_date = YouthExperience::where('user_id', $userId)->where('starting_date', $starting_date)->Where('ending_date', $ending_date)->get();
            if($ending_date != null && $starting_date >= $ending_date)
            {
                $response = ['response' => 'error', 'message' => 'Starting date should be less than ending date.'];
            }
            else if(count($check_date) > 0)
            {
                $response = ['response' => 'error', 'message' => 'Starting or Ending date overlaped with one of your existing record.'];
            }
            else
            {
                $experience = YouthExperience::create($data);
                if($experience)
                {
                    $response = ['response' => 'success', 'experience' => $experience, 'isNew' => $isNew];
                }
                else
                {
                    $response = ['response' => 'fail', 'experience' => null, 'isNew' => $isNew];
                }
            }
        }
        else
        {
            // Edit Experience
            $check_date = YouthExperience::where('id','<>',$request->id)->where('user_id', \Auth::user()->id)->where('starting_date', $starting_date)->orWhere('ending_date', $ending_date)->get();
            if($ending_date != null && $starting_date >= $ending_date)
            {
                $response = ['response' => 'error', 'message' => 'Starting date should be less than ending date.'];
            }
            else if(count($check_date) > 0)
            {
                $response = ['response' => 'error', 'message' => 'Starting or Ending date overlaped with one of your existing record.'];
            }
            else
            {
                $experience = YouthExperience::where('id', $request->id)->update($data);
                $experience = YouthExperience::where('id', $request->id)->first();
                $isNew = false;
                if($experience)
                {
                    $response = ['response' => 'success', 'experience' => $experience, 'isNew' => $isNew];
                }
                else
                {
                    $response = ['response' => 'fail', 'experience' => null, 'isNew' => $isNew];
                }
            }
        }

        return response()->json($response);
    }

    public function removeExperience(Request $request)
    {
        $experience = YouthExperience::destroy($request->id);
        if ($experience) {
            $response = ['response' => 'success'];
        } else {
            $response = ['response' => 'fail'];
        }

        return response()->json($response);
    }

    public function editExperience($id)
    {
        $experience = YouthExperience::where(['user_id' => \Auth::User()->id, 'id' => $id])->first();
        if ($experience) {
            $response = ['response' => 'success', 'experience' => $experience];
        } else {
            $response = ['response' => 'fail', 'experience' => null];
        }
        return response()->json($response);
    }
}
