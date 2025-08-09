<?php


namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Contact;
use App\Rules\Recaptcha;

class ContactController extends Controller
{
    public function sendemail(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|regex: /^[a-zA-Z ]*$/',
            'phone' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'g-recaptcha-response' => ['required', new ReCaptcha]
        ]);

        if ($validator->fails()) {
            // $errors = $validator->errors();
            // $errorDisplay = "";
            // foreach ($errors->messages() as $key => $error) {
            //     $errorDisplay = $errorDisplay . '<br>' . $error[0];
            // }
            // Alert::toast($errorDisplay, 'error')->timerProgressBar();
            // return redirect()->back();
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $contact = Contact::create($request->except('_token', 'phone'));

        if($contact)
        {
            Alert::toast("Your Form Submit Successfully", 'success');
            return redirect()->back();
        }
        else
        {
            Alert::toast("Form submission fails. Try again.", 'error');
            return redirect()->back();
        }

        // \Mail::to('your_receiver_email@gmail.com')->send(new \App\Mail\ContactUs($details));
    }
}
