@extends('front/layouts/layout')

@section('title', 'Youth Carnival')
@section('content')
<link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
<x-inner-page-header page='youth-carnival' slug='youth-carnival' />
<style>
    .select2-selection__rendered {
        line-height: 32px !important;
    }

    .select2-selection {
        height: 36px !important;
    }

    .error {
        color: red;
    }
</style>
<section class="contact-us">
    <div class="custom-container">

        {{-- Form Start --}}

        <div class="row">

            <div class="col-sm-12 col-md-10 offset-md-1 col-lg-10 offset-lg-1 col-xl-10 offset-xl-1 p-4">
                <form action="{{route('youth-carnival.store')}}" method="POST" class="confitation" id="participant">
                    @csrf

                    {{-- First Step --}}
                    <fieldset>
                        {{-- Personal info --}}
                        <a href="{{url('youth/carnival/result')}}" class="btn-bg gradient-bg">Result</a>
                        <h4 class="mt-3">Personal information</h4>
                        <div class="row">

                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="">Name <span>*</span></label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}" placeholder="Enter your name"  required />
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="">Father/Guardian name <span>*</span></label>
                                    <input type="text" class="form-control" name="father_name" value="{{old('father_name')}}" placeholder="Enter father/guardian name" required />
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="cnic">CNIC/B Form (Without dashes) <span id="cnicError">*</span></label>
                                    <input class="form-control" type="text" pattern="[0-9]{13}" name="cnic_form_b" id="cnic" placeholder="CNIC/B Form (Without dashes)" value="{{old('cnic_form_b')}}" required>
                                </div>
                            </div>


                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="">Date of birth <span>*</span></label>
                                    <input type="date" id="dob" class="form-control" max="{{ now()->subYears(15)->toDateString('Y-m-d') }}" min="{{ now()->subYears(29)->toDateString('Y-m-d') }}" name="date_of_birth" placeholder="Select date of birth" required>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="">Age <span>*</span></label>
                                    <input type="number" id="age" class="form-control" name="age" readonly placeholder="Enter your age" required>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="">Gender <span>*</span></label> <br />
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male" checked>
                                        <label class="form-check-label" for="inlineRadio1">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female">
                                        <label class="form-check-label" for="inlineRadio2">Female</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="Other">
                                        <label class="form-check-label" for="inlineRadio3">Other</label>
                                    </div>
                                </div>
                            </div>

                        </div>

                        {{-- Contact info --}}

                        <h4 class="mt-3">Contact information</h4>

                        <div class="row">

                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="">Mobile number <span>*</span></label>
                                    <input type="number" class="form-control" name="contact_number" placeholder="Enter your mobile number" value="{{old('contact_number')}}" required>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="">Emergency contact number <span>*</span></label>
                                    <input type="number" class="form-control" name="emergency_number" placeholder="Enter emergency contact number" value="{{old('emergency_number')}}" required>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="">Email address <span>*</span></label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter your email address" value="{{old('email')}}" required>
                                </div>
                            </div>


                        </div>

                        {{-- Address info --}}
                        <h4 class="mt-3">Address</h4>

                        <div class="row">

                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="">District <span>*</span></label>
                                    <select name="district_id" class="form-control district_lists" id="" required>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="">Domicile <span>*</span></label>
                                    <select name="domicile" class="form-control" id="domicile" required>
                                        <option value="">Select Domicile</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="">Current Address <span>*</span></label>
                                    <textarea name="current_address" class="form-control" id="" cols="30" rows="3" placeholder="Enter your current address" required>
                                        {{old('current_address')}}
                                    </textarea>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="">Permanent Address <span>*</span></label>
                                    <textarea name="permanent_address" class="form-control" id="" cols="30" rows="3" placeholder="Enter your permanent address" required>
                                        {{old('permanent_address')}}
                                    </textarea>
                                </div>
                            </div>

                        </div>

                        {{-- Education info --}}
                        <h4 class="mt-3">Education information</h4>

                        <div class="row">

                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="">Qualification <span>*</span></label>
                                    @php
                                    $qualificationArr=Helper::getModelSelect('DegreeCertificate',['name','id']);
                                    $qualificationArr= $qualificationArr->toArray();
                                    $qualificationArr[0]='Not applicable';
                                    ksort($qualificationArr);
                                    @endphp
                                    {!! Form::select('qualification', $qualificationArr,old('qualification')?? -1, array('class' => 'form-control')) !!}

                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="">Institution name <span>*</span></label>
                                    <input type="text" name="institution" class="form-control" placeholder="Enter your institution name" value="{{old('institution')}}" required>
                                </div>
                            </div>

                        </div>
                        <div class="btn-div">
                            <!-- <button class="btn-outline" type="button">Cancel</button> -->
                            <button class="btn-bg gradient-bg next action-button" id="nextbtn" type="button">Next</button>
                        </div>

                    </fieldset>


                    {{-- Second Step --}}
                    <fieldset>

                        {{-- Education info --}}
                        <h4 class="mt-3">Activities</h4>
                        <p>You can select up to five categories.</p>
                        <div class="add_row_div">


                            @foreach($categories as $key=> $category)
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="">Category <span>*</span></label>
                                        <input type="hidden" name="categories[]" value="{{$category->id}}">
                                        <input type="text" class="form-control" value="{{$category->title}}" style="font-weight: bold" readonly>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 categoy-col">
                                    <div class="form-group" style="width:80%;">
                                        <label for="">Events <span>*</span></label>
                                        <select name="events[{{$category->id}}][]" class="form-control" id="">
                                            <option value="">Select sub category</option>
                                            @foreach($category->events as $event)
                                            <option value="{{$event->id}}">{{$event->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>


                            @endforeach
                        </div>
                        <!-- <div class="row">

                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <button class="add_row_btn" type="button">+ Add another category</button>
                            </div>
                        </div> -->

                        <h4 class="mt-3">Choose any one from Divisional Level Activities</h4>


                        <div class="row">

                            @foreach ($divisionalActivities as $activity)
                            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="divisional_activity" value="{{$activity->id}}" id="divisional_{{$activity->id}}">
                                        <label class="form-check-label" for="divisional_{{$activity->id}}">
                                            {{$activity->title}}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <!-- <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDisabled">
                                        <label class="form-check-label" for="flexCheckDisabled">
                                            Open MIC
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDisabled">
                                        <label class="form-check-label" for="flexCheckDisabled">
                                            Mentalist
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDisabled">
                                        <label class="form-check-label" for="flexCheckDisabled">
                                            Skilled Labor
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDisabled">
                                        <label class="form-check-label" for="flexCheckDisabled">
                                            Fashion Expo
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDisabled">
                                        <label class="form-check-label" for="flexCheckDisabled">
                                            Market Place
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDisabled">
                                        <label class="form-check-label" for="flexCheckDisabled">
                                            Magic Tricks
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDisabled">
                                        <label class="form-check-label" for="flexCheckDisabled">
                                            Extraordinary Talent
                                        </label>
                                    </div>
                                </div>
                            </div>
 -->

                        </div>


                        <div class="btn-div">
                            <button class="btn-outline previous action-button-previous" type="button">Back</button>
                            <button class="btn-bg gradient-bg">Submit form</button>
                        </div>

                    </fieldset>

                </form>
            </div>
        </div>
        {{-- Form End --}}

    </div>
</section>

@endsection

@section('script')
{{-- Page js files --}}
<script src="{{ asset('step.js') }}"></script>
<script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
<script src="{{asset(mix('vendors/js/forms/validation/jquery.validate.min.js'))}}"></script>
<script>
    $(document).ready(function() {

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $("#dob").change(function() {
            var today = new Date();
            var birthDate = new Date($('#dob').val());
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }

            $('#age').val(age);
        });

        $("#cnic").on('change', function() {
            var cnic = $(this).val();
            $.ajax({
                type: 'POST',
                url: '{{route("check_cnic")}}',
                data: {
                    '_token': CSRF_TOKEN,
                    'cnic': cnic,
                },
                success: function(data) {
                    if (data.response == 'fail') {
                        $('#nextbtn').attr("disabled", false);
                        $("#cnicError").html("*");
                    } else {
                        $("#cnicError").html("Cnic Already exists");
                        $('#nextbtn').attr("disabled", true);
                    }
                }
            });
        })


        $(".district_lists").select2({
            placeholder: 'Select District',
            ajax: {
                url: "{{route('getDistrict')}}",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        _token: CSRF_TOKEN,
                        search: params.term // search term
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }

        });


        $("#domicile").select2({
            placeholder: 'Select Domicile District',
            ajax: {
                url: "{{route('getDistrict')}}",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        _token: CSRF_TOKEN,
                        search: params.term // search term
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }

        });


        $('.add_row_btn').click(function() {

            $('.add_row_div').append(`
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Category <span>*</span></label>
                            <select name="" class="form-control categories_list" id="">
                                <option value="">Select Category</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6 categoy-col">
                        <div class="form-group" style="width:75%;">
                            <label for="">Sub category <span>*</span></label>
                            <select name="" class="form-control" id="">
                                <option value="">Select sub category</option>
                            </select>
                        </div>
                        <i class="fa fa-times remove-btn"></i>
                    </div>
                    </div>
                `);
            initailizeSelect2();
            // Remove Row
            $(".remove-btn").click(function() {
                $(this).closest('.row').remove();
            });
        });




    });
</script>




@endsection