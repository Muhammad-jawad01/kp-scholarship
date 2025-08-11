@extends('front/layouts/layout')

@section('title', $pageData->title)
@section('content')


    <div class="inner-page">

        <!-- banner inner section -->
        <section class="banner-inner">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="banner-header-text">
                            <h1 class="heading gradientHeading2 text-center">Available Scholarships</h1>
                            <p class="text-center sectionDes">Discover and apply for government scholarships in
                                Khyber
                                Pakhtunkhwa. Your
                                educational journey starts here.</p>

                            <ul class="banner-statistic-list banner-inner   top mt-5">
                                <li>
                                    <h4>5,000+</h4>
                                    <p>Scholarships</p>
                                </li>
                                <li>
                                    <h4>25,000+</h4>
                                    <p>Students Helped</p>
                                </li>
                                <li>
                                    <h4>15</h4>
                                    <p>Departments</p>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <div class="row m-0 p-0">
            <div class="col-md-8 mx-auto">
                <div class="card applayScholarShip">
                    <div class="card-body">
                        <h3>Merit Scholarship Program 2024 <span class="scholarShip-status approve"><i
                                    class="fas fa-check"></i>
                                Approved</span>
                            <span class="scholarShip-status pending"><i class="fas fa-history"></i>Under
                                Review</span>
                            <span class="scholarShip-status rejected"><i class="fas fa-close"></i>
                                Rejected</span>
                        </h3>
                        </h3>
                        <div class="row">
                            <div class="col-md-7">
                                <h4>Higher Education Department</h4>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6 col-lg-4 col-xl-4 mb-3">
                                        <div class="scholarShipCardItem">
                                            <div class="icon green">
                                                <i class="fas fa-graduation-cap"></i>
                                            </div>
                                            <div class="text">
                                                <p>Education Level</p>
                                                <h4>Undergraduate</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-4 col-xl-4 mb-3">
                                        <div class="scholarShipCardItem">
                                            <div class="icon purple">
                                                <i class="fas fa-graduation-cap"></i>
                                            </div>
                                            <div class="text">
                                                <p>Education Level</p>
                                                <h4>Undergraduate</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-4 col-xl-4 mb-3">
                                        <div class="scholarShipCardItem">
                                            <div class="icon blue">
                                                <i class="fas fa-graduation-cap"></i>
                                            </div>
                                            <div class="text">
                                                <p>Education Level</p>
                                                <h4>Undergraduate</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-5 d-flex justify-content-end align-items-start">
                                <button class="btn btn-solid-green mx-1">View Details</button>
                                <button class="btn btn-solid-blue">Edit Application</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Find scholarship -->
        {{-- <section class="find-scholarship ">
            <div class="row">
                <div class="col-md-10 col-lg-10 col-xl-8 mx-auto">
                    <div class="find-scholarship-form">
                        <form action="">
                            <div class="row">
                                <div class="col-md-9 mb-4">
                                    <div class="input-group ">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fas fa-search"></i></span>
                                        <input type="text" class="form-control"
                                            placeholder="Search scholarships by name, department, or keywords..."
                                            aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-grn-grd w-100">
                                        Search Now</button>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-3 mb-3">
                                    <label for="">Department</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>All Departments</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="">Education Level</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>All Levels</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="">Application Status</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>All Status</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="">Sort By</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Application Deadline</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section> --}}

        <!-- Find scholarship -->
        {{-- <section class="find-scholarship py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-lg-10 col-xl-8 mx-auto">
                        <div class="find-scholarship-form bg-white rounded shadow p-4">
                            <div class="text-center mb-4">
                                <h3 class="fw-bold">Find Your Perfect Scholarship</h3>
                                <p class="text-muted">Search through thousands of opportunities tailored for you</p>
                            </div>

                            <form action="{{ route('search') }}" method="GET" class="row g-3">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-text bg-primary text-white"><i
                                                class="fas fa-search"></i></span>
                                        <input type="text" class="form-control form-control-lg" name="keyword"
                                            placeholder="Search by keyword, department, level..."
                                            aria-label="Search scholarships">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label small text-muted">Department</label>
                                    <select class="form-select" name="department_id">
                                        <option value="" selected>All Departments</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label small text-muted">Type</label>
                                    <select class="form-select" name="type">
                                        <option value="" selected>All Types</option>
                                        <option value="Merit-based">Merit-based</option>
                                        <option value="Need-based">Need-based</option>
                                        <option value="Research">Research</option>
                                        <option value="Sports">Sports</option>
                                        <option value="Cultural">Cultural</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label small text-muted">Deadline</label>
                                    <select class="form-select" name="deadline">
                                        <option value="" selected>All Deadlines</option>
                                        @foreach ($deadlines as $deadline)
                                            <option value="{{ $deadline['value'] }}">{{ $deadline['label'] }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-12 mt-4">
                                    <button class="btn btn-primary btn-lg w-100" type="submit">
                                        <i class="fas fa-search me-2"></i> Find Scholarships
                                    </button>
                                </div>
                            </form>

                            @if (isset($results))
                                <div class="search-results mt-5">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <h4 class="mb-0">Search Results ({{ count($results) }})</h4>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button"
                                                id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                                Sort By
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                                                <li><a class="dropdown-item" href="#">Newest First</a></li>
                                                <li><a class="dropdown-item" href="#">Deadline (Soonest)</a></li>
                                                <li><a class="dropdown-item" href="#">Award Amount (Highest)</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    @forelse($results as $scholarship)
                                        <div class="card mb-3 border-0 shadow-sm hover-card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <h5>{{ $scholarship->title }}</h5>
                                                        <p class="text-muted mb-2">
                                                            <span
                                                                class="badge bg-primary me-2">{{ $scholarship->department->name }}</span>
                                                            <span
                                                                class="badge bg-success me-2">{{ $scholarship->type ?? 'Merit-based' }}</span>
                                                            <span class="badge bg-warning text-dark">
                                                                Deadline:
                                                                {{ \Carbon\Carbon::parse($scholarship->application_end_date)->format('M j, Y') }}
                                                            </span>
                                                        </p>
                                                        <p class="mb-0">{!! \Illuminate\Support\Str::limit($scholarship->description, 120) !!}</p>
                                                    </div>
                                                    <div class="col-md-3 text-end">
                                                        <p class="fw-bold text-success mb-3">Rs.
                                                            {{ $scholarship->award_amount }}</p>
                                                        <a href="{{ route('scholarships.pages.details', $scholarship->slug) }}"
                                                            class="btn btn-outline-primary">View Details</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="alert alert-info">
                                            <i class="fas fa-info-circle me-2"></i> No scholarships match your search
                                            criteria. Try adjusting your filters.
                                        </div>
                                    @endforelse
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <section class="find-scholarship">
            <div class="row">
                <div class="col-md-10 col-lg-10 col-xl-8 mx-auto">
                    <div class="find-scholarship-form">
                        <h4>Find Your Perfect Scholarship</h4>
                        <p>Search through thousands of opportunities</p>

                        <form action="{{ route('search') }}" method="GET" class="row g-2 mb-4">

                            <div class="col-md-12 mb-3 ">
                                <input type="text" class="form-control" name="keyword"
                                    placeholder="Search by keyword, department, level...">
                            </div>
                            <div class="col-md-4 mb-3">
                                <select class="form-select" name="department_id">
                                    <option value="" selected>All Departments</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select class="form-select" name="deadline">
                                    <option value="" selected>All Deadlines</option>
                                    @foreach ($deadlines as $deadline)
                                        <option value="{{ $deadline['value'] }}">{{ $deadline['label'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <button class="btn btn-grn-grd w-100" type="submit">Search Now</button>
                            </div>
                        </form>

                        @if (isset($results))
                            <div class="mt-5">
                                <h2>Search Results</h2>
                                @forelse($results as $scholarship)
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h5>{{ $scholarship->title }}</h5>
                                            <p>{{ $scholarship->description }}</p>
                                            <a href="{{ route('scholarship.details', $scholarship->id) }}"
                                                class="btn btn-primary">Details</a>
                                        </div>
                                    </div>
                                @empty
                                    <p>No scholarships found.</p>
                                @endforelse
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>



        <!-- Featured Scholarships -->
        <section class="feature-scholarship sectionPadding">
            <div class="container">
                <p class="numberDes text-center">Showing <span>6</span>​ scholarships matching your criteria</p>

                <div class="row mt-5">

                    @foreach ($scholarships as $scholar)
                        <div class="col-xs-12 col-md-6 col-lg-4 col-xl-4 mb-4">
                            <div class="card feature-scholarship-card">
                                {{-- <img src="./assets/imgs/blog/b-1.png" class="card-img-top" alt="..."> --}}
                                <img src='{{ $scholar->getFirstMediaUrl('scholarship-mdeia') }}' class="card-img-top"
                                    alt="..." />

                                <span class="lab-type green">
                                    {{ $scholar->type ?? 'Merit-based' }}
                                </span>
                                <span class="lab-open">
                                    @if ($scholar->status == 1)
                                        Open
                                    @else
                                        Closed
                                    @endif
                                </span>
                                <span class="lab-price">Rs. {{ $scholar->award_amount }}</span>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $scholar->name }}</h5>

                                    <p class="text fw-medium">{{ $scholar->department->name }}</p>
                                    <p class="card-text">{!! \Illuminate\Support\Str::limit($scholar->description, 150) !!}
                                    </p>
                                    <p class="deadline icon green"> <i class="fas fa-graduation-cap"></i>
                                        </svg>
                                        Undergraduate</p>
                                    <p class="deadline icon blue"> <i class="fa-regular fa-calendar"></i>
                                        </svg>
                                        Deadline:
                                        {{ \Carbon\Carbon::parse($scholar->application_end_date)->format('F j, Y') }}
                                    </p>

                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <a href="{{ route('scholarships.pages.details', $scholar->slug) }}"
                                                class="btn btn-grn-grd w-100">
                                                View Details</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="" class="btn btn-grn-outline w-100">
                                                Apply Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>


            </div>
        </section>

        <!-- Ready to Transform Your Future? -->
        <section class="transform-future">
            <div class="container">
                <h1 class="sectionHead text-white fs-1">Need Help Finding the Right Scholarship?</h1>
                <p class="sectionDes text-white">Our dedicated support team is here to guide you through available
                    opportunities and <br /> application processes.</p>
                <div class="row d-flex justify-content-center align-items-center my-5">
                    <div class="col-xs-12 col-md-5 col-lg-3 col-lg-3 mb-2">
                        <button class="btn btn-solid-white icon w-100"><i class="fas fa-headphones"> </i> Get
                            Support</button>
                    </div>
                    <div class="col-xs-12 col-md-4 col-lg-2 col-lg-2">
                        <button class="btn btn-outline-white icon w-100"><i class="fas fa-edit"> </i>Start
                            Application</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-10 col-lg-6 col-lg-6 mx-auto">
                        <ul class="banner-statistic-list bottom">
                            <li>
                                <h4>98%+</h4>
                                <p>Success Rate</p>
                            </li>
                            <li>
                                <h4>24/7</h4>
                                <p>Support Available</p>
                            </li>
                            <li>
                                <h4>5M</h4>
                                <p>Average Application</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>



    </div>
@endsection

@section('script')
    <script type="text/javascript">
        //
    </script>
@endsection
