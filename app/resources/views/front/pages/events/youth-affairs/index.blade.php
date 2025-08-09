@extends('front/layouts/layout')

@section('title', 'Youth Affairs Events')
@section('content')
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')) }}">
    <!-- Event Calender -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <section class="d-block page-title-banner"
        style="background-image: url('{{ $pageData ? $pageData->getFirstMediaUrl('banner') : '#' }}');">
        <div class="banner-overlay">
            <div class="custom-container">
                <div class="d-flex flex-column align-items-center justify-content-center title-con">
                    <div class="innerPageTitle">
                        <h1 class="page-title fw-bold">{{ $pageData->banner_title ?? 'page' }}</h1>
                    </div>
                </div>
                <div class="breadcrumbs-con">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="val-decoration-none">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="" class="val-decoration-none">Events</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $pageData->title }}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="news-page-details">
        <div class="custom-container">
            <div class="container">
                <h3 class="val-center val-white p-1 gradient-bg text-center text-white">Youth Affairs Events Calendar</h3>
                <div id="calendar"></div>
            </div>
        </div>
        <!-- ====== Modal =========  -->
        <div id="myModal" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header gradient-bg text-white w-100 p-2 text-center">
                        <h3 class="modal-title">Youth Affairs Event Details</h3>
                        <!-- <button type="button" class="btn-close text-white" data-bs-dismiss="modal"></button> -->
                    </div>
                    <div class="modal-body">
                        <p id="event"></p>
                        <p id="venue"></p>
                        <p id="start"></p>
                        <p id="audience"></p>
                        <p id="participants"></p>
                        <img id="img" src="" alt="" width="100%" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
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
                url: '/fullcalendar/youth-affairs',
                method: 'GET',
                success: (_events) => {
                    $.each(_events, (i, v) => {
                        events.push({
                            'id': v.id,
                            'title': v.title,
                            'venue': v.venue,
                            'start': v.start,
                            'audience': v.audience,
                            'participants': v.participants,
                            'img_url': v?.media?.[0]?.original_url
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
                            //let endDate = $.fullCalendar.formatDate(events.end, "Y-MM-DD");
                            $(".modal-body #event").html("<p class='p-1'><b>Event: </b>" +
                                events.title + "</p>");
                            $(".modal-body #venue").html("<p class='p-1'><b>Venue:</b> " +
                                events.venue + "</p>");
                            $(".modal-body #start").html(
                                "<p class='p-1'><b>Start Date</b>:</b> " + startDate +
                                "</p>");
                            $(".modal-body #audience").html(
                                "<p class='p-1'><b>Audience:</b> " + events.audience +
                                "</p>");
                            $(".modal-body #participants").html(
                                "<p class='p-1'><b>Participants:</b> " +
                                events.participants + "</p>");
                            $(".modal-body #img").attr("src", events.img_url);
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
