@extends('layouts/contentLayoutMaster')

@section('title', 'Create Result')

@section('vendor-style')
{{-- Vendor Css files --}}

<link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
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


            <form action="{{ route('result.update', $result->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <!-- 
                <div class="form-group">
                    <label for="level">Select Level</label>
                    <select name="level_id" id="level" class="form-control">
                        <option value=""> -- Please Select -- </option>
                        @foreach ($levels as $level)
                            <option value="{{$level->id}}">{{$level->title}}</option>
                        @endforeach
                    </select>
                </div> -->


                @if($level)
                <input type="hidden" value="{{$result->level_id}}" name="level_id">
                <input type="hidden" value="{{$result->competition_sub_category_id}}" name="competition_sub_category_id">
                @endif
                <div class="form-group">
                    <label for="">District <span>*</span></label>
                    <select name="district_id" class="form-control district_lists" id="district_id" required>
                    </select>
                </div>

                <p><b>Move Participant to Next Level</b></p>
                <div class="form-group" id="level-group">
                    <label for="level">Level <span>*</span></label>
                    <select name="level" class="form-control" id="level">
                        <option value="-1"> -- Please Select -- </option>
                        <option value="0">Create new level</option>
                        @foreach ($levels as $event_level)
                        <option value="{{$event_level->id}}">{{$event_level->title}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group" id="new-level-group">
                    <label for="new_level">New Level Title</label>
                    <input type="text" class="form-control" id="new_level" name="new_level" placeholder="Title">
                </div>

                <div class="form-group" id="participant-group">
                    <label for="participant">Participant <span>*</span></label>
                    <select name="participant[]" class="form-control" id="participant" multiple>
                        <option value="">Select Participant</option>
                    </select>
                </div>

                <div class="form-group" id="app">
                    <label for="Logo">Upload Result</label>
                    {{ BsForm::media('result')->collection('result')->files($result->getMediaResource('result')) }}
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
<script src="{{ asset(mix('js/scripts/pages/app-slide-create.js')) }}"></script>
<script src="{{asset('js/scripts/level-form.js')}}"></script>
<script>
    $(document).ready(function() {

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
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


        $("#participant").select2({
            placeholder: 'Select Participant',
            closeOnSelect: false,
            allowHtml: true,
            allowClear: true,
            tags: true,
            ajax: {
                url: "{{route('getapplications')}}",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        _token: CSRF_TOKEN,
                        search: params.term,
                        event_id: "{{$result->competition_sub_category_id}}",
                        district_id: $('#district_id').val(),
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


    });
</script>
@endsection