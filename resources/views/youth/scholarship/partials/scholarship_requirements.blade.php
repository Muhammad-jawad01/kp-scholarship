{{-- Dynamic Scholarship Requirements Based on Database --}}

<div class="alert alert-info">
    <h6><i class="fas fa-info-circle"></i> Scholarship Requirements</h6>
    <p>Please review the following requirements for this scholarship:</p>
</div>

{{-- Application Period --}}
@if ($scholarship->start_date && $scholarship->end_date)
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="alert alert-warning">
                <strong><i class="fas fa-calendar-alt"></i> Application Period:</strong>
                {{ date('F d, Y', strtotime($scholarship->start_date)) }} to
                {{ date('F d, Y', strtotime($scholarship->end_date)) }}
            </div>
        </div>
    </div>
@endif

{{-- Education Requirements --}}
@if (
    $scholarship->education_levels ||
        $scholarship->min_cgpa ||
        $scholarship->max_cgpa ||
        $scholarship->min_marks ||
        $scholarship->max_marks)
    <div class="requirement-section">
        <h6 class="text-primary"><i class="fas fa-graduation-cap"></i> Education Requirements</h6>

        @if ($scholarship->education_levels)
            @php $educationLevels = is_array($scholarship->education_levels) ? $scholarship->education_levels : json_decode($scholarship->education_levels, true); @endphp
            @if ($educationLevels && count($educationLevels) > 0)
                <div class="row mb-2">
                    <div class="col-md-12">
                        <strong>Eligible Education Levels:</strong>
                        <ul class="list-unstyled ml-3">
                            @foreach ($educationLevels as $level)
                                <li><i class="fas fa-check-circle text-success"></i> {{ $level }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        @endif

        @if ($scholarship->min_cgpa || $scholarship->max_cgpa)
            <div class="row mb-2">
                <div class="col-md-6">
                    @if ($scholarship->min_cgpa)
                        <strong>Minimum CGPA:</strong> {{ $scholarship->min_cgpa }}
                    @endif
                </div>
                <div class="col-md-6">
                    @if ($scholarship->max_cgpa)
                        <strong>Maximum CGPA:</strong> {{ $scholarship->max_cgpa }}
                    @endif
                </div>
            </div>
        @endif

        @if ($scholarship->min_marks || $scholarship->max_marks)
            <div class="row mb-2">
                <div class="col-md-6">
                    @if ($scholarship->min_marks)
                        <strong>Minimum Marks:</strong> {{ $scholarship->min_marks }}%
                    @endif
                </div>
                <div class="col-md-6">
                    @if ($scholarship->max_marks)
                        <strong>Maximum Marks:</strong> {{ $scholarship->max_marks }}%
                    @endif
                </div>
            </div>
        @endif
    </div>
@endif

{{-- Financial Requirements --}}
@if ($scholarship->min_family_income || $scholarship->max_family_income || $scholarship->asset_limit)
    <div class="requirement-section">
        <h6 class="text-primary"><i class="fas fa-money-bill-wave"></i> Financial Requirements</h6>

        @if ($scholarship->min_family_income || $scholarship->max_family_income)
            <div class="row mb-2">
                <div class="col-md-6">
                    @if ($scholarship->min_family_income)
                        <strong>Minimum Family Income:</strong> Rs. {{ number_format($scholarship->min_family_income) }}
                    @endif
                </div>
                <div class="col-md-6">
                    @if ($scholarship->max_family_income)
                        <strong>Maximum Family Income:</strong> Rs. {{ number_format($scholarship->max_family_income) }}
                    @endif
                </div>
            </div>
        @endif

        @if ($scholarship->asset_limit)
            <div class="row mb-2">
                <div class="col-md-12">
                    <strong>Asset Limit:</strong> Rs. {{ number_format($scholarship->asset_limit) }}
                </div>
            </div>
        @endif
    </div>
@endif

{{-- District Eligibility --}}
@if ($scholarship->eligible_districts)
    @php $eligibleDistricts = is_array($scholarship->eligible_districts) ? $scholarship->eligible_districts : json_decode($scholarship->eligible_districts, true); @endphp
    @if ($eligibleDistricts && count($eligibleDistricts) > 0)
        <div class="requirement-section">
            <h6 class="text-primary"><i class="fas fa-map-marker-alt"></i> District Eligibility</h6>
            <div class="row">
                <div class="col-md-12">
                    <strong>Eligible Districts:</strong>
                    <div class="row">
                        @foreach ($eligibleDistricts as $districtId)
                            @php $district = \App\Models\Districts::find($districtId); @endphp
                            @if ($district)
                                <div class="col-md-4">
                                    <span class="badge badge-info mr-1">{{ $district->name }}</span>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
@endif

{{-- Required Documents --}}
@if ($scholarship->required_documents)
    @php $requiredDocs = is_array($scholarship->required_documents) ? $scholarship->required_documents : json_decode($scholarship->required_documents, true); @endphp
    @if ($requiredDocs && count($requiredDocs) > 0)
        <div class="requirement-section">
            <h6 class="text-primary"><i class="fas fa-file-upload"></i> Required Documents</h6>
            <div class="row">
                <div class="col-md-12">
                    <strong>Please ensure you have uploaded the following documents:</strong>
                    <ul class="list-unstyled ml-3">
                        @foreach ($requiredDocs as $doc)
                            <li><i class="fas fa-file-alt text-info"></i> {{ ucfirst(str_replace('_', ' ', $doc)) }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif
@endif

{{-- Application Limit --}}
@if ($scholarship->max_applications)
    <div class="requirement-section">
        <h6 class="text-primary"><i class="fas fa-users"></i> Application Information</h6>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info">
                    <strong>Maximum Applications:</strong> {{ $scholarship->max_applications }} applications will be
                    accepted for this scholarship.
                </div>
            </div>
        </div>
    </div>
@endif

{{-- Verification Requirements --}}
@if ($scholarship->require_district_verification || $scholarship->require_signatures)
    <div class="requirement-section">
        <h6 class="text-primary"><i class="fas fa-certificate"></i> Verification Requirements</h6>

        @if ($scholarship->require_district_verification)
            <div class="row mb-2">
                <div class="col-md-12">
                    <div class="alert alert-warning">
                        <i class="fas fa-stamp"></i> <strong>District Verification Required:</strong> Your application
                        will require verification from district authorities.
                    </div>
                </div>
            </div>
        @endif

        @if ($scholarship->require_signatures)
            <div class="row mb-2">
                <div class="col-md-12">
                    <div class="alert alert-warning">
                        <i class="fas fa-signature"></i> <strong>Signatures Required:</strong> Physical signatures will
                        be required for this application.
                    </div>
                </div>
            </div>
        @endif
    </div>
@endif

{{-- Additional Information --}}
@if ($scholarship->additional_info)
    <div class="requirement-section">
        <h6 class="text-primary"><i class="fas fa-info"></i> Additional Information</h6>
        <div class="row">
            <div class="col-md-12">
                <p>{{ $scholarship->additional_info }}</p>
            </div>
        </div>
    </div>
@endif

{{-- Eligibility Check Warning --}}
<div class="alert alert-danger">
    <strong><i class="fas fa-exclamation-triangle"></i> Important:</strong>
    Please ensure you meet all the above requirements before submitting your application. Applications that do not meet
    the criteria will be automatically rejected.
</div>
