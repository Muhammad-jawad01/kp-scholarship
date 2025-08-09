@if (request()->is('/') == false && request()->is('work') == false)
    {{-- <header id="sliderBg" class="inner-pages-header"> --}}
@else
    {{-- <header id="sliderBg" class=""> --}}
@endif
<div class="wrap">

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                {{-- <img src="./assets/imgs/logo_h.svg" alt="" class="img-fluid"> --}}
                <img src="{{ \Helper::renderImageUrl($themeSetting->work_logo, 'work_logo') }}" alt="" />
                <a href="/">

                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
                    aria-label="Toggle navigation">
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

    @if (request()->is('/') == true)
        <x-Banner />
    @endif
    @if (request()->is('work') == true)
        <x-WorkBanner />
    @endif
</div>
{{-- </header> --}}
