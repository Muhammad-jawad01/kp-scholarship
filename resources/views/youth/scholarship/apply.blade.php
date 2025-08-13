@extends('layouts/scholarshipLayout')

@section('title', 'KP Scholarship Form')

@section('vendor-style')
    {{-- Vendor Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/katex.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/monokai-sublime.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/quill.snow.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/quill.bubble.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-quill-editor.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-user.css')) }}">
    <style>
        :root {
            --primary-color: #28a745;
            --primary-dark: #1e7e34;
            --secondary-color: #007bff;
            --accent-color: #ffc107;
            --success-color: #28a745;
            --info-color: #17a2b8;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
            --light-bg: #f8f9fa;
            --card-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            --hover-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

        .scholarship-application-container {
            /* background: linear-gradient(135deg, #e8f5e8 0%, #c8e6c9 50%, #a5d6a7 100%); */
            min-height: 100vh;
            padding: 20px 0;
        }

        .main-card {
            background: white;
            border-radius: 15px;
            box-shadow: var(--hover-shadow);
            border: none;
            overflow: hidden;
        }

        .card-header-custom {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 25px;
            text-align: center;
            border: none;
        }

        .card-header-custom h4 {
            margin: 0;
            font-size: 1.8rem;
            font-weight: 600;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card-header-custom .subtitle {
            margin: 5px 0 0 0;
            opacity: 0.9;
            font-size: 1rem;
        }

        .top-heading {
            font-size: 16px;
            margin: 25px 0;
            line-height: 35px;
            background: linear-gradient(90deg, #D1FAE5 0%, #CCFBF1 100%) !important;
            padding: 20px;
            border-radius: 10px;
            border-left: 5px solid var(--primary-color);
            box-shadow: var(--card-shadow);
        }

        .top-heading strong {
            color: var(--primary-dark);
            font-weight: 600;
        }

        ol li,
        ul li {
            margin: 12px 0;
            padding-left: 5px;
        }

        .requirement-section {
            background: white;
            border-radius: 15px;
            box-shadow: var(--card-shadow);
            margin: 25px 0;
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid #e9ecef;
        }

        .requirement-section:hover {
            box-shadow: var(--hover-shadow);
            transform: translateY(-2px);
        }

        .requirement-title {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 18px 25px;
            font-weight: 600;
            font-size: 1.1rem;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .requirement-title i {
            font-size: 1.2rem;
        }

        .requirement-content {
            padding: 25px;
        }

        .scholarship-card {
            background: white;
            border: 2px solid #e9ecef;
            margin: 15px 0;
            padding: 20px;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .scholarship-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .scholarship-card:hover {
            border-color: var(--primary-color);
            box-shadow: var(--hover-shadow);
            transform: translateY(-3px);
        }

        .scholarship-card:hover::before,
        .scholarship-card.selected::before {
            transform: scaleX(1);
        }

        .scholarship-card.selected {
            border-color: var(--primary-color);
            background: linear-gradient(135deg, #e8f5e8 0%, #f0f8f0 100%);
            box-shadow: var(--hover-shadow);
        }

        .scholarship-card h5 {
            color: var(--primary-dark);
            font-weight: 600;
            margin-bottom: 10px;
        }

        .scholarship-requirements {
            display: none;
            margin-top: 20px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 10px;
            border-left: 4px solid var(--info-color);
        }

        .scholarship-requirements.active {
            display: block;
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .btn-custom-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            border: none;
            color: white;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: var(--card-shadow);
        }

        .btn-custom-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--hover-shadow);
            color: white;
        }

        .btn-outline-custom {
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            background: transparent;
            padding: 8px 20px;
            border-radius: 20px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-outline-custom:hover {
            background: var(--primary-color);
            color: white;
            transform: scale(1.05);
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
        }

        .custom-control-input:checked~.custom-control-label::before {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .alert-profile-incomplete {
            background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
            border: 1px solid #f6c23e;
            color: #856404;
            border-radius: 10px;
            padding: 20px;
            margin: 20px 0;
            box-shadow: var(--card-shadow);
        }

        .alert-profile-incomplete .alert-title {
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .progress-indicator {
            background: #e9ecef;
            height: 8px;
            border-radius: 4px;
            overflow: hidden;
            margin: 15px 0;
        }

        .progress-bar-custom {
            background: linear-gradient(90deg, var(--warning-color), var(--success-color));
            height: 100%;
            transition: width 0.3s ease;
        }

        .signature-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 25px;
            border-radius: 10px;
            margin: 20px 0;
            box-shadow: var(--card-shadow);
        }

        .signature-box {
            text-align: center;
            padding: 15px;
            background: white;
            border-radius: 8px;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .signature-box strong {
            color: var(--primary-dark);
            font-weight: 600;
        }

        .signature-box em {
            color: #6c757d;
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            .signature-section>div {
                flex-direction: column !important;
                gap: 20px;
            }

            .requirement-section {
                margin: 15px 0;
            }

            .requirement-title {
                padding: 15px 20px;
                font-size: 1rem;
            }

            .requirement-content {
                padding: 20px;
            }
        }
    </style>
@endsection

@section('content')
    <div class="scholarship-application-container">
        <div class="container">

            @php
                $student = auth('student')->user();
                $requiredFields = [
                    'name',
                    'father_name',
                    'nic',
                    'email',
                    'mobile_no',
                    'date_of_birth',
                    'gender',
                    'address',
                    'domicile_district_id',
                    'university_id',
                    'degree',
                ];
                $completedFields = 0;
                $missingFields = [];

                foreach ($requiredFields as $field) {
                    if (!empty($student->$field)) {
                        $completedFields++;
                    } else {
                        $missingFields[] = ucwords(str_replace('_', ' ', $field));
                    }
                }

                $completionPercentage = round(($completedFields / count($requiredFields)) * 100);
                $isProfileComplete = $completionPercentage >= 80;
            @endphp

            @if (!$isProfileComplete)
                <div class="alert-profile-incomplete">
                    <div class="alert-title">
                        <i class="fas fa-exclamation-triangle"></i>
                        Profile Incomplete - Please Complete Your Profile
                    </div>
                    <p>Your profile is <strong>{{ $completionPercentage }}%</strong> complete. Please complete the
                        missing information to apply for scholarships.</p>

                    <div class="progress-indicator">
                        <div class="progress-bar-custom" style="width: {{ $completionPercentage }}%"></div>
                    </div>

                    @if (count($missingFields) > 0)
                        <p><strong>Missing Information:</strong></p>
                        <ul class="mb-3">
                            @foreach ($missingFields as $field)
                                <li>{{ $field }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <a href="{{ route('student.profile.edit') }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Complete Profile
                    </a>
                </div>
            @endif

            <form id="submitForm" action="{{ route('youth.scholarship.apply') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12 mx-auto">



                        <div class="row mt-3">
                            <!-- Scholarship Selection -->
                            @foreach ($scholarships as $scholarship)
                                <div class="col-md-4">
                                    <input type="radio" name="scholarship_id" id="scholarId-{{ $scholarship->id }}"
                                        value="{{ $scholarship->id }}" class="d-none">

                                    <div class="card feature-scholarship-card">
                                        {{-- <img src="./assets/imgs/scholar/s-2.png" class="card-img-top" alt="..."> --}}
                                        <img src='{{ $scholarship->getFirstMediaUrl('scholarship-mdeia') }}'
                                            class="card-img-top" alt="..." />

                                        <span class="lab-type green">
                                            {{ $scholarship->type ?? 'Merit-based' }}
                                        </span>
                                        <span class="lab-open">
                                            @if ($scholarship->status == 1)
                                                Open
                                            @else
                                                Closed
                                            @endif
                                        </span>
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $scholarship->name }}</h5>
                                            <p class="card-text">Higher Education Department</p>
                                            <div class="detail">
                                                <h5>Rs. {{ $scholarship->award_amount }}</h5>

                                                <span>
                                                    <i class="fa-regular fa-user"></i>
                                                    1,832</span>
                                            </div>
                                            <p class="deadline"> <i class="fa-regular fa-calendar"></i>
                                                </svg>
                                                Deadline:
                                                {{ \Carbon\Carbon::parse($scholarship->application_end_date)->format('F j, Y') }}
                                            </p>

                                            <label for="scholarId-{{ $scholarship->id }}" class="btn btn-grn-grd btn-block"
                                                onclick="selectScholarship({{ $scholarship->id }})">Select</label>

                                        </div>
                                    </div>
                                    {{-- <div class="card feature-scholarship-card">
                            <img src="{{asset('front_assets/imgs/scholar/s-2.png')}}" class="card-img-top" alt="...">
                            <span class="lab-type purple">Merit-based</span>
                            <span class="lab-open">Open</span>
                            <div class="card-body">
                                <h5 class="card-title">Merit Scholarship Program 2024 </h5>
                                <p class="card-text">Higher Education Department</p>
                                <div class="detail">
                                    <h5>Rs. 75,000</h5>
                                    <span>
                                        <i data-feather="user" class="avatar-icon"></i>
                                        1,832</span>
                                </div>
                                <p class="deadline"> <i data-feather="calendar" class="avatar-icon"></i>
                                    </svg>
                                    Deadline: March 15, 2024</p>
                                <label for="scholarId-{{$scholarship->id}}"
                                    class="btn btn-grn-grd   btn-block">Select</label>
                            </div>
                        </div> --}}
                                </div>
                            @endforeach

                        </div>
                        <div class="row">
                            <div class="col-md-10 mx-auto mt-5">
                                <div class="text-center mb-4">
                                    <h5 class="text-primary font-weight-bold">Deed of Agreement</h5>
                                    <h6 class="text-secondary">For Undertaking a Course of Studies</h6>
                                    <h6 class="text-secondary">Under the Scheme "Needs Based Scholarship
                                        Program"</h6>
                                </div>

                                <div class="top-heading">
                                    I <strong>{{ $student->name }}</strong> son/daughter of
                                    <strong>{{ $student->father_name }} </strong> Computerized CNIC No
                                    <strong>{{ $student->nic }}</strong>
                                    solemnly declare that:
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="text-primary"><i class="fas fa-check-circle"></i>
                                            Declarations:</h6>
                                        <ul class="list-unstyled">
                                            <li><i class="fas fa-arrow-right text-success mr-2"></i>I have
                                                neither joined nor being paid by any other scholarship /
                                                subsistence allowance.</li>
                                            <li><i class="fas fa-arrow-right text-success mr-2"></i>I have
                                                neither joined nor shall join any other institution during the
                                                course of my studies.</li>
                                            <li><i class="fas fa-arrow-right text-success mr-2"></i>I
                                                understand that the University may vary or reverse any decision
                                                made on the basis of incorrect or incomplete information.</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="text-primary"><i class="fas fa-hand-paper"></i>
                                            Undertakings:</h6>
                                        <ol class="small">
                                            <li>I have read and understood the conditions of the award of this
                                                Financial Assistance / Scholarship.</li>
                                            <li>I accept as binding on me as long as I am a student, all rules
                                                and regulations in force.</li>
                                            <li>In the event any information contained herein found to be
                                                untrue, I shall be liable to disciplinary action.</li>
                                        </ol>
                                    </div>
                                </div>

                                <div class="signature-section">
                                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                                        <div class="signature-box text-center flex-fill mx-2 mb-3">
                                            <strong>{{ $student->name }}</strong><br>
                                            <small class="text-muted">{{ $student->nic }}</small><br>
                                            <em class="text-info">Signature of Applicant</em>
                                        </div>
                                        <div class="signature-box text-center flex-fill mx-2 mb-3">
                                            <strong>{{ $student->father_name }}</strong><br>
                                            <small class="text-muted">Guardian</small><br>
                                            <em class="text-info">Signature of Parent/Guardian</em>
                                        </div>
                                        <div class="signature-box text-center flex-fill mx-2 mb-3">
                                            <strong>{{ now()->format('M d, Y') }}</strong><br>
                                            <small class="text-muted">{{ now()->format('l') }}</small><br>
                                            <em class="text-info">Date</em>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="applied_year"><i class="fas fa-calendar"></i> Applied for
                                                Academic Year *</label>
                                            <input type="number" class="form-control" value="{{ date('Y') }}"
                                                id="applied_year" name="applied_year" min="{{ date('Y') }}"
                                                max="{{ date('Y') + 5 }}" required
                                                {{ !$isProfileComplete ? 'disabled' : '' }}>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="application_date"><i class="fas fa-clock"></i> Application
                                                Date</label>
                                            <input type="date" class="form-control" value="{{ date('Y-m-d') }}"
                                                name="application_date" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mt-4">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="terms_conditions"
                                            name="terms_conditions" required {{ !$isProfileComplete ? 'disabled' : '' }}>
                                        <label class="custom-control-label" for="terms_conditions">
                                            <strong>I agree to
                                                all the Terms and Conditions mentioned above</strong>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- trms ./ --}}




                        <input type="hidden" name="myNumber" id="myNumber" value="{{ json_encode($data) }}">

                        <!-- Submit Button -->
                        <div class="row">
                            <div class="col-md-4 mx-auto my-4">
                                @if ($isProfileComplete)
                                    <button type="button" id="applybtn" onclick="submitApplication()"
                                        class="btn btn-solid-green  btn-block">Submit Application
                                    </button>
                                @else
                                    <button type="button" class="btn btn-secondary btn-block btn-lg" disabled>
                                        <i class="fas fa-lock mr-2"></i> Complete Profile to Apply
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('page-script')
    <script src="{{ asset(mix('js/scripts/components/components-navs.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/pages/app-slide-create.js')) }}"></script>
@endsection

@push('scripts')
    <script>
        function selectScholarship(scholarshipId) {
            // Check if profile is complete first
            const isProfileComplete = {{ $isProfileComplete ? 'true' : 'false' }};

            if (!isProfileComplete) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Profile Incomplete',
                    html: `
                        <p>Please complete your profile before selecting a scholarship.</p>
                        <div class="text-left mt-3">
                            <strong>Missing Information:</strong>
                            <ul class="text-left">
                                @foreach ($missingFields as $field)
                                    <li>{{ $field }}</li>
                                @endforeach
                            </ul>
                        </div>
                    `,
                    showCancelButton: true,
                    confirmButtonText: '<i class="fas fa-edit"></i> Complete Profile',
                    cancelButtonText: 'Later',
                    confirmButtonColor: '#ffc107',
                    cancelButtonColor: '#6c757d'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('student.profile.edit') }}";
                    }
                });
                return;
            }

            // Hide all requirement sections
            document.querySelectorAll('.scholarship-requirements').forEach(section => {
                section.classList.remove('active');
            });

            // Remove selected class from all cards
            document.querySelectorAll('.scholarship-card').forEach(card => {
                card.classList.remove('selected');
            });

            // Show selected scholarship requirements
            const requirementsSection = document.getElementById('requirements_' + scholarshipId);
            if (requirementsSection) {
                requirementsSection.classList.add('active');
            }

            // Add selected class to clicked card
            event.currentTarget.classList.add('selected');

            // Check the radio button
            const radioButton = document.getElementById('scholarship_' + scholarshipId);
            if (radioButton) {
                radioButton.checked = true;
            }

            // Show selection confirmation
            Swal.fire({
                icon: 'success',
                title: 'Scholarship Selected!',
                text: 'You have selected this scholarship program. Please review the requirements below.',
                timer: 2000,
                showConfirmButton: false,
                position: 'top-end',
                toast: true
            });
        }

        function submitApplication() {
            // Check if profile is complete
            const isProfileComplete = {{ $isProfileComplete ? 'true' : 'false' }};

            if (!isProfileComplete) {
                Swal.fire({
                    icon: 'error',
                    title: 'Profile Incomplete',
                    text: 'Please complete your profile before submitting an application.',
                    confirmButtonText: 'Complete Profile',
                    confirmButtonColor: '#ffc107'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('student.profile.edit') }}";
                    }
                });
                return;
            }

            // Check if scholarship is selected
            const selectedScholarship = document.querySelector('input[name="scholarship_id"]:checked');
            if (!selectedScholarship) {
                Swal.fire({
                    icon: 'warning',
                    title: 'No Scholarship Selected',
                    text: 'Please select a scholarship program to apply for.',
                    confirmButtonColor: '#28a745'
                });
                return;
            }

            // Check terms and conditions
            const termsChecked = document.getElementById('terms_conditions').checked;
            if (!termsChecked) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Terms & Conditions',
                    text: 'Please accept the terms and conditions to proceed.',
                    confirmButtonColor: '#28a745'
                });
                return;
            }

            // Show confirmation dialog
            Swal.fire({
                icon: 'question',
                title: 'Submit Application?',
                text: 'Are you sure you want to submit this scholarship application? This action cannot be undone.',
                showCancelButton: true,
                confirmButtonText: '<i class="fas fa-paper-plane"></i> Yes, Submit',
                cancelButtonText: '<i class="fas fa-times"></i> Cancel',
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#dc3545',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    processSubmission();
                }
            });
        }

        function processSubmission() {
            var form = $('#submitForm');
            var formData = form.serialize();

            // Show loading with progress
            Swal.fire({
                title: 'Submitting Application...',
                html: `
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="spinner-border text-success mr-3" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <span>Processing your application...</span>
                    </div>
                `,
                allowOutsideClick: false,
                allowEscapeKey: false,
                showConfirmButton: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                type: "POST",
                url: form.attr('action'),
                data: formData,
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Application Submitted Successfully!',
                        html: `
                            <div class="text-center">
                                <i class="fas fa-check-circle text-success" style="font-size: 3rem;"></i>
                                <p class="mt-3">Your scholarship application has been submitted successfully.</p>
                                <p class="text-muted">Application ID: <strong>${response.application_id || 'Generated'}</strong></p>
                                <p class="text-muted">You will receive a confirmation email shortly.</p>
                            </div>
                        `,
                        showCancelButton: true,
                        confirmButtonText: '<i class="fas fa-print"></i> Print Application',
                        cancelButtonText: '<i class="fas fa-home"></i> Go to Dashboard',
                        confirmButtonColor: '#17a2b8',
                        cancelButtonColor: '#28a745',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Priority order: History print > Scholarship print > Dashboard
                            if (response.history_id) {
                                // Use history-based print (preferred method - shows preserved data)
                                window.location.href = "{{ url('Scholarship/print-history') }}/" +
                                    response.encrypted_history_id;
                            } else if (response.encrypted_scholarship_id) {
                                // Fallback to scholarship-based print with encrypted ID
                                window.location.href = "{{ url('Scholarship/print') }}/" + response
                                    .encrypted_scholarship_id;
                            } else {
                                // Final fallback to dashboard
                                window.location.href = "{{ route('student.dashboard') }}";
                            }
                        } else {
                            window.location.href = "{{ route('student.dashboard') }}";
                        }
                    });
                },
                error: function(xhr) {
                    let errorMessage = 'Error submitting application';
                    let errorDetails = '';

                    if (xhr.responseJSON) {
                        if (xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }
                        if (xhr.responseJSON.errors) {
                            errorDetails = '<ul class="text-left mt-2">';
                            Object.keys(xhr.responseJSON.errors).forEach(key => {
                                xhr.responseJSON.errors[key].forEach(error => {
                                    errorDetails += `<li>${error}</li>`;
                                });
                            });
                            errorDetails += '</ul>';
                        }
                    }

                    Swal.fire({
                        icon: 'error',
                        title: 'Submission Failed',
                        html: `
                            <p>${errorMessage}</p>
                            ${errorDetails}
                        `,
                        confirmButtonColor: '#dc3545'
                    });
                }
            });
        }

        // Auto-select first scholarship if only one available and profile is complete
        document.addEventListener('DOMContentLoaded', function() {
            const isProfileComplete = {{ $isProfileComplete ? 'true' : 'false' }};
            const scholarshipCards = document.querySelectorAll('.scholarship-card');

            if (scholarshipCards.length === 1 && isProfileComplete) {
                setTimeout(() => {
                    scholarshipCards[0].click();
                }, 500);
            }

            // Add hover effects to scholarship cards
            scholarshipCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    if (!this.classList.contains('selected')) {
                        this.style.transform = 'translateY(-2px)';
                    }
                });

                card.addEventListener('mouseleave', function() {
                    if (!this.classList.contains('selected')) {
                        this.style.transform = 'translateY(0)';
                    }
                });
            });

            // Animate progress bar
            const progressBar = document.querySelector('.progress-bar-custom');
            if (progressBar) {
                setTimeout(() => {
                    progressBar.style.width = '{{ $completionPercentage }}%';
                }, 300);
            }

            // Add smooth scrolling to requirements when scholarship is selected
            window.selectScholarship = function(scholarshipId) {
                selectScholarship(scholarshipId);

                // Smooth scroll to requirements
                setTimeout(() => {
                    const requirementsSection = document.getElementById('requirements_' +
                        scholarshipId);
                    if (requirementsSection && requirementsSection.classList.contains('active')) {
                        requirementsSection.scrollIntoView({
                            behavior: 'smooth',
                            block: 'nearest'
                        });
                    }
                }, 300);
            };
        });

        // Add form validation
        $('#submitForm').on('submit', function(e) {
            e.preventDefault();
            submitApplication();
        });

        // Profile completion tooltip
        @if (!$isProfileComplete)
            document.addEventListener('DOMContentLoaded', function() {
                // Show profile completion reminder after 3 seconds
                setTimeout(() => {
                    if (!localStorage.getItem('profile_reminder_shown')) {
                        Swal.fire({
                            icon: 'info',
                            title: 'Complete Your Profile',
                            text: 'Complete your profile to unlock scholarship applications.',
                            confirmButtonText: 'Complete Now',
                            showCancelButton: true,
                            cancelButtonText: 'Remind Me Later',
                            confirmButtonColor: '#28a745',
                            position: 'top-end',
                            timer: 10000,
                            timerProgressBar: true,
                            toast: true
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "{{ route('student.profile.edit') }}";
                            }
                            localStorage.setItem('profile_reminder_shown', 'true');
                        });
                    }
                }, 3000);
            });
        @endif
    </script>
@endpush
