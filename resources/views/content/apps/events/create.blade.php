@extends('layouts/contentLayoutMaster')

@section('title', 'Create Event')

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

                <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="district">District</label>
                        <select name="district" id="district" class="form-control">
                            @foreach ($districts as $district)
                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                            @endforeach
                        </select>
                    </div>



                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title">
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
                            <option value=""> -- Please Select -- </option>
                            <option value="sports">Sports</option>
                            <option value="youth-affairs">Youth Affairs</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="audience">Audience</label>
                        <input type="text" class="form-control" id="audience" name="audience"
                            placeholder="Audience (strength)">
                    </div>
                    <div class="form-group">
                        <label for="participants">Participants</label>
                        <input type="text" class="form-control" id="participants" name="participants"
                            placeholder="Participants (strength)">
                    </div>
                    <div class="form-group">
                        <label for="venue">Venue</label>
                        <input type="text" class="form-control" id="venue" name="venue" placeholder="Venue">
                    </div>
                    <div class="form-group">
                        <label for="start">Date</label>
                        <input type="date" class="form-control" id="start" name="start">
                    </div>
                    <!-- <div class="form-group">
                        <label for="end">End Date</label>
                        <input type="date" class="form-control" id="end" name="end">
                    </div> -->

                    <div class="form-group" id="app">
                        <label for="Logo">Event Images</label>
                        {{ BsForm::media('event')->unlimited()->collection('event')->files() }}
                    </div>

                    <div class="form-group">
                        <label for="social_links">Social Links (If more than one, separate by comma.)</label>
                        <textarea class="form-control" name="social_links" id="" cols="30" rows="10"></textarea>
                    </div>

                    <div class="custom-control custom-switch custom-switch-primary">
                        <p class="mb-50">Status</p>
                        <input type="checkbox" name="status" class="custom-control-input" id="customSwitch10" />
                        <label class="custom-control-label" for="customSwitch10">
                            <span class="switch-icon-left"><i data-feather="check"></i></span>
                            <span class="switch-icon-right"><i data-feather="x"></i></span>
                        </label>
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

@endsection
