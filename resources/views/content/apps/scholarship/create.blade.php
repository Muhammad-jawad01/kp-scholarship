@extends('layouts/contentLayoutMaster')


@section('title', 'Create Scholarship')

@section('content')

    <div class="container">
        <div class="card">
            <div class=" mx-3">
                <h1 class="mt-3">Create Scholarship</h1>
                <form method="POST" action="{{ route('admin.scholarship.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Basic Information -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="type" class="form-label">Scholarship Type</label>
                                <select class="form-control" id="type" name="type">
                                    <option value="">Select Type</option>
                                    <option value="Merit-based">Merit-based</option>
                                    <option value="Need-based">Need-based</option>
                                    <option value="Poor">Poor</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <h4 class="mt-3 mb-3">Basic Information</h4>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name') }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug"
                                    value="{{ old('slug') }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="award_amount" class="form-label">Award Amount</label>
                                <input type="number" step="0.01" class="form-control" id="award_amount"
                                    name="award_amount" value="{{ old('award_amount') }}" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="department_id" class="form-label">Department</label>
                                <select class="form-control" id="department_id" name="department_id">
                                    <option value="">Select Department</option>
                                    @foreach (App\Models\Department::all() as $department)
                                        <option value="{{ $department->id }}"
                                            {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                            {{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="year" class="form-label">Year</label>
                                <input type="date" class="form-control" id="year" name="year"
                                    value="{{ old('year') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="custom-control custom-switch custom-switch-primary">
                                    <p class="mb-50">Status</p>
                                    <input type="checkbox" name="status" class="custom-control-input" id="customSwitch10"
                                        {{ old('status') ? 'checked' : '' }} />
                                    <label class="custom-control-label" for="customSwitch10">
                                        <span class="switch-icon-left"><i data-feather="check"></i></span>
                                        <span class="switch-icon-right"><i data-feather="x"></i></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Application Period -->
                    <div class="row">
                        <div class="col-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="year" class="form-label">Year</label>
                            <input type="date" class="form-control" id="year" name="year"
                                value="{{ old('year') }}" required>
                        </div>
                        <div class="col-md-6 d-flex align-items-center">
                            <div class="form-check form-switch ms-2">
                                <input class="form-check-input" type="checkbox" id="status" name="status"
                                    {{ old('status') ? 'checked' : '' }}>
                                <label class="form-check-label" for="status">Active</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h4 class="mb-3">Application Period</h4>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="application_start_date" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="application_start_date"
                                name="application_start_date" value="{{ old('application_start_date') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="application_end_date" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="application_end_date"
                                name="application_end_date" value="{{ old('application_end_date') }}">
                        </div>
                    </div>
                    <hr>
                    <h4 class="mb-3">Education Requirements</h4>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="requires_education_documents"
                                    name="requires_education_documents"
                                    {{ old('requires_education_documents') ? 'checked' : '' }}>
                                <label class="form-check-label" for="requires_education_documents">Requires
                                    Education Documents</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="minimum_percentage" class="form-label">Minimum Percentage</label>
                            <input type="number" step="0.01" min="0" max="100" class="form-control"
                                id="minimum_percentage" name="minimum_percentage"
                                value="{{ old('minimum_percentage') }}">
                        </div>
                        <div class="col-12">
                            <label for="required_education_levels" class="form-label">Required Education
                                Levels</label>
                            <select multiple class="form-select form-control" id="required_education_levels"
                                name="required_education_levels[]">
                                <option value="matriculation"
                                    {{ in_array('matriculation', old('required_education_levels', ['bachelor', 'master'])) ? 'selected' : '' }}>
                                    Matriculation
                                </option>
                                <option value="intermediate"
                                    {{ in_array('intermediate', old('required_education_levels', ['bachelor', 'master'])) ? 'selected' : '' }}>
                                    Intermediate
                                </option>
                                <option value="bachelor"
                                    {{ in_array('bachelor', old('required_education_levels', ['bachelor', 'master'])) ? 'selected' : '' }}>
                                    Bachelor
                                </option>
                                <option value="master"
                                    {{ in_array('master', old('required_education_levels', ['bachelor', 'master'])) ? 'selected' : '' }}>
                                    Master
                                </option>
                                <option value="phd"
                                    {{ in_array('phd', old('required_education_levels', ['bachelor', 'master'])) ? 'selected' : '' }}>
                                    PhD
                                </option>
                            </select>

                            <small class="form-text text-muted">Hold Ctrl/Cmd to select multiple levels</small>
                        </div>
                    </div>
                    <hr>
                    <h4 class="mb-3">Document Requirements</h4>
                    <div class="row g-3">
                        @foreach ([['requires_profile_document', 'Profile Picture'], ['requires_cnic', 'CNIC'], ['requires_domicile', 'Domicile'], ['requires_income_certificate', 'Income Certificate'], ['requires_electricity_bill', 'Electricity Bill'], ['requires_gas_bill', 'Gas Bill'], ['requires_telephone_bill', 'Telephone Bill']] as [$field, $label])
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="{{ $field }}"
                                        name="{{ $field }}" {{ old($field) ? 'checked' : '' }}>
                                    <label class="form-check-label"
                                        for="{{ $field }}">{{ $label }}</label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <hr>
                    <h4 class="mb-3">Financial Requirements</h4>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="requires_financial_details"
                                    name="requires_financial_details"
                                    {{ old('requires_financial_details') ? 'checked' : '' }}>
                                <label class="form-check-label" for="requires_financial_details">Requires
                                    Financial Details</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="requires_asset_details"
                                    name="requires_asset_details" {{ old('requires_asset_details') ? 'checked' : '' }}>
                                <label class="form-check-label" for="requires_asset_details">Requires Asset
                                    Details</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="maximum_family_income" class="form-label">Maximum Family Income</label>
                            <input type="number" step="0.01" min="0" class="form-control"
                                id="maximum_family_income" name="maximum_family_income"
                                value="{{ old('maximum_family_income') }}">
                        </div>
                    </div>
                    <hr>
                    <h4 class="mb-3">Eligibility Criteria</h4>
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label for="minimum_age" class="form-label">Minimum Age</label>
                            <input type="number" min="0" max="100" class="form-control" id="minimum_age"
                                name="minimum_age" value="{{ old('minimum_age') }}">
                        </div>
                        <div class="col-md-3">
                            <label for="maximum_age" class="form-label">Maximum Age</label>
                            <input type="number" min="0" max="100" class="form-control" id="maximum_age"
                                name="maximum_age" value="{{ old('maximum_age') }}">
                        </div>
                        <div class="col-md-3">
                            <label for="gender_eligibility" class="form-label">Gender Eligibility</label>
                            <select class="form-select form-control" id="gender_eligibility" name="gender_eligibility">
                                <option value="both"
                                    {{ old('gender_eligibility') == 'both' ? 'selected' : 'selected' }}>Both
                                </option>
                                <option value="male" {{ old('gender_eligibility') == 'male' ? 'selected' : '' }}>Male
                                    Only</option>
                                <option value="female" {{ old('gender_eligibility') == 'female' ? 'selected' : '' }}>
                                    Female Only
                                </option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="eligible_districts" class="form-label">Eligible Districts</label>
                            <select multiple class="form-select form-control" id="eligible_districts"
                                name="eligible_districts[]">
                                @foreach ($districts as $district)
                                    <option value="{{ $district->id }}"
                                        {{ in_array($district->id, old('eligible_districts', [])) ? 'selected' : '' }}>
                                        {{ $district->name }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Hold Ctrl/Cmd to select multiple districts. Leave
                                empty for all districts.</small>
                        </div>
                    </div>
                    <hr>
                    <h4 class="mb-3">Signature Requirements</h4>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="requires_signature"
                                    name="requires_signature" {{ old('requires_signature') ? 'checked' : '' }}>
                                <label class="form-check-label" for="requires_signature">Requires Applicant
                                    Signature</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="requires_guardian_signature"
                                    name="requires_guardian_signature"
                                    {{ old('requires_guardian_signature') ? 'checked' : '' }}>
                                <label class="form-check-label" for="requires_guardian_signature">Requires
                                    Guardian Signature</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="terms_and_conditions" class="form-label">Terms and Conditions</label>
                            <textarea class="form-control" id="terms_and_conditions" name="terms_and_conditions" rows="6">{{ old('terms_and_conditions') }}</textarea>
                        </div>
                        <div class="col-6">
                            <div id="app">
                                <label for="file" class="form-label">Upload File</label>
                                {{ BsForm::media('scholarship-mdeia')->unlimited()->collection('scholarship-mdeia')->files() }}
                            </div>
                        </div>
                    </div>
                    <div class="row my-4 ">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success w-100">Create Scholarship</button>
                        </div>
                        <div class="col-md-6 ">
                            <a href="{{ route('scholarship.index') }}" class="btn btn-outline-secondary w-100">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
