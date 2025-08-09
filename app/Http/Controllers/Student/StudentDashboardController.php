<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Scholarship;
use App\Models\ScholarshipApplications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:student');
    }

    public function index()
    {
        $student = Auth::guard('student')->user();

        $availableScholarships = Scholarship::where('status', true)
            ->where(function ($query) {
                $query->whereNull('application_end_date')
                    ->orWhere('application_end_date', '>=', now());
            })
            ->get();

        $appliedScholarships = ScholarshipApplications::where('student_id', $student->id)
            ->with('scholarship')
            ->latest()
            ->get();

        $profileCompletion = $this->calculateProfileCompletion($student);

        return view('student.dashboard', compact(
            'student',
            'availableScholarships',
            'appliedScholarships',
            'profileCompletion'
        ));
    }

    public function profile()
    {
        $student = Auth::guard('student')->user();
        $districts = \App\Models\Districts::all();
        $universities = \App\Models\University::all();

        return view('student.profile', compact('student', 'districts', 'universities'));
    }

    public function editProfile()
    {
        $student = Auth::guard('student')->user();
        $districts = \App\Models\Districts::all();
        $universities = \App\Models\University::all();

        return view('student.profile-edit', compact('student', 'districts', 'universities'));
    }

    public function updateProfile(Request $request)
    {
        $student = Auth::guard('student')->user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'father_name' => ['required', 'string', 'max:255'],
            'guardian_name' => ['nullable', 'string', 'max:255'],
            'mobile_no' => ['required', 'string', 'max:15'],
            'date_of_birth' => ['required', 'date', 'before:today'],
            'age' => ['nullable', 'integer', 'min:15', 'max:40'],
            'gender' => ['required', 'in:male,female,other'],
            'marital_status' => ['nullable', 'string', 'max:50'],
            'nic' => ['nullable', 'string', 'max:20'],
            'nationality' => ['nullable', 'string', 'max:100'],
            'address' => ['required', 'string', 'max:500'],
            'domicile_district_id' => ['required', 'exists:districts,id'],
            'tehsil' => ['nullable', 'string', 'max:100'],
            'university_id' => ['nullable', 'exists:universities,id'],
            'degree' => ['nullable', 'string', 'max:255'],
            'campus' => ['nullable', 'string', 'max:255'],
            'discipline' => ['nullable', 'string', 'max:255'],
            'sub_discipline' => ['nullable', 'string', 'max:255'],
            'university_reg_no' => ['nullable', 'string', 'max:100'],
            'program_duration' => ['nullable', 'string', 'max:50'],
            'current_semester' => ['nullable', 'string', 'max:50'],
        ]);

        $updateData = $request->only([
            'name',
            'father_name',
            'guardian_name',
            'mobile_no',
            'date_of_birth',
            'age',
            'gender',
            'marital_status',
            'nic',
            'nationality',
            'address',
            'domicile_district_id',
            'tehsil',
            'religion',
            'disability_status',
            'university_id',
            'degree',
            'campus',
            'discipline',
            'sub_discipline',
            'university_reg_no',
            'program_duration',
            'current_semester'
        ]);

        // Update each field individually
        foreach ($updateData as $key => $value) {
            $student->$key = $value;
        }

        // Calculate profile completion
        $student->profile_completed = $this->calculateProfileCompletion($student);

        // Mark as active
        $student->is_active = true;

        // Use the model to update
        \App\Models\Student::where('id', $student->id)->update($updateData + [
            'profile_completed' => $student->profile_completed,
            'is_active' => true
        ]);

        return redirect()->route('student.profile')->with('success', 'Profile updated successfully!');
    }

    private function calculateProfileCompletion($student)
    {
        $fields = [
            'name',
            'father_name',
            'email',
            'nic',
            'mobile_no',
            'date_of_birth',
            'gender',
            'address',
            'domicile_district_id',
            'university_id',
            'degree'
        ];

        $completed = 0;
        foreach ($fields as $field) {
            if (!empty($student->$field)) {
                $completed++;
            }
        }

        return round(($completed / count($fields)) * 100);
    }
}
