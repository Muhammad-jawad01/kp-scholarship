@extends('layouts/contentLayoutMaster')

@section('title', 'Registered Youth Details')

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
  
    <h3 class="text-center bg-success text-white p-1">Personal Information</h3>

    <div class="table table-responsive pt-0">

      <table class=" table">
        <tbody>
            <tr>
                <th>Name</th>
                <td>{{$youth->name}}</td>
            </tr>
            <tr>
                <th>Gender</th>
                <td>{{$youth->gender}}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{$youth->email}}</td>
            </tr>
            <tr>
                <th>Mobile No</th>
                <td>{{$youth->mobile_no}}</td>
            </tr>
            <tr>
                <th>CNIC</th>
                <td>{{$youth->nic}}</td>
            </tr>
            <tr>
                <th>Domicile District</th>
                <td>{{$youth->district}}</td>
            </tr>
        </tbody>
      </table>

    </div>
  </div>

    <hr>
    <div class="row">
      <div class="col-12">
      <h3 class="text-center bg-success text-white p-1">Experience</h3>
          <div class="card"  id="experienceBody">
              <div class="card-header">

              </div>
              @forelse($experiences as $experience)
              <div class="card" id="experience_row_{{$experience->id}}">
                  <div class="card-header bg-info p-1 mb-1 text-white"><b>{{$experience->designation}}</b></div>
                  <div class="card-text pl-1 font-weight-bold">{{$experience->company}}</div>
                  <div class="card-text pl-1 font-weight-bold">{{$experience->starting_date}} - {{$experience->ending_date == '' ? 'Present' : $experience->ending_date}}</div>
                  <div class="card-body">{{$experience->description}}</div>
              </div>
              <hr>
              @empty
                  <div class="card" id="NoExperienceRow">
                      <div class="card-body">No Experience</div>
                  </div>
              @endforelse
          </div>
      </div>
    </div>

    <hr>
    <div class="card">
    <h3 class="text-center bg-success text-white p-1">Education</h3>
    <div class="table table-responsive pt-0">

      <table class=" table">
        <thead class="thead-light">
          <tr>
            <th></th>
            <th>Degree/Certificate</th>
            <th>University/Board</th>
            <th>Obtained Marks</th>
            <th>Total Marks</th>
            <th>Percentage</th>
          </tr>
        </thead>
        <tbody>
          @foreach($educations as $education)
          <tr>
            <td>{{$education->id}}</td>
            <td>{{$education->degree}}</td>
            <td>{{$education->university_board}}</td>
            <td>{{$education->obtained_marks}}</td> 
            <td>{{$education->total_marks}}</td> 
            <td>{{$education->percentage}}%</td> 
          </tr>
          @endforeach
        </tbody>
      </table>

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