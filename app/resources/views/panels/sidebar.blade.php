@php
    $configData = Helper::applClasses();
@endphp
<style>
    .main-menu .navbar-header .navbar-brand .brand-logo img {
        margin-top: -20px;
        max-width: 150px;
    }
</style>
<div class="main-menu menu-fixed {{ $configData['theme'] === 'dark' || $configData['theme'] === 'semi-dark' ? 'menu-dark' : 'menu-light' }} menu-accordion menu-shadow"
    data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <span class="brand-logo"
                        style="display: flex;justify-content: center;align-items: flex-start;flex-direction: column;font-size: 11px;width: 100px;">
                        @if (!empty($themeSetting->logo))
                            <img src="{{ $themeSetting->logo }}">
                        @else
                            {{-- <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24">--}}

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
            {{-- Foreach menu item starts --}}
            @if (isset($menuData[0]))

                @foreach ($menuData[0]->menu as $menu)
                    @if (isset($menu->navheader))
                        <li class="navigation-header">
                            <span>{{ __('locale.' . $menu->navheader) }}</span>
                            <i data-feather="more-horizontal"></i>
                        </li>
                    @else
                        {{-- Add Custom Class with nav-item --}}
                        @php
                            $custom_classes = '';
                            if (isset($menu->classlist)) {
                                $custom_classes = $menu->classlist;
                            }

                        @endphp

                        @if (isset($menu->permission))
                            @can($menu->permission)
                                <li
                                    class="nav-item {{ Route::currentRouteName() === $menu->slug || (isset($menu->url) ? Request::is($menu->url . '/*') == $menu->url : false) ? 'active' : '' }} {{ $custom_classes }}">
                                    <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0)' }}"
                                        class="d-flex align-items-center"
                                        target="{{ isset($menu->newTab) ? '_blank' : '_self' }}">
                                        <i data-feather="{{ $menu->icon }}"></i>
                                        <span class="menu-title text-truncate">{{ __('locale.' . $menu->name) }}</span>
                                        @if (isset($menu->badge))
                                            <?php $badgeClasses = 'badge badge-pill badge-light-primary ml-auto mr-1'; ?>
                                            <span
                                                class="{{ isset($menu->badgeClass) ? $menu->badgeClass : $badgeClasses }} ">{{ $menu->badge }}</span>
                                        @endif
                                    </a>
                                    @if (isset($menu->submenu))
                                        @include('panels/submenu', ['menu' => $menu->submenu])
                                    @endif
                                </li>
                            @endcan
                        @else
                            <li
                                class="nav-item {{ Route::currentRouteName() === $menu->slug || (isset($menu->url) ? Request::is($menu->url . '/*') == $menu->url : false) ? 'active' : '' }} {{ $custom_classes }}">
                                <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0)' }}"
                                    class="d-flex align-items-center"
                                    target="{{ isset($menu->newTab) ? '_blank' : '_self' }}">
                                    <i data-feather="{{ $menu->icon }}"></i>
                                    <span class="menu-title text-truncate">{{ __('locale.' . $menu->name) }}</span>
                                    @if (isset($menu->badge))
                                        <?php $badgeClasses = 'badge badge-pill badge-light-primary ml-auto mr-1'; ?>
                                        <span
                                            class="{{ isset($menu->badgeClass) ? $menu->badgeClass : $badgeClasses }} ">{{ $menu->badge }}</span>
                                    @endif
                                </a>
                                @if (isset($menu->submenu))
                                    @include('panels/submenu', ['menu' => $menu->submenu])
                                @endif
                            </li>
                        @endif
                    @endif
                @endforeach
            @endif
            {{-- Foreach menu item ends --}}
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
