@extends('front/layouts/layout')

@section('title', $scholarshipsDetail->name . ' - Scholarship Details')
@section('content')
    <div class="inner-page p-2 p-md-5">

        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-md-12 col-lg-12 col-xl-8 mb-3">
                    <div class="card scholarship-card-detail">
                        <img src='{{ $scholarshipsDetail->getFirstMediaUrl('scholarship-mdeia') }}' class="card-img-top"
                            alt="..." />

                        <span class="lab-type green">{{ $scholarshipsDetail->type ?? 'Merit-based' }}</span>
                        <span class="lab-open">
                            @if ($scholarshipsDetail->status == 1)
                                Open
                            @else
                                Closed
                            @endif
                        </span>
                        <span class="lab-price">Rs. {{ number_format($scholarshipsDetail->award_amount) }}</span>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="card-title">{{ $scholarshipsDetail->name }} </h5>
                                    <p class="text fw-medium">{{ $scholarshipsDetail->department->name }}</p>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                            <p class="card-text">{!! $scholarshipsDetail->description !!}</p>

                        </div>
                    </div>

                    <div class="card cardTabs">
                        <div class="card-body">
                            <ul class="nav nav-pills mb-3" id="overview-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#overview" type="button" role="tab" aria-controls="overview"
                                        aria-selected="true">
                                        <div class="icon">
                                            <i class="fas fa-exclamation-circle"></i>
                                        </div>
                                        <h6>Overview</h6>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="eligibility-tab" data-bs-toggle="pill"
                                        data-bs-target="#eligibility" type="button" role="tab"
                                        aria-controls="eligibility" aria-selected="false">
                                        <div class="icon"><i class="fas fa-check"></i></div>
                                        <h6>Eligibility</h6>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="requirements-tab" data-bs-toggle="pill"
                                        data-bs-target="#requirements" type="button" role="tab"
                                        aria-controls="requirements" aria-selected="false">
                                        <div class="icon"><i class="fas fa-file-lines"></i></div>
                                        <h6>Requirements</h6>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="benefits-tab" data-bs-toggle="pill"
                                        data-bs-target="#benefits" type="button" role="tab" aria-controls="benefits"
                                        aria-selected="false">
                                        <div class="icon"><i class="fas fa-gift"></i></div>
                                        <h6>Benefits</h6>
                                    </button>
                                </li>

                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="overview" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <h1 class="ThirdHead">About This Scholarship</h1>
                                    <p class="sectionDes left mt-4">{!! $scholarshipsDetail->description !!}</p>
                                    <div class="row mt-4">
                                        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6 mb-3">
                                            <div class="scholarShipItem green">
                                                <div class="icon">
                                                    <i class="fas fa-building"></i>
                                                </div>
                                                <div class="text">
                                                    <p>Department</p>
                                                    <h4>{{ $scholarshipsDetail->department->name }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6 mb-3">
                                            <div class="scholarShipItem purple">
                                                <div class="icon">
                                                    <i class="fas fa-dollar-sign"></i>
                                                </div>
                                                <div class="text">
                                                    <p>Amount</p>
                                                    <h4>Rs. {{ number_format($scholarshipsDetail->award_amount) }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6 mb-3">
                                            <div class="scholarShipItem blue">
                                                <div class="icon">
                                                    <i class="fas fa-graduation-cap"></i>
                                                </div>
                                                <div class="text">
                                                    <p>Education Level</p>
                                                    <h4>Undergraduate</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6 mb-3">
                                            <div class="scholarShipItem red">
                                                <div class="icon">
                                                    <i class="fas fa-calendar"></i>
                                                </div>
                                                <div class="text">
                                                    <p>Application Deadline</p>
                                                    <h4>{{ \Carbon\Carbon::parse($scholarshipsDetail->application_end_date)->format('F j, Y') }}
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="eligibility" role="tabpanel"
                                    aria-labelledby="pills-profile-tab">
                                    <h1 class="ThirdHead">Eligibility Criteria</h1>

                                    @if (!empty($scholarshipsDetail->eligibility_criteria))
                                        {!! $scholarshipsDetail->eligibility_criteria !!}
                                    @else
                                        <ul class="listItemDesign">
                                            @php
                                                $educationLevels = is_array(
                                                    $scholarshipsDetail->education_levels ?? null,
                                                )
                                                    ? $scholarshipsDetail->education_levels
                                                    : (!empty($scholarshipsDetail->education_levels)
                                                        ? json_decode($scholarshipsDetail->education_levels, true)
                                                        : []);
                                            @endphp

                                            @if (!empty($educationLevels))
                                                <li class="green">
                                                    <div class="icon">
                                                        <i class="fas fa-check"></i>
                                                    </div>
                                                    <p>Education levels: {{ implode(', ', $educationLevels) }}</p>
                                                </li>
                                            @endif

                                            @if ($scholarshipsDetail->minimum_percentage ?? false)
                                                <li class="green">
                                                    <div class="icon">
                                                        <i class="fas fa-check"></i>
                                                    </div>
                                                    <p>Minimum {{ $scholarshipsDetail->minimum_percentage }}% marks required
                                                    </p>
                                                </li>
                                            @endif

                                            @if (!empty($scholarshipsDetail->eligible_districts))
                                                @php
                                                    $districts = is_array($scholarshipsDetail->eligible_districts)
                                                        ? $scholarshipsDetail->eligible_districts
                                                        : json_decode($scholarshipsDetail->eligible_districts, true);
                                                @endphp
                                                <li class="green">
                                                    <div class="icon">
                                                        <i class="fas fa-check"></i>
                                                    </div>
                                                    <p>Eligible districts:
                                                        @if (is_array($districts))
                                                            {{ implode(', ', $districts) }}
                                                        @else
                                                            All districts
                                                        @endif
                                                    </p>
                                                </li>
                                            @endif

                                            <li class="green">
                                                <div class="icon">
                                                    <i class="fas fa-check"></i>
                                                </div>
                                                <p>Must apply before the deadline:
                                                    {{ \Carbon\Carbon::parse($scholarshipsDetail->application_end_date)->format('F j, Y') }}
                                                </p>
                                            </li>
                                        </ul>
                                    @endif
                                </div>
                                <div class="tab-pane fade" id="requirements" role="tabpanel"
                                    aria-labelledby="pills-contact-tab">
                                    <h1 class="ThirdHead">Required Documents</h1>

                                    @if (!empty($scholarshipsDetail->required_documents))
                                        @php
                                            $requiredDocs = is_array($scholarshipsDetail->required_documents)
                                                ? $scholarshipsDetail->required_documents
                                                : json_decode($scholarshipsDetail->required_documents, true);
                                        @endphp

                                        <ul class="listItemDesign">
                                            @if (is_array($requiredDocs) && count($requiredDocs) > 0)
                                                @foreach ($requiredDocs as $doc)
                                                    <li class="blue">
                                                        <div class="icon">
                                                            <i class="fas fa-file"></i>
                                                        </div>
                                                        <p>{{ $doc }}</p>
                                                    </li>
                                                @endforeach
                                            @endif

                                            @if ($scholarshipsDetail->requires_cnic)
                                                <li class="blue">
                                                    <div class="icon">
                                                        <i class="fas fa-id-card"></i>
                                                    </div>
                                                    <p>CNIC/B-Form</p>
                                                </li>
                                            @endif

                                            @if ($scholarshipsDetail->requires_domicile)
                                                <li class="blue">
                                                    <div class="icon">
                                                        <i class="fas fa-file-contract"></i>
                                                    </div>
                                                    <p>Domicile Certificate</p>
                                                </li>
                                            @endif

                                            @if ($scholarshipsDetail->requires_income_certificate)
                                                <li class="blue">
                                                    <div class="icon">
                                                        <i class="fas fa-money-check"></i>
                                                    </div>
                                                    <p>Income Certificate</p>
                                                </li>
                                            @endif

                                            @if ($scholarshipsDetail->requires_education_documents)
                                                <li class="blue">
                                                    <div class="icon">
                                                        <i class="fas fa-graduation-cap"></i>
                                                    </div>
                                                    <p>Educational Documents/Transcripts</p>
                                                </li>
                                            @endif

                                            @if ($scholarshipsDetail->requires_profile_document)
                                                <li class="blue">
                                                    <div class="icon">
                                                        <i class="fas fa-user"></i>
                                                    </div>
                                                    <p>Profile Photo</p>
                                                </li>
                                            @endif
                                        </ul>
                                    @else
                                        <p>Please contact the department for document requirements.</p>
                                    @endif
                                </div>
                                <div class="tab-pane fade" id="benefits" role="tabpanel"
                                    aria-labelledby="pills-contact-tab">
                                    <h1 class="ThirdHead">Scholarship Benefits</h1>

                                    @if (!empty($scholarshipsDetail->benefits))
                                        {!! $scholarshipsDetail->benefits !!}
                                    @else
                                        <ul class="listItemDesign">
                                            <li class="purple">
                                                <div class="icon">
                                                    <i class="fas fa-money-bill"></i>
                                                </div>
                                                <p>Financial support of Rs.
                                                    {{ number_format($scholarshipsDetail->award_amount) }}</p>
                                            </li>

                                            <li class="purple">
                                                <div class="icon">
                                                    <i class="fas fa-book"></i>
                                                </div>
                                                <p>Educational resources and materials</p>
                                            </li>

                                            <li class="purple">
                                                <div class="icon">
                                                    <i class="fas fa-user-graduate"></i>
                                                </div>
                                                <p>Career development opportunities</p>
                                            </li>

                                            <li class="purple">
                                                <div class="icon">
                                                    <i class="fas fa-network-wired"></i>
                                                </div>
                                                <p>Access to professional networks</p>
                                            </li>

                                            @if ($scholarshipsDetail->type == 'Merit-based')
                                                <li class="purple">
                                                    <div class="icon">
                                                        <i class="fas fa-medal"></i>
                                                    </div>
                                                    <p>Recognition for academic excellence</p>
                                                </li>
                                            @endif
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12 col-xl-4">
                    <div class="card detailTopCard">
                        <div class="card-body">
                            <h1 class="sectionHead gradientHeading mb-0">Rs.
                                {{ number_format($scholarshipsDetail->award_amount) }}</h1>
                            <p>Scholarship Amount</p>
                            <div class="prog">
                                <p>Application Deadline</p>
                                @php
                                    $endDate = \Carbon\Carbon::parse($scholarshipsDetail->application_end_date);
                                    $currentDate = \Carbon\Carbon::now();
                                    $daysLeft = $currentDate->diffInDays($endDate, false);
                                    $daysLeft = $daysLeft > 0 ? $daysLeft : 0;
                                @endphp
                                <p>{{ $daysLeft }} days left</p>
                            </div>
                            <div class="progress">
                                @php
                                    $startDate = \Carbon\Carbon::parse($scholarshipsDetail->application_start_date);
                                    $endDate = \Carbon\Carbon::parse($scholarshipsDetail->application_end_date);
                                    $currentDate = \Carbon\Carbon::now();
                                    $totalDuration = $endDate->diffInDays($startDate);
                                    $daysElapsed = $currentDate->diffInDays($startDate);
                                    $progressPercentage = 0;

                                    if ($totalDuration > 0) {
                                        $progressPercentage = min(100, max(0, ($daysElapsed / $totalDuration) * 100));
                                    }

                                    if ($currentDate > $endDate) {
                                        $progressPercentage = 100;
                                    }
                                @endphp
                                <div class="progress-bar" role="progressbar" style="width: {{ $progressPercentage }}%"
                                    aria-valuenow="{{ $progressPercentage }}" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                            <span class="dead">Deadline:
                                {{ \Carbon\Carbon::parse($scholarshipsDetail->application_end_date)->format('F j, Y') }}</span>
                            <a href="{{ route('scholarship.apply', $scholarshipsDetail->id) }}"
                                class="btn btn-grn-grd w-100">Apply Now</a>
                        </div>
                    </div>
                    <div class="card cardShadow mt-5">
                        <div class="card-body">
                            <h5>Quick Information</h5>

                            <div class="row">
                                <div class="col-xs-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                    <div class="scholarShipItem small green">
                                        <div class="icon">
                                            <i class="fas fa-building"></i>
                                        </div>
                                        <div class="text">
                                            <p>Department</p>
                                            <h4>{{ $scholarshipsDetail->department->name }}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                    <div class="scholarShipItem small blue">
                                        <div class="icon">
                                            <i class="fas fa-graduation-cap"></i>
                                        </div>
                                        <div class="text">
                                            <p>Level</p>
                                            <h4>Undergraduate</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                    <div class="scholarShipItem small purple">
                                        <div class="icon">
                                            <i class="fas fa-dollar-sign"></i>
                                        </div>
                                        <div class="text">
                                            <p>Type</p>
                                            <h4>{{ $scholarshipsDetail->type ?? 'Merit-based' }}</h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                    <div class="scholarShipItem small red">
                                        <div class="icon">
                                            <i class="fas fa-calendar"></i>
                                        </div>
                                        <div class="text">
                                            <p>Application Deadline</p>
                                            <h4>{{ \Carbon\Carbon::parse($scholarshipsDetail->application_end_date)->format('F j, Y') }}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card cardShadow help mt-5">
                        <div class="card-body">
                            <h5>Need Help?</h5>
                            <p class="sectionDes my-3">Have questions about this scholarship? Our support team is
                                here to
                                help.</p>

                            <button class="btn btn-blue-grd w-100">Contact Support</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>







    </div>




@endsection
@section('script')

    <script>
        $(document).ready(function() {
            $(".details-image").click(function() {
                this.requestFullscreen()
            })
        });
    </script>
@endsection
