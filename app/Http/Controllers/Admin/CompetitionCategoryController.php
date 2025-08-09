<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompetitionCategory;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Helpers\Helper;

class CompetitionCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CompetitionCategory::orderBy('id', 'desc')->paginate(10);
        return view('content.apps.competition-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.apps.competition-categories.create');
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
        $category = CompetitionCategory::Create($data);
        if ($category) {
            Alert::toast("Competition Category Created Successfully", 'success');
            return redirect()->route('competition-categories.index');
        } else {
            Alert::toast('Fail to create new Competition Category', 'error');
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
        $category = CompetitionCategory::findOrFail($id);
        return view('content.apps.competition-categories.edit', compact('category'));
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
        unset($data['_method']);
        $data['status'] = Helper::switchToDb($request->status);
        $category = CompetitionCategory::where('id', $id)->update($data);
        if ($category) {
            Alert::toast("Competition Category Updated Successfully", 'success');
            return redirect()->route('competition-categories.index');
        } else {
            Alert::toast('Fail to update Competition Category', 'error');
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
        CompetitionCategory::where('id', $id)->delete();
        Alert::toast("Competition Category Deleted Successfully", 'success');
        return redirect()->route('competition-categories.index');
    }
}
