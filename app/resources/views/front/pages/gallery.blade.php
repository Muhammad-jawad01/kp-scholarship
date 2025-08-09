@extends('front/layouts/layout')

@section('title', 'Gallary')
@section('content')
    <x-inner-page-header page='gallery' slug='gallery' />

    <section class="gallery_section mt-5">

        <div class="custom-container">
            <div class="section">
                <div class="container">
                    {{-- @if (count($galleries) > 0) --}}
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="gallery_portfolio">
                                @foreach ($galleries as $gallery)
                                    @php $mediaItems = $gallery->getMedia('gallary') @endphp
                                    {{-- @if (count($mediaItems) > 0) --}}
                                    @foreach ($mediaItems as $key => $media)
                                        <div class="box">
                                            <a href="{{ $mediaItems[$key]->getFullUrl() }}" data-fancybox="gallery">
                                                <img src="{{ $mediaItems[$key]->getFullUrl() }}" alt="">
                                            </a>
                                        </div>
                                    @endforeach
                                    {{-- @endif --}}
                                @endforeach
                            </div>
                        </div>
                    </div>
                    {{-- @else
                <h4 class="text p-4">No Image Found !</h4> --}}

                    {{-- @endif --}}
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
    <script type="text/javascript">
        // $(document).ready(function($) {

        //     $().fancybox({
        //         selector: '[data-fancybox="images"]',
        //         loop: true
        //     });
        // });


        $(document).ready(function() {

            $(".filter-button").click(function() {
                var value = $(this).attr('data-filter');

                if (value == "all") {
                    $('.filter').show('1000');
                } else {
                    $(".filter").not('.' + value).hide('3000');
                    $('.filter').filter('.' + value).show('3000');

                }
            });

            if ($(".filter-button").removeClass("active")) {
                $(this).removeClass("active");
            }
            $(this).addClass("active");

        });
    </script>
@endsection
