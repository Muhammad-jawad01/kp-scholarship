@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Scholarship')

@section('vendor-style')
    {{-- Vendor Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')



    {{-- <select multiple class="form-control" id="eligible_districts" name="eligible_districts[]">
        @foreach ($districts as $district)
            <option value="{{ $district->id }}"
                {{ in_array($district->id, old('eligible_districts', $scholarship->eligible_districts ?? [])) ? 'selected' : '' }}>
                {{ $district->name }}</option>
        @endforeach
    </select>- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/katex.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/monokai-sublime.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/quill.snow.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/quill.bubble.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-quill-editor.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-user.css')) }}">
    <style>
        .table td,
        .table th {
            padding: 0.52rem 5px !important;
        }

        .table th {
            text-align: center;
        }
    </style>
@endsection

@section('content')

    <div class="container">
        <div class="card">
            <div class=" mx-3">
                <h1 class="mt-3">Edit Scholarship</h1>
                <form method="POST" action="{{ route('admin.scholarship.update', $scholarship->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Basic Information -->
                    <div class="row">

                        <div class="col-12">
                            <h4 class="mt-3 mb-3">Basic Information</h4>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', $scholarship->name) }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug"
                                    value="{{ old('slug', $scholarship->slug) }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="award_amount" class="form-label">Award Amount</label>
                                <input type="number" step="0.01" class="form-control" id="award_amount"
                                    name="award_amount" value="{{ old('award_amount', $scholarship->award_amount) }}"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $scholarship->description) }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="department_id" class="form-label">Department</label>
                                <select class="form-control" id="department_id" name="department_id">
                                    <option value="">Select Department</option>
                                    @foreach (App\Models\Department::all() as $department)
                                        <option value="{{ $department->id }}"
                                            {{ old('department_id', $scholarship->department_id) == $department->id ? 'selected' : '' }}>
                                            {{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="type" class="form-label">Scholarship Type</label>
                                <select class="form-control" id="type" name="type">
                                    <option value="">Select Type</option>
                                    <option value="Merit-based"
                                        {{ old('type', $scholarship->type) == 'Merit-based' ? 'selected' : '' }}>
                                        Merit-based</option>
                                    <option value="Need-based"
                                        {{ old('type', $scholarship->type) == 'Need-based' ? 'selected' : '' }}>Need-based
                                    </option>
                                    <option value="Poor"
                                        {{ old('type', $scholarship->type) == 'Poor' ? 'selected' : '' }}>Poor</option>
                                    <option value="Other"
                                        {{ old('type', $scholarship->type) == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="year" class="form-label">Year</label>
                                <input type="date" class="form-control" id="year" name="year"
                                    value="{{ old('year', $scholarship->year ? $scholarship->year->format('Y-m-d') : '') }}"
                                    required>
                            </div>
                        </div>

                    </div>

                    <!-- Application Period -->
                    <div class="row">
                        <div class="col-12">
                            <h4 class="mt-4 mb-3">Application Period</h4>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <div class="custom-control custom-switch custom-switch-primary">
                                    <p class="mb-50">Status</p>
                                    <input type="checkbox" name="status" class="custom-control-input"
                                        id="customSwitch10" {{ old('status', $scholarship->status) ? 'checked' : '' }} />
                                    <label class="custom-control-label" for="customSwitch10">
                                        <span class="switch-icon-left"><i data-feather="check"></i></span>
                                        <span class="switch-icon-right"><i data-feather="x"></i></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="application_start_date" class="form-label">Application Start Date</label>
                                <input type="date" class="form-control" id="application_start_date"
                                    name="application_start_date"
                                    value="{{ old('application_start_date', $scholarship->application_start_date ? $scholarship->application_start_date->format('Y-m-d') : '') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="application_end_date" class="form-label">Application End Date</label>
                                <input type="date" class="form-control" id="application_end_date"
                                    name="application_end_date"
                                    value="{{ old('application_end_date', $scholarship->application_end_date ? $scholarship->application_end_date->format('Y-m-d') : '') }}">
                            </div>
                        </div>
                    </div>

                    <!-- Education Requirements -->
                    <div class="row">
                        <div class="col-12">
                            <h4 class="mt-4 mb-3">Education Requirements</h4>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="custom-control custom-switch custom-switch-primary">
                                    <p class="mb-50">Requires Education Documents</p>
                                    <input type="checkbox" name="requires_education_documents"
                                        class="custom-control-input" id="requires_education_documents"
                                        {{ old('requires_education_documents', $scholarship->requires_education_documents) ? 'checked' : '' }} />
                                    <label class="custom-control-label" for="requires_education_documents">
                                        <span class="switch-icon-left"><i data-feather="check"></i></span>
                                        <span class="switch-icon-right"><i data-feather="x"></i></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="minimum_percentage" class="form-label">Minimum Percentage</label>
                                <input type="number" step="0.01" min="0" max="100" class="form-control"
                                    id="minimum_percentage" name="minimum_percentage"
                                    value="{{ old('minimum_percentage', $scholarship->minimum_percentage) }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="required_education_levels" class="form-label">Required Education
                                    Levels</label>
                                <select multiple class="form-control" id="required_education_levels"
                                    name="required_education_levels[]">
                                    @php
                                        $selectedLevels = old(
                                            'required_education_levels',
                                            is_array($scholarship->required_education_levels)
                                                ? $scholarship->required_education_levels
                                                : json_decode($scholarship->required_education_levels ?? '[]', true),
                                        );
                                    @endphp
                                    <option value="matriculation"
                                        {{ in_array('matriculation', $selectedLevels) ? 'selected' : '' }}>Matriculation
                                    </option>
                                    <option value="intermediate"
                                        {{ in_array('intermediate', $selectedLevels) ? 'selected' : '' }}>Intermediate
                                    </option>
                                    <option value="bachelor"
                                        {{ in_array('bachelor', $selectedLevels) ? 'selected' : '' }}>Bachelor</option>
                                    <option value="master" {{ in_array('master', $selectedLevels) ? 'selected' : '' }}>
                                        Master</option>
                                    <option value="phd" {{ in_array('phd', $selectedLevels) ? 'selected' : '' }}>PhD
                                    </option>
                                </select>
                                <small class="form-text text-muted">Hold Ctrl/Cmd to select multiple levels</small>
                            </div>
                        </div>
                    </div>

                    <!-- Document Requirements -->
                    <div class="row">
                        <div class="col-12">
                            <h4 class="mt-4 mb-3">Document Requirements</h4>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="requires_profile_document"
                                        name="requires_profile_document"
                                        {{ old('requires_profile_document', $scholarship->requires_profile_document) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="requires_profile_document">Profile
                                        Picture</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="requires_cnic"
                                        name="requires_cnic"
                                        {{ old('requires_cnic', $scholarship->requires_cnic) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="requires_cnic">CNIC</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="requires_domicile"
                                        name="requires_domicile"
                                        {{ old('requires_domicile', $scholarship->requires_domicile) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="requires_domicile">Domicile</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="requires_income_certificate"
                                        name="requires_income_certificate"
                                        {{ old('requires_income_certificate', $scholarship->requires_income_certificate) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="requires_income_certificate">Income
                                        Certificate</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="requires_electricity_bill"
                                        name="requires_electricity_bill"
                                        {{ old('requires_electricity_bill', $scholarship->requires_electricity_bill) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="requires_electricity_bill">Electricity
                                        Bill</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="requires_gas_bill"
                                        name="requires_gas_bill"
                                        {{ old('requires_gas_bill', $scholarship->requires_gas_bill) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="requires_gas_bill">Gas Bill</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="requires_telephone_bill"
                                        name="requires_telephone_bill"
                                        {{ old('requires_telephone_bill', $scholarship->requires_telephone_bill) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="requires_telephone_bill">Telephone
                                        Bill</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Financial Requirements -->
                    <div class="row">
                        <div class="col-12">
                            <h4 class="mt-4 mb-3">Financial Requirements</h4>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <div class="custom-control custom-switch custom-switch-primary">
                                    <p class="mb-50">Requires Financial Details</p>
                                    <input type="checkbox" name="requires_financial_details" class="custom-control-input"
                                        id="requires_financial_details"
                                        {{ old('requires_financial_details', $scholarship->requires_financial_details) ? 'checked' : '' }} />
                                    <label class="custom-control-label" for="requires_financial_details">
                                        <span class="switch-icon-left"><i data-feather="check"></i></span>
                                        <span class="switch-icon-right"><i data-feather="x"></i></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <div class="custom-control custom-switch custom-switch-primary">
                                    <p class="mb-50">Requires Asset Details</p>
                                    <input type="checkbox" name="requires_asset_details" class="custom-control-input"
                                        id="requires_asset_details"
                                        {{ old('requires_asset_details', $scholarship->requires_asset_details) ? 'checked' : '' }} />
                                    <label class="custom-control-label" for="requires_asset_details">
                                        <span class="switch-icon-left"><i data-feather="check"></i></span>
                                        <span class="switch-icon-right"><i data-feather="x"></i></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="maximum_family_income" class="form-label">Maximum Family Income</label>
                                <input type="number" step="0.01" min="0" class="form-control"
                                    id="maximum_family_income" name="maximum_family_income"
                                    value="{{ old('maximum_family_income', $scholarship->maximum_family_income) }}">
                            </div>
                        </div>
                    </div>

                    <!-- Eligibility Criteria -->
                    <div class="row">
                        <div class="col-12">
                            <h4 class="mt-4 mb-3">Eligibility Criteria</h4>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="minimum_age" class="form-label">Minimum Age</label>
                                <input type="number" min="0" max="100" class="form-control"
                                    id="minimum_age" name="minimum_age"
                                    value="{{ old('minimum_age', $scholarship->minimum_age) }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="maximum_age" class="form-label">Maximum Age</label>
                                <input type="number" min="0" max="100" class="form-control"
                                    id="maximum_age" name="maximum_age"
                                    value="{{ old('maximum_age', $scholarship->maximum_age) }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="gender_eligibility" class="form-label">Gender Eligibility</label>
                                <select class="form-control" id="gender_eligibility" name="gender_eligibility">
                                    <option value="both"
                                        {{ old('gender_eligibility', $scholarship->gender_eligibility) == 'both' ? 'selected' : '' }}>
                                        Both</option>
                                    <option value="male"
                                        {{ old('gender_eligibility', $scholarship->gender_eligibility) == 'male' ? 'selected' : '' }}>
                                        Male Only</option>
                                    <option value="female"
                                        {{ old('gender_eligibility', $scholarship->gender_eligibility) == 'female' ? 'selected' : '' }}>
                                        Female Only</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="eligible_districts" class="form-label">Eligible Districts</label>
                                <select multiple class="form-control" id="eligible_districts"
                                    name="eligible_districts[]">
                                    @php
                                        $selectedDistricts = old(
                                            'eligible_districts',
                                            is_array($scholarship->eligible_districts)
                                                ? $scholarship->eligible_districts
                                                : json_decode($scholarship->eligible_districts ?? '[]', true),
                                        );
                                    @endphp
                                    @foreach (\App\Models\Districts::where('is_deleted', 0)->get() as $district)
                                        <option value="{{ $district->id }}"
                                            {{ in_array($district->id, $selectedDistricts) ? 'selected' : '' }}>
                                            {{ $district->name }}</option>
                                    @endforeach
                                </select>
                                <small class="form-text text-muted">Hold Ctrl/Cmd to select multiple districts. Leave empty
                                    for all districts.</small>
                            </div>
                        </div>
                    </div>

                    <!-- Signature Requirements -->
                    <div class="row">
                        <div class="col-12">
                            <h4 class="mt-4 mb-3">Signature Requirements</h4>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="custom-control custom-switch custom-switch-primary">
                                    <p class="mb-50">Requires Applicant Signature</p>
                                    <input type="checkbox" name="requires_signature" class="custom-control-input"
                                        id="requires_signature"
                                        {{ old('requires_signature', $scholarship->requires_signature) ? 'checked' : '' }} />
                                    <label class="custom-control-label" for="requires_signature">
                                        <span class="switch-icon-left"><i data-feather="check"></i></span>
                                        <span class="switch-icon-right"><i data-feather="x"></i></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="custom-control custom-switch custom-switch-primary">
                                    <p class="mb-50">Requires Guardian Signature</p>
                                    <input type="checkbox" name="requires_guardian_signature"
                                        class="custom-control-input" id="requires_guardian_signature"
                                        {{ old('requires_guardian_signature', $scholarship->requires_guardian_signature) ? 'checked' : '' }} />
                                    <label class="custom-control-label" for="requires_guardian_signature">
                                        <span class="switch-icon-left"><i data-feather="check"></i></span>
                                        <span class="switch-icon-right"><i data-feather="x"></i></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="terms_and_conditions" class="form-label">Terms and Conditions</label>
                                <textarea class="form-control" id="terms_and_conditions" name="terms_and_conditions" rows="4">{{ old('terms_and_conditions', $scholarship->terms_and_conditions) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Upload/Manage Supporting Documents -->
                    <div class="row">
                        <div class="col-12">
                            <h4 class="mt-4 mb-3">Upload/Manage Supporting Documents</h4>
                            <div class="" id="app">
                                {{ BsForm::media('scholarship-mdeia')->unlimited()->collection('scholarship-mdeia')->files($scholarship->getMediaResource('scholarship-mdeia')) }}

                                <small class="form-text text-muted">You can upload or manage multiple files. Accepted
                                    formats: PDF, JPG, PNG.</small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary mb-4">Update Scholarship</button>
                            <a href="{{ route('scholarship.index') }}" class="btn btn-secondary mb-4">Cancel</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset(mix('js/scripts/components/components-navs.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/pages/app-slide-create.js')) }}"></script>
@endsection
