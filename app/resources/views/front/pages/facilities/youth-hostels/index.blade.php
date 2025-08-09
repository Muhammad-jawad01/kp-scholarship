@extends('front/layouts/layout')

@section('title', 'Facilities-Youth Hostels')
@section('content')
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
                            <li class="breadcrumb-item active" aria-current="page">Youth Hostels</li>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="news-page-details">
        <div class="custom-container">
            <div class="row p-1">
                @foreach ($facilities as $facility)
                    <div class="col-md-3 facility mb-4">
                        <a title="Click here to see details"
                            href="{{ route('hostels-facilities-details', $facility->id) }}">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="img_div" style="width:100%;height:200px;">
                                        <img class="img-fluid" src="{{ $facility->getFirstMediaUrl('facility') }}"
                                            alt="" style="width: 100%;height:100%;" />
                                    </div>
                                </div>
                                <div class="card-footer gradient-bg text-white">{{ $facility->facility }}</div>
                            </div>
                        </a>
                    </div>
                @endforeach
                {!! $facilities->links() !!}
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
