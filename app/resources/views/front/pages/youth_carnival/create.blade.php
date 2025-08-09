@extends('front/layouts/layout')

@section('title', 'Organization Registration')
@section('content')
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')) }}">
<section class="d-block page-title-banner" style="background-image: url('{{ $pageData? $pageData->getFirstMediaUrl('banner'): '#'}}');">
    <div class="banner-overlay">
        <div class="custom-container">
            <div class="d-flex flex-column align-items-center justify-content-center title-con">
                <div>
                    <!-- <h1 class="page-title fw-bold">Project</h1> -->
                    <h1 class="page-title fw-bold d-block">{{$category->title?? 'Organization Registration'}}</h1>
                </div>

            </div>
            <!-- <div class="breadcrumbs-con">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{url('/')}}" class="text-decoration-none">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$category->title?? 'Page'}}</li>
                    </ol>
                </nav>
            </div> -->
        </div>
    </div>
</section>
<section class="news-page-details">
    <div class="custom-container">
        @if(Session::get('success'))
        <p class="p-2 text-center bg-success text-white">{{ Session::get('success') }}</p>
        @endif
        <div class="card">
            <div class="card-body" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;border:none;">
                <form action="{{route('youth-carnival.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Participant Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="{{old('name')}}">
                                @error('name')
                                <span><b style="color: red">{{$name}}</b></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="father_name">Father Name</label>
                                <input type="text" class="form-control" id="father_name" name="father_name" placeholder="Enter Father Name" value="{{old('father_name')}}">
                                @error('father_name')
                                <span><b style="color: red">{{$father_name}}</b></span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cnic_form_b">CNIC/ Form-B</label>
                                <input type="text" class="form-control" id="cnic_form_b" name="cnic_form_b" placeholder="Enter CNIC/ Form-B" value="{{old('cnic_form_b')}}">
                                @error('cnic_form_b')
                                <span><b style="color: red">{{$cnic_form_b}}</b></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                {!! Form::select('gender', [''=>'Select Gender','male'=>'Male','female'=>'Female'],[], array('class' => 'form-control')) !!}
                                @error('gender')
                                <span><b style="color: red">{{$gender}}</b></span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date_of_birth">Date of Birth</label>
                                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="Enter Date of Birth" value="{{old('date_of_birth')}}">
                                @error('date_of_birth')
                                <span><b style="color: red">{{$date_of_birth}}</b></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="district">District</label>
                                {!! Form::select('district', [''=>'Select District','peshawar'=>'Peshawar'],[], array('class' => 'form-control')) !!}
                                @error('district')
                                <span><b style="color: red">{{$district}}</b></span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="current_address">Current Address</label>
                                <textarea class="form-control" id="current_address" name="current_address" placeholder="Enter Current Address" value="{{old('current_address')}}"></textarea>
                                @error('current_address')
                                <span><b style="color: red">{{$current_address}}</b></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="permanent_address">Permanent Address</label>
                                <textarea class="form-control" id="permanent_address" name="permanent_address" placeholder="Enter Permanent Address" value="{{old('permanent_address')}}"></textarea>
                                @error('permanent_address')
                                <span><b style="color: red">{{$permanent_address}}</b></span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contact_number">Contact Number</label>
                                <input type="text" name="contact_number" id="contact_number" class="form-control" placeholder="Contact" value="{{old('contact_number')}}">
                                @error('contact_number')
                                <span><b style="color: red">{{$message}}</b></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="emergency_number">Emergency Number</label>
                                <input type="text" name="emergency_number" id="emergency_number" class="form-control" placeholder="Emergency Contact" value="{{old('emergency_number')}}">
                                @error('emergency_number')
                                <span><b style="color: red">{{$message}}</b></span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="{{old('email')}}">
                                @error('email')
                                <span><b style="color: red">{{$message}}</b></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="qualification">Qualification</label>
                                {!! Form::select('qualification', [''=>'Select Qualification','SSC'=>'SSC','HSSC'=>'HSSC'],[], array('class' => 'form-control')) !!}
                                @error('qualification')
                                <span><b style="color: red">{{$qualification}}</b></span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="occupation">Occupation </label>
                                <input type="text" name="occupation" id="occupation" class="form-control" placeholder="occupation" value="{{old('occupation')}}">
                                @error('occupation')
                                <span><b style="color: red">{{$occupation}}</b></span>
                                @enderror

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="organization">Name of Institute/organization</label>
                                <input type="text" name="organization" class="form-control" placeholder="organization" value="{{old('organization')}}">
                                @error('organization')
                                <span><b style="color: red">{{$message}}</b></span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="organization_near">Institute Near You</label>
                                <input type="text" name="organization_near" class="form-control" placeholder="organization near you" value="{{old('organization_near')}}">
                                @error('organization_near')
                                <span><b style="color: red">{{$message}}</b></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="categories">Mark the categories your applying for</label>
                                {!! Form::select('categories[]', [''=>'Select Categories','QIRAT/NAAT'=>'QIRAT/NAAT','SPEECH'=>'SPEECH'],[], array('class' => 'form-control','multiple')) !!}
                                @error('categories')
                                <span><b style="color: red">{{$categories}}</b></span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="website-link">From where did you hear about this event</label>
                                {!! Form::select('hear', [''=>'Select Categories','facebook'=>'facebook'],[], array('class' => 'form-control')) !!}
                                @error('hear')
                                <span><b style="color: red">{{$hear}}</b></span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <br>



                    <div class="row">
                        <div class="col-md-6 d-flex justify-content-end">
                            <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Captcha</label>
                                <div class="col-md-8">
                                    {!! app('captcha')->display() !!}
                                    @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary mt-5">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>

@endsection

@section('script')
{{-- vendor files --}}

{!! NoCaptcha::renderJs() !!}
<script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
<script>
    $(document).ready(function() {

        $('.datatable').DataTable();
    });
</script>
@endsection