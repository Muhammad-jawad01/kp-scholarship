@isset($pageConfigs)
    {!! Helper::updatePageConfig($pageConfigs) !!}
@endisset

<!DOCTYPE html>
{{-- {!! Helper::applClasses() !!} --}}
@php $configData = Helper::applClasses(); @endphp
<html
    lang="@if (session()->has('locale')) {{ session()->get('locale') }}@else{{ $configData['defaultLanguage'] }} @endif"
    data-textdirection="{{ env('MIX_CONTENT_DIRECTION') === 'rtl' ? 'rtl' : 'ltr' }}"
    class="loading {{ $configData['theme'] === 'light' ? '' : $configData['layoutTheme'] }}"
    @if ($configData['theme'] === 'dark') data-layout="dark-layout" @endif>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ $themeSetting->websiteName }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/ico/KP_logo.ico') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    {{-- Include core + vendor Styles --}}
    @include('panels/styles')

</head>

<body
    class="vertical-layout vertical-menu-modern {{ $configData['showMenu'] === true ? '2-columns' : '1-column' }}
{{ $configData['blankPageClass'] }} {{ $configData['bodyClass'] }}
{{ $configData['verticalMenuNavbarType'] }}
{{ $configData['sidebarClass'] }} {{ $configData['footerType'] }}"
    data-menu="vertical-menu-modern" data-col="{{ $configData['showMenu'] === true ? '2-columns' : '1-column' }}"
    data-layout="{{ $configData['theme'] === 'light' ? '' : $configData['layoutTheme'] }}"
    style="{{ $configData['bodyStyle'] }}" data-framework="laravel" data-asset-path="{{ asset('/') }}">

    {{-- Include Sidebar --}}
    @if (isset($configData['showMenu']) && $configData['showMenu'] === true)
        @include('youth/components/sidebar')
    @endif

    {{-- Include Navbar --}}
    @include('panels.nav')

    <!-- BEGIN: Content-->
    <div style="overflow: hidden;" class="app-content content {{ $configData['pageClass'] }}"
        id="google_translate_element">
        <!-- BEGIN: Header-->
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>

        @if ($configData['contentLayout'] !== 'default' && isset($configData['contentLayout']))
            <div class="content-area-wrapper {{ $configData['layoutWidth'] === 'boxed' ? 'container-xxl p-0' : '' }}">
                <div class="{{ $configData['sidebarPositionClass'] }}">
                    <div class="sidebar">
                        {{-- Include Sidebar Content --}}
                        @include('youth/components/header')
                    </div>
                </div>
                <div class="{{ $configData['contentsidebarClass'] }}">
                    <div class="content-wrapper">
                        <div class="content-body">
                            {{-- Include Page Content --}}
                            @yield('content')
                            @include('sweetalert::alert')
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="content-wrapper {{ $configData['layoutWidth'] === 'boxed' ? 'container-xxl p-0' : '' }}">
                {{-- Include Breadcrumb --}}
                @if ($configData['pageHeader'] === true && isset($configData['pageHeader']))
                    @include('panels.breadcrumb')
                @endif

                <div class="content-body">
                    {{-- Include Page Content --}}
                    @yield('content')
                </div>
            </div>
        @endif

    </div>
    <!-- End: Content-->

    @if ($configData['blankPage'] == false && isset($configData['blankPage']))
        @include('content/pages/customizer')

        @include('content/pages/buy-now')
    @endif

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    {{-- include footer --}}
    @include('panels/footer')

    {{-- include default scripts --}}
    @include('panels/scripts')

    <script type="text/javascript">
        $(window).on('load', function() {
            if (feather) {
                console.log("some times", feather);
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>

</html>
