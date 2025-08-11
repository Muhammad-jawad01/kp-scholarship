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
        <a class="navbar-brand" href="{{ route('index.page') }}">
            <img src="{{ \Helper::renderImageUrl($themeSetting->header_logo, 'header_logo') }} "width="250"
                alt="KP Scholarship Portal" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fas-menu"></span>
        </button>
        <div class="collapse navbar-collapse me-auto" id="navbarTogglerDemo01">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('index.page') }}">Home</a>
                </li>
                <li class="nav-item {{ Request::is('scholarships*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('scholarships.pages') }}">Scholarships</a>
                </li>
                <li class="nav-item {{ Request::is('apply*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('index.page') }}#apply">Apply</a>
                </li>
                <li class="nav-item {{ Request::is('about*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('pages.about') }}">About</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @else
                    <li class="nav-item {{ Request::is('login*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('student.login') }}">Login</a>
                    </li>
                    <li class="nav-item {{ Request::is('student.register*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('student.register') }}">Register</a>
                    </li>
                @endauth
                <li class="nav-item {{ Request::is('help*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('pages.faqs') }}">Help</a>
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
