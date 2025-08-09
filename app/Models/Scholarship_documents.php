<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;

class Scholarship_documents extends Model implements HasMedia

{
    use HasFactory, InteractsWithMedia, HasUploader;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $casts = [
        'father_guardian_signature' => 'date',
        'applicant_signature' => 'date',
        'terms_conditions' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    // Get the applicant (either user or student)
    public function getApplicantAttribute()
    {
        return $this->student ?: $this->user;
    }
}
