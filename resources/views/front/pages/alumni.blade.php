@extends('front/layouts/layout')
<style>
    .card-container {
        padding: 100px 0px;
        -webkit-perspective: 1000;
        perspective: 1000;
    }

        {
        color: var(--darkGreen);
        text-align: center;
        font-weight: 700;
    }

    .profile-card-4 {
        /* max-width: 300px; */
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        position: relative;
        margin: 10px auto;
        cursor: pointer;
    }

    .img-div {
        width: 100%;
        height: 300px;
        position: relative;
    }

    .img-div img {
        width: 100%;
        height: 100%;
    }

    .img-div:after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background: rgba(0, 0, 0, 0.4);
    }

    .profile-card-4 .profile-content {
        position: relative;
        padding: 15px;
        background-color: #fff;
    }

    .profile-card-4 .profile-name {
        font-weight: bold;
        position: absolute;
        left: 0px;
        right: 0px;
        top: -70px;
        color: #fcd201;
        font-size: 17px;
    }

    .profile-card-4 .profile-name p {
        font-weight: 600;
        font-size: 13px;
        letter-spacing: 1.5px;
    }

    .profile-card-4 .profile-description {
        color: #777;
        /* font-size: 14px; */
        padding: 8px;
    }

    .profile-card-4 .profile-overview {
        padding: 15px 0px;
    }

    .profile-card-4 .profile-overview p {
        font-size: 10px;
        font-weight: 600;
        color: #777;
    }

    .profile-card-4 .profile-overview h4 {
        color: #273751;
        font-weight: bold;
    }

    .profile-card-4 .profile-content::before {
        content: "";
        position: absolute;
        height: 30px;
        top: -15px;
        left: 0px;
        right: 0px;
        background-color: #fff;
        z-index: 0;
        transform: skewY(3deg);
    }

    .profile-card-4:hover img {
        transform: scale(1.1, 1.1);
        filter: brightness(110%);
    }
</style>
@section('title', 'Alumni')
@section('content')
    <x-inner-page-header page='Alumni' slug='alumni' />
    <style>
        .toph2 {
            text-align: center;
            font-weight: bold;
            color: #125f69;
            font-size: 40px !important;
        }

        .subP {
            color: #125f69;
            font-family: Calibri, sans-serif;
            font-size: 11pt;
            text-align: center
        }
    </style>
    <section class="team-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12  mt-4">
                    <h1>Meet The Alumni</h1>
                </div>
            </div>
            <div class="row mt-2 mb-3">
                @foreach ($alumni as $key => $team)
                    <div class=" col-lg-4 col-md-6 col-sm-12 col-xs-12">
                        <div class="profile-card-4 text-center">
                            <div class="img-div">
                                @if ($team->getFirstMediaUrl('team') != '')
                                    <img src="{{ $team->getFirstMediaUrl('team') }}" alt="" />
                                @else
                                    <img src="{{ asset('images/avatars/male.png') }}" alt="" />
                                @endif
                            </div>

                            <div class="profile-content">
                                <div class="profile-name">
                                    {{ $team->name }} <p>{{ $team->designation }}</p>
                                </div>
                                <div class="profile-description">
                                    {!! Helper::TitleTextLimit($team->description, 200) !!}
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>

@endsection

@section('script')
    <script type="text/javascript">
        //
    </script>
@endsection
