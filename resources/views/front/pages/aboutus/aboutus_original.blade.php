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
                            <span class="badge rounded-pill px-4 py-2 shadow-sm" style="background: var(--grn); color: white;">
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

                        <div class="stats-box bg-white shadow rounded p-4 position-absolute end-0 bottom-0 translate-middle-x">
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
                            <div class="flex-grow-1 border-top opacity-25" style="border-color: var(--grn) !important;"></div>
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
                    <p style="color: var(--text);">We're committed to supporting the youth of Khyber Pakhtunkhwa through various
                        programs designed to create opportunities and foster growth.</p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card feature-card h-100 border-0 shadow-sm position-relative">
                        <!-- Top gradient border -->
                        <div class="position-absolute top-0 start-0 w-100"
                            style="height: 4px; background: var(--grn-grd);"></div>
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
                                      style="background-color: var(--light-grn); color: var(--grn);">5,000+ Scholarships Awarded</span>
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
                            <p style="color: var(--text);">Fostering youth development through economic, social and political
                                empowerment initiatives that build leadership skills and capabilities.</p>
                            <div class="mt-4">
                                <span class="badge px-3 py-2" 
                                      style="background-color: rgba(2, 132, 199, 0.1); color: var(--blue);">15+ Development Programs</span>
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
                                <i class="fas fa-hands-helping fs-2" style="background: var(--grn-grd); -webkit-background-clip: text; background-clip: text; color: transparent;"></i>
                            </div>
                            <h3 class="h4 mb-3 gradientHeading2">Community Engagement</h3>
                            <p style="color: var(--text);">Creating opportunities for youth participation in community development,
                                volunteerism, and civic responsibility initiatives.</p>
                            <div class="mt-4">
                                <span class="badge px-3 py-2" 
                                      style="background-color: var(--light-grn); color: var(--grn);">200+ Community Projects</span>
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

    <!-- Vision and Policy Section with root colors -->
    <section class="vision-policy-section sectionPadding">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-7 mx-auto text-center">
                    <span class="badge rounded-pill px-3 py-2 mb-3" 
                          style="background-color: rgba(2, 132, 199, 0.1); color: var(--blue);">Our Framework</span>
                    <h2 class="sectionHead mb-4 gradientHeading2">Vision & Policy Framework</h2>
                    <p class="sectionDes">Empowering the youth of Khyber Pakhtunkhwa through educational opportunities and
                        a comprehensive development approach</p>
                </div>
            </div>
            <div class="row g-4 align-items-stretch">
                <div class="col-md-6">
                    <div class="card vision-policy-card h-100 border-0 shadow-sm position-relative overflow-hidden">
                        <div class="card-body p-4 p-lg-5">
                            <div class="vision-header mb-4">
                                <div class="d-inline-block p-3 rounded-4 mb-3"
                                    style="background: var(--light-grn);">
                                    <i class="fas fa-eye fs-2" style="color: var(--grn);"></i>
                                </div>
                                <h3 class="card-title fs-2 fw-bold mb-0 gradientHeading2">Our Vision</h3>
                                <div class="title-line mt-2" style="width: 60px; height: 3px; background: var(--grn-grd);"></div>
                            </div>

                            <p class="card-text mb-4 lead" style="color: var(--text);">The Directorate of Youth Affairs, Khyber Pakhtunkhwa was
                                established as independent Directorate in the year 2017. The purpose of the Directorate Establishment is
                                to provide educational opportunities and support to the youth of KP.</p>

                            <div class="values-container p-4 rounded-4 mb-4"
                                style="background-color: var(--light-grn); background-opacity: 0.3;">
                                <h5 class="fw-bold mb-3 d-flex align-items-center" style="color: var(--grn);">
                                    <i class="fas fa-star me-2"></i> Our Core Values
                                </h5>
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle p-2 me-3" style="background-color: white;">
                                                <i class="fas fa-check" style="color: var(--grn);"></i>
                                            </div>
                                            <span class="fw-medium">Excellence in education</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle p-2 me-3" style="background-color: white;">
                                                <i class="fas fa-check" style="color: var(--grn);"></i>
                                            </div>
                                            <span class="fw-medium">Equal opportunities</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle p-2 me-3" style="background-color: white;">
                                                <i class="fas fa-check" style="color: var(--grn);"></i>
                                            </div>
                                            <span class="fw-medium">Transparency</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle p-2 me-3" style="background-color: white;">
                                                <i class="fas fa-check" style="color: var(--grn);"></i>
                                            </div>
                                            <span class="fw-medium">Sustainable development</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <a href="#" class="btn px-4 py-2" 
                               style="background: var(--grn-grd); color: white; border-radius: 30px;">
                                <i class="fas fa-arrow-right me-2"></i> Learn More
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card vision-policy-card h-100 border-0 shadow-sm position-relative overflow-hidden">
                        <div class="card-body p-4 p-lg-5">
                            <div class="vision-header mb-4">
                                <div class="d-inline-block p-3 rounded-4 mb-3"
                                    style="background-color: rgba(2, 132, 199, 0.1);">
                                    <i class="fas fa-file-alt fs-2" style="color: var(--blue);"></i>
                                </div>
                                <h3 class="card-title fs-2 fw-bold mb-0 gradientHeading2">Youth Policy</h3>
                                <div class="title-line mt-2" style="width: 60px; height: 3px; background: var(--blue-grd);"></div>
                            </div>

                            <p class="card-text mb-4 lead" style="color: var(--text);">Khyber Pakhtunkhwa Youth Policy is the central tool to systemically
                                integrate, implement, and evaluate all youth development work in the province. The policy is
                                based on three pillars:</p>

                            <div class="policy-pillars">
                                <div class="policy-pillar mb-3 p-0">
                                    <div class="policy-pillar-card rounded-4 p-3"
                                        style="background-color: var(--light-grn); background-opacity: 0.3;">
                                        <div class="d-flex align-items-start">
                                            <div class="pillar-icon me-3 p-3 rounded-circle d-flex align-items-center justify-content-center"
                                                style="background: var(--grn-grd); color: white;">
                                                <i class="fas fa-chart-line"></i>
                                            </div>
                                            <div>
                                                <h5 class="fw-bold mb-2" style="color: var(--grn);">Economic Empowerment</h5>
                                                <p class="mb-0" style="color: var(--text);">Providing financial support and entrepreneurship
                                                    opportunities for sustainable livelihood development</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="policy-pillar mb-3 p-0">
                                    <div class="policy-pillar-card rounded-4 p-3"
                                        style="background-color: rgba(2, 132, 199, 0.1);">
                                        <div class="d-flex align-items-start">
                                            <div class="pillar-icon me-3 p-3 rounded-circle d-flex align-items-center justify-content-center"
                                                style="background: var(--blue-grd); color: white;">
                                                <i class="fas fa-users"></i>
                                            </div>
                                            <div>
                                                <h5 class="fw-bold mb-2" style="color: var(--blue);">Social Empowerment</h5>
                                                <p class="mb-0" style="color: var(--text);">Creating inclusive social systems and support networks
                                                    for holistic development</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="policy-pillar p-0">
                                    <div class="policy-pillar-card rounded-4 p-3"
                                        style="background: linear-gradient(135deg, rgba(16, 185, 129, 0.07), rgba(2, 132, 199, 0.07));">
                                        <div class="d-flex align-items-start">
                                            <div class="pillar-icon me-3 p-3 rounded-circle d-flex align-items-center justify-content-center"
                                                style="background: linear-gradient(90deg, var(--blue) 0%, var(--grn) 100%); color: white;">
                                                <i class="fas fa-balance-scale"></i>
                                            </div>
                                            <div>
                                                <h5 class="fw-bold mb-2 gradientHeading2">Political Empowerment</h5>
                                                <p class="mb-0" style="color: var(--text);">Enabling youth participation in governance and
                                                    policy-making processes</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center mt-4">
                                    <a href="#" class="btn px-4 py-2" 
                                       style="background: var(--blue-grd); color: white; border-radius: 30px;">
                                        <i class="fas fa-file-download me-2"></i> Download Policy
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                                                    <i class="fas fa-users fa-2x"></i>
                                                </div>
                                                <div>
                                                    <h4 class="mb-0 fw-bold display-6">25,000+</h4>
                                                    <p class="mb-0">Students Supported</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-7 p-5 position-relative">
                                    <!-- Subtle decorative element -->
                                    <div class="position-absolute"
                                        style="top: 20px; right: 20px; z-index: 1; opacity: 0.05;">
                                        <i class="fas fa-quote-right fa-6x text-primary"></i>
                                    </div>

                                    <div class="py-4 position-relative z-index-1">
                                        <span
                                            class="badge rounded-pill px-3 py-2 bg-primary bg-opacity-10 text-primary mb-3">Take
                                            Action</span>
                                        <h2 class="fw-bold mb-3 text-primary">Ready to Apply for a Scholarship?</h2>
                                        <p class="text-muted mb-4 lead">Take the first step towards your educational
                                            journey
                                            with KP Scholarships. Browse available opportunities or contact our team for
                                            guidance.</p>

                                        <div class="d-flex flex-column flex-sm-row gap-3">
                                            <a href="{{ route('scholarships.pages') }}"
                                                class="btn btn-primary btn-lg px-4 shadow-sm">
                                                <i class="fas fa-search me-2"></i> Browse Scholarships
                                            </a>
                                            <a href="{{ route('pages.contactus') }}"
                                                class="btn btn-outline-secondary btn-lg px-4">
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

