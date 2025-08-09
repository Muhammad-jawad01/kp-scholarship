<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Scholarship;
use App\Models\ScholarshipApplications;
use App\Models\Applicant_education;
use App\Models\Applicant_financial_record;
use App\Models\Scholarship_assets;
use App\Models\Scholarship_documents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ScholarshipApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:student');
    }

    public function index()
    {
        $student = Auth::guard('student')->user();
        $scholarships = Scholarship::where('status', true)
            ->where(function ($query) {
                $query->whereNull('application_end_date')
                    ->orWhere('application_end_date', '>=', now());
            })
            ->get();

        return view('student.scholarships.index', compact('scholarships'));
    }

    public function show(Scholarship $scholarship)
    {
        if (!$scholarship->isApplicationOpen()) {
            return redirect()->route('student.scholarships.index')
                ->with('error', 'This scholarship is not accepting applications.');
        }

        $student = Auth::guard('student')->user();
        $hasApplied = ScholarshipApplications::where('student_id', $student->id)
            ->where('scholarship_id', $scholarship->id)
            ->exists();

        return view('student.scholarships.show', compact('scholarship', 'hasApplied'));
    }

    public function apply(Scholarship $scholarship)
    {
        if (!$scholarship->isApplicationOpen()) {
            return redirect()->route('student.scholarships.index')
                ->with('error', 'This scholarship is not accepting applications.');
        }

        $student = Auth::guard('student')->user();

        // Check if already applied
        $hasApplied = ScholarshipApplications::where('student_id', $student->id)
            ->where('scholarship_id', $scholarship->id)
            ->exists();

        if ($hasApplied) {
            return redirect()->route('student.scholarships.show', $scholarship)
                ->with('error', 'You have already applied for this scholarship.');
        }

        return view('student.scholarships.apply', compact('scholarship'));
    }

    public function storeApplication(Request $request, Scholarship $scholarship)
    {
        $student = Auth::guard('student')->user();

        $this->validateApplication($request, $scholarship);

        DB::beginTransaction();
        try {
            // Create scholarship application
            $application = ScholarshipApplications::create([
                'student_id' => $student->id,
                'scholarship_id' => $scholarship->id,
                'status' => 'pending',
                'application_date' => now(),
            ]);

            // Store education details if required
            if ($scholarship->requires_education_documents) {
                $this->storeEducationDetails($request, $student->id);
            }

            // Store financial details if required
            if ($scholarship->requires_financial_details) {
                $this->storeFinancialDetails($request, $student->id);
            }

            // Store asset details if required
            if ($scholarship->requires_asset_details) {
                $this->storeAssetDetails($request, $student->id);
            }

            // Store document details
            $this->storeDocumentDetails($request, $student->id, $scholarship);

            DB::commit();

            return redirect()->route('student.scholarships.index')
                ->with('success', 'Your scholarship application has been submitted successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    private function validateApplication(Request $request, Scholarship $scholarship)
    {
        $rules = [];

        // Education validation
        if ($scholarship->requires_education_documents) {
            $rules['educations.*.level'] = 'required|string';
            $rules['educations.*.institute_university_name'] = 'required|string';
            $rules['educations.*.total_marks_cgpa'] = 'required|numeric';
            $rules['educations.*.obtained_marks_cgpa'] = 'required|numeric';
        }

        // Financial validation
        if ($scholarship->requires_financial_details) {
            $rules['financial_records.*.name'] = 'required|string';
            $rules['financial_records.*.profession'] = 'required|string';
            $rules['financial_records.*.relationship'] = 'required|string';
            $rules['financial_records.*.gross_income'] = 'required|numeric';
        }

        // Document validation
        if ($scholarship->requires_signature) {
            $rules['applicant_signature'] = 'required|date';
        }
        if ($scholarship->requires_guardian_signature) {
            $rules['father_guardian_signature'] = 'required|date';
        }

        $request->validate($rules);
    }

    private function storeEducationDetails(Request $request, $studentId)
    {
        if ($request->has('educations')) {
            foreach ($request->educations as $education) {
                Applicant_education::create([
                    'student_id' => $studentId,
                    'level' => $education['level'],
                    'institute_university_name' => $education['institute_university_name'],
                    'passing_year' => $education['passing_year'] ?? null,
                    'total_marks_cgpa' => $education['total_marks_cgpa'],
                    'obtained_marks_cgpa' => $education['obtained_marks_cgpa'],
                    'currently_studying' => $education['currently_studying'] ?? false,
                ]);
            }
        }
    }

    private function storeFinancialDetails(Request $request, $studentId)
    {
        if ($request->has('financial_records')) {
            foreach ($request->financial_records as $record) {
                Applicant_financial_record::create([
                    'student_id' => $studentId,
                    'name' => $record['name'],
                    'profession' => $record['profession'],
                    'relationship' => $record['relationship'],
                    'gross_income' => $record['gross_income'],
                    'net_income' => $record['net_income'] ?? 0,
                    'financially_supporting' => $record['financially_supporting'] ?? false,
                ]);
            }
        }
    }

    private function storeAssetDetails(Request $request, $studentId)
    {
        if ($request->has('assets')) {
            foreach ($request->assets as $asset) {
                Scholarship_assets::create([
                    'student_id' => $studentId,
                    'type' => $asset['type'],
                    'quantity' => $asset['quantity'],
                    'current_market_value' => $asset['current_market_value'],
                ]);
            }
        }
    }

    private function storeDocumentDetails(Request $request, $studentId, $scholarship)
    {
        $documentData = [
            'student_id' => $studentId,
            'terms_conditions' => true,
        ];

        if ($scholarship->requires_signature) {
            $documentData['applicant_signature'] = $request->applicant_signature;
        }

        if ($scholarship->requires_guardian_signature) {
            $documentData['father_guardian_signature'] = $request->father_guardian_signature;
        }

        $document = Scholarship_documents::create($documentData);

        // Handle file uploads using Spatie Media Library
        $requiredDocs = $scholarship->getRequiredDocumentsAttribute();

        foreach ($requiredDocs as $docType) {
            if ($request->hasFile($docType)) {
                $document->addMediaFromRequest($docType)
                    ->toMediaCollection($docType);
            }
        }
    }
}
