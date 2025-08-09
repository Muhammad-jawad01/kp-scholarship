@extends('front/layouts/layout')
@section('title', 'Downloads/Tenders and Bidding Documents')
@section('content')
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')) }}">
    <section class="d-block page-title-banner"
        style="background-image: url('{{ $pageData ? $pageData->getFirstMediaUrl('banner') : '#' }}');">
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
                            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Downloads</li>
                            <li class="breadcrumb-item active" aria-current="page">Tenders and Bidding Documents</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="news-page-details">
        <div class="custom-container">
            <div class="card">

                @foreach ($biddingDocuments as $biddingDocument)
                    <div class="happnings_items">
                        <div class="row mb-3">
                            <div class="col-md-8 mb-3">
                                <h2>Khyber Pakhtunkhwa Digital Policy 2018-2023</h2>
                                <p> The companies/Firms as stated in KP IT Board registration form shall attach
                                    the
                                    following documents with the KP IT Board registration form
                                </p>
                            </div>
                            <div class="col-md-4 vertical-center">
                                <a href="" class="download_btn">DOWNLOADS</a>
                            </div>
                        </div>
                    </div>

                    {{-- <tr>
                        <td>{!! $biddingDocument->description !!}</td>
                        <td><a href="{{ $biddingDocument->getFirstMediaUrl('download') }}">Download</a></td>
                    </tr> --}}
                @endforeach

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
