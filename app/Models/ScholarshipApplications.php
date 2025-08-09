<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ScholarshipApplications extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    protected $casts = [
        'application_date' => 'datetime',
    ];

    /**
     * Get the user that owns the ScholarshipApplications
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    // Get the applicant (either user or student)
    public function getApplicantAttribute()
    {
        return $this->student ?: $this->user;
    }

    public function scholarship()
    {
        return $this->belongsTo(Scholarship::class, 'scholarship_id', 'id');
    }

    public function schoarship() // Keep for backward compatibility
    {
        return $this->scholarship();
    }

    public function uni()
    {
        return $this->belongsTo(University::class, 'university_id', 'id');
    }

    public function history()
    {
        return $this->hasMany(ScholarshipApplicationHistory::class, 'original_application_id');
    }

    public function latestHistory()
    {
        return $this->hasOne(ScholarshipApplicationHistory::class, 'original_application_id')->latest();
    }
}
