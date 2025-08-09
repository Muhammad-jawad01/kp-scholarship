@extends('layouts/contentLayoutMaster')

@section('title', 'Facilities')

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
      @can('facility-create')
      <a class="btn btn-primary m-2" href="{{route('facilities.create')}}">New Facility</a>
      @endcan
    </div>
    <!-- <div class="table table-responsive pt-0">

      <table class=" table">
        <thead class="thead-light">
          <tr>
            <th></th>
            <th>District</th>
            <th>Type</th>
            <th>Facility</th>
            <th>GPS Coordinates</th>
            <th>address</th>
            <th>Phone</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($facilities as $facility)
          <tr>
            <td>{{$facility->id}}</td>
            <td>{{$facility->name}}</td>
            <td>{{$facility->type}}</td>
            <td>{{$facility->facility}}</td>
            <td><b>lat:</b> {{$facility->latitude}}, <b>long:</b> {{$facility->longitude}}</td>
            <td>{{$facility->address}}</td>
            <td>{{$facility->phone}}</td>
            <td>
               <div class="dropdown">
                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                  <i data-feather="more-vertical"></i>
                </button>
                <div class="dropdown-menu">

                  @can('facility-edit')
                  <a href="{{ route('facilities.edit', $facility->id) }}" class="dropdown-item"><i data-feather="edit-2" class="mr-50"></i><span>Edit</span></a>
                  @endcan

                  @can('facility-delete')
                  {!! Form::open(['method' => 'DELETE','route' => ['facilities.destroy', $facility->id],'style'=>'display:inline']) !!}
                  <button type="submit" class="dropdown-item "><i data-feather="trash" class="mr-50"></i> <span>Delete</span></button>

                  {!! Form::close() !!}
                  @endcan
                </div>
              </div>
              

            </td>
          </tr>
          @endforeach
        </tbody>
      </table> -->

      <div class="row p-1">
        @foreach($facilities as $facility)
          <div class="col-md-4">
            <div class="card border">
              <div class="card-header btn btn-primary">{{$facility->facility}}</div>
              <div class="card-body" style="height: 200px; width: 315px; background-image: url({{$facility->getFirstMediaUrl('facility')}}); background-size: cover;"> 
              </div>
              <div class="card-footer">
                <table>
                  <tr>
                    <td>
                      <a title="Show Details" href="{{ route('facility-details', $facility->id) }}" class="btn btn-primary"><i data-feather="eye" class="mr-50"></i></a>
                    </td>
                    <td> 
                      @can('facility-edit')
                      <a title="Edit" href="{{ route('facilities.edit', $facility->id) }}" class="btn btn-primary"><i data-feather="edit-2" class="mr-50"></i></a>
                      @endcan
                    </td>
                    <td>
                      @can('facility-delete')
                        {!! Form::open(['method' => 'DELETE','route' => ['facilities.destroy', $facility->id],'style'=>'display:inline']) !!}
                        <button title="Delete" style="border: none;" type="submit" class="btn btn-small btn-primary"><i data-feather="trash" class="mr-50"></i></button>

                        {!! Form::close() !!}
                      @endcan
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        @endforeach
      </div>

    </div>


    <div class="row p-1">
      <div class="col-lg-12">
        {!! $facilities->links() !!}
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