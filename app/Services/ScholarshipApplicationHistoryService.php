<?php

namespace App\Services;

use App\Models\ScholarshipApplicationHistory;
use App\Models\ScholarshipApplications;
use App\Models\Student;
use App\Models\Scholarship;
use App\Models\University;
use App\Models\Family_info;
use App\Models\Expense;
use App\Models\Scholarship_documents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ScholarshipApplicationHistoryService
{
    /**
     * Create application history with complete data snapshot
     */
    public function createApplicationHistory($data, $studentId, $scholarshipId)
    {
        try {
            Log::info('Starting application history creation', [
                'student_id' => $studentId,
                'scholarship_id' => $scholarshipId,
                'data' => $data
            ]);

            DB::beginTransaction();

            $student = Student::find($studentId);
            $scholarship = Scholarship::find($scholarshipId);
            $university = University::find($student->university_id);

            // Get all related data
            $familyInfo = Family_info::where('student_id', $studentId)->first();
            $expense = Expense::where('student_id', $studentId)->first();
            $scholarshipDocuments = Scholarship_documents::where('student_id', $studentId)->first();

            // Create history record with complete snapshot
            $historyData = [
                // Student Information
                'student_id' => $student->id,
                'user_id' => $student->user_id ?? null,
                'student_name' => $student->name,
                'father_name' => $student->father_name,
                'nic' => $student->nic,
                'email' => $student->email,
                'mobile_no' => $student->mobile_no,

                // Application Details
                'scholarship_id' => $scholarship->id,
                'scholarship_name' => $scholarship->name,
                'scholarship_description' => $scholarship->description,
                'applied_year' => $data['applied_year'] ?? date('Y'),
                'application_date' => $data['application_date'] ?? date('Y-m-d'),
                'status' => 1, // Pending

                // University Information
                'university_id' => $student->university_id,
                'university_name' => $university->name ?? null,
                'degree' => $student->degree,

                // Family Information Snapshot
                'family_info_data' => $familyInfo ? $this->getFamilyInfoSnapshot($familyInfo) : null,

                // Expense Information Snapshot
                'expense_data' => $expense ? $this->getExpenseSnapshot($expense) : null,

                // Documents Information Snapshot
                'document_data' => $scholarshipDocuments ? $this->getDocumentSnapshot($scholarshipDocuments) : null,

                // Additional Tables Snapshots
                'financial_records_data' => $this->getFinancialRecordsSnapshot($studentId),
                'education_records_data' => $this->getEducationRecordsSnapshot($studentId),
                'scholarship_assets_data' => $this->getScholarshipAssetsSnapshot($studentId, $expense->id ?? null),
                'scholarship_documents_data' => $this->getScholarshipDocumentsSnapshot($studentId),

                // Additional Data
                'additional_data' => [
                    'student_profile' => $this->getStudentSnapshot($student),
                    'submission_data' => $data,
                    'scholarship_requirements' => $scholarship->requirements ?? null,
                ],

                // Terms & Conditions
                'terms_conditions' => $data['terms_conditions'] ?? false,

                // Submission Details
                'submission_ip' => request()->ip(),
            ];

            $applicationHistory = ScholarshipApplicationHistory::create($historyData);

            Log::info('Application history record created successfully', [
                'history_id' => $applicationHistory->id,
                'student_id' => $studentId,
                'scholarship_id' => $scholarshipId
            ]);

            DB::commit();

            return $applicationHistory;
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error creating application history: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Link history to original application
     */
    public function linkToOriginalApplication($historyId, $applicationId)
    {
        ScholarshipApplicationHistory::where('id', $historyId)
            ->update(['original_application_id' => $applicationId]);
    }

    /**
     * Get family info snapshot
     */
    private function getFamilyInfoSnapshot($familyInfo)
    {
        return [
            'id' => $familyInfo->id,
            'father_status' => $familyInfo->father_status,
            'father_cnic' => $familyInfo->father_cnic,
            'father_profession' => $familyInfo->father_profession,
            'father_earning' => $familyInfo->father_earning,
            'father_guardian' => $familyInfo->father_guardian,
            'employer_address' => $familyInfo->employer_address,
            'father_guardian_designation' => $familyInfo->father_guardian_designation,
            'financial_support' => $familyInfo->financial_support,
            'father_ntn_number' => $familyInfo->father_ntn_number,
            'mother_status' => $familyInfo->mother_status,
            'mother_profession' => $familyInfo->mother_profession,
            'professional_status' => $familyInfo->professional_status,
            'parent_marriage_relationship' => $familyInfo->parent_marriage_relationship,
            'mobile_number' => $familyInfo->mobile_number,
            'telephone_number' => $familyInfo->telephone_number,
            'total_family_members' => $familyInfo->total_family_members,
            'dependent_family_members' => $familyInfo->dependent_family_members,
            'total_earning_members' => $familyInfo->total_earning_members,
            'family_members_studying' => $familyInfo->family_members_studying,
            'num_of_brothers' => $familyInfo->num_of_brothers,
            'num_of_sisters' => $familyInfo->num_of_sisters,
            'family_income' => $familyInfo->family_income,
            'income_from_other_sources' => $familyInfo->income_from_other_sources,
            'created_at' => $familyInfo->created_at,
            'updated_at' => $familyInfo->updated_at,
        ];
    }

    /**
     * Get expense snapshot
     */
    private function getExpenseSnapshot($expense)
    {
        return [
            'id' => $expense->id,
            'per_month_edu_expenditure' => $expense->per_month_edu_expenditure,
            'total_monthly_income' => $expense->total_monthly_income,
            'accommodation_type' => $expense->accommodation_type,
            'house_structure' => $expense->house_structure,
            'house_status' => $expense->house_status,
            'num_rooms' => $expense->num_rooms,
            'home_size' => $expense->home_size,
            'covered_area' => $expense->covered_area,
            'num_air_conditioners' => $expense->num_air_conditioners,
            'num_servants' => $expense->num_servants,
            'monthly_rent' => $expense->monthly_rent,
            'address' => $expense->address,
            'other_house_owned' => $expense->other_house_owned,
            'other_house_details' => $expense->other_house_details,
            'average_telephone_bill_six_months' => $expense->average_telephone_bill_six_months,
            'average_electricity_bill_six_months' => $expense->average_electricity_bill_six_months,
            'average_gas_bill_six_months' => $expense->average_gas_bill_six_months,
            'average_water_bill_six_months' => $expense->average_water_bill_six_months,
            'average_mobile_bill_six_months' => $expense->average_mobile_bill_six_months,
            'average_educational_expenditure_siblings' => $expense->average_educational_expenditure_siblings,
            'average_educational_expenditure_applicant' => $expense->average_educational_expenditure_applicant,
            'average_kitchen_expenditure' => $expense->average_kitchen_expenditure,
            'average_medical_expenditure' => $expense->average_medical_expenditure,
            'accommodation_expenditure_case_rent' => $expense->accommodation_expenditure_case_rent,
            'average_family_misc_expenditure' => $expense->average_family_misc_expenditure,
            'family_own_transport' => $expense->family_own_transport,
            'family_own_cattle' => $expense->family_own_cattle,
            'detail_assets_lease' => $expense->detail_assets_lease,
            'admission_first_semester_charges' => $expense->admission_first_semester_charges,
            'KPEF_merit_Needsbased_scholarships_program' => $expense->KPEF_merit_Needsbased_scholarships_program,
            'statement_purpose' => $expense->statement_purpose,
            'created_at' => $expense->created_at,
            'updated_at' => $expense->updated_at,
        ];
    }

    /**
     * Get document snapshot
     */
    private function getDocumentSnapshot($documents)
    {
        $documentData = [
            'id' => $documents->id,
            'father_guardian_signature' => $documents->father_guardian_signature,
            'applicant_signature' => $documents->applicant_signature,
            'terms_conditions' => $documents->terms_conditions,
            'created_at' => $documents->created_at,
            'updated_at' => $documents->updated_at,
        ];

        // Add media files information if available
        if (method_exists($documents, 'getMedia')) {
            $documentData['media_files'] = [];
            $mediaCollections = ['applicant_img', 'applicant_nic', 'p_nic', 'income_slip', 'bills'];

            foreach ($mediaCollections as $collection) {
                $media = $documents->getMedia($collection);
                if ($media->count() > 0) {
                    $documentData['media_files'][$collection] = $media->map(function ($item) {
                        return [
                            'id' => $item->id,
                            'name' => $item->name,
                            'file_name' => $item->file_name,
                            'mime_type' => $item->mime_type,
                            'size' => $item->size,
                            'url' => $item->getUrl(),
                        ];
                    })->toArray();
                }
            }
        }

        return $documentData;
    }

    /**
     * Get student snapshot
     */
    private function getStudentSnapshot($student)
    {
        return [
            'id' => $student->id,
            'name' => $student->name,
            'father_name' => $student->father_name,
            'nic' => $student->nic,
            'email' => $student->email,
            'mobile_no' => $student->mobile_no,
            'date_of_birth' => $student->date_of_birth,
            'gender' => $student->gender,
            'address' => $student->address,
            'domicile_district_id' => $student->domicile_district_id,
            'university_id' => $student->university_id,
            'degree' => $student->degree,
            'created_at' => $student->created_at,
            'updated_at' => $student->updated_at,
        ];
    }

    /**
     * Get applicant financial records snapshot
     */
    private function getFinancialRecordsSnapshot($studentId)
    {
        $records = \App\Models\Applicant_financial_record::where('student_id', $studentId)->get();

        if ($records->isEmpty()) {
            return null;
        }

        return $records->map(function ($record) {
            return [
                'id' => $record->id,
                'student_id' => $record->student_id,
                'user_id' => $record->user_id,
                'expense_id' => $record->expense_id,
                'amount' => $record->amount,
                'description' => $record->description,
                'type' => $record->type,
                'date' => $record->date,
                'created_at' => $record->created_at,
                'updated_at' => $record->updated_at,
            ];
        })->toArray();
    }

    /**
     * Get applicant education records snapshot
     */
    private function getEducationRecordsSnapshot($studentId)
    {
        $records = \App\Models\Applicant_education::where('student_id', $studentId)->get();

        if ($records->isEmpty()) {
            return null;
        }

        return $records->map(function ($record) {
            return [
                'id' => $record->id,
                'student_id' => $record->student_id,
                'user_id' => $record->user_id,
                'institution_name' => $record->institution_name,
                'degree_title' => $record->degree_title,
                'field_of_study' => $record->field_of_study,
                'start_date' => $record->start_date,
                'end_date' => $record->end_date,
                'currently_studying' => $record->currently_studying,
                'grade_percentage' => $record->grade_percentage,
                'created_at' => $record->created_at,
                'updated_at' => $record->updated_at,
            ];
        })->toArray();
    }

    /**
     * Get scholarship assets snapshot
     */
    private function getScholarshipAssetsSnapshot($studentId, $expenseId = null)
    {
        $query = \App\Models\Scholarship_assets::where('student_id', $studentId);

        if ($expenseId) {
            $query->where('expense_id', $expenseId);
        }

        $assets = $query->get();

        if ($assets->isEmpty()) {
            return null;
        }

        return $assets->map(function ($asset) {
            return [
                'id' => $asset->id,
                'student_id' => $asset->student_id,
                'user_id' => $asset->user_id,
                'expense_id' => $asset->expense_id,
                'type' => $asset->type,
                'quantity' => $asset->quantity,
                'current_market_value' => $asset->current_market_value,
                'description' => $asset->description,
                'created_at' => $asset->created_at,
                'updated_at' => $asset->updated_at,
            ];
        })->toArray();
    }

    /**
     * Get scholarship documents snapshot with media library files
     */
    private function getScholarshipDocumentsSnapshot($studentId)
    {
        $documents = \App\Models\Scholarship_documents::where('student_id', $studentId)->first();

        if (!$documents) {
            return null;
        }

        // Get media files associated with this document record
        $mediaFiles = $documents->getMedia()->map(function ($media) {
            return [
                'id' => $media->id,
                'collection_name' => $media->collection_name,
                'name' => $media->name,
                'file_name' => $media->file_name,
                'mime_type' => $media->mime_type,
                'size' => $media->size,
                'url' => $media->getUrl(),
                'path' => $media->getPath(),
                'created_at' => $media->created_at,
            ];
        })->toArray();

        return [
            'document_record' => [
                'id' => $documents->id,
                'student_id' => $documents->student_id,
                'user_id' => $documents->user_id,
                'father_guardian_signature' => $documents->father_guardian_signature,
                'applicant_signature' => $documents->applicant_signature,
                'terms_conditions' => $documents->terms_conditions,
                'created_at' => $documents->created_at,
                'updated_at' => $documents->updated_at,
            ],
            'media_files' => $mediaFiles
        ];
    }

    /**
     * Update application status in history
     */
    public function updateApplicationStatus($historyId, $status, $adminId = null, $notes = null)
    {
        $history = ScholarshipApplicationHistory::find($historyId);

        if ($history) {
            $updateData = [
                'status' => $status,
                'processed_by' => $adminId,
                'admin_notes' => $notes
            ];

            if ($status == 2) { // Approved
                $updateData['approved_at'] = now();
            } elseif ($status == 3) { // Rejected
                $updateData['rejected_at'] = now();
            }

            $history->update($updateData);
            return $history;
        }

        return null;
    }

    /**
     * Get application history for a student
     */
    public function getStudentApplicationHistory($studentId, $limit = 10)
    {
        return ScholarshipApplicationHistory::where('student_id', $studentId)
            ->with(['scholarship', 'university', 'processedBy'])
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
    }

    /**
     * Get application history by scholarship
     */
    public function getScholarshipApplicationHistory($scholarshipId, $limit = 50)
    {
        return ScholarshipApplicationHistory::where('scholarship_id', $scholarshipId)
            ->with(['student', 'university', 'processedBy'])
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
    }
}
