@extends('front/layouts/layout')

@section('title', 'Event Details')
@section('content')
    <style>
        .list-inline-item {
            padding: 10px 20px;
            width: 150px;
        }
    </style>

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
                            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Past Events</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <div class="row">
        <div class="col-md-12 ">
            <section class="news-page-details">
                <div
                    class="d-flex flex-column flex-lg-row align-items-center align-items-lg-start justify-content-between gap-5 gap-lg-4">
                    <div class="news-description" style="margin:0 auto;">

                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="latest_news ">
                                            <h4>Social Links</h4>
                                            @isset($socialLinks)
                                                <ul>
                                                    @foreach ($socialLinks as $link)
                                                        @if (strlen($link) > 0)
                                                            <li>
                                                                <a href="{{ $link }}">
                                                                    {{ $link }}
                                                                </a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            @endisset
                                        </div>
                                    </div>
                                    <div class="col-md-8 ">
                                        <div class="desil_section">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <img src="{{ $event->getFirstMediaUrl('event') }}" alt=""
                                                        class="img-fluid" />
                                                </div>

                                                <div class="col-md-7">
                                                    <h5>{{ $event->title }}</h5>
                                                    {!! $event->description !!}
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <th></th>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <hr />

                                            <!-- New Design -->
                                            <div class="row">
                                                <div class="col-md-12 mx-auto">
                                                    <!-- Profile widget -->

                                                    <div class="bg-light d-flex justify-content-around">
                                                        <ul class="list-inline mb-0">
                                                            <li class="list-inline-item"
                                                                style="min-width:200px;width:auto;">
                                                                <h5 class="font-weight-bold mb-0 d-block">Event Category
                                                                </h5><small class="text-muted">
                                                                    {{ $event->event_category }} </small>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <h5 class="font-weight-bold mb-0 d-block">Date</h5>
                                                                <small class="text-muted"> {{ $event->start }}</small>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <h5 class="font-weight-bold mb-0 d-block">Audience</h5>
                                                                @if ($event->audience == 0)
                                                                    <small class="text-muted"></small>
                                                                @else
                                                                    <small class="text-muted">{{ $event->audience }}</small>
                                                                @endif
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <h5 class="font-weight-bold mb-0 d-block">Participants
                                                                </h5>
                                                                @if ($event->participants == 0)
                                                                    <small class="text-muted"></small>
                                                                @else
                                                                    <small
                                                                        class="text-muted">{{ $event->participants }}</small>
                                                                @endif
                                                            </li>
                                                            <br>
                                                            <li class="list-inline-item">
                                                                <h5 class="font-weight-bold mb-0 d-block">Venue</h5>
                                                                <small class="text-muted"> {{ $event->venue }}</small>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                @php $mediaItems = $event->getMedia('event') @endphp
                                                @if (count($mediaItems) > 0)
                                                    @foreach ($mediaItems as $key => $media)
                                                        <div class="col-lg-3 mb-2 pr-lg-1"><img
                                                                src="{{ $mediaItems[$key]->getFullUrl() }}" alt=""
                                                                class="img-fluid rounded shadow-sm img-thumbnail details-image">
                                                        </div>
                                                    @endforeach
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr />


                                {{-- Recent News --}}

                            </div>
                            <div class="col-md-3">
                                <div class="latest_news">
                                    <h4>Tweets</h4>
                                    <ul>
                                        <li>
                                            <span>1</span>
                                            <a href="">
                                                Lorem ipsum dolor sit amet consectetur. Lorem ipsum dolor sit
                                                amet consectetur
                                            </a>
                                        </li>
                                        <li>
                                            <span>2</span>
                                            <a href="">
                                                Lorem ipsum dolor sit amet consectetur. Lorem ipsum dolor sit
                                                amet consectetur
                                            </a>
                                        </li>
                                        <li>
                                            <span>3</span>
                                            <a href="">
                                                Lorem ipsum dolor sit amet consectetur. Lorem ipsum dolor sit
                                                amet consectetur
                                            </a>
                                        </li>
                                        <li>
                                            <span>4</span>
                                            <a href="">
                                                Lorem ipsum dolor sit amet consectetur. Lorem ipsum dolor sit
                                                amet consectetur
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>
    </div>
    </div>
@endsection
@section('script')

    <script>
        $(document).ready(function() {
            $(".details-image").click(function() {
                this.requestFullscreen()
            })
        });
    </script>
@endsection
