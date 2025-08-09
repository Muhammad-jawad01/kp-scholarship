@extends('layouts/contentLayoutMaster')

@section('title', 'Registered Youth')

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
<form action="{{route('registered-youth.search')}}" method="post">
  @csrf
  <div class="row">
    <div class="col-sm-3">
      <select name="gender" id="" class="form-control">
        <option value=""> -- Select Gender -- </option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Transgender">Transgender</option>
      </select>
    </div>
    <div class="col-sm-3">
      <select name="religion" id="" class="form-control">
        <option value=""> -- Select Religion -- </option>
        <option value="Islam">Islam</option>
        <option value="Christianity">Christianity</option>
        <option value="Hinduism">Hinduism</option>
        <option value="Other">Other</option>
      </select>
    </div>
    <div class="col-sm-3">
      <select name="disability_status" id="" class="form-control">
        <option value=""> -- Select Disability Status -- </option>
        <option value="Normal">Normal</option>
        <option value="Disable">Disable</option>
      </select>
    </div>
    <div class="col-sm-3">
        <button type="submit" data-inline="true" class="btn btn-primary">Search</button>
        <a href="{{route('registered-youth.report')}}" data-inline="true" class="btn btn-primary">Print</a>
    </div>
  </div>
</form>
<br>
<!-- users list start -->
<section class="app-user-list">
  <!-- users filter start -->

  <!-- users filter end -->
  <!-- list section start -->
  <div class="card">
    
    <div class="table table-responsive pt-0">

      <table class=" table">
        <thead class="thead-light">
          <tr>
            <th></th>
            <th>Name</th>
            <th>Gender</th>
            <th>Religion</th>
            <th>Disability Status</th>
            <th>Email</th>
            <!-- <th>Mobile No</th>
            <th>CNIC</th> -->
            <th>District</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($registered_youth as $youth)
          <tr>
            <td>{{$youth->id}}</td>
            <td>{{$youth->name}}</td>
            <td>{{$youth->gender}}</td>
            <td>{{$youth->religion}}</td>
            <td>{{$youth->disability_status}}</td>
            <td>{{$youth->email}}</td>
            <td>{{$youth->district}}</td>
            <td><a href="{{route('registered-youth.show', $youth->id)}}">Details</a></td>
            
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>


    <div class="row p-1">
      <div class="col-lg-12">
       @if($registered_youth instanceof \Illuminate\Pagination\AbstractPaginator)
       {!! $registered_youth->links() !!}
       @endif
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