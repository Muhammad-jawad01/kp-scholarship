<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;

class Student extends Authenticatable implements HasMedia
{
    use HasFactory, Notifiable, InteractsWithMedia, HasUploader, SoftDeletes;

    protected $guard = 'student';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'father_name',
        'guardian_name',
        'email',
        'password',
        'cnic',
        'nic',
        'mobile_no',
        'date_of_birth',
        'birth_date',
        'age',
        'gender',
        'marital_status',
        'nationality',
        'religion',
        'address',
        'domicile_district_id',
        'tehsil',
        'disability_status',
        'profile_completed',
        'is_active',
        // University/Academic fields
        'university_id',
        'degree',
        'campus',
        'discipline',
        'sub_discipline',
        'university_reg_no',
        'program_duration',
        'current_semester',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'date_of_birth' => 'date',
        'profile_completed' => 'boolean',
        'is_active' => 'boolean',
    ];

    // Relationships
    public function district()
    {
        return $this->belongsTo(Districts::class, 'domicile_district_id');
    }

    public function university()
    {
        return $this->belongsTo(University::class, 'university_id');
    }

    public function applicantEducations()
    {
        return $this->hasMany(Applicant_education::class);
    }

    public function applicantFinancialRecords()
    {
        return $this->hasMany(Applicant_financial_record::class);
    }

    public function scholarshipAssets()
    {
        return $this->hasMany(Scholarship_assets::class);
    }

    public function scholarshipDocuments()
    {
        return $this->hasMany(Scholarship_documents::class);
    }

    public function scholarshipApplications()
    {
        return $this->hasMany(ScholarshipApplications::class);
    }

    public function expenses()
    {
        return $this->hasOne(Expense::class);
    }

    public function familyInfo()
    {
        return $this->hasOne(Family_info::class);
    }
}
