@extends('layouts/contentLayoutMaster')

@section('title', 'Facility Details')

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
@endsection

@section('content')
<!-- users list start -->
<section class="app-user-list">
  <!-- users filter start -->

  <!-- users filter end -->
  <!-- list section start -->
  <div class="card">
    <table class="table table-border">
        <tr>
            <th>Facility</th>
            <td>{{$facility->facility}}</td>
        </tr>
        <tr>
            <th>Type</th>
            <td>{{$facility->type}}</td>
            <th>District</th>
            <td>{{$facility->name}}</td>
        </tr>
        <tr>
            <th>Address</th>
            <td>{{$facility->address}}</td>
            <th>Phone</th>
            <td>{{$facility->phone}}</td>
        </tr>
        <tr>
            <th>GPS Coordinates</th>
        </tr>
        <tr>
            <th>Latitude</th>
            <td>{{$facility->latitude}}</td>
            <th>Longitude</th>
            <td>{{$facility->longitude}}</td>
        </tr>
    </table>
    @if($facility->description != '')
        <hr>
        <p class="pl-2"><strong>Description:</strong></p>
        {!! $facility->description !!}
    @endif
    <hr>
    <div class="row p-1">
    @php $mediaItems = $facility->getMedia('facility') @endphp
    @if(count($mediaItems)>0)
    @foreach($mediaItems as $key=> $media)
    <div class="col-md-3">
        <img src="{{$mediaItems[$key]->getFullUrl()}}" alt="">
    </div>

    @endforeach
    @endif
    </div>
  </div>

  <!-- list section end -->
</section>
<!-- users list ends -->
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