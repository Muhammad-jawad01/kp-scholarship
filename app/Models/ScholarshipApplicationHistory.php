<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ScholarshipApplicationHistory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'scholarship_application_history';

    protected $guarded = ['id'];

    protected $dates = ['deleted_at', 'approved_at', 'rejected_at'];

    protected $casts = [
        'family_info_data' => 'array',
        'expense_data' => 'array',
        'document_data' => 'array',
        'financial_records_data' => 'array',
        'education_records_data' => 'array',
        'scholarship_assets_data' => 'array',
        'scholarship_documents_data' => 'array',
        'additional_data' => 'array',
        'terms_conditions' => 'boolean',
        'application_date' => 'date',
        'approved_at' => 'datetime',
        'rejected_at' => 'datetime',
    ];

    // Relationships
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scholarship()
    {
        return $this->belongsTo(Scholarship::class, 'scholarship_id');
    }

    public function university()
    {
        return $this->belongsTo(University::class, 'university_id');
    }

    public function processedBy()
    {
        return $this->belongsTo(User::class, 'processed_by');
    }

    public function originalApplication()
    {
        return $this->belongsTo(ScholarshipApplications::class, 'original_application_id');
    }

    // Scopes
    public function scopePending($query)
    {
        return $query->where('status', 1);
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 2);
    }

    public function scopeRejected($query)
    {
        return $query->where('status', 3);
    }

    public function scopeByYear($query, $year)
    {
        return $query->where('applied_year', $year);
    }

    // Status Methods
    public function isPending()
    {
        return $this->status == 1;
    }

    public function isApproved()
    {
        return $this->status == 2;
    }

    public function isRejected()
    {
        return $this->status == 3;
    }

    public function getStatusTextAttribute()
    {
        switch ($this->status) {
            case 1:
                return 'Pending';
            case 2:
                return 'Approved';
            case 3:
                return 'Rejected';
            default:
                return 'Unknown';
        }
    }

    // Helper Methods
    public function approve($adminId = null, $notes = null)
    {
        $this->update([
            'status' => 2,
            'approved_at' => now(),
            'processed_by' => $adminId,
            'admin_notes' => $notes
        ]);
    }

    public function reject($adminId = null, $notes = null)
    {
        $this->update([
            'status' => 3,
            'rejected_at' => now(),
            'processed_by' => $adminId,
            'admin_notes' => $notes
        ]);
    }

    // Helper methods for accessing preserved data
    public function getFinancialRecords()
    {
        return $this->financial_records_data ?? [];
    }

    public function getEducationRecords()
    {
        return $this->education_records_data ?? [];
    }

    public function getScholarshipAssets()
    {
        return $this->scholarship_assets_data ?? [];
    }

    public function getScholarshipDocuments()
    {
        return $this->scholarship_documents_data ?? [];
    }

    public function getMediaFiles()
    {
        $documentsData = $this->getScholarshipDocuments();
        return $documentsData['media_files'] ?? [];
    }

    public function hasFinancialRecords()
    {
        return !empty($this->financial_records_data);
    }

    public function hasEducationRecords()
    {
        return !empty($this->education_records_data);
    }

    public function hasScholarshipAssets()
    {
        return !empty($this->scholarship_assets_data);
    }

    public function hasScholarshipDocuments()
    {
        return !empty($this->scholarship_documents_data);
    }
}
