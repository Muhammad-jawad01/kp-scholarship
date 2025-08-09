<?php

namespace App\Http\Controllers\Scholarship;


use App\Http\Controllers\Controller;
use App\Models\Scholarship;
use App\Models\Applicant_education;
use App\Models\Applicant_financial_record;
use App\Models\Expense;
use App\Models\Family_info;
use App\Models\ScholarshipApplications;
use App\Models\Scholarship_assets;
use App\Models\Scholarship_documents;
use App\Models\University;
use App\Models\User;
use App\Helpers\Helper;
use App\Models\Districts;
use App\Models\Student;
use App\Services\ScholarshipApplicationHistoryService;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
// use App\Models\Scholarship_doc;
use Illuminate\Support\Facades\Crypt;


use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */





    public function index()
    {
        $student_id = auth('student')->user()->id;
        $family_info = Family_info::where('student_id', $student_id)->first();
        $scholarships = Scholarship::where('status', 1)->get();

        $expense = Expense::where('student_id', $student_id)->first();
        $scholarshipDocuments = Scholarship_documents::where('student_id', $student_id)->first();

        // dd($scholarships, $family_info, $expense, $scholarshipDocuments);
        if (!$family_info || !$expense || !$scholarshipDocuments) {
            Alert::toast("Please Complete the profile First ", 'error');
            return redirect()->back();
        }

        $districts = Districts::get();
        $data['districts'] = $districts;
        $data['student_id'] = $student_id;
        $data['family_info_id'] = $family_info->id ?? '';
        $data['expense_id'] = $expense->id ?? '';
        $data['scholarship_document_id'] = $scholarshipDocuments->id ?? '';

        return view('youth.scholarship.apply', compact('data', 'scholarships'));
    }
    public function general()
    {
        $user_edu = Applicant_education::whereStudentId(auth('student')->user()->id)->get();

        // dd($user_edu);
        $universities = University::get();
        $districts = Districts::get();

        return view('youth.scholarship.index', compact('user_edu', 'universities', 'districts'));
    }
    public function general_info(Request $request)
    {
        // dd(request()->all());
        $validator = Validator::make($request->all(), [
            'university_id' => 'required|exists:universities,id',
            'degree' => 'required',
            'campus' => 'required',
            'discipline' => 'required',
            'sub_discipline' => 'required',
            'university_reg_no' => 'required',
            'program_duration' => 'required',
            'current_semester' => 'required',
            'name' => 'required',
            'father_name' => 'required',
            'guardian_name' => 'required',
            'gender' => 'required|in:Male,Female',
            'date_of_birth' => 'required|date',
            'age' => 'required|integer',
            'marital_status' => 'required',
            'nic' => 'required',
            'mobile_no' => 'required',
            'nationality' => 'required',
            'domicile_district_id' => 'required|exists:districts,id',
            'tehsil' => 'required',
            'email' => 'required',
            'address' => 'required',
            'level.*' => 'required|string|max:255',
            'institute_university_name.*' => 'required|string|max:255',
            'passing_year.*' => 'required|numeric',
            'total_marks_cgpa.*' => 'required|numeric',
            'obtained_marks_cgpa.*' => 'required|numeric',

        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $errorDisplay = '';

            foreach ($errors->all() as $error) {
                $errorDisplay .= '<br>' . $error;
            }

            Alert::toast($errorDisplay, 'error')->timerProgressBar();
            return redirect()->back()->withErrors($errors)->withInput();
        }


        $loop = $request->level ?? [];
        $student_id = auth('student')->user()->id;
        $userData = ($request->all());
        $user = Student::find($student_id);
        $user->fill($userData);
        $user->save();
        // foreach ($loop as $Key => $value) {
        //     $eduId = $request->edu_id[$Key] ?? '';

        //     if (!empty($eduId)) {
        //         $model = Applicant_education::find($eduId);
        //         if ($model) {
        //             $model->user_id = auth('student')->user()->id;
        //             $model->student_id = auth('student')->user()->id;
        //             $model->level = $request->level[$Key] ?? '';
        //             $model->institute_university_name = $request->institute_university_name[$Key] ?? '';
        //             $model->passing_year = $request->passing_year[$Key] ?? '';
        //             // $model->per_month_kpef = $request->per_month_kpef[$Key] ?? '';
        //             $model->total_marks_cgpa = $request->total_marks_cgpa[$Key] ?? '';
        //             $model->obtained_marks_cgpa = $request->obtained_marks_cgpa[$Key] ?? '';
        //             $model->save();
        //         }
        //     } else {
        //         $model = new Applicant_education();
        //         $model->user_id = auth('student')->user()->id;
        //         $model->student_id = auth('student')->user()->id;
        //         $model->level = $request->level[$Key] ?? '';
        //         $model->institute_university_name = $request->institute_university_name[$Key] ?? '';
        //         $model->passing_year = $request->passing_year[$Key] ?? '';
        //         $model->total_marks_cgpa = $request->total_marks_cgpa[$Key] ?? '';
        //         $model->obtained_marks_cgpa = $request->obtained_marks_cgpa[$Key] ?? '';
        //         $model->save();
        //     }
        // }

        foreach ($loop as $key => $value) {
            $eduId = $request->edu_id[$key] ?? null;

            $model = !empty($eduId) ? Applicant_education::find($eduId) : new Applicant_education();

            if (!$model) {
                continue;
            }

            // $userId = auth('student')->user()->id;

            $model->user_id = $student_id;
            $model->student_id = $student_id;
            $model->level = $request->level[$key] ?? '';
            $model->institute_university_name = $request->institute_university_name[$key] ?? '';
            $model->passing_year = $request->passing_year[$key] ?? '';
            $model->total_marks_cgpa = $request->total_marks_cgpa[$key] ?? '';
            $model->obtained_marks_cgpa = $request->obtained_marks_cgpa[$key] ?? '';
            $model->save();
        }

        Alert::toast("General Information Updated Successfully", 'success');
        return redirect()->back();
    }
    public function familyinfo()
    {
        $user_id = auth('student')->user()->id;
        $model = Family_info::where('user_id', $user_id)->first();
        return view('youth.scholarship.familyinfo', compact('model'));
    }
    public function familyinfo_store()
    {

        $validator = Validator::make(request()->all(), [
            'father_status' => 'required',
            'father_cnic' => 'required',
            'father_profession' => 'required',
            'father_earning' => 'required',
            'father_guardian' => 'required',
            'employer_address' => 'required',
            'father_guardian_designation' => 'required',
            'financial_support' => 'required',
            'father_ntn_number' => 'required',
            'mother_status' => 'required',
            'mother_profession' => 'required',
            'professional_status' => 'required',
            'parent_marriage_relationship' => 'required',
            'mobile_number' => 'required',
            'telephone_number' => 'nullable',
            'total_family_members' => 'required',
            'dependent_family_members' => 'required',
            'total_earning_members' => 'required',
            'family_members_studying' => 'required',
            'num_of_brothers' => 'required',
            'num_of_sisters' => 'required',
            'family_income' => 'required',
            'income_from_other_sources' => 'required',

        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $errorDisplay = "";
            foreach ($errors->messages() as $key => $error) {
                $errorDisplay = $errorDisplay . '<br>' . $error[0];
            }
            Alert::toast($errorDisplay, 'error')->timerProgressBar();
            return redirect()->back();
        }

        $student_id = auth('student')->user()->id;
        $data = request()->all();
        $data['student_id'] = $student_id;
        $model = Family_info::where('student_id', $student_id)->first();
        if ($model) {
            $model->fill($data);
            $model->save();
        } else {
            $model = new Family_info();
            $model->fill($data);
            $model->save();
        }
        Alert::toast("Family  Information Updated Successfully", 'success');
        return redirect()->back();
    }

    // expences

    public function expenses()
    {
        $student_id = auth('student')->user()->id;
        $model = Expense::where('student_id', $student_id)->first();

        $applicant_fn_r = Applicant_financial_record::where(['student_id' => $student_id, 'expense_id' => $model->id ?? 0])->orderBy('id')->get();
        $scholarship_assets = Scholarship_assets::where(['student_id' => $student_id, 'expense_id' => $model->id ?? 0])->orderBy('id')->get();




        return view('youth.scholarship.expenses', compact('model', 'applicant_fn_r', 'scholarship_assets'));
    }

    public function expenses_store()
    {

        $validator = Validator::make(request()->all(), [
            'per_month_edu_expenditure' => 'required',
            'accommodation_type' => 'required',
            'house_structure' => 'required',
            'house_status' => 'required',
            'num_rooms' => 'required',
            'home_size' => 'required',
            'covered_area' => 'required',
            'num_air_conditioners' => 'required',
            'num_servants' => 'required',
            'monthly_rent' => 'required',
            'address' => 'required',
            'per_month_disposable_income' => 'required',
            'other_house_details' => 'required',
            'average_telephone_bill_six_months' => 'required',
            'average_electricity_bill_six_months' => 'required',
            'average_gas_bill_six_months' => 'required',
            'average_water_bill_six_months' => 'required',
            'average_mobile_bill_six_months' => 'required',
            'average_educational_expenditure_siblings' => 'required',
            'average_educational_expenditure_applicant' => 'required',
            'average_kitchen_expenditure' => 'required',
            'average_medical_expenditure' => 'required',
            'accommodation_expenditure_case_rent' => 'required',
            'average_family_misc_expenditure' => 'required',
            // 'total_monthly_expenditure' => 'required',
            'family_own_transport' => 'required',
            'family_own_cattle' => 'required',
            'detail_assets_lease' => 'required',
            'admission_first_semester_charges' => 'required',
            'KPEF_merit_Needsbased_scholarships_program' => 'required',
            'statement_purpose' => 'required',
            'name.*' => 'required',
            'profession.*' => 'required',
            'financially_supporting.*' => 'required',
            'relationship.*' => 'required',
            'gross_income.*' => 'required',
            'net_income.*' => 'required',
            'type.*' => 'required',
            'quantity.*' => 'required',
            'market_value.*' => 'required',


        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $errorDisplay = "";
            foreach ($errors->messages() as $key => $error) {
                $errorDisplay = $errorDisplay . '<br>' . $error[0];
            }
            Alert::toast($errorDisplay, 'error')->timerProgressBar();
            return redirect()->back();
        }

        $student_id = auth('student')->user()->id;
        $data = request()->all();
        // dd($data);
        $data['student_id'] = $student_id;
        $expense = Expense::where('student_id', $student_id)->first();

        if ($expense) {
            $expense->fill($data);

            $expense->save();
        } else {
            $expense = new Expense();
            $expense->fill($data);
            $expense->save();
        }
        $ex_id = $expense->id;

        $finloop = request()->name ?? [];
        $applicant_fn_r = Applicant_financial_record::where(['student_id' => $student_id, 'expense_id' => $ex_id])->count();
        if ($applicant_fn_r > 0) {
            // dd('lfdkajadqqqqqs');
            Applicant_financial_record::query()->where(['student_id' => $student_id, 'expense_id' => $ex_id])->delete();
        }


        foreach ($finloop as $Key => $value) {
            $applicant_fn = new Applicant_financial_record();
            $applicant_fn->student_id = $student_id;
            $applicant_fn->expense_id = $ex_id;
            $applicant_fn->name = request()->name[$Key] ?? '';
            $applicant_fn->profession = request()->profession[$Key] ?? '';
            $applicant_fn->financially_supporting = request()->financially_supporting[$Key] ?? '';
            $applicant_fn->relationship = request()->relationship[$Key] ?? '';
            $applicant_fn->gross_income = request()->gross_income[$Key] ?? '';
            $applicant_fn->net_income = request()->net_income[$Key] ?? '';
            $applicant_fn->save();
        }
        $expenceloop = request()->type ?? [];

        $scholarship_assets = Scholarship_assets::where(['student_id' => $student_id, 'expense_id' => $ex_id])->count();
        if ($applicant_fn_r > 0) {
            // dd('lfdkajadqqqqqs');
            Scholarship_assets::query()->where(['student_id' => $student_id, 'expense_id' => $ex_id])->delete();
        }

        foreach ($expenceloop as $Key => $value) {


            $scholarship_assets = new  Scholarship_assets();

            $scholarship_assets->student_id = $student_id;
            $scholarship_assets->expense_id = $ex_id;
            $scholarship_assets->type = request()->type[$Key] ?? '';
            $scholarship_assets->quantity = request()->quantity[$Key] ?? '';
            $scholarship_assets->current_market_value = request()->market_value[$Key] ?? '';
            $scholarship_assets->save();
        }
        Alert::toast("Expenses  Information Updated Successfully", 'success');
        return redirect()->back();
    }
    public function documents()
    {
        $student_id = auth('student')->user()->id;

        $model = Scholarship_documents::where('student_id', $student_id)->first();

        return view('youth.scholarship.documents', compact('model'));
    }
    public function documents_store()
    {
        $student_id = auth('student')->user()->id;
        $data = request()->all();
        // dd($data);
        $data['user_id'] = $student_id;
        $data['terms_conditions'] = Helper::switchToDb(request()->terms_conditions);

        $scholarshipDocuments = Scholarship_documents::where('student_id', $student_id)->first();

        if ($scholarshipDocuments) {
            $scholarshipDocuments->fill($data);

            $scholarshipDocuments->save();
        } else {
            $scholarshipDocuments = new Scholarship_documents();
            $scholarshipDocuments->fill($data);
            $scholarshipDocuments->save();
        }

        $scholarshipDocuments->addAllMediaFromTokens();

        if ($scholarshipDocuments) {
            Alert::toast("Documents Information Updated Successfully", 'success');
            return redirect()->back();
        } else {
            Alert::toast('Fail to Update Document Information', 'error');
            return redirect()->back();
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function print($id)
    {
        $scholarshipId = decrypt($id);
        $student_id = auth('student')->user()->id;

        $scholarshipapplications = ScholarshipApplications::whereStudentId($student_id)->first();
        $scholarship = Scholarship::find($scholarshipId);

        // Try to get data from history first, fallback to current data
        $historyService = new ScholarshipApplicationHistoryService();
        $applicationHistories = $historyService->getStudentApplicationHistory($student_id);

        // Find history for this specific scholarship application
        $applicationHistory = $applicationHistories->where('scholarship_id', $scholarshipId)->first();

        if ($applicationHistory) {
            // Use preserved history data
            $data = $this->getDataFromHistory($applicationHistory);
            $mediaArray = $this->getMediaFromHistory($applicationHistory);
        } else {
            // Fallback to current data (original method)
            $user_edu = Applicant_education::whereStudentId($student_id)->get();
            $expense = Expense::whereStudentId($student_id)->first();
            $applicant_fn_r = Applicant_financial_record::where(['student_id' => $student_id, 'expense_id' => $expense->id ?? 0])->get();
            $scholarship_assets = Scholarship_assets::where(['student_id' => $student_id, 'expense_id' => $expense->id ?? 0])->orderBy('created_at', 'desc')->take(8)->get();
            $family_info = Family_info::whereStudentId($student_id)->first();
            $scholarship_documents = Scholarship_documents::whereStudentId($student_id)->first();

            $data['user_edu'] = $user_edu;
            $data['expense'] = $expense;
            $data['applicant_fn_r'] = $applicant_fn_r;
            $data['scholarship_documents'] = $scholarship_documents;
            $data['scholarship_assets'] = $scholarship_assets;
            $data['family_info'] = $family_info;
            $data['scholarship'] = $scholarship;
            $data['scholarshipapplications'] = $scholarshipapplications;
            $data['student'] = auth('student')->user(); // Current student data as fallback

            $mediaArray = [
                'last_fee' => $scholarship_documents ? $scholarship_documents->getMedia('last_fee') : collect(),
                'agreement_rent' => $scholarship_documents ? $scholarship_documents->getMedia('agreement_rent') : collect(),
                'bills' => $scholarship_documents ? $scholarship_documents->getMedia('bills') : collect(),
                'income_slip' => $scholarship_documents ? $scholarship_documents->getMedia('income_slip') : collect(),
                'p_nic' => $scholarship_documents ? $scholarship_documents->getMedia('p_nic') : collect(),
                'applicant_nic' => $scholarship_documents ? $scholarship_documents->getMedia('applicant_nic') : collect(),
                'medical_bills' => $scholarship_documents ? $scholarship_documents->getMedia('medical_bills') : collect(),
                'applicant_img' => $scholarship_documents ? $scholarship_documents->getMedia('applicant_img') : collect(),
            ];
        }
        // return $mediaArray['medical_bills']->count() > 0 ? 'yes' : 'no';


        return view('youth.scholarship.print', compact('data', 'mediaArray'));
    }

    /**
     * Print application from history record
     */
    public function printFromHistory($encryptedHistoryId)
    {
        try {
            // Decrypt the history ID
            $historyId = decrypt($encryptedHistoryId);
        } catch (\Exception $e) {
            Alert::toast('Invalid history ID', 'error');
            return redirect()->back();
        }

        $applicationHistory = \App\Models\ScholarshipApplicationHistory::find($historyId);

        if (!$applicationHistory) {
            Alert::toast('Application history not found', 'error');
            return redirect()->back();
        }

        // Check if current user owns this history record
        $currentStudentId = auth('student')->user()->id;
        if ($applicationHistory->student_id !== $currentStudentId) {
            Alert::toast('Unauthorized access to application history', 'error');
            return redirect()->back();
        }

        // Get formatted data from history
        $data = $this->getDataFromHistory($applicationHistory);
        $mediaArray = $this->getMediaFromHistory($applicationHistory);

        return view('youth.scholarship.print', compact('data', 'mediaArray'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $scholarshipId = $request->input('scholarship_id');
        $myNumberJson = $request->input('myNumber');
        $myNumber = json_decode($myNumberJson, true);
        $studentID = $myNumber['student_id'];
        $familyInfoID = $myNumber['family_info_id'];
        $expenseID = $myNumber['expense_id'];
        $scholarshipDocumentID = $myNumber['scholarship_document_id'];
        $uni = auth('student')->user()->university_id;
        $applied_year = $request->input('applied_year');

        // Get scholarship details for eligibility checking
        $scholarship = Scholarship::find($scholarshipId);
        if (!$scholarship) {
            Alert::toast('Scholarship not found', 'error');
            return redirect()->back();
        }

        // Check if scholarship is still accepting applications
        if (!$scholarship->isApplicationOpen()) {
            Alert::toast('Application period has ended for this scholarship', 'error');
            return redirect()->back();
        }

        // Check eligibility
        $eligibilityCheck = $this->checkEligibility($scholarship, $studentID);
        if (!$eligibilityCheck['eligible']) {
            Alert::toast('You are not eligible for this scholarship: ' . $eligibilityCheck['reason'], 'error');
            return redirect()->back();
        }

        // Check if user already applied
        $existingApplication = ScholarshipApplications::where(['student_id' => $studentID, 'scholarship_id' => $scholarshipId])->first();
        if ($existingApplication) {
            Alert::toast('You have already applied for this scholarship', 'error');
            return redirect()->back();
        }

        // Check application limit
        if ($scholarship->max_applications) {
            $currentApplications = ScholarshipApplications::where('scholarship_id', $scholarshipId)->count();
            if ($currentApplications >= $scholarship->max_applications) {
                Alert::toast('Maximum applications reached for this scholarship', 'error');
                return redirect()->back();
            }
        }

        // Create application history first
        $historyService = new ScholarshipApplicationHistoryService();

        try {
            // Create complete application history snapshot
            Log::info('Creating application history for student: ' . $studentID . ', scholarship: ' . $scholarshipId);

            $applicationHistory = $historyService->createApplicationHistory(
                [
                    'applied_year' => $applied_year,
                    'application_date' => date('Y-m-d'),
                    'terms_conditions' => $request->has('terms_conditions')
                ],
                $studentID,
                $scholarshipId
            );

            Log::info('Application history created with ID: ' . $applicationHistory->id);

            // Create application
            $model = new ScholarshipApplications();
            $model->scholarship_id = $scholarshipId;
            $model->user_id = $studentID;
            $model->student_id = $studentID;
            $model->university_id = $uni;
            $model->family_info_id = $familyInfoID;
            $model->expense_id = $expenseID;
            $model->scholarship_document_id = $scholarshipDocumentID;
            $model->applied_year = $applied_year;
            $model->save();

            // Link history to original application
            $historyService->linkToOriginalApplication($applicationHistory->id, $model->id);

            // History data access - اب آپ preserved data کو access کر سکتے ہیں
            $financialRecords = $applicationHistory->getFinancialRecords();
            $educationRecords = $applicationHistory->getEducationRecords();
            $scholarshipAssets = $applicationHistory->getScholarshipAssets();
            $mediaFiles = $applicationHistory->getMediaFiles();

            // Check methods - data موجود ہے یا نہیں
            if ($applicationHistory->hasFinancialRecords()) {
                // Process financial data if needed
                Log::info('Financial records preserved for application: ' . $model->id);
            }

            if ($applicationHistory->hasEducationRecords()) {
                // Process education records if needed
                Log::info('Education records preserved for application: ' . $model->id);
            }

            if ($applicationHistory->hasScholarshipAssets()) {
                // Process scholarship assets if needed
                Log::info('Scholarship assets preserved for application: ' . $model->id);
            }

            if ($applicationHistory->hasScholarshipDocuments()) {
                // Process scholarship documents and media files if needed
                Log::info('Scholarship documents and media files preserved for application: ' . $model->id);
            }

            if ($model) {
                Alert::toast("You Have Successfully Applied for Scholarship", 'success');
                return response()->json([
                    'success' => true,
                    'history_id' => $applicationHistory->id,
                    'encrypted_history_id' => encrypt($applicationHistory->id),
                    'scholarship_id' => $scholarshipId,
                    'application_id' => $model->id,
                    'encrypted_scholarship_id' => encrypt($scholarshipId)
                ]);
            } else {
                Alert::toast('Failed to Apply for Scholarship', 'error');
                return response()->json(['success' => false]);
            }
        } catch (\Exception $e) {
            Log::error('Scholarship application error: ' . $e->getMessage());
            Alert::toast('Error submitting application. Please try again.', 'error');
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    private function checkEligibility($scholarship, $userId)
    {
        $student = Student::find($userId);
        $familyInfo = Family_info::where('student_id', $userId)->first();
        $expense = Expense::where('student_id', $userId)->first();
        $education = Applicant_education::where('student_id', $userId)->get();

        // Check district eligibility
        if ($scholarship->eligible_districts) {
            $eligibleDistricts = is_array($scholarship->eligible_districts) ? $scholarship->eligible_districts : json_decode($scholarship->eligible_districts, true);
            if ($eligibleDistricts && !in_array($student->domicile_district_id, $eligibleDistricts)) {
                return ['eligible' => false, 'reason' => 'Your district is not eligible for this scholarship'];
            }
        }

        // Check family income
        if ($scholarship->min_family_income && $familyInfo) {
            if ($familyInfo->family_income < $scholarship->min_family_income) {
                return ['eligible' => false, 'reason' => 'Family income is below minimum requirement'];
            }
        }

        if ($scholarship->max_family_income && $familyInfo) {
            if ($familyInfo->family_income > $scholarship->max_family_income) {
                return ['eligible' => false, 'reason' => 'Family income exceeds maximum limit'];
            }
        }

        // Check education level
        if ($scholarship->education_levels) {
            $requiredLevels = is_array($scholarship->education_levels) ? $scholarship->education_levels : json_decode($scholarship->education_levels, true);
            if ($requiredLevels && $education->count() > 0) {
                $studentLevels = $education->pluck('level')->toArray();
                $hasRequiredLevel = false;
                foreach ($studentLevels as $level) {
                    if (in_array($level, $requiredLevels)) {
                        $hasRequiredLevel = true;
                        break;
                    }
                }
                if (!$hasRequiredLevel) {
                    return ['eligible' => false, 'reason' => 'Your education level does not match scholarship requirements'];
                }
            }
        }

        return ['eligible' => true, 'reason' => ''];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function show(Scholarship $scholarship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function edit(Scholarship $scholarship)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Scholarship $scholarship)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scholarship $scholarship)
    {
        //
    }

    /**
     * View application history with preserved data
     * یہ method admin panel یا student panel میں history view کرنے کے لیے
     */
    public function viewApplicationHistory($historyId)
    {
        $history = \App\Models\ScholarshipApplicationHistory::find($historyId);

        if (!$history) {
            Alert::toast('Application history not found', 'error');
            return redirect()->back();
        }

        // History data access - preserved data کو retrieve کریں
        $financialRecords = $history->getFinancialRecords();
        $educationRecords = $history->getEducationRecords();
        $scholarshipAssets = $history->getScholarshipAssets();
        $mediaFiles = $history->getMediaFiles();

        // Original application data (if still exists)
        $originalApplication = null;
        if ($history->original_application_id) {
            $originalApplication = ScholarshipApplications::find($history->original_application_id);
        }

        $data = [
            'history' => $history,
            'original_application' => $originalApplication,
            'financial_records' => $financialRecords,
            'education_records' => $educationRecords,
            'scholarship_assets' => $scholarshipAssets,
            'media_files' => $mediaFiles,
            'family_info' => $history->family_info_data,
            'expense_data' => $history->expense_data,
            'document_data' => $history->document_data,
            'student_profile' => $history->additional_data['student_profile'] ?? null,
        ];

        // Check کریں کہ کون سا data available ہے
        $dataAvailability = [
            'has_financial_records' => $history->hasFinancialRecords(),
            'has_education_records' => $history->hasEducationRecords(),
            'has_scholarship_assets' => $history->hasScholarshipAssets(),
            'has_scholarship_documents' => $history->hasScholarshipDocuments(),
        ];

        return view('admin.scholarship.application-history', compact('data', 'dataAvailability'));
    }

    /**
     * Get student application history
     */
    public function getStudentHistory($studentId)
    {
        $historyService = new \App\Services\ScholarshipApplicationHistoryService();
        $histories = $historyService->getStudentApplicationHistory($studentId);

        // ہر history record کے لیے preserved data check کریں
        $historiesWithData = $histories->map(function ($history) {
            return [
                'history' => $history,
                'has_data' => [
                    'financial_records' => $history->hasFinancialRecords(),
                    'education_records' => $history->hasEducationRecords(),
                    'scholarship_assets' => $history->hasScholarshipAssets(),
                    'scholarship_documents' => $history->hasScholarshipDocuments(),
                ]
            ];
        });

        return response()->json([
            'success' => true,
            'data' => $historiesWithData
        ]);
    }

    /**
     * Get formatted data from history record for printing
     */
    private function getDataFromHistory($applicationHistory)
    {
        $data = [];

        // Get preserved data from history
        $data['family_info'] = (object) $applicationHistory->family_info_data;
        $data['expense'] = (object) $applicationHistory->expense_data;
        $data['scholarship_documents'] = (object) ($applicationHistory->scholarship_documents_data['document_record'] ?? []);

        // Education records
        $data['user_edu'] = collect($applicationHistory->getEducationRecords())->map(function ($edu) {
            return (object) $edu;
        });

        // Financial records
        $data['applicant_fn_r'] = collect($applicationHistory->getFinancialRecords())->map(function ($record) {
            return (object) $record;
        });

        // Scholarship assets
        $data['scholarship_assets'] = collect($applicationHistory->getScholarshipAssets())->map(function ($asset) {
            return (object) $asset;
        });

        // Scholarship and application info
        $data['scholarship'] = (object) [
            'id' => $applicationHistory->scholarship_id,
            'name' => $applicationHistory->scholarship_name,
            'description' => $applicationHistory->scholarship_description,
        ];

        $data['scholarshipapplications'] = (object) [
            'id' => $applicationHistory->original_application_id,
            'student_id' => $applicationHistory->student_id,
            'scholarship_id' => $applicationHistory->scholarship_id,
            'applied_year' => $applicationHistory->applied_year,
            'application_date' => $applicationHistory->application_date,
        ];

        // Student profile from history
        $studentProfile = $applicationHistory->additional_data['student_profile'] ?? [];
        $data['student'] = (object) $studentProfile;

        return $data;
    }

    /**
     * Get media array from history record
     */
    private function getMediaFromHistory($applicationHistory)
    {
        $mediaFiles = $applicationHistory->getMediaFiles();

        // Group media files by collection
        $mediaArray = [
            'last_fee' => collect(),
            'agreement_rent' => collect(),
            'bills' => collect(),
            'income_slip' => collect(),
            'p_nic' => collect(),
            'applicant_nic' => collect(),
            'medical_bills' => collect(),
            'applicant_img' => collect(),
        ];

        foreach ($mediaFiles as $media) {
            $collectionName = $media['collection_name'] ?? '';
            if (isset($mediaArray[$collectionName])) {
                $mediaArray[$collectionName]->push((object) $media);
            }
        }

        return $mediaArray;
    }
}
