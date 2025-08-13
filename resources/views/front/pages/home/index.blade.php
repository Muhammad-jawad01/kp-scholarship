@extends('front/layouts/layout')

@section('title', 'Scholarship')
@section('content')
    <!-- banner section -->
    <section class="banner-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="banner-header-text">
                        <h1 class="heading gradientHeading">Khyber Pakhtunkhwa’s</h1>
                        <h1 class="heading">Scholarships <br /> at your fingertips.</h1>
                        <p>One platform. All opportunities. Fair access for all.</p>
                        <div class="btn-section">
                            <button class="btn btn-grn-grd icon "> <i class="fas fa-search"></i>
                                Find Scholarships</button>
                            <button class="btn btn-grn-outline mx-2">
                                <i class="fa-regular fa-pen-to-square"></i>
                                Apply Now
                            </button>
                        </div>
                        <ul class="banner-statistic-list top">
                            <li>
                                <h4>5,000+</h4>
                                <p>Scholarships</p>
                            </li>
                            <li>
                                <h4>25,000+</h4>
                                <p>Students Helped</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 position-relative">
                    <a class="banner-image-after">
                        <i class="fa-solid fa-graduation-cap"></i>
                    </a>
                    <img src="{{ asset('front_assets/imgs/header_ing.svg') }}" class="img-fluid banner-image"
                        alt="">
                    <a class="banner-image-before">
                        <svg width="22" height="28" viewBox="0 0 22 28" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17.3666 18.3895V27.1431C17.3666 27.3303 17.3028 27.4834 17.1753 27.6025C17.0477 27.7216 16.8989 27.7812 16.7288 27.7812C16.6097 27.7812 16.4991 27.7556 16.3971 27.7046L10.988 24.4635L5.57894 27.7046C5.42586 27.7897 5.26427 27.8109 5.09417 27.7684C4.92407 27.7259 4.7965 27.628 4.71145 27.4749C4.64341 27.3728 4.60939 27.2622 4.60939 27.1431V18.3895C3.41872 17.4367 2.49169 16.2798 1.82832 14.9187C1.13092 13.5065 0.782227 12.0093 0.782227 10.427C0.782227 8.57249 1.24999 6.85408 2.18552 5.27179C3.08703 3.72353 4.30322 2.49853 5.83409 1.59679C7.41598 0.67804 9.13396 0.218664 10.988 0.218664C12.8421 0.218664 14.56 0.67804 16.1419 1.59679C17.6728 2.49853 18.889 3.72353 19.7905 5.27179C20.726 6.85408 21.1938 8.57249 21.1938 10.427C21.1938 12.0093 20.8451 13.5065 20.1477 14.9187C19.4843 16.2798 18.5573 17.4367 17.3666 18.3895ZM7.16084 19.8697V23.7744L10.988 21.4775L14.8152 23.7744V19.8697C13.5905 20.3801 12.3148 20.6353 10.988 20.6353C9.66126 20.6353 8.38553 20.3886 7.16084 19.8952V19.8697ZM10.988 18.0832C12.3658 18.0832 13.65 17.7345 14.8407 17.0369C15.9973 16.3563 16.9159 15.4376 17.5963 14.2806C18.2936 13.0897 18.6423 11.8009 18.6423 10.4142C18.6423 9.02761 18.2936 7.73881 17.5963 6.54783C16.9159 5.39089 15.9973 4.48065 14.8407 3.8171C13.65 3.11954 12.3658 2.77075 10.988 2.77075C9.61023 2.77075 8.326 3.11954 7.13532 3.8171C5.97867 4.48065 5.06015 5.39089 4.37976 6.54783C3.68237 7.73881 3.33367 9.02761 3.33367 10.4142C3.33367 11.8009 3.68237 13.0897 4.37976 14.2806C5.06015 15.4376 5.97867 16.3563 7.13532 17.0369C8.326 17.7345 9.61023 18.0832 10.988 18.0832Z"
                                fill="white" />
                        </svg>

                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Find scholarship -->
    <section class="find-scholarship sectionPadding">
        <div class="row">
            <div class="col-md-10 col-lg-10 col-xl-7 mx-auto">
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
            <h1 class="sectionHead ">Featured Scholarships</h1>
            <p class="sectionDes">Trending opportunities you don't want to miss</p>

            <div class="row mt-5">
                @foreach ($featuredScholarships as $data)
                    <div class="col-xs-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                        <div class="card feature-scholarship-card h-100">
                            {{-- <img src="./assets/imgs/scholar/s-2.png" class="card-img-top" alt="..."> --}}
                            <img src='{{ $data->getFirstMediaUrl('scholarship-mdeia') }}' class="card-img-top"
                                alt="..." />

                            <span class="lab-type green">
                                {{ $data->type ?? 'Merit-based' }}
                            </span>
                            <span class="lab-open">
                                @if ($data->status == 1)
                                    Open
                                @else
                                    Closed
                                @endif
                            </span>
                            <div class="card-body">
                                <h5 class="card-title">{{ $data->name }}</h5>
                                <p class="card-text">Higher Education Department</p>
                                <div class="detail">
                                    <h5>Rs. {{ $data->award_amount }}</h5>

                                    <span>
                                        <i class="fa-regular fa-user"></i>
                                        1,832</span>
                                </div>
                                <p class="deadline"> <i class="fa-regular fa-calendar"></i>
                                    </svg>
                                    Deadline: {{ \Carbon\Carbon::parse($data->application_end_date)->format('F j, Y') }}
                                </p>

                                <a href="{{ route('scholarships.pages.details', $data->slug) }}"
                                    class="btn btn-grn-grd w-100">
                                    Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


        </div>
    </section>

    <!-- Why Choose Our Platform? -->
    <section class="why-choose sectionPadding">
        <div class="container">
            <h1 class="sectionHead ">Why Choose Our Platform?</h1>
            <p class="sectionDes">Experience the future of scholarship applications with our innovative</p>

            <div class="row mt-5">
                <div class="col-xs-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                    <div class="card PlatformCard green">
                        <div class="card-body">
                            <div class="icon">
                                <i class="fa-regular fa-clock"></i>
                            </div>
                            <h5>Save Time</h5>
                            <p>Apply to multiple scholarships with one profile</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                    <div class="card PlatformCard blue">
                        <div class="card-body">
                            <div class="icon">
                                <i class="fa-solid fa-mobile"></i>
                            </div>
                            <h5>Apply Online</h5>
                            <p>Complete applications from anywhere, anytime</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                    <div class="card PlatformCard purple">
                        <div class="card-body">
                            <div class="icon">
                                <i class="fa-regular fa-eye"></i>
                            </div>
                            <h5>Transparent Process</h5>
                            <p>Track your application status in real-time</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                    <div class="card PlatformCard red">
                        <div class="card-body">
                            <div class="icon">
                                <i class="fa-solid fa-users"></i>
                            </div>
                            <h5>Equal Access</h5>
                            <p>Fair opportunities for students from all backgrounds</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <!-- How KP Scholarships Helped Me -->
    <section class="helped-me sectionPadding">
        <div class="container">
            <h1 class="sectionHead ">How KP Scholarships Helped Me</h1>
            <p class="sectionDes">Real stories from students who transformed their futures</p>
            <div class="row">
                <div class="col-md-12 col-lg-9 col-xl-9 mx-auto">
                    <div class="help-slider">
                        @foreach ($testimonials as $testimonial)
                            <div class="help-slider-item">
                                <div class="profile-image">
                                    <img src="{{ $testimonial->getFirstMediaUrl('team') }} " alt="">
                                </div>
                                <h4>{{ $testimonial->name }}</h4>
                                <h5>{{ $testimonial->designation }}</h5>
                                {{-- <p class="uni">University of Engineering & Technology</p> --}}
                                <p class="message"><i>{{ strip_tags($testimonial->description) }}</i></p>

                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Ready to Transform Your Future? -->
    <section class="transform-future">
        <div class="container">
            <h1 class="sectionHead text-white fs-1">Ready to Transform Your Future?</h1>
            <p class="sectionDes text-white">Join thousands of students who have unlocked their potential through
                our scholarship platform</p>
            <div class="row d-flex justify-content-center align-items-center my-5">
                <div class="col-xs-12 col-md-5 col-lg-3 mb-1">
                    <a href="{{ route('scholarships.pages') }}" class="btn btn-solid-white icon w-100">
                        <i class="fas fa-search"></i> Browse All Scholarships
                    </a>
                </div>

                <div class="col-xs-12 col-md-4 col-lg-2">
                    <a href="{{ route('student.register') }}" class="btn btn-outline-white icon w-100">
                        <i class="fas fa-rocket"></i> Start Your Journey
                    </a>
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
@endsection
