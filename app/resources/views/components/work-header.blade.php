@if (request()->is('/') == false && request()->is('work') == false)
    <header id="sliderBg" class="inner-pages-header">
    @else
        <header id="sliderBg" class="">
@endif
{{-- <header id="sliderBg" class="{{ request()->is('/') == false || request()->is('work') == false ? 'inner-pages-header' : '' }}"> --}}
<div class="overlay-bg">
    {{-- <div class="header-top-strip container-fluid">
            <div class="custom-container">
                <div class="d-flex flex-column flex-sm-row align-items-center justify-content-between">
                    <div class="d-flex flex-column flex-md-row align-items-center gap-3">
                        <div class="phone">
                            <p class="m-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16.028"
                                    viewBox="0 0 16 16.028">
                                    <path id="phone-call_1_" data-name="phone-call (1)"
                                        d="M14.823,14.8l.608-.7a2.07,2.07,0,0,0,0-2.923C15.41,11.155,13.8,9.919,13.8,9.919a2.07,2.07,0,0,0-2.858,0L9.673,11A8.536,8.536,0,0,1,5.044,6.359L6.112,5.09a2.07,2.07,0,0,0,0-2.859S4.88.626,4.859.606A2.058,2.058,0,0,0,1.971.575L1.2,1.243C-3.334,6.506,6.435,16.2,11.871,16.024A4.11,4.11,0,0,0,14.823,14.8Z"
                                        transform="translate(-0.035 0.002)" fill="#fff" />
                                </svg> {{ $themeSetting->phone }}
                            </p>
                        </div>
                        <div class="v-seperator d-none d-md-block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="0.5" height="27" viewBox="0 0 0.5 27">
                                <g id="Group_704" data-name="Group 704" transform="translate(-282.25 -6.5)">
                                    <line id="Line_1" data-name="Line 1" y2="12"
                                        transform="translate(282.5 6.5)" fill="none" stroke="#fff"
                                        stroke-width="0.5" />
                                    <line id="Line_2" data-name="Line 2" y2="12"
                                        transform="translate(282.5 21.5)" fill="none" stroke="#fff"
                                        stroke-width="0.5" />
                                </g>
                            </svg>
                        </div>
                        <div>
                            <div class="d-flex flex-row align-items-center gap-2 shift-timing dropdown-menu-custom">
                                <img src="{{ asset('front/assets/images/clock-icon.svg') }}" alt="" />
                                <div>
                                    <div class="dropdown">
                                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                            id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                            Today: 09:00 AM to 05:00 PM
                                            <img src="{{ asset('front/assets/images/angle-small-down.svg') }}"
                                                alt="" class="dropdown-icon ms-1" />
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="#">Monday: 09:00 AM to 05:00 PM</a>
                                            </li>
                                            <li><a class="dropdown-item" href="#">Tuesday: 09:00 AM to 05:00
                                                    PM</a></li>
                                            <li><a class="dropdown-item" href="#">Wednesday: 09:00 AM to 05:00
                                                    PM</a></li>
                                            <li><a class="dropdown-item" href="#">Thursday: 09:00 AM to 05:00
                                                    PM</a></li>
                                            <li><a class="dropdown-item" href="#">Friday: 09:00 AM to 05:00 PM</a>
                                            </li>
                                            <li><a class="dropdown-item" href="#">Saturday: CLOSED</a>
                                            </li>
                                            <li><a class="dropdown-item" href="#">Sunday: CLOSED</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="social-icons mt-1 mt-sm-0">
                        <div class="d-flex flex-row align-items-center">
                            <a href="{{ $themeSetting->twitter }}">
                                <svg id="Group_10" data-name="Group 10" xmlns="http://www.w3.org/2000/svg"
                                    width="23.844" height="23.844" viewBox="0 0 23.844 23.844">
                                    <g id="Group_11" data-name="Group 11" transform="translate(0 0)">
                                        <rect id="Rectangle" width="23.844" height="23.844" rx="11.922"
                                            transform="translate(0 0)" fill="#fff" />
                                    </g>
                                    <path id="twitter"
                                        d="M10.587,49.018a4.525,4.525,0,0,1-1.251.343,2.158,2.158,0,0,0,.955-1.2,4.337,4.337,0,0,1-1.376.525A2.17,2.17,0,0,0,5.16,50.171a2.235,2.235,0,0,0,.05.495A6.143,6.143,0,0,1,.737,48.4,2.171,2.171,0,0,0,1.4,51.3a2.143,2.143,0,0,1-.981-.267v.024a2.18,2.18,0,0,0,1.739,2.133,2.166,2.166,0,0,1-.569.071,1.92,1.92,0,0,1-.411-.037A2.191,2.191,0,0,0,3.21,54.732a4.361,4.361,0,0,1-2.691.926A4.064,4.064,0,0,1,0,55.628a6.11,6.11,0,0,0,3.33.974,6.135,6.135,0,0,0,6.177-6.176c0-.1,0-.189-.008-.281A4.33,4.33,0,0,0,10.587,49.018Z"
                                        transform="translate(6.455 -39.913)" fill="#0d8c60" />
                                </svg>
                            </a>
                            <a href="{{ $themeSetting->facebook }}">
                                <svg id="Group_8" data-name="Group 8" xmlns="http://www.w3.org/2000/svg"
                                    width="23.844" height="23.844" viewBox="0 0 23.844 23.844">
                                    <g id="Group_686" data-name="Group 686" transform="translate(0 0)">
                                        <g id="Group_15" data-name="Group 15" transform="translate(0 0)">
                                            <rect id="Rectangle_Copy_4" data-name="Rectangle Copy 4" width="23.844"
                                                height="23.844" rx="11.922" fill="#fff" />
                                        </g>
                                        <g id="facebook" transform="translate(9.711 7.656)">
                                            <path id="Path_281" data-name="Path 281"
                                                d="M210.181,86.763v-4.3h1.449l.217-1.683h-1.666V79.709c0-.486.135-.817.832-.817h.883v-1.5a11.867,11.867,0,0,0-1.295-.066,2.021,2.021,0,0,0-2.158,2.218V80.78H207v1.683h1.444v4.3Zm0,0"
                                                transform="translate(-207 -77.324)" fill="#0d8c60" />
                                        </g>
                                    </g>
                                </svg>
                            </a>
                            <a title="Location" style="height: 25px; width: 25px; padding-left: 8px; background-color: white; border-radius: 50%;" href="https://www.google.com/maps/place/Directorate+of+Sports,+Khyber+Pakhtunkhwa/@33.9934124,71.5347879,15z/data=!4m14!1m7!3m6!1s0x38d91703cbd1829d:0xbcd1885151db4b40!2sDirectorate+of+Sports,+Khyber+Pakhtunkhwa!8m2!3d33.9934124!4d71.5347879!16s%2Fg%2F11rn5c63py!3m5!1s0x38d91703cbd1829d:0xbcd1885151db4b40!8m2!3d33.9934124!4d71.5347879!16s%2Fg%2F11rn5c63py" class=""><i class="fa fa-map-marker text-primary"></i></a>

                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    <!-- ============================================ -->
    <!-- Navbar start here -->
    <!-- ============================================ -->
    <div class="container-fluid main-navigation">
        <div class="custom-container">
            <div class="d-flex flex-column flex-lg-row align-items-center justify-content-between mt-2 mb-2">
                <div class="logo-box">
                    <div class="d-flex flex-row align-items-center justify-content-between gap-5">
                        <img src="{{ \Helper::renderImageUrl($themeSetting->work_logo, 'work_logo') }}"
                            alt="" />
                        <a href="/">

                        </a>
                        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <img src="{{ asset('front/assets/images/align-left.png') }}" class="navbar-toggle-icon"
                                alt="" />
                        </button>
                    </div>
                </div>
                <div class="navbar-container">
                    <div class="d-flex flex-column align-items-end justify-content-end">

                    </div>
                </div>

            </div>
        </div>
    </div>
    @if (request()->is('/') == true)
        <x-Banner />
    @endif
    @if (request()->is('work') == true)
        <x-WorkBanner />
    @endif
</div>
</header>
