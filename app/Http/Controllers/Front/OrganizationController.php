<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Page;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageData = Page::where('slug', 'organization-registration')->firstorfail();
        return view('front.pages.organization-registration.create', compact('pageData'));
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
            'organization' => 'required|regex: /^[a-zA-Z][a-zA-Z ]*$/',
            'executive-bodies' => 'required',
            'general-bodies' => 'required',
            'affidavit' => 'required|mimes:png,jpg,jpeg,pdf|max: 5000',
            'address' => 'required',
            'contact' => 'required|numeric|digits: 11',
            'cnic-formb' => 'required|numeric|digits: 13',
            'registered-youth' => 'required|numeric|max: 200',
            'age' => 'required|gte: 15|lte: 29',
            'bank-account-number' => 'required',
            'ntn' => 'required',
            'previous-record' => 'required|max: 5000',
            'website-link' => 'required|url',
            'email' => 'required|email',
            'controlling-authority' => 'required',
            'work-field-area' => 'required',
            'funding-source' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ]);

        if($validations->fails())
        {
            return redirect()->back()->withInput()->withErrors($validations->errors());
        }
        else
        {
            return redirect()->back()->with('success', 'Organization registered successfully.');
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
