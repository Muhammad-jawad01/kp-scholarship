@extends('front/layouts/layout')

@section('title', 'New Events')
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
<div class="custom-container latest-news-section">
    <div class="row latest-news-slider-box mt-0">
        @foreach ($events as $event)
            <div class="col-sm-12 col-md-4  col-lg-4  col-xl-4  p-4">
                <div class="news-item position-relative">
                    <div class="news-image" style="background-image: url('{{ $event->getFirstMediaUrl('event') }}');">
                    </div>
                    <div class="news-details-box">
                        <div class="news-details">
                            {{-- <div class="d-flex justify-content-end align-items-start">
                                    <div class="date text-center">
                                        <span class="day d-block">{{ $event->created_at->format('d') }}</span>
                                        <span class="month d-block">{{ $event->created_at->format('M, y') }}</span>
                                    </div>
                                </div> --}}
                            <div class="d-flex flex-column description align-items-start">
                                <div style="margin-top: 60px;">
                                    <span class="text-uppercase title-sm">Event</span>
                                </div>
                                <div class="m-title">{{ Str::limit($event->title, 30, $end = '...') }}</div>
                                <div class="short-description">
                                    {{ Str::limit($event->short_description, 30, $end = '...') }}
                                </div>
                                <div class="newsdtail">
                                    <h4>Event Details</h4>
                                    <table class="table newtable">
                                        <tbody>
                                            <tr>
                                                <td> <i class="fa fa-calendar"></i>
                                                    {{ $event->start }}</td>
                                            </tr>
                                            <tr>
                                                <th>Audience</th>
                                                <th>Participants</th>
                                            </tr>
                                            <tr>
                                                @if ($event->audience == 0)
                                                    <td></td>
                                                @else
                                                    <td>{{ $event->audience }}</td>
                                                @endif
                                                @if ($event->audience == 0)
                                                    <td></td>
                                                @else
                                                    <td>{{ $event->participants }}</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <th colspan="2">Venue</th>
                                            </tr>
                                            <tr>
                                                <td colspan="2">{{ $event->venue }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                {{--
                                    <div class="read-more-link">
                                        <a href="{{ url('news/' . $event->slug) }}"
                                            class="d-flex flex-row align-items-center justify-content-center gap-2"><span>Read
                                                More</span><img
                                                src="{{ asset('front/assets/images/angle-small-right.svg') }}"
                                                alt="" /></a>

                                    </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    {{ $events->links() }}
</div>

@endsection

@section('script')
{{-- vendor files --}}

<script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
@endsection
