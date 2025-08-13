@extends('front/layouts/layout')

@section('title', $pageData->title ?? 'About Us')
@section('content')

    <!-- Banner inner section with redesigned colors -->
    <section class="banner-inner" style="background-color: rgba(167, 243, 208, 0.15);">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="banner-header-text py-5">
                        <h1 class="heading gradientHeading2 text-center mb-3">{{ $pageData->title ?? 'About Us' }}</h1>
                        <p class="text-center sectionDes px-md-5 mb-4" style="color: var(--text);">
                            {{ $pageData->subtitle ?? 'Learn more about the KP Scholarship Program and how we\'re supporting the future of education in Khyber Pakhtunkhwa' }}
                        </p>
                        <div class="d-inline-block position-relative">
                            <span class="badge rounded-pill px-4 py-2 shadow-sm"
                                style="background: var(--grn); color: white;">
                                <i class="fas fa-graduation-cap me-2"></i> Empowering Education Since 2019
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Content Section with root colors -->
    <section class="about-content sectionPadding">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 mb-4 mb-lg-0 order-2 order-lg-1">
                    <div class="about-image position-relative">
                        @if ($pageData->getFirstMediaUrl('page-media'))
                            <img src="{{ $pageData->getFirstMediaUrl('page-media') }}" alt="{{ $pageData->title }}"
                                class="img-fluid rounded shadow-lg">
                        @else
                            <img src="{{ asset('images/about-us.jpg') }}" alt="About Us"
                                class="img-fluid rounded shadow-lg">
                        @endif

                        <!-- Decorative element with root colors -->
                        <div class="position-absolute" style="top: -15px; left: -15px; z-index: 2;">
                            <div class="bg-white rounded-circle shadow-sm d-flex align-items-center justify-content-center"
                                style="width: 70px; height: 70px;">
                                <div class="rounded-circle d-flex align-items-center justify-content-center"
                                    style="width: 50px; height: 50px; background: var(--grn-grd);">
                                    <i class="fas fa-landmark text-white fs-4"></i>
                                </div>
                            </div>
                        </div>

                        <div
                            class="stats-box bg-white shadow rounded p-4 position-absolute end-0 bottom-0 translate-middle-x">
                            <div class="row g-3">
                                <div class="col-6 border-end text-center">
                                    <h3 class="mb-0" style="color: var(--grn);">5,000+</h3>
                                    <p class="small mb-0" style="color: var(--text);">Scholarships</p>
                                </div>
                                <div class="col-6 text-center">
                                    <h3 class="mb-0" style="color: var(--blue);">25,000+</h3>
                                    <p class="small mb-0" style="color: var(--text);">Students</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 order-1 order-lg-2">
                    <div class="about-content ps-lg-4">
                        <div class="d-flex align-items-center mb-4">
                            <span class="badge rounded-pill px-3 py-2 me-3"
                                style="background-color: var(--light-grn); color: var(--grn);">Our Mission</span>
                            <div class="flex-grow-1 border-top opacity-25" style="border-color: var(--grn) !important;">
                            </div>
                        </div>
                        <h2 class="sectionHead text-start mb-4 gradientHeading2">Empowering Through Education</h2>
                        <div class="content-area" style="color: var(--text);">
                            {!! $pageData->description ??
                                '<p class="mb-4">The Directorate of Youth Affairs, Khyber Pakhtunkhwa is committed to providing educational opportunities and support to the youth of KP. Our scholarship programs aim to ensure that financial constraints do not hinder academic growth and development.</p>
                                                            <p>We believe in the power of education to transform lives and contribute to the socio-economic development of our province. Through our initiatives, we strive to nurture talent, foster innovation, and build a brighter future for Khyber Pakhtunkhwa.</p>' !!}
                        </div>
                        <div class="mt-4 pt-2">
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle p-2 me-3" style="background-color: var(--light-grn);">
                                            <i class="fas fa-check" style="color: var(--grn);"></i>
                                        </div>
                                        <span class="fw-medium">Merit-based Selection</span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle p-2 me-3" style="background-color: var(--light-grn);">
                                            <i class="fas fa-check" style="color: var(--grn);"></i>
                                        </div>
                                        <span class="fw-medium">Equal Opportunity</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Features Section with root colors -->
    <section class="features-section py-5" style="background-color: rgba(167, 243, 208, 0.1);">
        <div class="container py-4">
            <div class="row mb-5">
                <div class="col-lg-6 mx-auto text-center">
                    <span class="badge rounded-pill px-3 py-2 mb-3"
                        style="background-color: rgba(2, 132, 199, 0.1); color: var(--blue);">What We Do</span>
                    <h2 class="sectionHead mb-4 gradientHeading2">Our Key Initiatives</h2>
                    <p style="color: var(--text);">We're committed to supporting the youth of Khyber Pakhtunkhwa through
                        various
                        programs designed to create opportunities and foster growth.</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card feature-card h-100 border-0 shadow-sm position-relative">
                        <!-- Top gradient border -->
                        <div class="position-absolute top-0 start-0 w-100" style="height: 4px; background: var(--grn-grd);">
                        </div>
                        <div class="card-body text-center p-4 pt-5">
                            <div class="feature-icon rounded-circle mx-auto mb-4"
                                style="width: 80px; height: 80px; background: var(--light-grn); display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-graduation-cap fs-2" style="color: var(--grn);"></i>
                            </div>
                            <h3 class="h4 mb-3" style="color: var(--grn);">Educational Support</h3>
                            <p style="color: var(--text);">Providing financial assistance to deserving students through our
                                comprehensive scholarship programs for undergraduate and graduate studies.</p>
                            <div class="mt-4">
                                <span class="badge px-3 py-2"
                                    style="background-color: var(--light-grn); color: var(--grn);">5,000+ Scholarships
                                    Awarded</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card feature-card h-100 border-0 shadow-sm position-relative">
                        <!-- Top gradient border -->
                        <div class="position-absolute top-0 start-0 w-100"
                            style="height: 4px; background: var(--blue-grd);"></div>
                        <div class="card-body text-center p-4 pt-5">
                            <div class="feature-icon rounded-circle mx-auto mb-4"
                                style="width: 80px; height: 80px; background: rgba(2, 132, 199, 0.1); display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-users fs-2" style="color: var(--blue);"></i>
                            </div>
                            <h3 class="h4 mb-3" style="color: var(--blue);">Youth Development</h3>
                            <p style="color: var(--text);">Fostering youth development through economic, social and
                                political
                                empowerment initiatives that build leadership skills and capabilities.</p>
                            <div class="mt-4">
                                <span class="badge px-3 py-2"
                                    style="background-color: rgba(2, 132, 199, 0.1); color: var(--blue);">15+ Development
                                    Programs</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card feature-card h-100 border-0 shadow-sm position-relative">
                        <!-- Top gradient border -->
                        <div class="position-absolute top-0 start-0 w-100"
                            style="height: 4px; background: var(--grn-grd);"></div>
                        <div class="card-body text-center p-4 pt-5">
                            <div class="feature-icon rounded-circle mx-auto mb-4"
                                style="width: 80px; height: 80px; background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(2, 132, 199, 0.1)); display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-hands-helping fs-2"
                                    style="background: var(--grn-grd); -webkit-background-clip: text; background-clip: text; color: transparent;"></i>
                            </div>
                            <h3 class="h4 mb-3 gradientHeading2">Community Engagement</h3>
                            <p style="color: var(--text);">Creating opportunities for youth participation in community
                                development,
                                volunteerism, and civic responsibility initiatives.</p>
                            <div class="mt-4">
                                <span class="badge px-3 py-2"
                                    style="background-color: var(--light-grn); color: var(--grn);">200+ Community
                                    Projects</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
                <a href="{{ route('scholarships.pages') }}" class="btn px-4 py-2"
                    style="background: var(--grn-grd); color: white; border-radius: 30px;">
                    <i class="fas fa-arrow-right me-2"></i> Explore Our Programs
                </a>
            </div>
        </div>
    </section>

    <!-- Vision and Policy Section with enhanced design -->
    <section class="vision-policy-section sectionPadding"
        style="background: linear-gradient(135deg, rgba(167, 243, 208, 0.1), rgba(2, 132, 199, 0.05));">
        <div class="container">
            <!-- Floating decorative elements -->
            <div class="position-absolute" style="top: 10%; right: 5%; z-index: 0; opacity: 0.07;">
                <i class="fas fa-brain fa-5x" style="color: var(--grn);"></i>
            </div>
            <div class="position-absolute" style="bottom: 15%; left: 5%; z-index: 0; opacity: 0.07;">
                <i class="fas fa-lightbulb fa-5x" style="color: var(--blue);"></i>
            </div>

            <div class="row mb-5 position-relative">
                <div class="col-lg-8 mx-auto text-center">
                    <div class="mb-3 d-inline-flex align-items-center justify-content-center p-2 rounded-circle"
                        style="background: linear-gradient(135deg, rgba(16, 185, 129, 0.2), rgba(2, 132, 199, 0.2)); width: 80px; height: 80px;">
                        <div class="rounded-circle d-flex align-items-center justify-content-center"
                            style="background: white; width: 60px; height: 60px;">
                            <i class="fas fa-compass fa-2x"
                                style="background: var(--grn-grd); -webkit-background-clip: text; background-clip: text; color: transparent;"></i>
                        </div>
                    </div>
                    <span class="badge rounded-pill px-3 py-2 mb-3"
                        style="background-color: rgba(2, 132, 199, 0.1); color: var(--blue);">Our Framework</span>
                    <h2 class="sectionHead mb-4 gradientHeading2">Vision & Policy Framework</h2>
                    <p class="sectionDes mx-auto" style="max-width: 700px;">Empowering the youth of Khyber Pakhtunkhwa
                        through educational opportunities and
                        a comprehensive development approach that focuses on sustainable growth and innovation.</p>
                    <div class="title-underline mx-auto mt-4"
                        style="width: 100px; height: 4px; border-radius: 2px; background: var(--grn-grd);"></div>
                </div>
            </div>

            <!-- Vision and Policy Cards -->
            <div class="row g-4 align-items-stretch">
                <!-- Vision Card -->
                <div class="col-md-6">
                    <div class="card vision-policy-card h-100 border-0 shadow position-relative overflow-hidden"
                        style="border-radius: 20px; transform: translateY(0); transition: all 0.3s ease;">
                        <!-- Card top gradient border -->
                        <div class="position-absolute top-0 start-0 w-100"
                            style="height: 6px; background: var(--grn-grd); z-index: 1;"></div>

                        <!-- Curved background shape -->
                        <div class="position-absolute end-0 bottom-0"
                            style="width: 200px; height: 200px; background: var(--grn-grd); opacity: 0.05; border-radius: 100% 0 0 0; transform: translate(30%, 30%);">
                        </div>

                        <div class="card-body p-4 p-lg-5">
                            <div class="vision-header mb-4 d-flex flex-column align-items-start">
                                <div class="icon-wrapper p-3 rounded-4 mb-3 position-relative"
                                    style="background: linear-gradient(135deg, var(--light-grn), rgba(167, 243, 208, 0.5)); overflow: hidden;">
                                    <!-- Animated pulsing circle behind icon -->
                                    <div class="position-absolute top-50 start-50 translate-middle rounded-circle"
                                        style="width: 40px; height: 40px; background: var(--grn); opacity: 0.2; animation: pulse-vision 2s infinite;">
                                    </div>
                                    <i class="fas fa-eye fs-2"
                                        style="color: var(--grn); position: relative; z-index: 2;"></i>
                                </div>
                                <h3 class="card-title fs-2 fw-bold mb-0 gradientHeading2"
                                    style="font-size: 2.25rem !important;">Our Vision</h3>
                                <div class="title-line mt-2"
                                    style="width: 80px; height: 4px; background: var(--grn-grd); border-radius: 2px;">
                                </div>
                            </div>

                            <p class="card-text mb-4 lead" style="color: var(--text); line-height: 1.7;">The Directorate
                                of Youth Affairs, Khyber Pakhtunkhwa was
                                established as independent Directorate in the year 2017. Our vision is to foster a society
                                where every young person
                                has access to quality education and growth opportunities.</p>

                            <div class="values-container p-4 rounded-4 mb-4"
                                style="background: linear-gradient(135deg, rgba(167, 243, 208, 0.2), rgba(167, 243, 208, 0.1)); border-left: 4px solid var(--grn); box-shadow: 0 10px 20px rgba(5, 150, 105, 0.05);">
                                <h5 class="fw-bold mb-3 d-flex align-items-center" style="color: var(--grn);">
                                    <div class="icon-box p-2 rounded-2 me-3" style="background: rgba(5, 150, 105, 0.1);">
                                        <i class="fas fa-star"></i>
                                    </div>
                                    Our Core Values
                                </h5>
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <div class="value-item d-flex align-items-center p-2 rounded-3 hover-effect"
                                            style="transition: all 0.3s ease;">
                                            <div class="rounded-circle p-2 me-3"
                                                style="background-color: white; box-shadow: 0 3px 10px rgba(5, 150, 105, 0.1);">
                                                <i class="fas fa-check" style="color: var(--grn);"></i>
                                            </div>
                                            <span class="fw-medium">Excellence in education</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="value-item d-flex align-items-center p-2 rounded-3 hover-effect"
                                            style="transition: all 0.3s ease;">
                                            <div class="rounded-circle p-2 me-3"
                                                style="background-color: white; box-shadow: 0 3px 10px rgba(5, 150, 105, 0.1);">
                                                <i class="fas fa-check" style="color: var(--grn);"></i>
                                            </div>
                                            <span class="fw-medium">Equal opportunities</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="value-item d-flex align-items-center p-2 rounded-3 hover-effect"
                                            style="transition: all 0.3s ease;">
                                            <div class="rounded-circle p-2 me-3"
                                                style="background-color: white; box-shadow: 0 3px 10px rgba(5, 150, 105, 0.1);">
                                                <i class="fas fa-check" style="color: var(--grn);"></i>
                                            </div>
                                            <span class="fw-medium">Transparency</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="value-item d-flex align-items-center p-2 rounded-3 hover-effect"
                                            style="transition: all 0.3s ease;">
                                            <div class="rounded-circle p-2 me-3"
                                                style="background-color: white; box-shadow: 0 3px 10px rgba(5, 150, 105, 0.1);">
                                                <i class="fas fa-check" style="color: var(--grn);"></i>
                                            </div>
                                            <span class="fw-medium">Sustainable development</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <a href="#" class="btn px-4 py-2 position-relative overflow-hidden"
                                style="background: var(--grn-grd); color: white; border-radius: 30px; box-shadow: 0 5px 15px rgba(5, 150, 105, 0.2);">
                                <span class="position-relative z-index-1">
                                    <i class="fas fa-arrow-right me-2"></i> Learn More
                                </span>
                                <div class="position-absolute top-0 start-0 w-100 h-100"
                                    style="background: linear-gradient(90deg, transparent 0%, rgba(255,255,255,0.2) 50%, transparent 100%); transform: translateX(-100%); animation: button-shine 3s infinite;">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Policy Card -->
                <div class="col-md-6">
                    <div class="card vision-policy-card h-100 border-0 shadow position-relative overflow-hidden"
                        style="border-radius: 20px; transform: translateY(0); transition: all 0.3s ease;">
                        <!-- Card top gradient border -->
                        <div class="position-absolute top-0 start-0 w-100"
                            style="height: 6px; background: var(--blue-grd); z-index: 1;"></div>

                        <!-- Curved background shape -->
                        <div class="position-absolute start-0 bottom-0"
                            style="width: 200px; height: 200px; background: var(--blue-grd); opacity: 0.05; border-radius: 0 100% 0 0; transform: translate(-30%, 30%);">
                        </div>

                        <div class="card-body p-4 p-lg-5">
                            <div class="vision-header mb-4 d-flex flex-column align-items-start">
                                <div class="icon-wrapper p-3 rounded-4 mb-3 position-relative"
                                    style="background: linear-gradient(135deg, rgba(2, 132, 199, 0.2), rgba(2, 132, 199, 0.1)); overflow: hidden;">
                                    <!-- Animated pulsing circle behind icon -->
                                    <div class="position-absolute top-50 start-50 translate-middle rounded-circle"
                                        style="width: 40px; height: 40px; background: var(--blue); opacity: 0.2; animation: pulse-policy 2s infinite;">
                                    </div>
                                    <i class="fas fa-file-alt fs-2"
                                        style="color: var(--blue); position: relative; z-index: 2;"></i>
                                </div>
                                <h3 class="card-title fs-2 fw-bold mb-0 gradientHeading2"
                                    style="font-size: 2.25rem !important;">Youth Policy</h3>
                                <div class="title-line mt-2"
                                    style="width: 80px; height: 4px; background: var(--blue-grd); border-radius: 2px;">
                                </div>
                            </div>

                            <p class="card-text mb-4 lead" style="color: var(--text); line-height: 1.7;">Khyber
                                Pakhtunkhwa Youth Policy is the central tool to systemically
                                integrate, implement, and evaluate all youth development work in the province, providing a
                                comprehensive framework for growth and progress.</p>

                            <div class="policy-pillars">
                                <!-- Economic Empowerment Pillar -->
                                <div class="policy-pillar mb-4 p-0">
                                    <div class="policy-pillar-card rounded-4 p-3 position-relative"
                                        style="background-color: rgba(167, 243, 208, 0.15); border-left: 4px solid var(--grn); box-shadow: 0 5px 15px rgba(0,0,0,0.03); transition: all 0.3s ease;">
                                        <!-- Mini corner decorator -->
                                        <div class="position-absolute top-0 end-0 m-2"
                                            style="width: 15px; height: 15px; border-radius: 50%; background: var(--light-grn); opacity: 0.5;">
                                        </div>

                                        <div class="d-flex align-items-start">
                                            <div class="pillar-icon me-3 p-3 rounded-circle d-flex align-items-center justify-content-center"
                                                style="background: var(--grn-grd); color: white; box-shadow: 0 5px 15px rgba(5, 150, 105, 0.2); transition: all 0.3s ease;">
                                                <i class="fas fa-chart-line"></i>
                                            </div>
                                            <div>
                                                <h5 class="fw-bold mb-2" style="color: var(--grn);">Economic Empowerment
                                                </h5>
                                                <p class="mb-0" style="color: var(--text);">Providing financial support
                                                    and entrepreneurship
                                                    opportunities for sustainable livelihood development</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Social Empowerment Pillar -->
                                <div class="policy-pillar mb-4 p-0">
                                    <div class="policy-pillar-card rounded-4 p-3 position-relative"
                                        style="background-color: rgba(2, 132, 199, 0.1); border-left: 4px solid var(--blue); box-shadow: 0 5px 15px rgba(0,0,0,0.03); transition: all 0.3s ease;">
                                        <!-- Mini corner decorator -->
                                        <div class="position-absolute top-0 end-0 m-2"
                                            style="width: 15px; height: 15px; border-radius: 50%; background: var(--blue); opacity: 0.2;">
                                        </div>

                                        <div class="d-flex align-items-start">
                                            <div class="pillar-icon me-3 p-3 rounded-circle d-flex align-items-center justify-content-center"
                                                style="background: var(--blue-grd); color: white; box-shadow: 0 5px 15px rgba(2, 132, 199, 0.2); transition: all 0.3s ease;">
                                                <i class="fas fa-users"></i>
                                            </div>
                                            <div>
                                                <h5 class="fw-bold mb-2" style="color: var(--blue);">Social Empowerment
                                                </h5>
                                                <p class="mb-0" style="color: var(--text);">Creating inclusive social
                                                    systems and support networks
                                                    for holistic development</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Political Empowerment Pillar -->
                                <div class="policy-pillar mb-4 p-0">
                                    <div class="policy-pillar-card rounded-4 p-3 position-relative"
                                        style="background: linear-gradient(135deg, rgba(16, 185, 129, 0.07), rgba(2, 132, 199, 0.07)); border-left: 4px solid; border-image: linear-gradient(to bottom, var(--blue), var(--grn)) 1; box-shadow: 0 5px 15px rgba(0,0,0,0.03); transition: all 0.3s ease;">
                                        <!-- Mini corner decorator -->
                                        <div class="position-absolute top-0 end-0 m-2"
                                            style="width: 15px; height: 15px; border-radius: 50%; background: linear-gradient(135deg, var(--grn), var(--blue)); opacity: 0.3;">
                                        </div>

                                        <div class="d-flex align-items-start">
                                            <div class="pillar-icon me-3 p-3 rounded-circle d-flex align-items-center justify-content-center"
                                                style="background: linear-gradient(90deg, var(--blue) 0%, var(--grn) 100%); color: white; box-shadow: 0 5px 15px rgba(2, 132, 199, 0.2); transition: all 0.3s ease;">
                                                <i class="fas fa-balance-scale"></i>
                                            </div>
                                            <div>
                                                <h5 class="fw-bold mb-2 gradientHeading2">Political Empowerment</h5>
                                                <p class="mb-0" style="color: var(--text);">Enabling youth participation
                                                    in governance and
                                                    policy-making processes</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center mt-4">
                                    <a href="#" class="btn px-4 py-2 position-relative overflow-hidden"
                                        style="background: var(--blue-grd); color: white; border-radius: 30px; box-shadow: 0 5px 15px rgba(2, 132, 199, 0.2);">
                                        <span class="position-relative z-index-1">
                                            <i class="fas fa-file-download me-2"></i> Download Policy
                                        </span>
                                        <div class="position-absolute top-0 start-0 w-100 h-100"
                                            style="background: linear-gradient(90deg, transparent 0%, rgba(255,255,255,0.2) 50%, transparent 100%); transform: translateX(-100%); animation: button-shine 3s infinite;">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats counter row -->
            <div class="row mt-5 text-center">
                <div class="col-lg-10 mx-auto">
                    <div class="stats-card p-4 rounded-4 shadow-sm"
                        style="background: linear-gradient(135deg, rgba(255,255,255,0.9), rgba(255,255,255,0.8)); backdrop-filter: blur(10px);">
                        <div class="row g-3">
                            <div class="col-md-3 col-6">
                                <div class="stat-item p-3">
                                    <div class="d-flex align-items-center justify-content-center mb-2">
                                        <div class="icon-circle d-flex align-items-center justify-content-center rounded-circle"
                                            style="width: 50px; height: 50px; background: var(--light-grn);">
                                            <i class="fas fa-graduation-cap" style="color: var(--grn);"></i>
                                        </div>
                                    </div>
                                    <h4 class="stat-number fw-bold mb-1 gradientHeading2">5,000+</h4>
                                    <p class="stat-label mb-0" style="color: var(--text);">Scholarships</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="stat-item p-3">
                                    <div class="d-flex align-items-center justify-content-center mb-2">
                                        <div class="icon-circle d-flex align-items-center justify-content-center rounded-circle"
                                            style="width: 50px; height: 50px; background: rgba(2, 132, 199, 0.1);">
                                            <i class="fas fa-users" style="color: var(--blue);"></i>
                                        </div>
                                    </div>
                                    <h4 class="stat-number fw-bold mb-1 gradientHeading2">25,000+</h4>
                                    <p class="stat-label mb-0" style="color: var(--text);">Students Supported</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="stat-item p-3">
                                    <div class="d-flex align-items-center justify-content-center mb-2">
                                        <div class="icon-circle d-flex align-items-center justify-content-center rounded-circle"
                                            style="width: 50px; height: 50px; background: var(--light-grn);">
                                            <i class="fas fa-school" style="color: var(--grn);"></i>
                                        </div>
                                    </div>
                                    <h4 class="stat-number fw-bold mb-1 gradientHeading2">100+</h4>
                                    <p class="stat-label mb-0" style="color: var(--text);">Partner Institutions</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="stat-item p-3">
                                    <div class="d-flex align-items-center justify-content-center mb-2">
                                        <div class="icon-circle d-flex align-items-center justify-content-center rounded-circle"
                                            style="width: 50px; height: 50px; background: rgba(2, 132, 199, 0.1);">
                                            <i class="fas fa-handshake" style="color: var(--blue);"></i>
                                        </div>
                                    </div>
                                    <h4 class="stat-number fw-bold mb-1 gradientHeading2">15+</h4>
                                    <p class="stat-label mb-0" style="color: var(--text);">Programs & Initiatives</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        /* Animations for Vision and Policy Section */
        @keyframes pulse-vision {
            0% {
                transform: scale(1);
                opacity: 0.2;
            }

            50% {
                transform: scale(1.5);
                opacity: 0.1;
            }

            100% {
                transform: scale(1);
                opacity: 0.2;
            }
        }

        @keyframes pulse-policy {
            0% {
                transform: scale(1);
                opacity: 0.2;
            }

            50% {
                transform: scale(1.5);
                opacity: 0.1;
            }

            100% {
                transform: scale(1);
                opacity: 0.2;
            }
        }

        @keyframes button-shine {
            0% {
                transform: translateX(-100%);
            }

            20% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(100%);
            }
        }

        /* Enhanced hover effects */
        .vision-policy-card:hover {
            transform: translateY(-10px) !important;
            box-shadow: 0 20px 30px rgba(0, 0, 0, 0.1) !important;
        }

        .policy-pillar-card:hover {
            transform: translateX(5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08) !important;
        }

        .policy-pillar-card:hover .pillar-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .value-item:hover {
            background-color: rgba(255, 255, 255, 0.5);
            transform: translateX(5px);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        }

        .vision-policy-section {
            position: relative;
            overflow: hidden;
        }
    </style>

    <!-- CTA Section with root colors -->
    <section class="cta-section py-5 text-white">
        <div class="container py-4">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="card border-0 shadow-lg rounded-4 overflow-hidden impact-cta-card">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-5 position-relative overflow-hidden">
                                    <!-- Background image for CTA -->
                                    <div class="position-absolute top-0 start-0 w-100 h-100"
                                        style="background: url('{{ asset('images/scholarship-students.jpg') }}') center/cover no-repeat;
                                                filter: brightness(0.85);">
                                    </div>

                                    <!-- Overlay with gradient using theme colors -->
                                    <div class="position-absolute top-0 start-0 w-100 h-100"
                                        style="background: var(--grn-grd);">
                                    </div>

                                    <!-- Decorative elements -->
                                    <div class="position-absolute"
                                        style="top: -25px; right: -25px; z-index: 1; opacity: 0.2;">
                                        <i class="fas fa-graduation-cap fa-5x text-white"></i>
                                    </div>

                                    <div class="position-absolute"
                                        style="bottom: -25px; left: -25px; z-index: 1; opacity: 0.2;">
                                        <i class="fas fa-users fa-5x text-white"></i>
                                    </div>

                                    <div
                                        class="position-relative p-5 text-white h-100 d-flex flex-column justify-content-center">
                                        <h3 class="fw-bold mb-3 display-6">Our Impact</h3>
                                        <div class="mb-2 w-50 border-bottom border-white opacity-50"></div>
                                        <p class="mb-4 opacity-90">Supporting education and youth development across Khyber
                                            Pakhtunkhwa</p>

                                        <div class="impact-stats">
                                            <div class="d-flex align-items-center mb-4">
                                                <div class="me-3 bg-white bg-opacity-10 p-3 rounded-circle">
                                                    <i class="fas fa-graduation-cap fa-2x"></i>
                                                </div>
                                                <div>
                                                    <h4 class="mb-0 fw-bold display-6">5,000+</h4>
                                                    <p class="mb-0">Scholarships Awarded</p>
                                                </div>
                                            </div>

                                            <div class="d-flex align-items-center">
                                                <div class="me-3 bg-white bg-opacity-10 p-3 rounded-circle">
                                                    <i class="fas fa-school fa-2x"></i>
                                                </div>
                                                <div>
                                                    <h4 class="mb-0 fw-bold display-6">100+</h4>
                                                    <p class="mb-0">Institutions Partnered</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-7 d-flex align-items-center">
                                    <div class="p-4 p-lg-5">
                                        <h3 class="mb-4 gradientHeading2 fw-bold">Join Our Scholarship Programs</h3>
                                        <p class="mb-4" style="color: var(--text);">The KP Scholarship Program is
                                            dedicated to providing financial assistance to deserving students from Khyber
                                            Pakhtunkhwa. Join our program and be part of our mission to empower the next
                                            generation.</p>
                                        <div class="row g-3 mb-4">
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center">
                                                    <div class="rounded-circle p-2 me-3"
                                                        style="background-color: var(--light-grn);">
                                                        <i class="fas fa-check" style="color: var(--grn);"></i>
                                                    </div>
                                                    <span>Undergraduate Scholarships</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center">
                                                    <div class="rounded-circle p-2 me-3"
                                                        style="background-color: var(--light-grn);">
                                                        <i class="fas fa-check" style="color: var(--grn);"></i>
                                                    </div>
                                                    <span>Graduate Scholarships</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center">
                                                    <div class="rounded-circle p-2 me-3"
                                                        style="background-color: var(--light-grn);">
                                                        <i class="fas fa-check" style="color: var(--grn);"></i>
                                                    </div>
                                                    <span>Technical Education Support</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center">
                                                    <div class="rounded-circle p-2 me-3"
                                                        style="background-color: var(--light-grn);">
                                                        <i class="fas fa-check" style="color: var(--grn);"></i>
                                                    </div>
                                                    <span>Educational Workshops</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column flex-md-row gap-3">
                                            <a href="{{ route('scholarships.pages') }}" class="btn px-4 py-2"
                                                style="background: var(--grn-grd); color: white; border-radius: 30px;">
                                                <i class="fas fa-search me-2"></i> Find Scholarships
                                            </a>
                                            <a href="{{ route('contact') }}" class="btn px-4 py-2"
                                                style="background-color: transparent; border: 2px solid var(--grn); color: var(--grn); border-radius: 30px;">
                                                <i class="fas fa-envelope me-2"></i> Contact Us
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script>
        // Initialize AOS animations
        AOS.init({
            duration: 1000,
            once: true,
            easing: 'ease-in-out'
        });
    </script>
@endsection
