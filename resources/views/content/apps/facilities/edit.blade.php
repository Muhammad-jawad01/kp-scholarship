@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Facility')

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

            <form action="{{ route('facilities.update', $facility->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="district">District</label>
                    <select name="district_id" id="district" class="form-control">
                        <option value="{{$district->id}}">{{$district->name}}</option>
                        @foreach ($districts as $district)
                            <option value="{{$district->id}}">{{$district->name}}</option>
                        @endforeach
                    </select>
                </div>

                @php
                    $facilityTypes = Helper::facilityTypes();
                @endphp

                <div class="form-group">
                    <label for="type">Type</label>
                    {!! Form::select('type', $facilityTypes, $facility->type, array('class' => 'form-control')) !!}
                </div>

                <div class="form-group">
                    <label for="facility">Title</label>
                    <input type="text" class="form-control" id="facility" name="facility" value="{{$facility->facility}}" placeholder="Title">
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

                <div class="form-group">
                    <label for="latitude">Latitude</label>
                    <input type="text" class="form-control" id="latitude" name="latitude" value="{{$facility->latitude}}" placeholder="GPS Coordinate (Latitude)">
                </div>
                <div class="form-group">
                    <label for="longitude">Longitude</label>
                    <input type="text" class="form-control" id="longitude" name="longitude" value="{{$facility->longitude}}" placeholder="GPS Coordinate (Longitude)">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{$facility->address}}" placeholder="Address">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{$facility->phone}}" placeholder="Phone">
                </div>

                <div class="form-group" id="app">
                    <label for="Logo">Facility images</label>
                    {{ BsForm::media('facility')->unlimited()->collection('facility')->files($facility->getMediaResource('facility')) }}
                </div>

                <div class="custom-control custom-switch custom-switch-primary">
                    <p class="mb-50">Status</p>
                    <input type="checkbox" name="status" class="custom-control-input" {{$facility->is_deleted ? '' : 'checked'}} id="customSwitch10" />
                    <label class="custom-control-label" for="customSwitch10">
                        <span class="switch-icon-left"><i data-feather="check"></i></span>
                        <span class="switch-icon-right"><i data-feather="x"></i></span>
                    </label>
                </div>

                <button type="submit" class="btn btn-primary float-right">Update</button>
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
<script src="{{ asset(mix('js/scripts/pages/app-slide-create.js')) }}"></script>

@endsection