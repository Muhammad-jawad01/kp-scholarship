@extends('front/layouts/layout')
@section('title', 'Search Results')
@section('content')
    <div class="container py-5">
        <h2 class="mb-4">Search Results</h2>
        @forelse($results as $scholarship)
            <div class="card mb-3">
                <div class="card-body">
                    <h5>{{ $scholarship->title }}</h5>
                    <p>{{ $scholarship->description }}</p>
                    <a href="{{ route('scholarship.details', $scholarship->id) }}" class="btn btn-primary">Details</a>
                </div>
            </div>
        @empty
            <p>No scholarships found.</p>
        @endforelse
    </div>
@endsection
