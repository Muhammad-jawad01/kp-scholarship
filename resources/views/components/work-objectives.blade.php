<div class="workImplimenttaion">
    <section class="custom-container mt-80px mb-80px welcome-text">
        <div class="d-flex flex-column flex-lg-row align-items-start align-items-md-center justify-content-between gap-5">
            <article class="left-text-sec">
                <p class="title-top">{{ $data->slogan ?? ''}}</p>
                <h1 class="title fw-bold">{{ $data->title ?? 'BOOKS ON WHEELS'}}
                </h1>
                <div class="description">
                    {!! $data->description ?? "
                        BOOKS ON WHEELS A MOBILE BOOKSHOP PROJECT RECENTLY LAUNCHED BY DIRECTORATE OF YOUTH AFFAIRS, KHYBER PAKHTUNKHWA TO ENSURE EASY ACCESSIBLITY OF BOOKS TO THE YOUTH OF KHYBER PAKHTUNKWHA ON DISCOUNT. THE PROJECT WAS INAUGURATED BY CHIEF MINISTER MEHMOOD KHAN ON 3RD NOV, 2020." !!}
                </div>
                <!-- <div><a href="" class="btn green-bg custom-btn">Discover more</a></div> -->
            </article>
            <div class="welcome-image">
                <div class="thumbnail">
                    <figure>
                        <img src="{{ $data->getFirstMediaUrl('banner')}}" alt="" />
                        <!-- <figcaption>
                            {!! $data->image_caption ?? 'Striving towards access, affordability and appraisal; synergic initiatives being initiated; complementing all the stakeholders, uplifting healthcare infrastructure, promoting public welfare.'!!}
                        </figcaption> -->
                    </figure>
                </div>
            </div>
        </div>
    </section>
    {{-- Contact us Section --}}
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="contact_details">
                            <p>CONTACT US</p>
                            <h2>Get in Touch with us</h2>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="contact_item">
                                    <i class="fa fa-envelope"></i>
                                    <p>Sports.helpdesk@gmail.com</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="contact_item">
                                    <i class="fa fa-map-marker"></i>
                                    <p>Peshawar sports complex, Peshawar cantt</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="contact_item">
                                    <i class="fa fa-phone"></i>
                                    <p>091-9212767</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>