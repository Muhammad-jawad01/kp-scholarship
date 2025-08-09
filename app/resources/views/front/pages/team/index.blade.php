@extends('front/layouts/layout')

@section('title', 'Team')
@section('content')
    <x-inner-page-header page='team' slug='team' />



    <section class="team-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Meet The Team</h1>
                </div>
            </div>
            <div class="row mt-5">
                @foreach ($teams as $key => $team)
                    <div class="col-md-4">
                        <div class="team-item mb-5">
                            <div class="img-div">
                                @if ($team->getFirstMediaUrl('team') != '')
                                    <img src="{{ $team->getFirstMediaUrl('team') }}" alt="" />
                                @else
                                    <img src="{{ asset('images/avatars/male.png') }}" alt="" />
                                @endif
                            </div>
                            <h2>{{ $team->name }}</h2>
                            <h5>{{ $team->designation }}</h5>
                            <p>{!! Helper::TitleTextLimit($team->description, 200) !!}</p>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
@endsection
