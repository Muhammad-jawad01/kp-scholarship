<section class="events">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-8 ">
            <h1 class="text-center ">Events</h1>
            <div class="slider_div">


                <div class="banner_slider3">

                    @foreach ($events as $event)
                        <div class="slider_item" style="margin-left: 30px;">
                            <div class="row">
                                <div class="col-md-6"
                                    style="background-image: url('{{ $event->getFirstMediaUrl('event') }}'); background-repeat: no-repeat; background-size: 100%;min-height:300px">
                                    <button class="btn fullscreen" d-data="{{ $event->getFirstMediaUrl('event') }}"><i
                                            class="fa fa-expand"></i></button>
                                    {{-- <img src="{{ $event->getFirstMediaUrl('event') }}" alt="" class="img-fluid" /> --}}
                                </div>

                                <div class="col-md-6">
                                    <a href="{{ url('event/' . $event->id) }}"
                                        style="text-decoration:none;color:black;padding:20px;">

                                        <h3 class="m-title"> {{ $event->title }} </h3>

                                        <span> {{ date('M d,Y', strtotime($event->start)) }}</span>
                                        <p>
                                            {!! substr($event->description, 0, 140) !!}...

                                        </p>

                                        {{-- <div class="d-flex justify-content-around mb-2">
                                            <h4>Event Details</h4> <span>
                                                <i class="fa fa-calendar"></i>
                                                {{ $event->start }}

                                            </span>
                                        </div>
                                        <table class="table newtable ">
                                            <tbody>
                                                <tr>

                                                    <th>Audience</th>
                                                    <th>Participants</th>
                                                    <th>Venue</th>

                                                </tr>
                                                <tr>
                                                    @if ($event->audience == 0)
                                                        <td>0</td>
                                                    @else
                                                        <td>{{ $event->audience }}</td>
                                                    @endif
                                                    @if ($event->participants == 0)
                                                        <td>0</td>
                                                    @else
                                                        <td>{{ $event->participants }}</td>
                                                    @endif


                                                    <td>{{ $event->venue }}</td>
                                                </tr>
                                            </tbody>
                                        </table> --}}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4">
            <h1 class="text-center ">News</h1>

            <div class=" slider_div">
                {{-- <div class="latest-news-slider"> --}}
                <marquee class="mx-3" height="330" truespeed behavior="scroll" direction="up" scrollamount="5">
                    @foreach ($news as $new)
                        <a href="{{ url('news/' . $new->slug) }}" class="glass">
                            {{-- {{ Str::limit($new->title, 30, $end = '...') }} --}}
                            {{ $new->title }}

                            <div class="short-description">
                                {{ Str::limit($new->short_description, 30, $end = '...') }}
                            </div> <span class="day d-block">
                                {{ $new->created_at->format('D  M  Y') }}</span>
                            <br>
                            {{-- </div> --}}
                        </a>
                    @endforeach
                </marquee>

            </div>
            {{-- </div> --}}
        </div>
    </div>
</section>
@section('script')
    <script>
        $(document).ready(function() {
            $('.fullscreen').click(function() {
                let value = $(this).attr('d-data');
                let img = $("#showImage")
                let path = value
                img.attr('src', path)
                $('#exampleModal').modal('show');
            });
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
@endsection
