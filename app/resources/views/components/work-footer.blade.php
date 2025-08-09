<style>
    .footer_text p{
        color: #fff;
        margin-left: 10px;
    }
</style>
<footer>
    <div class="container-fluid footer-top">
        <div class="custom-container">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-4 mb-3 mb-lg-0 disclaimer">
                    <div>
                        <img src="{{ \Helper::renderImageUrl($themeSetting->work_footer_logo, 'resize') }}" class="f-logo"
                            alt="" />
                    </div>
                    {!! $themeSetting->footer_note !!}
                </div>
                <div class="col-6 col-md-6 col-lg-2 mb-3 mb-lg-0">
                    <h3 class="fw-bold text-capitalize f-title">Quick Links</h3>
                    <ul class="m-0 list-unstyled f-links">

                        @foreach ($quickLinks as $quicklink)
                            <li>
                                <a href="{{ $quicklink->link }}">{{ $quicklink->title }}</a>
                            </li>
                        @endforeach

                    </ul>
                </div>
                <div class="col-6 col-md-6 col-lg-2 mb-3 mb-lg-0">
                    <h3 class="fw-bold text-capitalize f-title">Important linlks</h3>
                    <ul class="m-0 list-unstyled f-links">

                        @foreach ($importantLinks as $importantlink)
                            <li>
                                <a href="{{ $importantlink->link }}">{{ $importantlink->title }}</a>
                            </li>
                        @endforeach

                    </ul>
                </div>
                <div class="col-12 col-md-12 col-lg-4 mb-3 mb-lg-0 f-contact-us">
                    <h3 class="fw-bold text-capitalize f-title">Contact Us</h3>
                    <div class="d-flex flex-row align-items-start gap-3 mb-24px">
                        <i class="fa fa-envelope"></i>
                        <p><a href="mailto:{{ $themeSetting->email }}">{{ $themeSetting->email }}</a></p>
                    </div>
                    <div class="d-flex flex-row align-items-start gap-3 mb-24px">
                        <i class="fa fa-map-marker"></i>
                        {!! $themeSetting->address !!}
                    </div>
                    <div class="d-flex flex-row  align-items-start gap-3 mb-24px">
                        <i class="fa fa-phone"></i>
                        <p>{{ $themeSetting->phone }}</p>

                    </div>
                    <!-- <h3 class="fw-bold text-capitalize f-title">Download our apps</h3>
                    <div class="d-flex flex-row align-items-center gap-3 download-app">
                        <a href="{{ $themeSetting->android_app_link }}">
                            <img src="{{ asset('front/assets/images/android-icon.svg') }}" alt="" />
                        </a>
                        <a href="{{ $themeSetting->ios_app_link }}">
                            <img src="{{ asset('front/assets/images/ios-apple-icon.svg') }}" alt="" />
                        </a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid footer-bottom">
        <div class="custom-container">
            <div class="d-flex flex-row flex-wrap justify-content-between align-items-center footer_text">
                <div style="margin-top:10px;width:600px;height:40px;display:flex;justify-content:center;align-items:center;">
                    <p class="copyright-text text-white">
                        COPYRIGHT &copy; {{ \Carbon\Carbon::now()->format('Y') }} KPITB
                    </p>
                    {!! $themeSetting->footer  !!}
                </div>
                <div>
                    <div class="d-flex flex-wrap flex-row align-items-center justify-content-end gap-5">
                        @foreach ($footerLinks as $link)
                            <a href="{{ $link->link }}" class="text-white">{{ $link->title }}</a>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
