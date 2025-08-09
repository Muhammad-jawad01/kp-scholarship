@extends('front/layouts/layout')

@section('title', 'Past Events')
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
                            <li class="breadcrumb-item active" aria-current="page">Past Events

                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
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
                                    <div class="m-title">
                                        {{ Str::limit($event->title, 30, $end = '...') }}
                                    </div>
                                    <div class="short-description">
                                        {{ Str::limit($event->short_description, 30, $end = '...') }}
                                    </div>
                                   

                                    
                                    <div class="read-more-link">
                                        <a href="{{ route('past-event-details', $event->id) }}"
                                            class="d-flex flex-row align-items-center justify-content-center gap-2"><span>Details</span><img
                                                src="{{ asset('front/assets/images/angle-small-right.svg') }}"
                                                alt="" /></a>
    
                                    </div>
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
