@extends('front/layouts/layout')

@section('title', 'Gallery')
@section('content')
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')) }}">
    <section class="d-block page-title-banner"
        style="background-image: url('{{ $pageData ? $pageData->getFirstMediaUrl('banner') : '#' }}');">
        <div class="banner-overlay">
            <div class="custom-container">
                <div class="d-flex flex-column align-items-center justify-content-center title-con">
                    <div>
                        <!-- <h1 class="page-title fw-bold">Project</h1> -->
                        <h1 class="page-title fw-bold d-block">{{ $pageData->title ?? '' }}</h1>
                    </div>

                </div>
                <div class="breadcrumbs-con">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>


    <div class="row">
        {{-- foreach gallary --}}
        @foreach ($gallaries as $gallary)
            @php
                $media = $gallary->getMedia('gallary');
            @endphp
            @if ($media->count() > 0)
                <div class="col-md-4 col-sm-12 col-12 col-lg-4 col-xl-4">
                    {{-- <h5 class="mt-5">{{ $gallary->title }}</h5> --}}


                    <p>
                        {{-- if media length is greator than 0 --}}
                        <a href="{{ $media[0]->getUrl() }}" data-fancybox="images-preview" data-width="1500"
                            data-height="1000" data-thumbs='{"autoStart":true}'>
                            <img src="{{ $media[0]->getUrl() }}" class="img-fluid" alt=""
                                style="width:100%; height:200px !important;">
                            {{-- <img src="{{$media[0]->getUrl()}}" /> --}}
                        </a>
                    </p>

                    <div style="display: none;">
                        {{-- <a href="https://source.unsplash.com/Ai2TRdvI6gM/1500x1000" data-fancybox="images-preview"
                    data-width="1500" data-height="1000"
                    data-thumb="https://source.unsplash.com/Ai2TRdvI6gM/240x160"></a> --}}
                        @foreach ($media as $m)
                            <a href="{{ $m->getUrl() }}" data-fancybox="images-preview" data-width="1500"
                                data-height="1000" data-thumb="{{ $m->getUrl() }}"></a>
                        @endforeach
                    </div>

                </div>
            @endif
        @endforeach
    </div>
