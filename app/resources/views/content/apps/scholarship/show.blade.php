@extends('layouts/contentLayoutMaster')

@section('title', 'KPEF Scholarship Details')

@section('content')
    <div class="container">
        <h1>Scholarship Details</h1>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <p>{{ $scholarship->name ?: '' }}</p>
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <p>{{ $scholarship->slug }}</p>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <p>{{ $scholarship->description }}</p>
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <p>{{ $scholarship->year }}</p>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <p>{{ $scholarship->status }}</p>
        </div>

        <a href="{{ route('scholarship.edit', $scholarship->id) }}" class="btn btn-primary">Edit Scholarship</a>
    </div>
@endsection

@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset(mix('js/scripts/components/components-navs.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/pages/app-slide-create.js')) }}"></script>
@endsection
