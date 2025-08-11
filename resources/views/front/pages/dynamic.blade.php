@extends('front/layouts/layout')

@section('title', $pageData->title ?? '')
@section('content')

    <section class="news-page-details">
        <div class="row ">
            <div class="col-md-10 mx-auto">
                {!! $pageData->description !!}

            </div>
        </div>
    </section>

@endsection
