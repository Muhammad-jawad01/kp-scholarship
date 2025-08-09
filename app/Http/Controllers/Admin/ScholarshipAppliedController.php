<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Scholarship;
use App\Models\Applicant_education;
use App\Models\Applicant_financial_record;
use App\Models\Comment;
use App\Models\Family_info;
use App\Models\ScholarshipApplications;
use App\Models\ScholarshipApplicationHistory;
use App\Models\Scholarship_assets;
use App\Models\Scholarship_documents;
use App\Models\User;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ScholarshipAppliedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    function __construct()
    {
        $this->middleware('permission:Scholarship-applied-list|Scholarship-applied-create|Scholarship-applied-edit|Scholarship-applied-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:Scholarship-applied-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:Scholarship-applied-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Scholarship-applied-delete', ['only' => ['destroy']]);
        $this->middleware('permission:Scholarship-applied-statistics', ['only' => ['statistics']]);
    }

    public function index()
    {
        $uni = Auth()->user()->university_id;
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->hasRole('uni_admin')) {
                $total = ScholarshipApplicationHistory::where(['university_id' => $uni])->count();

                $reject = ScholarshipApplicationHistory::where(['university_id' => $uni, 'status' => 3])->count();
                $approved = ScholarshipApplicationHistory::where(['university_id' => $uni, 'status' => 4])->count();
                $pending = ScholarshipApplicationHistory::where(['university_id' => $uni, 'status' => 2])->count();
                $unipending = 0;
                $unireject = 0;
                $unitotal = ScholarshipApplicationHistory::whereIn('status', [3, 2])->count();



                $model = ScholarshipApplicationHistory::where('university_id', $uni)->orderBy('id', 'desc')->paginate(20);
            }
            if ($user->roles()->where('id', 1)->exists()) {
                $total = ScholarshipApplicationHistory::count();
                $approved = ScholarshipApplicationHistory::where(['status' => 5])->count();
                $approved_uni = ScholarshipApplicationHistory::where(['status' => 4])->count();

                $reject = ScholarshipApplicationHistory::where(['status' => 6])->count();
                $pending = ScholarshipApplicationHistory::where(['status' => 4])->count();
                $unipending = ScholarshipApplicationHistory::where(['status' => 2])->count();
                $unireject = ScholarshipApplicationHistory::where(['status' => 3])->count();
                $unitotal = ScholarshipApplicationHistory::whereIn('status', [3, 2])->count();

                $model = ScholarshipApplicationHistory::where('status', 4)->orderBy('id', 'desc')->get();
            }
        }


        get_defined_vars();


        return view('content.apps.scholarship.scholarship_applied', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function statistics($id)
    {
        $uni = Auth()->user()->university_id;
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->hasRole('uni_admin')) {
                $model = ScholarshipApplicationHistory::where(['university_id' => $uni, 'status' => $id])->orderBy('id', 'desc')->paginate(20);
            }
            if ($user->roles()->where('id', 1)->exists()) {
                $model = ScholarshipApplicationHistory::where('status', $id)->orderBy('id', 'desc')->paginate(20);
            }
        }




        return view('content.apps.scholarship.scholarship_applied_statistics', compact('model', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update()
    {
        $data = request()->all();

        // Find and update history record
        $model = ScholarshipApplicationHistory::find($data['id']);

        if (!$model) {
            return response()->json(['status' => 'error', 'message' => 'History record not found'], 404);
        }

        // Store the previous status before making any changes
        $previousStatus = $model->status;

        // Begin transaction to ensure both updates succeed or fail together
        DB::beginTransaction();
        try {
            // Update status in history
            $model->status = $data['status'];
            $model->save();

            // Update status in original application
            $originalApplication = ScholarshipApplications::find($model->scholarship_application_id);
            if ($originalApplication) {
                $originalApplication->status = $data['status'];
                $originalApplication->save();
            }

            // Add comment with status tracking
            $comment = new Comment();
            $comment->user_id = Auth()->user()->id;
            $comment->scholarship_application_id = $model->scholarship_application_id; // Original application ID
            $comment->history_id = $model->id; // History record ID
            $comment->comment = $data['comment'];
            $comment->previous_status = $previousStatus; // Store the previous status
            $comment->current_status = $data['status']; // Store the new status
            $comment->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'error', 'message' => 'Failed to update status'], 500);
        }


        // return redirect()->back()->with('success', 'Status updated successfully!');
        return response()->json([
            'status' => 'success',
            'message' => 'Status updated successfully!'
        ], 200); // Returning a 200 status code

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
