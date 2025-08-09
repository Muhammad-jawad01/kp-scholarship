@extends('layouts/contentLayoutMaster')

@section('title', 'Setting')

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
      @can('setting-create')
      <!-- <a class="btn btn-primary m-2" href="{{ route('settings.create') }}"> Create New Setting</a> -->
      @endcan
    </div>
    <div class="card-datatable table-responsive pt-0">

      <table class="user-list-table table">
        <thead class="thead-light">
          <tr>
            
            <th>Theme</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        {{-- display roles --}}
        <tbody>
          @foreach ($settings as $setting)
          <tr>
          
            <td>{{ $setting->name }}</td>
            <td>{!! \Helper::showStatus($setting->status)!!}</td>
            <td>
              @can('setting-list')
              <!-- <a href="{{ route('settings.show', $setting->id) }}" class="btn btn-warning btn-sm"><i data-feather="eye" class="font-medium-3"></i></a> -->
              @endcan
              @can('setting-edit')
              <a href="{{ route('settings.edit', $setting->id) }}" class="btn btn-primary btn-sm"><i data-feather="edit-2" class="font-medium-3"></i></a>
              @endcan
              @can('setting-edit')
              {!! Form::open(['method' => 'DELETE','route' => ['settings.destroy', $setting->id],'style'=>'display:inline']) !!}
              <!-- <button type="submit" class="btn btn-danger btn-sm"><i data-feather="trash" class="font-medium-3"></i></button> -->

              {!! Form::close() !!}

              @endcan
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
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
<!-- <script src="{{ asset(mix('js/scripts/pages/app-role-list.js')) }}"></script> -->
@endsection