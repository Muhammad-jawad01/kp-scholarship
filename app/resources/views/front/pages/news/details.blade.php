@extends('front/layouts/layout')

@section('title', 'News & Updates')
@section('content')
    {{-- <x-inner-page-header page='News' slug='news' /> --}}
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
                    <li class="bcrumb-item"><a href="{{ url('news') }}" class="text-decoration-none">News</a>
                    </li>
                    <li class="bcrumb-item active" aria-current="page">{{ $news->title ?? 'Page' }}</li>
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

                        <img src="{{ $news->getFirstMediaUrl('news') }}" class="w-100 " alt="" />

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-12 project_detail_des">
                        <span>{{ $news->created_at->format('D  M  Y') }}</span>
                        <h2> <span>{{ $news->title }}</span>
                        </h2>
                        <p>
                            {!! $news->description !!}

                        </p>





                    </div>
                </div>

                <div class="py-4 px-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="mb-0">Recent photos</h5>
                        {{-- <a href="#"
                                            class="btn btn-link text-muted">Show all</a> --}}
                    </div>
                    <div class="row">
                        @php $mediaItems = $news->getMedia('news') @endphp
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
