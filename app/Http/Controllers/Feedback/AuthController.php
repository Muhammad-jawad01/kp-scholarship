<?php

namespace App\Http\Controllers\Feedback;

use App\Http\Controllers\Controller;
use App\Models\FeedbackUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Rules\Recaptcha;

class AuthController extends Controller
{
    public function login()
    {
        return view('feedback.auth.login');
    }

    public function verifyUser(Request $request)
    {
        $data = $request->except('_token');
        $validations = Validator::make($data, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validations->fails())
        {
            return redirect()->back()->withInput()->withErrors($validations->errors());
        }
        else
        {
            if(Auth::guard('feedback')->attempt($data))
            {
                return redirect()->route('feedback.dashboard');
            }
            else
            {
                return redirect()->back()->with('error', 'Invalid email or password');
            }
        }
    }

    public function signup()
    {
        return view('feedback.auth.signup');
    }

    public function register(Request $request)
    {
        $data = $request->except('_token');
        $validations = Validator::make($data, [
            'name' => 'required|min: 3|unique:feedback_users,name',
            'gender' => 'required',
            'mobile_no' => 'required|numeric|digits: 11|unique:feedback_users,mobile_no',
            'email' => 'required|email|unique:feedback_users,email',
            'password' => 'required|min: 6|confirmed',
            'g-recaptcha-response' => ['required', new ReCaptcha]
        ]);

        if($validations->fails())
        {
            return redirect()->back()->withInput()->withErrors($validations->errors());
        }
        else
        {
            unset($data['password_confirmation']);
            $data['password'] = Hash::make($data['password']);
        
            $feedbackUser = FeedbackUser::create($data);
            Auth::guard('feedback')->login($feedbackUser);
            return redirect()->route('feedback.dashboard');
        }
    }
}
