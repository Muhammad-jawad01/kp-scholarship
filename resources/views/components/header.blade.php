{{--                   <li class="nav-item">
                         <a class="nav-link {{ Request::is('downloads') == true ? 'active' : '' }}"
                             href="{{ route('pages.downloads') }}">Download</a>
                     </li>

                     <li class="nav-item">
                         <a class="nav-link {{ Request::is('faqs') == true ? 'active' : '' }}"
                             href="{{ route('pages.faqs') }}">FAQs</a>
                     </li>

                     <li class="nav-item">
                         <a class="nav-link {{ Request::is('gallery') == true ? 'active' : '' }}"
                             href="{{ route('pages.gallery') }}">Gallery</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link {{ Request::is('contactus') == true ? 'active' : '' }}"
                             href="{{ route('pages.contactus') }}">Contact Us</a>
                     </li> --}}

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ \Helper::renderImageUrl($themeSetting->header_logo, 'header_logo') }} "width="250"
                alt="" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fas-menu"></span>
        </button>
        <div class="collapse navbar-collapse me-auto" id="navbarTogglerDemo01">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Scholarships</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Apply</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Help</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
@if (Request::is('/'))
    {{-- <x-Banner /> --}}
@else
    <div class="banner_text">
        <div class="row">
            @yield('bannertext')
        </div>
    </div>
@endif
<!-- Slider Section -->
