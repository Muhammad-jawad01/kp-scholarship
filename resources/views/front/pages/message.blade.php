@extends('front/layouts/layout')
<style>
    .subP {
        color: #125f69;
        font-family: Calibri, sans-serif;
        font-size: 20pt;
        font-weight: 600;
    }

    .designation {
        color: #fcd201;
        font-weight: 600;

    }
</style>
@section('title', 'Message')
@section('content')
    <x-inner-page-header page='Message' slug='message' />

    {{-- <div class="admistration-slider"> --}}
    <div class="mx-12 flex-column justify-content-center align-items-center align-items-md-start p-5 gap-1">
        <div class="row">
            <div class="col-md-2 offset-2">
                <div class="image-box">
                    <img src="{{ $admin->getFirstMediaUrl('team') }}" class="rounded" height="150" width="150"
                        alt="" />
                </div>
            </div>
            <div class="col-md-7">
                <div class="row">
                    <div class="details">
                        <div class="sec-title">
                            {{-- <p class="title-top text-uppercase">ADMNISTRATIVE HEADS</p> --}}
                            <h2 class="title text-capitalize pl-3 subP">{{ $admin->name }}
                                <small class="designation">{{ $admin->designation }}</small>
                            </h2>
                        </div>
                        <div class="description" style="width: 800px;">
                            {!! $admin->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
