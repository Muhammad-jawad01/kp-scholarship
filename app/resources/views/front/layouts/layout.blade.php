  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>@yield('title') Education Foundation</title>

      <link rel="stylesheet" href="{{ asset('front_assets/css/bootstrap.min.css') }}" />
      <link rel="stylesheet" href="{{ asset('front_assets/css/style.css ') }}" />
      <link rel="stylesheet" href="{{ asset('front_assets/slick-1.8.1/slick/slick.css') }}" />
      <link rel="stylesheet" href="{{ asset('front_assets/css/all.min.css') }}" />
  </head>

  <body>
      <div class="warp">

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
      <script src="{{ asset('front_assets/js/jquery.js') }}"></script>
      <script src="{{ asset('front_assets/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('front_assets/js/all.min.js') }}"></script>
      <script src="{{ asset('front_assets/slick-1.8.1/slick/slick.min.js') }}"></script>

      <script>
          $(".banner_slider").slick({
              dots: true,
              infinite: true,
              speed: 500,
              slidesToShow: 1,
              slidesToScroll: 1,
              autoplay: true,
              arrows: true,
              autoplaySpeed: 3000,
              prevArrow: ' <button class="slick-next slick_arrow_btns">   <i class="fa fa-arrow-right"></i></button>',
              nextArrow: '<button class="slick-prev slick_arrow_btns">  <i class="fa fa-arrow-left"></i> </button>',
              responsive: [{
                  breakpoint: 992,
                  settings: {
                      arrows: false,
                  },
              }, ],
          });
          $(".banner_slider2").slick({
              // dots: true,
              infinite: true,
              speed: 500,
              slidesToShow: 1,
              slidesToScroll: 1,
              autoplay: true,
              arrows: true,
              autoplaySpeed: 3000,
              prevArrow: ' <button class="slick-next slick_arrow_btns">   <i class="fa fa-arrow-right"></i></button>',
              nextArrow: '<button class="slick-prev slick_arrow_btns">  <i class="fa fa-arrow-left"></i> </button>',
              responsive: [{
                  breakpoint: 992,
                  settings: {
                      arrows: false,
                  },
              }, ],
          });
          $(".banner_slider3").slick({
              dots: true,
              infinite: true,
              speed: 500,
              slidesToShow: 1,
              slidesToScroll: 1,
              autoplay: true,
              arrows: true,
              autoplaySpeed: 3000,
              prevArrow: "",
              nextArrow: "",
              responsive: [{
                  breakpoint: 992,
                  settings: {
                      arrows: false,
                  },
              }, ],
          });
      </script>
  </body>

  </html>