@section('style')
    <style>
        /* About Us Page Custom Styles - Redesigned */
        :root {
            --primary-color: #10B981;
            --secondary-color: #0284C7;
            --gradient-primary: linear-gradient(90deg, #10B981 0%, #14B8A6 100%);
            --gradient-secondary: linear-gradient(90deg, #38BDF8 0%, #22D3EE 100%);
            --text-dark: #1F2937;
            --text-light: #6B7280;
            --accent-light: #A7F3D0;
        }

        /* Banner Section */
        .banner-inner {
            background: linear-gradient(rgba(31, 41, 55, 0.8), rgba(31, 41, 55, 0.8)), url('/images/about-banner.jpg');
            background-size: cover;
            background-position: center;
            padding: 100px 0;
            position: relative;
        }

        .banner-inner::before {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 70px;
            background: linear-gradient(to top right, white 0%, white 50%, transparent 50%);
        }

        .gradientHeading2 {
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: inline-block;
        }

        /* About Content Section */
        .about-image {
            overflow: hidden;
            border-radius: 12px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .about-image img {
            transition: transform 0.8s ease;
            width: 100%;
            height: auto;
        }

        .about-image::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(16, 185, 129, 0.2), transparent);
            z-index: 1;
        }

        .about-image:hover img {
            transform: scale(1.05);
        }

        .stats-box {
            width: 70%;
            margin-bottom: -30px;
            right: 0;
            border-radius: 15px;
            border-left: 4px solid #10B981;
            overflow: hidden;
            z-index: 2;
        }

        .stats-box h3 {
            font-weight: 700;
            font-size: 28px;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Features Section */
        .features-section {
            background-color: #f8fafc;
            position: relative;
            overflow: hidden;
        }

        .features-section::before {
            content: "";
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(16, 185, 129, 0.1) 0%, rgba(16, 185, 129, 0) 70%);
            top: -150px;
            left: -150px;
            border-radius: 50%;
        }

        .features-section::after {
            content: "";
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(2, 132, 199, 0.1) 0%, rgba(2, 132, 199, 0) 70%);
            bottom: -150px;
            right: -150px;
            border-radius: 50%;
        }

        .section-badge-container {
            position: relative;
            display: inline-block;
        }

        .heading-underline {
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            height: 4px;
            width: 70px;
            background: linear-gradient(to right, #10B981, #0284C7);
            border-radius: 10px;
        }

        .feature-card {
            transition: all 0.5s ease;
            border-radius: 20px;
            overflow: hidden;
            background-color: #fff;
            position: relative;
            border: none;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(to right, #10B981, #0284C7);
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
        }

        .feature-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
        }

        .feature-icon-container {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 25px;
        }

        .feature-icon {
            width: 100px;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            position: relative;
            z-index: 1;
            background: white;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .feature-icon::before {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.2), rgba(2, 132, 199, 0.2));
            border-radius: 50%;
            z-index: -1;
            transform: scale(0.85);
            transition: transform 0.4s ease, opacity 0.4s ease;
        }

        .feature-card:hover .feature-icon::before {
            transform: scale(1.2);
            opacity: 0.6;
        }

        .feature-icon i {
            font-size: 2.5rem;
            background: linear-gradient(135deg, #10B981, #0284C7);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            transition: all 0.3s ease;
        }

        .feature-card:hover .feature-icon i {
            transform: scale(1.1);
        }

        .feature-stats {
            padding-top: 12px;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
        }

        .stat-icon {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .feature-icon {
            width: 90px;
            height: 90px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            position: relative;
            z-index: 1;
            margin: 0 auto 25px;
        }

        .feature-icon::before {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            background: var(--gradient-primary);
            opacity: 0.15;
            border-radius: 50%;
            z-index: -1;
            transform: scale(0.8);
            transition: transform 0.3s ease;
        }

        .feature-card:hover .feature-icon::before {
            transform: scale(1.1);
        }

        .feature-icon i {
            font-size: 2.2rem;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Vision & Policy Section */
        .vision-policy-section {
            position: relative;
            overflow: hidden;
            background-color: #fff;
        }

        .vision-policy-section::before {
            content: "";
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(16, 185, 129, 0.05) 0%, rgba(16, 185, 129, 0) 70%);
            top: 10%;
            right: -250px;
            border-radius: 50%;
            z-index: 0;
        }

        .vision-policy-card {
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.5s ease;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08) !important;
        }

        .vision-policy-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.12) !important;
        }

        .vision-header {
            position: relative;
        }

        .title-line {
            height: 3px;
            width: 60px;
            background: linear-gradient(to right, #10B981, #0284C7);
            border-radius: 3px;
        }

        .vision-policy-card .card-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 5px;
            background: linear-gradient(135deg, #10B981, #0284C7);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .values-container {
            transition: all 0.3s ease;
        }

        .vision-policy-card:hover .values-container {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transform: translateY(-5px);
        }

        .policy-pillar {
            transition: all 0.4s ease;
        }

        .policy-pillar:hover {
            transform: translateX(5px);
        }

        .policy-pillar-card {
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.03);
            border: 1px solid rgba(0, 0, 0, 0.03);
        }

        .policy-pillar:hover .policy-pillar-card {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }

        .pillar-icon {
            width: 50px;
            height: 50px;
            min-width: 50px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
            transition: all 0.3s ease;
        }

        .policy-pillar:hover .pillar-icon {
            transform: scale(1.1) rotate(5deg);
        }

        /* Team Section */
        .team-section {
            background-color: #f8fafc;
            position: relative;
            overflow: hidden;
        }

        .team-card {
            transition: all 0.3s ease;
            border-radius: 15px;
            overflow: hidden;
            background-color: #fff;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
            position: relative;
            border: 1px solid #f0f0f0;
        }

        .team-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(to right, #10B981, #0284C7);
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .team-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .vision-policy-card {
            transition: all 0.3s ease;
            border-radius: 15px;
            overflow: hidden;
            background-color: #fff;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
            position: relative;
            border: 1px solid #f0f0f0;
        }

        .vision-policy-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(to right, #10B981, #0284C7);
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .vision-policy-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .team-image {
            position: relative;
            width: 170px;
            height: 170px;
            margin: 0 auto;
        }

        .team-image::before {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            background: var(--gradient-primary);
            opacity: 0.1;
            border-radius: 50%;
            transform: scale(1.1);
            z-index: -1;
            transition: all 0.4s ease;
        }

        .team-card:hover .team-image::before {
            transform: scale(1.3);
            opacity: 0.2;
        }

        .team-image img {
            border: 5px solid #fff;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.4s ease;
        }

        .team-card:hover .team-image img {
            border-color: #10B981;
            transform: scale(1.05);
        }

        /* CTA Section */
        .cta-section {
            position: relative;
            overflow: hidden;
            background-color: #f8fafc;
        }

        .cta-section::before {
            content: "";
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(16, 185, 129, 0.05) 0%, rgba(16, 185, 129, 0) 70%);
            top: -200px;
            left: -200px;
            border-radius: 50%;
        }

        .cta-section::after {
            content: "";
            position: absolute;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(20, 184, 166, 0.05) 0%, rgba(20, 184, 166, 0) 70%);
            bottom: -150px;
            right: -150px;
            border-radius: 50%;
        }

        /* Impact CTA Card */
        .impact-cta-card {
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1) !important;
            transition: all 0.4s ease;
            transform: translateY(0);
        }

        .impact-cta-card:hover {
            transform: translateY(-10px);
        }

        .impact-cta-card .rounded-circle {
            transition: all 0.3s ease;
        }

        .impact-stats:hover .rounded-circle {
            transform: scale(1.1);
        }

        .impact-cta-card .btn-primary {
            background: var(--gradient-primary);
            border: none;
            transition: all 0.3s ease;
        }

        .impact-cta-card .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(16, 185, 129, 0.2);
        }

        .impact-cta-card .btn-outline-secondary {
            border-color: #6B7280;
            color: #6B7280;
        }

        .impact-cta-card .btn-outline-secondary:hover {
            background-color: #6B7280;
            color: white;
        }

        .z-index-1 {
            z-index: 1;
        }

        /* Animation Classes */
        .fadeInUp {
            animation: fadeInUp 0.6s ease forwards;
        }

        /* Custom Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .feature-icon-container {
            animation: pulse 3s ease-in-out infinite;
        }

        .initiatives-row .col-md-4:nth-child(1) .feature-icon-container {
            animation-delay: 0s;
        }

        .initiatives-row .col-md-4:nth-child(2) .feature-icon-container {
            animation-delay: 0.5s;
        }

        .initiatives-row .col-md-4:nth-child(3) .feature-icon-container {
            animation-delay: 1s;
        }

        /* Media Queries */
        @media (max-width: 768px) {
            .banner-inner {
                padding: 60px 0;
            }

            .heading {
                font-size: 2.2rem;
            }

            .stats-box {
                position: relative !important;
                width: 100%;
                margin: 20px auto;
                transform: none !important;
            }

            .feature-icon {
                width: 80px;
                height: 80px;
            }

            .feature-icon i {
                font-size: 2rem;
            }

            .vision-policy-card {
                margin-bottom: 20px;
            }

            .policy-pillar .d-flex {
                flex-direction: column;
                align-items: center !important;
                text-align: center;
            }

            .pillar-icon {
                margin-bottom: 15px;
            }

            .policy-pillar:hover {
                transform: translateY(-5px);
                transform: translateX(0);
            }
        }
    </style>
