@extends('front/layouts/layout')

@section('title', 'FAQs-')
@section('content')

    <div class="inner-page">

        <!-- banner inner section -->
        <section class="banner-inner">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="banner-header-text">
                            <h1 class="heading gradientHeading2 text-center">Frequently Asked Questions</h1>
                            <p class="text-center sectionDes">Get assistance with your scholarship applications and
                                portal navigation</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>




        <!-- Why Choose Our Platform? -->
        <section class="why-choose sectionPadding">
            <div class="container">
                <h1 class="sectionHead ">Quick Help</h1>
                <p class="sectionDes">Get instant assistance with common topics</p>

                <div class="row mt-5">
                    <div class="col-xs-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                        <div class="card PlatformCard green">
                            <div class="card-body">
                                <div class="icon">
                                    <i class="fa-regular fa-user"></i>
                                </div>
                                <h5>Getting Started</h5>
                                <p>Learn how to create account and apply</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                        <div class="card PlatformCard blue">
                            <div class="card-body">
                                <div class="icon">
                                    <i class="fas fa-file"></i>
                                </div>
                                <h5>Document Upload</h5>
                                <p>Help with uploading required documents</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                        <div class="card PlatformCard purple">
                            <div class="card-body">
                                <div class="icon">
                                    <i class="fas fa-dashboard"></i>
                                </div>
                                <h5>Using Dashboard</h5>
                                <p>Navigate and manage your applications</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                        <div class="card PlatformCard red">
                            <div class="card-body">
                                <div class="icon">
                                    <i class="fa-solid fa-question"></i>
                                </div>
                                <h5>Common Issues</h5>
                                <p>Solutions to frequently faced problems</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>



        <!-- Why Choose Our Platform? -->
        <section class="why-choose sectionPadding">
            <div class="container">
                <h1 class="sectionHead ">Frequently Asked Questions</h1>
                <p class="sectionDes">Find answers to common questions</p>

                <div class="row mt-5">
                    <div class="col-md-10 mx-auto">
                        <div class="accordion" id="accordionExample">
                            @forelse ($faqs as $faq)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{ $loop->iteration }}">
                                        <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $loop->iteration }}"
                                            aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                            aria-controls="collapse{{ $loop->iteration }}">
                                            {{ $loop->iteration }}: {{ $faq->question }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $loop->iteration }}"
                                        class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                        aria-labelledby="heading{{ $loop->iteration }}" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>{!! $faq->answer !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p>No question found.</p>
                            @endforelse
                        </div>
                        <div class="d-block w-100 text-center mb-5">
                            {!! $faqs->links('pagination::custom') !!}
                        </div>
                    </div>
                </div>
                {{-- <div class="row mt-5">
                    <div class="col-md-10 mx-auto">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        How do I create an account on the KP Scholarships Portal?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Click on the 'Apply Now' or 'Dashboard' button on the
                                            homepage. You'll be
                                            redirected to create an account using your CNIC number and basic
                                            information. Make sure to use a valid email address for verification.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Accordion Item #2
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>This is the second item's accordion body.</strong> It is hidden by
                                        default, until the collapse plugin adds the appropriate classes that we use
                                        to style each element. These classes control the overall appearance, as well
                                        as the showing and hiding via CSS transitions. You can modify any of this
                                        with custom CSS or overriding our default variables. It's also worth noting
                                        that just about any HTML can go within the <code>.accordion-body</code>,
                                        though the transition does limit overflow.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Accordion Item #3
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>This is the third item's accordion body.</strong> It is hidden by
                                        default, until the collapse plugin adds the appropriate classes that we use
                                        to style each element. These classes control the overall appearance, as well
                                        as the showing and hiding via CSS transitions. You can modify any of this
                                        with custom CSS or overriding our default variables. It's also worth noting
                                        that just about any HTML can go within the <code>.accordion-body</code>,
                                        though the transition does limit overflow.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>

        </section>



    </div>

@endsection
