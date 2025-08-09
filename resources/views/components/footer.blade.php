<footer>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-3 col-xl-3 mb-2">
                <img src="{{ \Helper::renderImageUrl($themeSetting->footer_logo, 'footer_logo') }}" class="f-logo"
                    alt="" />
                <p class="footer-about">Empowering students across Khyber Pakhtunkhwa with accessible,
                    transparent,
                    and merit-based
                    scholarship opportunities.</p>
                <ul class="social">
                    <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href=""><i class="fab fa-twitter"></i></a></li>
                    <li><a href=""><i class="fab fa-youtube"></i></a></li>
                    <li><a href=""><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>

            <div class="col-xs-12 col-md-12 col-lg-9 col-xl-9">
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <h4 class="footer-head">Quick Links</h4>
                        <ul class="quick-link">
                            @foreach ($quickLinks as $quicklink)
                                <li>
                                    <a href="{{ $quicklink->link }}">{{ $quicklink->title }}</a>
                                </li>
                            @endforeach

                            <li><a href="">Browse Scholarships</a></li>
                            <li><a href="">Apply Now</a></li>
                            <li><a href="">My Dashboard</a></li>
                            <li><a href="">Help & Support</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 mb-2">
                        <h4 class="footer-head">Departments</h4>
                        <ul class="quick-link">
                            <li><a href="">Higher Education</a></li>
                            <li><a href="">Technical Education</a></li>
                            <li><a href="">Elementary & Secondary</a></li>
                            <li><a href="">Health Department</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 mb-2">
                        <h4 class="footer-head">Contact Info</h4>
                        <ul class="quick-link contact">
                            <li><a href="">
                                    <div class="icon">
                                        <i class="fas fa-map-marked"></i>
                                    </div> {!! $themeSetting->address !!}

                                </a></li>
                            <li><a href="">
                                    <div class="icon">
                                        <i class="fas fa-phone"></i>
                                    </div>{{ $themeSetting->phone }}
                                </a></li>
                            <li><a href="mailto:{{ $themeSetting->email }}">
                                    <div class="icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>{{ $themeSetting->email }}

                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
