@extends('front/layouts/layout')

@section('title', 'Events')
@section('content')
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')) }}">
    <!-- Event Calender -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@section('bannertext')
    <div class="col-md-12">
        <h2 class="mx-3"> <span>{{ $pageData->banner_title ?? 'page' }}</span></h2>
        <p>
            {{ $pageData->decription ?? '' }}
        </p>
        <div class="bcrumb-con">
            <nav aria-label="bcrumb">
                <ol class="bcrumb m-0">
                    <li class="bcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none">Home</a>
                    </li>
                    <li class="bcrumb-item active" aria-current="page">{{ $pageData->title ?? 'Page' }}</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

<section class="our_projects">
    <div class="sub_section">
        <div class="row">
            <div class="col-md-10 mx-auto">

                @foreach ($event as $data)
                    <div class="happnings_items">
                        <div class="row">
                            <div class="col-md-4">

                                <a href="{{ url('event/' . $data->id) }}" style="text-decoration:none;color:black">

                                    <img src='{{ $data->getFirstMediaUrl('event') }}' alt=""
                                        class="img-fluid" />
                                </a>
                            </div>
                            <div class="col-md-7">
                                <span> {{ $data->created_at->format('D  M  Y') }}</span>
                                <h2>
                                    {{ $data->title }}
                                </h2>
                                <p>
                                    {{ $data->description }}

                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
{{-- vendor files --}}

<script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
<!-- <script src="{{ asset('js/scripts/event-calender/full-calender.js') }}"></script> -->
<script>
    $(document).ready(function() {

        var SITEURL = "{{ url('/') }}";

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var events = [];
        $.ajax({
            url: '/fullcalendar',
            method: 'GET',
            success: (_events) => {
                $.each(_events, (i, v) => {
                    events.push({
                        'id': v.id,
                        'title': v.title,
                        'start': v.start,
                        'end': v.end,
                        'venue': v.venue,
                        'latitude': v.latitude,
                        'longitude': v.longitude,
                        'district': v.name,
                        'event_category': v.event_category.toUpperCase()
                    });
                });

                //let date = new Date(events[0].start);
                //console.log(date.getMonth() + 1);
                $('#calendar').fullCalendar({
                    events: events,
                    //year: date.getFullYear(),
                    //month: date.getMonth() + 1,
                    eventClick: (events) => {
                        let startDate = $.fullCalendar.formatDate(events.start,
                            "Y-MM-DD");
                        let endDate = $.fullCalendar.formatDate(events.end, "Y-MM-DD");

                        $(".modal-body #event").html("<p class='p-1'><b>Event: </b>" +
                            events.title + "   (" + events.event_category + ")</p>");
                        $(".modal-body #start").html(
                            "<p class='p-1'><b>Start Date</b>:</b> " + startDate +
                            "</p>");
                        $(".modal-body #end").html("<p class='p-1'><b>End Date:</b> " +
                            endDate + "</p>");
                        $(".modal-body #venue").html("<p class='p-1'><b>Venue:</b> " +
                            events.venue + "</p>");
                        $(".modal-body #district").html(
                            "<p class='p-1'><b>District:</b> " + events.district +
                            "</p>");
                        $(".modal-body #lat").html("<p class='p-1'><b>Latitude:</b> " +
                            events.latitude + "</p>");
                        $(".modal-body #lang").html(
                            "<p class='p-1'><b>Longitude:</b> " + events.longitude +
                            "</p>");
                        $("#myModal").modal("show");
                    }
                });
            },
            error: (error) => {
                console.log(error);
            }
        });

    });

    function displayMessage(message) {
        toastr.success(message, 'Event');
    }
</script>

@endsection
