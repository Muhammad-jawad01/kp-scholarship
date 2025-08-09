@extends('layouts/youthLayout')

@section('title', 'My CV')
@section('content')
<!-- vendor css files -->
<link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/wizard/bs-stepper.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-wizard.css')) }}">
<div class="content-wrapper">
    <div class="content-body">
        <h3 class="text-center bg-success text-white p-1">Personal Information</h3>
        <div class="table table-responsive pt-0">

      <table class="table">
        <tbody>
            <tr>
                <th>Name</th>
                <td>{{$personal_info->name}}</td>
            </tr>
            <tr>
                <th>Gender</th>
                <td>{{$personal_info->gender}}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{$personal_info->email}}</td>
            </tr>
            <tr>
                <th>Mobile No</th>
                <td>{{$personal_info->mobile_no}}</td>
            </tr>
            <tr>
                <th>CNIC</th>
                <td>{{$personal_info->nic}}</td>
            </tr>
            <tr>
                <th>Domicile District</th>
                <td>{{$personal_info->district}}</td>
            </tr>
        </tbody>
      </table>

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
    <!-- ======== Old Layout ============ -->
    <!-- <h3 class="text-center bg-success text-white p-1">Experience</h3>
    <div class="table table-responsive pt-0">

      <table class=" table">
        <thead class="thead-light">
          <tr>
            <th></th>
            <th>Company</th>
            <th>Designation</th>
            <th>Starting Date</th>
            <th>Ending Date</th>
          </tr>
        </thead>
        <tbody>
          @foreach($experiences as $experience)
          <tr>
            <td>{{$experience->id}}</td>
            <td>{{$experience->company}}</td>
            <td>{{$experience->designation}}</td>
            <td>{{$experience->starting_date}}</td> 
            <td>{{$experience->ending_date == '' ? 'Present' : $experience->ending_date}}</td> 
          </tr>
          @endforeach
        </tbody>
      </table>

    </div> -->

    <hr>
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
          @forelse($educations as $education)
          <tr>
            <td>{{$education->id}}</td>
            <td>{{$education->name}}</td>
            <td>{{$education->university_board}}</td>
            <td>{{$education->obtained_marks}}</td> 
            <td>{{$education->total_marks}}</td> 
            <td>{{$education->percentage}}%</td> 
          </tr>
          @empty
          <tr>
            <td>No Education</td>
          </tr>
          @endforelse
        </tbody>
      </table>

    </div>
    </div>
@endsection