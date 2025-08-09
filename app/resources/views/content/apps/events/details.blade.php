@extends('layouts/contentLayoutMaster')

@section('title', 'Event Details')

@section('vendor-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap4.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap4.min.css')) }}">
@endsection

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-user.css')) }}">
<style>
        .list-inline-item {
            /* border: 1px solid red; */
            padding: 10px 20px;
            width: 150px;
        }
    </style>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto"  >
    <section class="news-page-details">
    <div class="custom-container">
        <div class="d-flex flex-column flex-lg-row align-items-center align-items-lg-start justify-content-between gap-5 gap-lg-4">
            <div class="news-description" style="margin:0 auto;">
                

                <!-- New Design -->
                <div class="row" >
                        <div class="col-md-12 mx-auto">
                            <!-- Profile widget -->
                            <div class="bg-white shadow rounded overflow-hidden">

                                <div class="bg-light p-4 d-flex justify-content-around">
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item">
                                            <h5 class="font-weight-bold mb-0 d-block">Event</h5><small
                                                class="text-muted"> {{ $event->title }}</small>
                                        </li>
                                        <li class="list-inline-item" style="min-width:200px;width:auto;">
                                            <h5 class="font-weight-bold mb-0 d-block">Event Category</h5><small class="text-muted">
                                                {{ $event->event_category }} </small>
                                        </li>
                                        <li class="list-inline-item">
                                            <h5 class="font-weight-bold mb-0 d-block">Date</h5><small
                                                class="text-muted"> {{ $event->start }}</small>
                                        </li>
                                        <li class="list-inline-item">
                                            <h5 class="font-weight-bold mb-0 d-block">Audience</h5><small
                                                class="text-muted">
                                                {{ $event->audience }}</small>
                                        </li>
                                        <li class="list-inline-item">
                                            <h5 class="font-weight-bold mb-0 d-block">Participants</h5><small
                                                class="text-muted">
                                                {{ $event->participants }}</small>
                                        </li>
                                        <br>
                                        <li class="list-inline-item">
                                            <h5 class="font-weight-bold mb-0 d-block">District</h5><small
                                                class="text-muted">
                                                {{ $event->name }}</small>
                                        </li>
                                        <li class="list-inline-item">
                                            <h5 class="font-weight-bold mb-0 d-block">Venue</h5><small class="text-muted"> {{ $event->venue }}</small>
                                        </li>
                                    </ul>
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
                                                <div class="col-lg-3 mb-2 pr-lg-1"><img
                                                        src="{{ $mediaItems[$key]->getFullUrl() }}" alt=""
                                                        class="img-fluid rounded shadow-sm img-thumbnail"></div>
                                                {{-- <div class="col-md-3">
                                                    <img src="{{ $mediaItems[$key]->getFullUrl() }}" alt="">
                                                </div> --}}
                                            @endforeach
                                        @endif
                                        {{-- <div class="col-lg-6 mb-2 pr-lg-1"><img
                                                src="https://images.unsplash.com/photo-1469594292607-7bd90f8d3ba4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80"
                                                alt="" class="img-fluid rounded shadow-sm"></div>
                                        <div class="col-lg-6 mb-2 pl-lg-1"><img
                                                src="https://images.unsplash.com/photo-1493571716545-b559a19edd14?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80"
                                                alt="" class="img-fluid rounded shadow-sm"></div>
                                        <div class="col-lg-6 pr-lg-1 mb-2"><img
                                                src="https://images.unsplash.com/photo-1453791052107-5c843da62d97?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80"
                                                alt="" class="img-fluid rounded shadow-sm"></div>
                                        <div class="col-lg-6 pl-lg-1"><img
                                                src="https://images.unsplash.com/photo-1475724017904-b712052c192a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80"
                                                alt="" class="img-fluid rounded shadow-sm"></div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- <div class="card">
    <table class="table table-border">
        <tr>
            <th>Event</th>
            <td colspan="3">{{$event->title}}</td>
        </tr>
        <tr>
            <th>District</th>
            <td>{{$event->name}}</td>
            <th>Venue</th>
            <td>{{$event->venue}}</td>
        </tr>
        <tr>
            <th>Start Date</th>
            <td>{{$event->start}}</td>
            <th>End Date</th>
            <td>{{$event->end}}</td>
        </tr>
        <tr>
            <th colspan="4">GPS Coordinates</th>
        </tr>
        <tr>
            <th>Latitude</th>
            <td>{{$event->latitude}}</td>
            <th>Longitude</th>
            <td>{{$event->longitude}}</td>
        </tr>
    </table>
    <hr>
    <div class="row p-1">
    @php $mediaItems = $event->getMedia('event') @endphp
    @if(count($mediaItems)>0)
    @foreach($mediaItems as $key=> $media)
    <div class="col-md-3">
        <img src="{{$mediaItems[$key]->getFullUrl()}}" alt="">
    </div>

    @endforeach
    @endif
    </div>
  </div> -->
            </div>

        </div>
    </div>
</section>
    </div>
</div>
@endsection

@section('vendor-script')
{{-- Vendor js files --}}
<script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap4.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap4.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
@endsection

@section('page-script')
{{-- Page js files --}}

@endsection