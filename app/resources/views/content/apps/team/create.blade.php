@extends('layouts/contentLayoutMaster')

@section('title', 'Create Slide')

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
<section class="app-user-edit">
    <div class="card">
        <div class="card-body">

            <form action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="designation">Designation</label>
                    <input type="text" class="form-control" id="designation" placeholder="Designation" value="" name="designation" />
                </div>
                <div class="form-group">
                    <label for="account-phone">Phone</label>
                    <input type="text" class="form-control" id="account-phone" placeholder="Phone number" value="" name="phone" />
                </div>

                <div class="form-group">
                    <label for="basicSelect">Type</label>
                    {!! Form::select('type', \Helper::teamTypes(),null, array('class' => 'form-control')) !!}
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <div id="snow-wrapper">
                        <div id="full-container">
                            <div class="editor pb-5">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="description" id="description" />
                </div>

                <div class="form-group" id="app">
                    <label for="Logo">Profile Image</label>
                    {{ BsForm::image('team')->collection('team')->files() }}

                </div>
                <div class="form-group">
                    <div class="custom-control custom-switch custom-switch-primary">
                        <p class="mb-50">Status</p>
                        <input type="checkbox" name="status" class="custom-control-input" id="customSwitch10" />
                        <label class="custom-control-label" for="customSwitch10">
                            <span class="switch-icon-left"><i data-feather="check"></i></span>
                            <span class="switch-icon-right"><i data-feather="x"></i></span>
                        </label>
                    </div>
                </div>

                <div class="row">
                    <!-- social header -->
                    <div class="col-12">
                        <div class="d-flex align-items-center mb-2">
                            <i data-feather="link" class="font-medium-3"></i>
                            <h4 class="mb-0 ml-75">Social Links</h4>
                        </div>
                    </div>
                    <!-- twitter link input -->
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="account-twitter">Twitter</label>
                            <input type="text" id="account-twitter" name="twitter" class="form-control" placeholder="Add link" value="https://www.twitter.com" />
                        </div>
                    </div>
                    <!-- facebook link input -->
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="account-facebook">Facebook</label>
                            <input type="text" id="account-facebook" name="facebook" class="form-control" placeholder="Add link" />
                        </div>
                    </div>
                    <!-- divider -->
                    <div class="col-12">
                        <hr class="my-2" />
                    </div>



                </div>










                <button type="submit" class="btn btn-primary float-right">Create</button>
            </form>
        </div>
    </div>
</section>
<!-- users edit ends -->
@endsection

@section('vendor-script')
{{-- Vendor js files --}}
<script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/editors/quill/katex.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/editors/quill/highlight.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/editors/quill/quill.min.js')) }}"></script>
@endsection

@section('page-script')
{{-- Page js files --}}

<script src="{{ asset(mix('js/scripts/components/components-navs.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/pages/app-team-create.js')) }}"></script>

@endsection