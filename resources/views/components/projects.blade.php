<section class="projects">
    <div class="custom-container">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-6 mb-4 item-order">
                <div class="d-flex flex-column justify-content-between">
                    <div class="sec-title">
                        <p class="title-top text-uppercase text-center">Projects</p>
                        <h2 class="title text-capitalize text-center">Explore Our Department</h2>
                    </div>
                    <p class="text-center all-projects-link"><a href="{{ url('projects') }}"
                            class="d-flex flex-row align-items-center justify-content-center gap-2"><span>ALL
                                PROJECTS</span><img src="{{ asset('front/assets/images/angle-small-right.svg') }}"
                                alt="" /></a></p>
                </div>
            </div>
            @foreach ($projects as $key => $project)
                <div class="col-12 col-md-6 col-lg-3 mb-4 item-order">
                    <a href="{{ url('projects/' . $project->slug) }}"
                        class="p-item d-flex flex-column justify-content-between">
                        <div class="title position-relative">
                            <p>{{ $project->title }}</p>
                        </div>
                        <div>
                            <div class="read-more-btn d-flex flex-row justify-content-between">
                                <button type="button">More</button>
                                <span class="position-relative icon-img">
                                    <img src="{{ asset('front/assets/images/building-icon.svg') }}" class="hover-out"
                                        alt="" />
                                    <img src="{{ asset('front/assets/images/building-icon.svg') }}" class="hover"
                                        alt="" />
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach




        </div>
    </div>
</section>
