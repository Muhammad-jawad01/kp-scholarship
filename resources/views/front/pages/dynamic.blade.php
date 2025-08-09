@extends('front/layouts/layout')

@section('title', $pageData->title ?? '')
@section('content')

    <style>
        .news-page-details {
            padding: 40px 0;
        }

        .news-page-details p strong {
            color: red;
        }



        .news-page-details .custom-container p,
        .news-page-details .custom-container ol li,
        .news-page-details .custom-container ul li,
        .news-page-details .custom-container h2,
        p,
        ul,
        .news-page-details .custom-container h2,
        p,
        ol {
            font-size: 16px !important;
        }

        .
    </style>
    <x-inner-page-header page='{{ $pageData->loadwithlink }}' slug='{{ $pageData->slug }}' />

    <section class="news-page-details">
        <div class="row ">
            <div class="col-md-10 mx-auto">
                {!! $pageData->description !!}

            </div>
        </div>
    </section>

@endsection
