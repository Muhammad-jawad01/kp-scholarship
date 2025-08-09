@extends('layouts/contentLayoutMaster')

@section('title', 'Results')

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
    <div class="col-lg-12 text-right">
      @can('competition-categories-list')
      @php
      $param='';
      if(request()->query('level_id')){
      $param='?level_id='.request()->query('level_id');
      }
      @endphp
      <a class="btn btn-primary m-2" href="{{route('result.create')}}{{$param}}">New Result</a>
      @endcan
    </div>
    <div class="table table-responsive pt-0">

      <table class=" table">
        <thead class="thead-light">
          <tr>
            <th></th>
            <th>Event</th>
            <th>District</th>
            <th>Level</th>
            <th>Result</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($results as $result)

          <tr>
            <td>{{$result->id }}</td>
            <td>{{ $result->event()->exists() ? $result->event->title : ''}}</td>
            <td>{{ $result->district()->exists()? $result->district->name : ''}}</td>
            <td>{{ $result->level()->exists()? $result->level->title : ''}}</td>
            <td><a href="{{$result->getFirstMediaUrl('result')}}" download>Download</a></td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                  <i data-feather="more-vertical"></i>
                </button>
                <div class="dropdown-menu">

                  <!-- @can('competition-categories-edit') -->
                  <!-- <a href="{{ route('result.edit', $result->id) }}" class="dropdown-item"><i data-feather="edit-2" class="mr-50"></i><span>Edit</span></a> -->
                  <!-- @endcan -->

             
                  {!! Form::open(['method' => 'DELETE','route' => ['result.destroy', $result->id],'style'=>'display:inline']) !!}
                  <button type="submit" class="dropdown-item "><i data-feather="trash" class="mr-50"></i> <span>Delete</span></button>
                  {!! Form::close() !!}
                
                </div>
              </div>
            </td>
          </tr>

          @endforeach
        </tbody>
      </table>

    </div>


    <div class="row p-1">
      <div class="col-lg-12">
        {!! $results->links() !!}
      </div>
    </div>
    <!-- Modal to add new user Ends-->
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