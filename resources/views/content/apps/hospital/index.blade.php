@extends('layouts/contentLayoutMaster')

@section('title', 'Hospital')

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
      @can('hospital-create')
      <a class="btn btn-primary m-2" href="{{ route('hospitals.create') }}"> New hospital</a>
      @endcan
    </div>
    <div class="table table-responsive pt-0">

      <table class=" table">
        <thead class="thead-light">
          <tr>
            <th></th>
            <th>Name</th>
            <th>Category</th>
            <th>Image</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>

          @foreach($hospitals as $hospital)


          <tr>
            <td>{{$hospital->id}}</td>
            <td>{{$hospital->name}}</td>
            <td>{{$hospital->has('hospital_category')? $hospital->hospital_category->title: ''}}</td>

            <td>
              @if($hospital->getFirstMediaUrl('hospital')!='')
              <img class="img-fluid rounded mb-75" src="{{$hospital->getFirstMediaUrl('hospital')}}" alt="{{$hospital->title}}" width="100" />
              @endif
            </td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                  <i data-feather="more-vertical"></i>
                </button>
                <div class="dropdown-menu">

                  @can('hospital-edit')
                  <a href="{{ route('hospitals.edit', $hospital->id) }}" class="dropdown-item"><i data-feather="edit-2" class="mr-50"></i><span>Edit</span></a>
                  @endcan

                  @can('hospital-delete')
                  {!! Form::open(['method' => 'DELETE','route' => ['hospitals.destroy', $hospital->id],'style'=>'display:inline']) !!}
                  <button type="submit" class="dropdown-item "><i data-feather="trash" class="mr-50"></i> <span>Delete</span></button>

                  {!! Form::close() !!}
                  @endcan
                </div>
              </div>
              <!-- <a href="{{ route('hospitals.show', $hospital->id) }}" class="btn btn-warning btn-sm"><i data-feather="eye" class="font-medium-3"></i></a> -->



            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>


    <div class="row p-1">
      <div class="col-lg-12">
        {!! $hospitals->links() !!}
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