@extends('layouts/scholarshipLayout')

@section('title', 'KPEF Scholarship Form')

@section('vendor-style')
{{-- Vendor Css files --}}

<link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/katex.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/monokai-sublime.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/quill.snow.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/quill.bubble.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-quill-editor.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-user.css')) }}">
@endsection

@section('content')
<!-- users edit start -->
    <div class="card">
        <form action="{{route('familyinfo.store')}}" method="POST">
            @csrf <!-- {{ csrf_field() }} -->
            <div class="row">
                <div class="col-md-11 mx-auto">
                    {{-- mian form --}}

                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="content-header-title border-0 my-2">Family information</h2>
                            <hr />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Father Status</label>
                                {{-- <input type="text" class="form-control" name="father_status" > --}}
                                {!! Form::select('father_status', \Helper::father_status(),$model->father_status ??"", array('class' => 'form-control')) !!}

                                {{-- <select class="form-select form-control" name="father_status">

                                    <option value="Alive">Alive</option>
                                    <option value="Not Alive">Not Alive</option>

                                </select> --}}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Father CNIC</label>
                                <input type="number" class="form-control" name="father_cnic" value="{{$model->father_cnic ?? ""}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Profession</label>
                                <input type="text" class="form-control" name="father_profession" value="{{$model->father_profession ?? ""}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Earning</label>
                                {{-- <input type="text" class="form-control" name="father_earning" > --}}
                                {{-- <select class="form-select form-control" name="father_earning">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>


                                </select> --}}
                                {!! Form::select('father_earning', \Helper::father_earning(),$model->father_earning ??"", array('class' => 'form-control')) !!}

                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">If not Earning</label>
                                <input type="text" class="form-control" name="father_guardian"  value="{{$model->father_guardian ?? ""}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Father/Guardian</label>
                                <input type="text" class="form-control" name="employer_address" value="{{$model->employer_address ?? ""}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Address of Employer</label>
                                <input type="text" class="form-control" name="father_guardian_designation" value="{{$model->father_guardian_designation ?? ""}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Father/Guardian Designation  </label>
                                <input type="text" class="form-control" name="father_guardian_designation" value="{{$model->father_guardian_designation ?? ""}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Financial Support other than father income</label>
                                <input type="text" class="form-control" name="financial_support" value="{{$model->financial_support ?? ""}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Father/Guardian NTN Number and Tax paid</label>
                                <input type="text" class="form-control" name="father_ntn_number" value="{{$model->father_ntn_number ?? ""}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Mother Status  </label>
                                {{-- <input type="text" class="form-control" name="mother_status" > --}}
                                {{-- <select class="form-select form-control" name="mother_status">
                                    <option value="Alive">Alive</option>
                                    <option value="Not Alive">Not Alive</option>

                                </select> --}}
                                {!! Form::select('mother_status', \Helper::mother_status(),$model->mother_status ??"", array('class' => 'form-control')) !!}

                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Mother Profession</label>

                                {{-- <input type="text" class="form-control" name="mother_profession" > --}}
                                {{-- <select class="form-select form-control" name="mother_profession">
                                    <option value="House wife">House wife</option>
                                    <option value="Working Women">Working Women</option>

                                </select> --}}
                                {!! Form::select('mother_profession', \Helper::mother_profession(),$model->mother_profession ??"", array('class' => 'form-control')) !!}

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Professional Status</label>
                                <input type="text" class="form-control" name="professional_status" value="{{$model->professional_status ?? ""}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Parent’s Marriage Relationship  </label>
                                {{-- <input type="text" class="form-control" name="parent_marriage_relationship" > --}}
                                {{-- <select class="form-select form-control" name="parent_marriage_relationship" >
                                    <option selected>Select Option</option>
                                    <option value="Divorced">Divorced</option>
                                    <option value="Married">Married</option>
                                </select> --}}
                                {!! Form::select('parent_marriage_relationship', \Helper::parent_marriage_relationship(),$model->parent_marriage_relationship ??"", array('class' => 'form-control')) !!}

                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Mobile Number</label>
                                <input type="text" class="form-control" name="mobile_number"  value="{{$model->mobile_number ?? ""}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Telephone Number</label>
                                <input type="text" class="form-control" name="telephone_number" value="{{$model->telephone_number ?? ""}}">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="content-header-title border-0 my-1">Family Members</h2>
                            <hr />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Total Family Members</label>
                                <input type="number" class="form-control" name="total_family_members" value="{{$model->total_family_members ?? ""}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Dependent Family Members</label>
                                <input type="number" class="form-control" name="dependent_family_members" value="{{$model->dependent_family_members ?? ""}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Total Earning Member(s)</label>
                                <input type="number" class="form-control" name="total_earning_members" value="{{$model->total_earning_members ?? ""}}">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Family Member(s) Studying</label>
                                <input type="number" class="form-control" name="family_members_studying"  value="{{$model->family_members_studying ?? ""}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">No. of Brother(s)</label>
                                <input type="number" class="form-control" name="num_of_brothers" value="{{$model->num_of_brothers ?? ""}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">No. of Sister(s)</label>
                                <input type="number" class="form-control" name="num_of_sisters"  value="{{$model->num_of_sisters ?? ""}}">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Family Income</label>
                                <input type="number" class="form-control" name="family_income"  value="{{$model->family_income ?? ""}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Income From Other Sources</label>
                                <input type="number" class="form-control" name="income_from_other_sources" value="{{$model->income_from_other_sources ?? ""}}">
                            </div>
                        </div>


                    </div>


                    <div class="row">
                        <div class="col-md-4 mx-auto my-3">
                           <button class="btn btn-success  btn-block">Submit</button>
                        </div>
                    </div>


                    {{-- ./ mian form --}}

                </div>
            </div>
        </form>
    </div>

<!-- users edit ends -->
@endsection



@section('page-script')
{{-- Page js files --}}
<script src="{{ asset(mix('js/scripts/components/components-navs.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/pages/app-slide-create.js')) }}"></script>


@endsection