@endsection

@section('script')
    {{-- vendor files --}}
    <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
    <script>
        $(document).ready(function() {
            // Initialize DataTable if present
            if ($('.datatable').length) {
                $('.datatable').DataTable();
            }

            // Add animated class to elements that should be animated
            $('.feature-card, .team-card, .about-image, .vision-policy-section .card').addClass(
                'animate-on-scroll');

            // Animation triggers on scroll
            function animateOnScroll() {
                $('.animate-on-scroll').each(function() {
                    var elementTop = $(this).offset().top;
                    var windowBottom = $(window).scrollTop() + $(window).height();

                    if (windowBottom > elementTop + 100) {
                        $(this).addClass('animated fadeInUp');
                    }
                });
            }

            // Run once on page load for elements above the fold
            setTimeout(function() {
                animateOnScroll();
            }, 300);

            // Run on scroll for elements below the fold
            $(window).scroll(function() {
                animateOnScroll();
            });

            // Enhance hover effects for features
            $('.feature-card').hover(
                function() {
                    $(this).find('.feature-icon i').addClass('fa-bounce');
                },
                function() {
                    $(this).find('.feature-icon i').removeClass('fa-bounce');
                }
            );

            // Enhance hover effects for policy pillars
            $('.policy-pillar').hover(
                function() {
                    $(this).find('.pillar-icon i').addClass('fa-beat');
                },
                function() {
                    $(this).find('.pillar-icon i').removeClass('fa-beat');
                }
            );

            // Add subtle animation to stats box
            setTimeout(function() {
                $('.stats-box').addClass('animated fadeInRight');
            }, 800);

            // Add staggered animations to initiatives
            $('.initiatives-row .col-md-4').each(function(index) {
                setTimeout(function(el) {
                    $(el).addClass('animated fadeInUp');
                }, 300 * index, this);
            });

            // Add staggered animations to policy pillars
            $('.policy-pillar').each(function(index) {
                setTimeout(function(el) {
                    $(el).addClass('animated fadeInUp');
                }, 200 * index, this);
            });

            // Add animation to CTA section
            $('.cta-section').addClass('animated fadeIn');
        });
    </script>
@endsection
