@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Hospital')

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

      <form action="{{ route('hospitals.update', $hospital->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" placeholder="Name" value="{{$hospital->name}}">
        </div>


        <div class="form-group">
          <label for="phone">phone</label>
          <input type="number" class="form-control" name="phone" placeholder="Phone Number " value="{{$hospital->phone}}">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" placeholder="Email " value="{{$hospital->email}}">
        </div>
        <div class="form-group">
          <label for="lat">Enter latitude</label>
          <input type="text" class="form-control" name="lat" placeholder="Enter latitude" value="{{$hospital->lat}}">
        </div>

        <div class="form-group">
          <label for="lng">Enter longtitude</label>
          <input type="text" class="form-control" name="lng" placeholder="Enter longtitude" value="{{$hospital->lng}}">
        </div>


        <div class="form-group">
          <label for="basicSelect">Category</label>
          {!! Form::select('category_id', \Helper::getCategoryTypes('hospital'),$hospital->category_id, array('class' => 'form-control')) !!}
        </div>


        <div class="form-group">
          <label for="basicSelect">District</label>
          {!! Form::select('district_id', $districts,$hospital->district_id, array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
          <label for="address">Address</label>
          <textarea class="form-control" name="address">{{$hospital->address}}</textarea>
        </div>
        <div class="form-group">

          <div class="custom-control custom-switch custom-switch-primary">
            <p class="mb-50">Status</p>
            <input type="checkbox" name="status" class="custom-control-input" id="customSwitch10" {{$hospital->status==true? 'checked': ''}} />
            <label class="custom-control-label" for="customSwitch10">
              <span class="switch-icon-left"><i data-feather="check"></i></span>
              <span class="switch-icon-right"><i data-feather="x"></i></span>
            </label>
          </div>

        </div>





        <div class="form-group" id="app">
          <label for="Logo">Icon/Image</label>
          {{ BsForm::image('hospital')->collection('hospital')->files($hospital->getMediaResource('hospital')) }}

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