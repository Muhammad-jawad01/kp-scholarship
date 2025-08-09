@extends('front/layouts/layout')

@section('title', 'Downloads')
@section('content')
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
                    <li class="bcrumb-item active" aria-current="page">{{ $pageData->title ?? 'Page' }}</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection
<section class="news-page-details">
    <div class="container mt-5">


        {{-- <div class="happnings_items">
                <div class="row mb-3">
                    <div class="col-md-8 mb-3">
                        <h2>Khyber Pakhtunkhwa Digital Policy 2018-2023</h2>
                        <p> The companies/Firms as stated in KP IT Board registration form shall attach the
                            following documents with the KP IT Board registration form
                        </p>
                    </div>
                    <div class="col-md-4 vertical-center">
                        <a href="" class="download_btn">DOWNLOADS</a>
                    </div>
                </div>
            </div> --}}
        @foreach ($download as $data)
            <div class="happnings_items">
                <div class="row mb-3">
                    <div class="col-md-8 mb-3">

                        <h2>{{ $data->title }}</h2>
                        <p>{!! $data->description !!}</p>

                        Upload ON {{ $data->created_at->format('D M Y') }} <br>Dead Line {{ $data->deadline }}


                    </div>

                    <div class="col-md-4 vertical-center">
                        <a href="{{ $data->getFirstMediaUrl('download') }}" class="download_btn">DOWNLOADS</a>
                    </div>

                </div>
            </div>
        @endforeach


    </div>
</section>

@endsection

@section('script')
{{-- vendor files --}}
<script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
<script>
    $(document).ready(function() {

        $('.datatable').DataTable();
    });
</script>
@endsection
