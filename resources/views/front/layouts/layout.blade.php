<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')KP Scholarship</title>
    <link rel="stylesheet" href="{{ asset('front_assets/boot/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/slick-1.8.1/slick/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('front_assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/icon/css/all.css') }}">

</head>

<body>

    <div class="wrap">

        @if (request()->is('work') == true)
            <x-WorkHeader />
        @else
            <x-Header />
        @endif



        @yield('content')
        @include('sweetalert::alert')
        @if (request()->is('work') == true)
            <x-WorkFooter />
        @else
            <x-Footer />
        @endif



    </div>

    <!-- Scripts -->
    <script src="{{ asset('front_assets/js/jquery.js') }}"></script>
    <script src="{{ asset('front_assets/boot/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front_assets/slick-1.8.1/slick/slick.min.js') }}"></script>
    <script src="{{ asset('front_assets/icon/js/all.js') }}"></script>


    <script>
        $(document).ready(function() {
            $('.help-slider').slick({
                dots: true,
                infinite: true,
                speed: 500,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                arrows: true,
                autoplaySpeed: 3000,
                prevArrow: '<button class="slick-prev slick_arrow_btns"><i class="fa fa-arrow-left"></i></button>',
                nextArrow: '<button class="slick-next slick_arrow_btns"><i class="fa fa-arrow-right"></i></button>',
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 1
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 1
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });

        });
    </script>
</body>

</html>
