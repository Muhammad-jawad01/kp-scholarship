@extends('front/layouts/layout')

@section('title', 'Downloads/Sevice Rules and Acts')
@section('content')
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')) }}">
<section class="d-block page-title-banner" style="background-image: url('{{ $pageData? $pageData->getFirstMediaUrl('banner'): '#'}}');">
    <div class="banner-overlay">
        <div class="custom-container">
            <div class="d-flex flex-column align-items-center justify-content-center title-con">
                <div class="innerPageTitle">
                    <h1 class="page-title fw-bold">{{ $pageData->banner_title ?? 'page' }}</h1>
                </div>
            </div>
            <div class="breadcrumbs-con">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{url('/')}}" class="text-decoration-none">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Downloads</li>
                        <li class="breadcrumb-item active" aria-current="page">Services Rules and Acts</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<section class="news-page-details">
    <div class="custom-container">
        <div class="card">

            <div class="table table-responsive p-4">
                <table class="table datatable">
                    <thead class="thead-light">
                        <tr>
                            <th>Title</th>
                            <th>Download Link</th>
                        </tr>
                    </thead>
                        <tbody>
                            @foreach ($serviceRulesActs as $serviceRulesAct)
                                <tr>
                                    <td>{{ $serviceRulesAct->title }}</td>
                                    <td><a href="{{$serviceRulesAct->getFirstMediaUrl('download')}}">Download</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                </table>

            </div>



            <!-- Modal to add new user Ends-->
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
    });
</script>
@endsection