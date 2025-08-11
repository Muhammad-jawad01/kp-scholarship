<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Scholarship;
use App\Models\Applicant_education;
use App\Models\Applicant_financial_record;
use App\Models\Comment;
use App\Models\Family_info;
use App\Models\ScholarshipApplications;
use App\Models\Scholarship_assets;
use App\Models\Scholarship_documents;
use App\Models\User;
use App\Models\Districts;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;


class ScholarshipController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:Scholarship-list|Scholarship-create|Scholarship-edit|Scholarship-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:Scholarship-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:Scholarship-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Scholarship-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $model = Scholarship::orderBy('id', 'desc')->paginate(20);
        return view('content.apps.scholarship.scholarship', compact('model'));
    }

    public function general()
    {
        return view('content.apps.scholarship.index');
    }
    public function familyinfo()
    {
        return view('content.apps.scholarship.familyinfo');
    }
    public function expenses()
    {
        return view('content.apps.scholarship.expenses');
    }
    public function documents()
    {
        return view('content.apps.scholarship.documents');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts = Districts::where('is_deleted', 0)->orderBy('name')->get();
        return view('content.apps.scholarship.create', compact('districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'application_start_date' => 'required|date',
            'application_end_date' => 'required|date|after:application_start_date',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            foreach ($errors->messages() as $key => $error) {
                Alert::toast($error[0], 'error');
            }
            return redirect()->back();
        }

        $data = $request->all();

        // Auto-generate slug from name
        $data['slug'] = Str::slug($request->name);

        // Handle boolean fields (store as integer 0/1)
        $data['status'] = $request->has('status') ? 1 : 0;
        $data['require_district_verification'] = $request->has('require_district_verification') ? 1 : 0;
        $data['require_signatures'] = $request->has('require_signatures') ? 1 : 0;
        $data['requires_education_documents'] = $request->has('requires_education_documents') ? 1 : 0;
        $data['requires_profile_document'] = $request->has('requires_profile_document') ? 1 : 0;
        $data['requires_cnic'] = $request->has('requires_cnic') ? 1 : 0;
        $data['requires_domicile'] = $request->has('requires_domicile') ? 1 : 0;
        $data['requires_income_certificate'] = $request->has('requires_income_certificate') ? 1 : 0;
        $data['requires_electricity_bill'] = $request->has('requires_electricity_bill') ? 1 : 0;
        $data['requires_gas_bill'] = $request->has('requires_gas_bill') ? 1 : 0;
        $data['requires_telephone_bill'] = $request->has('requires_telephone_bill') ? 1 : 0;
        $data['requires_financial_details'] = $request->has('requires_financial_details') ? 1 : 0;
        $data['requires_asset_details'] = $request->has('requires_asset_details') ? 1 : 0;
        $data['requires_signature'] = $request->has('requires_signature') ? 1 : 0;
        $data['requires_guardian_signature'] = $request->has('requires_guardian_signature') ? 1 : 0;

        // Handle JSON array fields
        $data['education_levels'] = $request->has('education_levels') ? json_encode($request->education_levels) : null;
        $data['eligible_districts'] = $request->has('eligible_districts') ? json_encode($request->eligible_districts) : null;
        $data['required_documents'] = $request->has('required_documents') ? json_encode($request->required_documents) : null;

        // Handle award_amount and department_id
        $data['award_amount'] = $request->input('award_amount');
        $data['department_id'] = $request->input('department_id');

        unset($data['_token']);
        $scholarship = Scholarship::Create($data);
        $scholarship->addAllMediaFromTokens();

        if ($scholarship) {
            Alert::toast("Scholarship Created Successfully", 'success');
            return redirect()->route('scholarship.index');
        } else {
            Alert::toast('Fail to create new Scholarship', 'error');
            return redirect()->route('scholarship.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $scholarship = Scholarship::find('id');
        return view('content.apps.scholarship.show', compact('scholarship'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $scholarship = Scholarship::find($id);
        $districts = Districts::where('is_deleted', 0)->orderBy('name')->get();
        return view('content.apps.scholarship.edit', compact('scholarship', 'districts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */

    public function updatesch(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'application_start_date' => 'required|date',
            'application_end_date' => 'required|date|after:application_start_date',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            foreach ($errors->messages() as $key => $error) {
                Alert::toast($error[0], 'error');
            }
            return redirect()->back();
        }

        $data = $request->all();

        // Auto-generate slug from name
    $data['slug'] = Str::slug($request->name);

        // Handle boolean fields (store as integer 0/1)
        $data['status'] = $request->has('status') ? 1 : 0;
        $data['require_district_verification'] = $request->has('require_district_verification') ? 1 : 0;
        $data['require_signatures'] = $request->has('require_signatures') ? 1 : 0;
        $data['requires_education_documents'] = $request->has('requires_education_documents') ? 1 : 0;
        $data['requires_profile_document'] = $request->has('requires_profile_document') ? 1 : 0;
        $data['requires_cnic'] = $request->has('requires_cnic') ? 1 : 0;
        $data['requires_domicile'] = $request->has('requires_domicile') ? 1 : 0;
        $data['requires_income_certificate'] = $request->has('requires_income_certificate') ? 1 : 0;
        $data['requires_electricity_bill'] = $request->has('requires_electricity_bill') ? 1 : 0;
        $data['requires_gas_bill'] = $request->has('requires_gas_bill') ? 1 : 0;
        $data['requires_telephone_bill'] = $request->has('requires_telephone_bill') ? 1 : 0;
        $data['requires_financial_details'] = $request->has('requires_financial_details') ? 1 : 0;
        $data['requires_asset_details'] = $request->has('requires_asset_details') ? 1 : 0;
        $data['requires_signature'] = $request->has('requires_signature') ? 1 : 0;
        $data['requires_guardian_signature'] = $request->has('requires_guardian_signature') ? 1 : 0;

        // Handle JSON array fields
        $data['education_levels'] = $request->has('education_levels') ? json_encode($request->education_levels) : null;
        $data['eligible_districts'] = $request->has('eligible_districts') ? json_encode($request->eligible_districts) : null;
        $data['required_documents'] = $request->has('required_documents') ? json_encode($request->required_documents) : null;

        // Handle award_amount and department_id
        $data['award_amount'] = $request->input('award_amount');
        $data['department_id'] = $request->input('department_id');

        unset($data['_token']);
        unset($data['_method']);

        $checkboxFields = [
            'requires_domicile',
            'requires_cnic',
            'requires_income_certificate',
            'requires_electricity_bill',
            'requires_gas_bill',
            'requires_telephone_bill',
            'requires_financial_details',
            'requires_asset_details',
            'requires_signature',
            'requires_guardian_signature',
        ];

        foreach ($checkboxFields as $field) {
            $data[$field] = isset($request[$field]) ? 1 : 0;
        }

        $scholarship = Scholarship::find($id);
        $scholarship->addAllMediaFromTokens();

        if (!$scholarship) {
            Alert::toast('Scholarship not found', 'error');
            return redirect()->route('scholarship.index');
        }

        $scholarship->fill($data);

        if ($scholarship->isDirty()) {
            $scholarship->save();
            Alert::toast("Scholarship Updated Successfully", 'success');
        } else {
            Alert::toast('No changes made to the scholarship', 'info');
        }

        return redirect()->route('scholarship.index');
    }

    public function ScholarshipApplicationsupdate()
    {
        // dd(request()->all());
        $data = request()->all();
        $model = ScholarshipApplications::find($data['id']);
        $model->status = $data['status'];
        $model->save();
        $comment = new Comment();
        $comment->user_id = Auth()->user()->id;
        $comment->scholarship_application_id = $data['id'];
        $comment->comment = $data['comment'];
        $comment->save();


        return true;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scholarship $scholarship)
    {
        $scholarship->delete();
        Alert::toast("Scholarship Deleted Successfully", 'success');
        return redirect()->route('scholarship.index');
    }
}
