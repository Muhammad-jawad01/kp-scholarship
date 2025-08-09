<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactBook;
use Yajra\DataTables\DataTables;
use App\Helpers\Helper;
use App\Models\Districts;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ContactBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = ContactBook::paginate(20);
        return view('content.apps.contact-book.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.apps.contact-book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validations = Validator::make($request->except('_token'), [
            'name' => 'required|unique:contact_books,name',
            'phone' => 'required|numeric|unique:contact_books,phone',
            'email' => 'required|email|unique:contact_books,email'
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

        $data = $request->except('_token');
        $contact = ContactBook::Create($data);
        if ($contact) {
            Alert::toast("Contact Created Successfully", 'success');
            return redirect()->route('contact-book.index');
        } else {
            Alert::toast('Fail to create new Contact', 'error');
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
        $contact = ContactBook::findOrFail($id);
        return view('content.apps.contact-book.edit', compact('contact'));
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
        $validations = Validator::make($request->except('_token'), [
            'name' => 'required|unique:contact_books,name,' . $id,
            'phone' => 'required|numeric|unique:contact_books,phone,' . $id,
            'email' => 'required|email|unique:contact_books,email,' . $id
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

        $data = $request->except('_token', '_method');
        $contact = ContactBook::where('id', $id)->update($data);
        if ($contact) {
            Alert::toast("Contact Updated Successfully", 'success');
            return redirect()->route('contact-book.index');
        } else {
            Alert::toast('Fail to updated new Contact', 'error');
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
        ContactBook::where('id', $id)->delete();
        Alert::toast("Contact Deleted Successfully", 'success');
        return redirect()->route('contact-book.index');
    }
}
