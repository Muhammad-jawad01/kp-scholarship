@extends('layouts/contentLayoutMaster')

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
    <form action="">
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
                            <input type="text" class="form-control" name="university_name" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Father CNIC</label>
                            <input type="number" class="form-control" name="degree" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Profession</label>
                            <input type="text" class="form-control" name="campus" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Earning</label>
                            <input type="text" class="form-control" name="discipline" >
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="">If not Earning</label>
                            <input type="text" class="form-control" name="sub_discipline" >
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Father/Guardian</label>
                            <input type="text" class="form-control" name="program_duration" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Address of Employer</label>
                            <input type="text" class="form-control" name="current_semester" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Father/Guardian Designation  </label>
                            <input type="text" class="form-control" name="current_semester" >
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Financial Support other than father income</label>
                            <input type="text" class="form-control" name="program_duration" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Father/Guardian NTN Number and Tax paid</label>
                            <input type="text" class="form-control" name="current_semester" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Mother Status  </label>
                            <input type="text" class="form-control" name="current_semester" >
                        </div>
                    </div>
                    
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Mother Profession</label>
                            <input type="text" class="form-control" name="program_duration" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Professional Status</label>
                            <input type="text" class="form-control" name="current_semester" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Parent’s Marriage Relationship  </label>
                            <input type="text" class="form-control" name="current_semester" >
                        </div>
                    </div>
                    
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Mobile Number</label>
                            <input type="text" class="form-control" name="program_duration" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Telephone Number</label>
                            <input type="text" class="form-control" name="current_semester" >
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
                            <input type="text" class="form-control" name="name" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Dependent Family Members</label>
                            <input type="text" class="form-control" name="f_name" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Total Earning Member(s)</label>
                            <input type="text" class="form-control" name="guardian_name" >
                        </div>
                    </div>
                  
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Family Member(s) Studying</label>
                            <input type="text" class="form-control" name="name" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">No. of Brother(s)</label>
                            <input type="text" class="form-control" name="f_name" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">No. of Sister(s)</label>
                            <input type="text" class="form-control" name="guardian_name" >
                        </div>
                    </div>
                  
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Family Income</label>
                            <input type="text" class="form-control" name="name" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Income From Other Sources</label>
                            <input type="text" class="form-control" name="f_name" >
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

<!-- users edit ends -->
@endsection



@section('page-script')
{{-- Page js files --}}
<script src="{{ asset(mix('js/scripts/components/components-navs.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/pages/app-slide-create.js')) }}"></script>


@endsection