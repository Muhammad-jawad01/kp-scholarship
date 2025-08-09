@extends('front/layouts/layout')

@section('title', 'Universities')
@section('content')
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')) }}">
<section class="d-block page-title-banner" style="background-image: url('{{ $pageData? $pageData->getFirstMediaUrl('banner'): '#'}}');">
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
                        <li class="breadcrumb-item"><a href="{{url('/')}}" class="text-decoration-none">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$pageData->title}}
                            <li class="breadcrumb-item active" aria-current="page">Universities</li>
                        </li>
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
                <table id="table" class="table datatable">
                    <thead class="thead-light">
                        <tr>
                            <th>District</th>
                            <th>University</th>
                            <th>Organized By</th>
                            <th>Address</th>
                            <th>Phone No</th>
                            <th>Prospectus</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($universities as $university)
                            <tr>
                            <td>{{$university->dist_name}}</td>
                            <td>{{$university->name}}</td>
                            <td>{{$university->organized_by}}</td>
                            <td>{{$university->address}}</td>
                            <td>{{$university->phone}}</td>
                            <td><a href="{{$university->getFirstMediaUrl('prospectus')}}">Download</a></td>
                            <td><a href="{{route('pages.university-details', $university->id)}}" class="btn btn-danger">Details</a></td>
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