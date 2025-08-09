@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Page')

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

      <form action="{{ route('pages.update', $page->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf


        <div class="form-group">
          <label for="banner_title">Banner Title</label>
          <input type="text" class="form-control" id="banner_title" value="{{$page->banner_title}}" name="banner_title" placeholder="Banner Title" required>
        </div>


        <div class="form-group">
          <label for="name">Title</label>
          <input type="text" class="form-control" id="title" name="title" placeholder="title" value="{{$page->title}}" required>
        </div>

        <div class="form-group">
          <label for="slogan">Slogan (Optional)</label>
          <input type="text" class="form-control" id="slogan" name="slogan" value="{{$page->slogan}}" placeholder="slogan">
        </div>

        <div class="form-group">
          <label for="image_caption">Image Caption (if any)</label>
          <textarea class="form-control" id="image_caption" name="image_caption">
          {{$page->image_caption}}
          </textarea>
        </div>
        <div class="form-group">
          <label>Description</label>
          <div id="snow-wrapper">
            <div id="full-container">
              <div class="editor pb-5">
                {!!$page->description!!}
              </div>
            </div>
          </div>
          <input type="hidden" name="description" id="description" value="{{$page->description}}" />
        </div>

        <div class="form-group row" id="app">

          {{ BsForm::image('banner')->label('Banner Image')->collection('banner')->files($page->getMediaResource('banner')) }}
          {{ BsForm::image('page')->label('Other Image IF Any')->collection('page')->files($page->getMediaResource('page')) }}
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