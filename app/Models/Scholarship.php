<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'status' => 'boolean',
        'year' => 'date',
        'required_education_levels' => 'array',
        'additional_documents' => 'array',
        'eligible_districts' => 'array',
        'requires_education_documents' => 'boolean',
        'requires_profile_document' => 'boolean',
        'requires_cnic' => 'boolean',
        'requires_domicile' => 'boolean',
        'requires_income_certificate' => 'boolean',
        'requires_electricity_bill' => 'boolean',
        'requires_gas_bill' => 'boolean',
        'requires_telephone_bill' => 'boolean',
        'requires_financial_details' => 'boolean',
        'requires_asset_details' => 'boolean',
        'requires_signature' => 'boolean',
        'requires_guardian_signature' => 'boolean',
        'application_start_date' => 'date',
        'application_end_date' => 'date',
        'minimum_percentage' => 'decimal:2',
        'maximum_family_income' => 'decimal:2',
    ];

    public function applications()
    {
        return $this->hasMany(ScholarshipApplications::class);
    }

    public function eligibleDistricts()
    {
        return $this->belongsToMany(Districts::class, 'scholarship_districts', 'scholarship_id', 'district_id');
    }

    // Check if scholarship accepts applications currently
    public function isApplicationOpen()
    {
        $now = now()->toDateString();

        if ($this->application_start_date && $this->application_end_date) {
            return $now >= $this->application_start_date && $now <= $this->application_end_date;
        }

        return $this->status;
    }

    // Get required documents list
    public function getRequiredDocumentsAttribute()
    {
        $documents = [];

        if ($this->requires_profile_document) $documents[] = 'profile_picture';
        if ($this->requires_cnic) $documents[] = 'cnic';
        if ($this->requires_domicile) $documents[] = 'domicile';
        if ($this->requires_income_certificate) $documents[] = 'income_certificate';
        if ($this->requires_electricity_bill) $documents[] = 'electricity_bill';
        if ($this->requires_gas_bill) $documents[] = 'gas_bill';
        if ($this->requires_telephone_bill) $documents[] = 'telephone_bill';

        if ($this->additional_documents) {
            $documents = array_merge($documents, $this->additional_documents);
        }

        return $documents;
    }
}
