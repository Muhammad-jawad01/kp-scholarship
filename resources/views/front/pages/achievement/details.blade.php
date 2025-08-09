@extends('front/layouts/layout')

@section('title', 'Event Details')
@section('content')

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
                    <li class="bcrumb-item"><a href="{{ url('achievements') }}" class="text-decoration-none">Events</a></li>
                    <li class="bcrumb-item active" aria-current="page">{{ $event->title ?? 'Page' }}</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection



<section class="our_projects">
    <div class="sub_section">


        <div class="row project_detail">
            <div class="row">
                <div class="col-md-12">
                    <div class="happning_img">

                        <img src="{{ $event->getFirstMediaUrl('event') }}" class="w-100 " alt="" />

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-12 project_detail_des">
                        <span>{{ $event->created_at->format('D  M  Y') }}</span>
                        <h2> {{ $event->title }}
                        </h2>
                        <p>
                            {{ $event->description }}

                        </p>

                        <ul>
                            <li> Audience :{{ $event->audience }}
                            </li>
                            <li> Participants :{{ $event->participants }}
                            </li>
                        </ul>


                        <h3>DISTRICTS</h3>

                        <ul class="dis_ul">
                            <li><i class="fa fa-check-circle"></i> {{ $event->district->name }}</li>

                            <li> Venue :{{ $event->venue }}
                            </li>

                        </ul>

                    </div>
                </div>

                <div class="py-4 px-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="mb-0">Recent photos</h5>
                        {{-- <a href="#"
                                            class="btn btn-link text-muted">Show all</a> --}}
                    </div>
                    <div class="row">
                        @php $mediaItems = $event->getMedia('event') @endphp
                        @if (count($mediaItems) > 0)
                            @foreach ($mediaItems as $key => $media)
                                <div class="col-md-8 mb-2 pr-lg-1"><img src="{{ $mediaItems[$key]->getFullUrl() }}"
                                        alt="" class="img-fluid rounded shadow-sm img-thumbnail"></div>
                                {{-- <div class="col-md-3">
                                                    <img src="{{ $mediaItems[$key]->getFullUrl() }}" alt="">
                                                </div> --}}
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection
