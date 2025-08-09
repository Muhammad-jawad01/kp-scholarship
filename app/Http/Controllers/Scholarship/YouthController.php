<?php

namespace App\Http\Controllers\Scholarship;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Youth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Districts;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\YouthInfo;
use Illuminate\Support\Facades\Session;
use App\Models\ScholarshipApplications;

use App\Models\User;
use App\Models\YouthEducation;
use App\Models\YouthExperience;
use RealRashid\SweetAlert\Facades\Alert as SweetAlert;
use Auth;

class YouthController extends Controller
{
    public function login()
    {
        return view('youth.login');
    }
    public function updateProfileImage(Request $request)
    {

        // save user relative data here

        $user = \Auth::user();
        $user = User::where('id', $user->id)->first();
        $user->addAllMediaFromTokens();
        SweetAlert::toast("Profile Created Successfully", 'success');
        return redirect()->back();
    }


    public function personalinformation(Request $request)
    {

        // save user relative data here

        $user = \Auth::user();

        $user = User::where('id', $user->id)->update($request->all());

        return response()->json(['response' => 'success', 'data']);
    }


    public function signup()
    {
        $districts = Districts::all();
        return view('youth.register', compact('districts'));
    }

    public function register(Request $request)

    {

        // dd($request->all());
        $validations = Validator::make($request->all(), [
            'name' => 'required|regex:/^[a-zA-Z][a-zA-Z ]*$/|min:3',
            'gender' => 'required',
            'religion' => 'required',
            'disability_status' => 'required',
            'educational_status' => 'required',
            'nic' => 'required|numeric|digits:13|unique:users,nic',
            'domicile_district_id' => 'required',
            'email' => 'required|email|unique:users,email',
            'mobile_no' => 'required|numeric|digits:11|unique:users,mobile_no',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        ]);
        if ($validations->fails()) {
            return redirect()->back()->withInput()->withErrors($validations->errors());
        } else {
            $data = $request->except('password', 'password_confirmation', '_token');
            $data['password'] = Hash::make($request->password);
            unset($data['g-recaptcha-response']);
            $youth_id = DB::table('users')->insertGetId($data);
            \Auth::loginUsingId($youth_id);
            $user = \Auth::user();
            $user->assignRole('scholarship');

            return redirect()->route('youth-dashboard');
        }
    }

    public function logout(Request $request)
    {
        return redirect()->route('youth-dashboard');
    }

    public function showApplicationFromHistory($encryptedHistoryId)
    {
        try {
            $historyId = decrypt($encryptedHistoryId);
        } catch (\Exception $e) {
            SweetAlert::toast('Invalid history ID', 'error');
            return redirect()->back();
        }

        $applicationHistory = \App\Models\ScholarshipApplicationHistory::find($historyId);
        if (!$applicationHistory) {
            SweetAlert::toast('Application history not found', 'error');
            return redirect()->back();
        }

        // Optionally, check if the logged-in user owns this history record
        $userId = \Auth::user()->id;
        if ($applicationHistory->student_id != $userId) {
            SweetAlert::toast('Unauthorized access to history', 'error');
            return redirect()->back();
        }

        // Pass the history data to a view for display
        return view('youth.scholarship.application_history', [
            'applicationHistory' => $applicationHistory
        ]);
    }


    public function show_dashboard()
    {
        // $user = User::findorfail(\Auth::User()->id);
        $uni = auth()->guard('student')->user()->university_id;
        // auth()->guard('student')->user()->id;
        // dd($uni);
        $auth_id = auth()->guard('student')->user()->id;

        // dd($user_id);

        $total = ScholarshipApplications::where(['student_id' => $auth_id])->count();
        // dd($total);

        $reject = ScholarshipApplications::where(['student_id' => $auth_id])->whereIn('status', [6, 3])->count();
        $approved = ScholarshipApplications::where(['student_id' => $auth_id, 'status' => 5])->count();

        $pending = ScholarshipApplications::where(['student_id' => $auth_id])->whereIn('status', [2, 4])->count();
        $pending1 = ScholarshipApplications::get();

        $model = ScholarshipApplications::where(['student_id' => $auth_id, 'university_id' => $uni])->orderBy('id', 'desc')->paginate(20);

        // Fetch history applications for this user
        $historyModels = \App\Models\ScholarshipApplicationHistory::where('student_id', $auth_id)
            ->orderBy('id', 'desc')
            ->paginate(20);

        // Pass both current and history applications to the dashboard view
        return view('youth.pages.dashboard', compact('model', 'historyModels', 'approved', 'reject', 'pending', 'total'));
    }

    public function get_cv()
    {
        $user_id = \Auth::user()->id;
        // $user_id = auth()->guard('student')->user()->id;


        $personal_info = User::join('districts', 'districts.id', '=', 'users.domicile_district_id')
            ->where([
                ['users.id', $user_id],
                ['type', 'youth']
            ])
            ->select('users.*', 'districts.name as district')
            ->first();

        $experiences = YouthExperience::where(['user_id' => $user_id])->orderBy('id', 'desc')->get();
        $educations = YouthEducation::join('degree_certificates', 'degree_certificates.id', '=', 'youth_education.degree_certificate_id')
            ->where(['user_id' => $user_id])
            ->select('youth_education.*', 'degree_certificates.name')
            ->get();
        return view('youth.pages.cv', compact('personal_info', 'experiences', 'educations'));
    }

    public function getEducationalStatus($id)
    {
        $educationalStatus = User::where('id', $id)->value('educational_status');
        if ($educationalStatus === 'Educated') {
            return true;
        } else {
            return false;
        }
    }
}
