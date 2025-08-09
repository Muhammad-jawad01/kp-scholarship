@extends('layouts/scholarshipLayout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Welcome, {{ $student->name }}!</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card border-primary">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">Profile Completion</h5>
                                    <div class="progress mb-2">
                                        <div class="progress-bar" role="progressbar"
                                            style="width: {{ $profileCompletion }}%"
                                            aria-valuenow="{{ $profileCompletion }}" aria-valuemin="0" aria-valuemax="100">
                                            {{ $profileCompletion }}%
                                        </div>
                                    </div>
                                    @if ($profileCompletion < 100)
                                        <p class="card-text">Complete your profile to apply for scholarships.</p>
                                        <a href="{{ route('student.profile') }}" class="btn btn-primary btn-sm">Complete
                                            Profile</a>
                                    @else
                                        <p class="card-text text-success">Your profile is complete!</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card border-success">
                                <div class="card-body">
                                    <h5 class="card-title text-success">Available Scholarships</h5>
                                    <h2 class="card-text">{{ $availableScholarships->count() }}</h2>
                                    <p class="card-text">scholarships available for application</p>
                                    <a href="{{ route('student.scholarships.index') }}" class="btn btn-success btn-sm">View
                                        Scholarships</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <h5>Your Applications</h5>
                            @if ($appliedScholarships->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Scholarship</th>
                                                <th>Applied Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($appliedScholarships as $application)
                                                <tr>
                                                    <td>{{ $application->scholarship->name }}</td>
                                                    <td>{{ $application->application_date ? $application->application_date->format('d M Y') : 'N/A' }}
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="badge bg-{{ $application->status === 'approved' ? 'success' : ($application->status === 'rejected' ? 'danger' : 'warning') }}">
                                                            {{ ucfirst($application->status) }}
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="alert alert-info">
                                    You haven't applied for any scholarships yet. <a
                                        href="{{ route('student.scholarships.index') }}">Browse available
                                        scholarships</a>.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
