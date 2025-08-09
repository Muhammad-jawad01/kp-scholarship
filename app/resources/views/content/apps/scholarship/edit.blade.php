@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Scholarship')

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
    <style>
        .table td,
        .table th {
            padding: 0.52rem 5px !important;
        }

        .table th {
            text-align: center;
        }
    </style>
@endsection

@section('content')

    <div class="container">
        <div class="card">
            <div class=" mx-3">
                <h1 class="mt-3">Edit Scholarship</h1>
                <form method="POST" action="{{ route('admin.scholarship.update', $scholarship->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $scholarship->name }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug"
                                    value="{{ $scholarship->slug }}" required>
                            </div>
                        </div>
                        <div class="col-md-12">


                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4" required>{{ $scholarship->description }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">


                            <div class="mb-3">
                                <label for="year" class="form-label">Year</label>
                                <input type="date" class="form-control" id="year" name="year"
                                    value="{{ $scholarship->year }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="mb-3">
                                <div class="custom-control custom-switch custom-switch-primary">
                                    <p class="mb-50">Status</p>
                                    <input type="checkbox" name="status" class="custom-control-input" id="customSwitch10"
                                        @if ($scholarship->status === 'active') checked @endif />
                                    <label class="custom-control-label" for="customSwitch10">
                                        <span class="switch-icon-left"><i data-feather="check"></i></span>
                                        <span class="switch-icon-right"><i data-feather="x"></i></span>
                                    </label>
                                </div>

                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mb-4">Update Scholarship</button>

                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset(mix('js/scripts/components/components-navs.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/pages/app-slide-create.js')) }}"></script>
@endsection
