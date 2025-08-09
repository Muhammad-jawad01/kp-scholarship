@extends('front/layouts/layout')

@section('title', 'Facilities-Jawan Marakiz Details')
@section('content')
    <style>
        .list-inline-item {
            /* border: 1px solid red; */
            padding: 10px 20px;
            width: 150px;
        }
    </style>
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')) }}">
    <section class="d-block page-title-banner"
        style="background-image: url('{{ $pageData ? $pageData->getFirstMediaUrl('banner') : '#' }}');">
        <div class="banner-overlay">
            <div class="custom-container">
                <div class="d-flex flex-column align-items-center justify-content-center title-con">
                    <div>
                        <!-- <h1 class="page-title fw-bold">Project</h1> -->
                        <h1 class="page-title fw-bold d-block"></h1>
                    </div>

                </div>
                <div class="breadcrumbs-con">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $pageData->title }}
                            <li class="breadcrumb-item active" aria-current="page">Jawan Markaz</li>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="news-page-details">
        <div class="custom-container">
            <div class="row">
                {{-- <div class="col-md-6">
                    <div class="card">
                        <table class="table">
                            <tr>
                                <th>Facility</th>
                                <td colspan="3">{{ $facility->facility }}</td>
                            </tr>
                            <tr>
                                <th>Type</th>
                                <td>{{ $facility->type }}</td>
                                <th>District</th>
                                <td>{{ $facility->name }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ $facility->address }}</td>
                                <th>Phone</th>
                                <td>{{ $facility->phone }}</td>
                            </tr>
                            <tr>
                                <th colspan="4">GPS Coordinates</th>
                            </tr>
                            <tr>
                                <th>Latitude</th>
                                <td>{{ $facility->latitude }}</td>
                                <th>Longitude</th>
                                <td>{{ $facility->longitude }}</td>
                            </tr>
                        </table>
                        <div class="row p-1">
                            @php $mediaItems = $facility->getMedia('facility') @endphp
                            @if (count($mediaItems) > 0)
                                @foreach ($mediaItems as $key => $media)
                                    <div class="col-md-3">
                                        <img src="{{ $mediaItems[$key]->getFullUrl() }}" alt="">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                </div> --}}
                <div class="col-sm-12 col-md-8 offset-md-2 col-lg-8 offset-lg-2">
                    <div class="row">
                        <div class="col-md-12 mx-auto">
                            <!-- Profile widget -->
                            <div class="bg-white shadow rounded overflow-hidden">

                                <div class="bg-light p-4 d-flex justify-content-around">
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item">
                                            <h5 class="font-weight-bold mb-0 d-block">Facility</h5><small
                                                class="text-muted"> {{ $facility->facility }}</small>
                                        </li>
                                        <li class="list-inline-item">
                                            <h5 class="font-weight-bold mb-0 d-block">Type</h5><small class="text-muted"> {{ $facility->type }}</small>
                                        </li>
                                        <li class="list-inline-item">
                                            <h5 class="font-weight-bold mb-0 d-block">District</h5><small
                                                class="text-muted"> {{ $facility->name }}</small>
                                        </li>
                                       
                                        <li class="list-inline-item">
                                            <h5 class="font-weight-bold mb-0 d-block">Phone</h5><small class="text-muted">
                                                {{ $facility->phone }}</small>
                                        </li>
                                        <li class="list-inline-item">
                                            <h5 class="font-weight-bold mb-0 d-block">Latitude</h5><small
                                                class="text-muted">
                                                {{ $facility->latitude }}</small>
                                        </li>
                                        <li class="list-inline-item">
                                            <h5 class="font-weight-bold mb-0 d-block">Longitude</h5><small
                                                class="text-muted">
                                                {{ $facility->longitude }}</small>
                                        </li>
                                        <br>
                                        <li class="list-inline-item" style="min-width:200px;width:auto;">
                                            <h5 class="font-weight-bold mb-0 d-block">Address</h5><small class="text-muted">
                                                {{ $facility->address }} </small>
                                        </li>
                                    </ul>
                                </div>
                                <div class="px-4 py-3">
                                    <h5 class="mb-2">Description</h5>
                                    <div class="p-4 rounded shadow-sm bg-light">
                                       {!! $facility->description !!}
                                    </div>
                                </div>
                                <div class="py-4 px-4">
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <h5 class="mb-0">Recent photos</h5>
                                        {{-- <a href="#"
                                            class="btn btn-link text-muted">Show all</a> --}}
                                    </div>
                                    <div class="row">
                                        @php $mediaItems = $facility->getMedia('facility') @endphp
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
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
    {{-- vendor files --}}
    <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
    <script>
        $(document).ready(function() {

            $('.datatable').DataTable();
            $("img").click(function() {
                this.requestFullscreen();
            });
        });
    </script>
@endsection
