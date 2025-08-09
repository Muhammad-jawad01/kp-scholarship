<style>
    .main-menu .navbar-header .navbar-brand .brand-logo img {
        margin-top: -20px;
        max-width: 155px;
    }
</style>
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <span class="brand-logo"
                        style="display: flex;justify-content: center;align-items: flex-start;flex-direction: column;font-size: 11px;width: 100px;">
                        @if (!empty($themeSetting->logo))
                            <img src="{{ $themeSetting->logo }}">
                        @else
                            <b>{{ $themeSetting->websiteName }}</b>
                        @endif
                        {{-- <b>{{$themeSetting->websiteName}}</b> --}}
                    </span>
                </a>
            </li>

        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">



            <li class=" nav-item {{ request()->routeIs('youth-dashboard') ? ' active' : '' }}"><a
                    href="{{ route('youth-dashboard') }}"><i data-feather="home"></i>
                    <span class="menu-title" data-i18n="Email">Dashboard</span></a>
            </li>

            <li class=" nav-item {{ request()->routeIs('general') ? ' active' : '' }}"><a
                    href="{{ route('general') }}"><i data-feather="file"></i><span class="menu-title"
                        data-i18n="Email">General</span></a>
            </li>
            <li class=" nav-item {{ request()->routeIs('familyinfo') ? ' active' : '' }}"><a
                    href="{{ route('familyinfo') }}"><i data-feather="user-check"></i><span class="menu-title"
                        data-i18n="Chat">Familyinfo</span></a>
            </li>
            <li class=" nav-item {{ request()->routeIs('expenses') ? ' active' : '' }}"><a
                    href="{{ route('expenses') }}"><i data-feather="book"></i><span class="menu-title"
                        data-i18n="Todo">Expenses</span></a>
            </li>
            <li class=" nav-item {{ request()->routeIs('documents') ? ' active' : '' }}"><a
                    href="{{ route('documents') }}"><i data-feather="image"></i><span class="menu-title"
                        data-i18n="Calender">Documents</span></a>
            </li>
            <li class=" nav-item {{ request()->routeIs('apply') ? ' active' : '' }}"><a href="{{ route('apply') }}"><i
                        data-feather="award"></i><span class="menu-title" data-i18n="Calender">Apply
                        Scholarship</span></a>
            </li>
        </ul>

    </div>
</div>
