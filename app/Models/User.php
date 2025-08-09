<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\SoftDeletes;

use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;

class User extends Authenticatable implements MustVerifyEmail, HasMedia
{
    use HasFactory, Notifiable, HasRoles, InteractsWithMedia, HasUploader, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    //     'type',
    //     'profile_completed',
    //     'gender',
    //     'mobile_no',
    //     'nic',
    //     'religion',
    //     'disability_status'
    // ];
    protected $guarded = ['id', 'created_at', 'updated_at'];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }


    // public function hasRole($roleName)
    // {
    //     return $this->role->name === $roleName;
    // }


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function district()
    {
        return $this->belongsTo(Districts::class, 'domicile_district_id');
    }
    public function applicant_education()
    {
        return $this->hasMany(Applicant_education::class);
    }
    public function expenses()
    {
        // Assuming one-to-one relationship
        return $this->hasOne(Expense::class);
    }

    public function applicant_financial_records()
    {
        // Assuming one-to-many relationship
        return $this->hasMany(Applicant_financial_record::class);
    }

    public function scholarship_assets()
    {
        // Assuming one-to-many relationship
        return $this->hasMany(Scholarship_assets::class);
    }

    public function family_info()
    {
        // Assuming one-to-one relationship
        return $this->hasOne(Family_info::class);
    }

    public function scholarship_documents()
    {
        // Assuming one-to-many relationship
        return $this->hasMany(Scholarship_documents::class);
    }

        public function scholarshipApplications()
    {
        return $this->hasMany(ScholarshipApplications::class, 'user_id', 'id');
    }

}
