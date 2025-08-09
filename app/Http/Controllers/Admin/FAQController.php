<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = FAQ::paginate(10);
        return view('content.apps.faq.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.apps.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $validations = Validator::make($data, [
            'question' => 'required|unique:f_a_q_s,question',
            'answer' => 'required'
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

        $faq = FAQ::create($data);
        if ($faq) {
            Alert::toast("FAQ Created Successfully", 'success');
            return redirect()->route('faqs.index');
        } else {
            Alert::toast('Fail to create new FAQ', 'error');
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
        $faq = FAQ::findOrFail($id);
        return view('content.apps.faq.show', compact('faq'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq = FAQ::findOrFail($id);
        return view('content.apps.faq.edit', compact('faq'));
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
        $data = $request->except('_token', '_method');
        $validations = Validator::make($data, [
            'question' => 'required|unique:f_a_q_s,question,' . $id,
            'answer' => 'required'
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

        $faq = FAQ::where('id', $id)->update($data);
        if ($faq) {
            Alert::toast("FAQ Updated Successfully", 'success');
            return redirect()->route('faqs.index');
        } else {
            Alert::toast('Fail to update FAQ', 'error');
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
        $faq = FAQ::destroy($id);
        if($faq)
        {
            Alert::toast("FAQ Deleted Successfully", 'success');
            return redirect()->route('faqs.index');
        }
        else
        {
            Alert::toast("Fails to delete FAQ", 'error');
            return redirect()->route('faqs.index');
        }
    }
}
