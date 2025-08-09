@extends('layouts/contentLayoutMaster')

@section('title', 'Participant Detail')

@section('vendor-style')


@section('content')
<!-- Dashboard Ecommerce Starts -->
<section id="dashboard-ecommerce">

    <!--/ Statistics Card -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12 card">
                <table class="table">

                    <tbody>
                        <tr>
                            <td>Id</td>
                            <td>{{$participant-> id}}</td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>{{$participant-> name}}</td>
                        </tr>
                        <tr>
                            <td>Father_name</td>
                            <td>{{$participant-> father_name}}</td>
                        </tr>
                        <tr>
                            <td>Cnic_form_b</td>
                            <td>{{$participant-> cnic_form_b}}</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>{{$participant-> gender}}</td>
                        </tr>
                        <tr>
                            <td>Date_of_birth</td>
                            <td>{{$participant-> date_of_birth}}</td>
                        </tr>
                        <tr>
                            <td>Age</td>
                            <td>{{$participant-> age}}</td>
                        </tr>
                        <tr>
                            <td>Current_address</td>
                            <td>{{$participant-> current_address}}</td>
                        </tr>
                        <tr>
                            <td>Permanent_address</td>
                            <td>{{$participant-> permanent_address}}</td>
                        </tr>
                        <tr>
                            <td>Contact_number</td>
                            <td>{{$participant-> contact_number}}</td>
                        </tr>
                        <tr>
                            <td>Emergency_number</td>
                            <td>{{$participant-> emergency_number}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{$participant-> email}}</td>
                        </tr>
                        <tr>
                            <td>Qualification</td>
                            <td>{{$participant-> qualification}}</td>
                        </tr>
                        <tr>
                            <td>Occupation</td>
                            <td>{{$participant-> occupation}}</td>
                        </tr>
                        <tr>
                            <td>Institution</td>
                            <td>{{$participant-> institution}}</td>
                        </tr>

                        <tr>
                            <td>District_id</td>
                            <td>{{ $participant->district()->exists()? $participant->district->name : ''}}</td>
                        </tr>
                        <tr>
                            <td>Domicile</td>
                       
                            <td>{{ $participant->domicileOF()->exists()? $participant->domicileOF->name : ''}}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>{{$participant-> status}}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>





</section>
<!-- Dashboard Ecommerce ends -->
@endsection