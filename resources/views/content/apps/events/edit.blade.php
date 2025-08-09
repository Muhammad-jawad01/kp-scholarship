@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Event')

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

            <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
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

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$event->title}}" placeholder="Title">
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
                    <label for="event_category">Event Category</label>
                    <select name="event_category" id="" class="form-control">
                        @if($event->event_category == 'sports')
                            <option value="sports">Sports</option>
                            <option value="youth-affairs">Youth Affairs</option>
                        @else
                            <option value="youth-affairs">Youth Affairs</option>
                            <option value="sports">Sports</option>
                        @endif
                       
                    </select>
                </div>

                <div class="form-group">
                    <label for="audience">Audience</label>
                    <input type="text" class="form-control" id="audience" name="audience" value="{{$event->audience}}" placeholder="Audience (strength)">
                </div>
                <div class="form-group">
                    <label for="participants">Participants</label>
                    <input type="text" class="form-control" id="participants" name="participants" value="{{$event->participants}}" placeholder="Participants (strength)">
                </div>
                <div class="form-group">
                    <label for="venue">Venue</label>
                    <input type="text" class="form-control" id="venue" name="venue" value="{{$event->venue}}" placeholder="Venue">
                </div>
                <div class="form-group">
                    <label for="start">Start Date</label>
                    <input type="date" class="form-control" id="start" name="start" value="{{$event->start}}">
                </div>

                <div class="form-group" id="app">
                    <label for="Logo">Event images</label>
                    {{ BsForm::media('event')->unlimited()->collection('event')->files($event->getMediaResource('event')) }}
                </div>

                <div class="form-group">
                    <label for="social_links">Social Links (If more than one, separate by comma.)</label>
                    <textarea class="form-control" name="social_links" id="" cols="30" rows="10">
                        @foreach($eventLinks as $link)
                            {{ $link . ','}}
                        @endforeach
                    </textarea>
                </div>

                <div class="custom-control custom-switch custom-switch-primary">
                    <p class="mb-50">Status</p>
                    <input type="checkbox" name="status" class="custom-control-input" {{$event->is_deleted ? '' : 'checked'}} id="customSwitch10" />
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