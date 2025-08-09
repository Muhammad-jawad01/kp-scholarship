@extends('front/layouts/layout')

@section('title', 'News')
@section('content')


    <x-inner-page-header page='News' slug='news' />
    <section class="our_projects">
        <div class="sub_section">
            <div class="row">
                <div class="col-md-10 mx-auto">

                    @foreach ($newslist as $key => $news)
                        <div class="happnings_items">
                            <div class="row">
                                <div class="col-md-4">

                                    <a href="{{ url('news/' . $news->slug) }}" style="text-decoration:none;color:black">

                                        <img src='{{ $news->getFirstMediaUrl('news') }}' alt="" class="img-fluid" />
                                    </a>
                                </div>
                                <div class="col-md-7">
                                    <span> {{ $news->created_at->format('D  M  Y') }}</span>
                                    <h2>
                                        {{ $news->title }}
                                    </h2>
                                    <p>
                                        {!! $news->description !!}

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
