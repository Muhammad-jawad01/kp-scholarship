<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class YouthAuthController extends Controller
{
    public function show_login_form(Request $request)
    {
        if($request->session()->has('youth_name'))
        {
            return redirect()->route('youth-registration-dashboard');
        }
        else
        {
            return redirect()->route('youth-registration-login');
        }
    }

}
