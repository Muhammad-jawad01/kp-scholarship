@extends('layouts/scholarshipLayout')

@section('title', 'KP Scholarship Apply')

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
        .top-heading {
            font-size: 16px;
            margin: 30px 0;
            line-height: 35px;
            background: #eee;
            padding: 10px;
        }

        .top-heading strong {
            margin: 0 10px;
        }

        ol li {
            margin: 10px 0;
        }
    </style>
@endsection

@section('content')
    <!-- users edit start -->
    <div class="card">
        <form id="submitForm" action="{{ route('scholarship.store') }}" method="POST">
            @csrf <!-- {{ csrf_field() }} -->
            <div class="row">
                <div class="col-md-11 mx-auto">
                    {{-- mian form --}}

                    <div class="row">

                        <div class="col-md-12">
                            <div class="container mt-2">
                                <h2 class="text-center">Deed of Agreement</h2>
                                <h4 class="text-center">For Undertaking a Course of Studies</h4>
                                <h4 class="text-center">Under the Scheme "KPEF Needs Based Scholarship Program"</h4>

                                <p class="top-heading">I <strong>{{ Auth()->user()->name }}</strong> son/daughter of
                                    <strong>{{ Auth()->user()->father_name }} </strong> Computerized CNIC No
                                    <strong>{{ Auth()->user()->nic }}</strong>
                                    solemnly declare that:
                                </p>


                                <p>I have neither joined nor being paid by any other scholarship / subsistence allowance.
                                </p>
                                <p> I have neither joined nor shall join any other institution during the course of my
                                    studies at [University Name].</p>
                                <p> I understand that the University may vary or reverse any decision made on the basis of
                                    incorrect or incomplete information which I have provided.</p>
                                <p> I have read and understood the University's cancellation and refund policy.</p>
                                <p> I understand that the University may obtain official records from any organization or
                                    educational institution I have previously attended.</p>
                                <div class="form-group">
                                    <label>
                                        I undertake to:
                                    </label>
                                    <ol>
                                        <li>It is solemnly affirmed that I have read and understood the conditions of the
                                            award of this Financial Assistance / Scholarship & that the decision of KPEF
                                            Coordination Committee would be final and binding.</li>
                                        <li>I accept as binding on me as long as I am a student, all rules and regulations
                                            in force.</li>
                                        <li>In the event any information contained herein found to be untrue, I shall be
                                            liable to disciplinary action, which may result in termination of my Scholarship
                                            / candidature and recovery of the full amount spent on me in connection with
                                            this award.</li>
                                    </ol>
                                </div>

                                <div style="display: flex;justify-content:space-between;align-items:center; padding:30px;">
                                    <p><strong> {{ Auth()->user()->name }} {{ Auth()->user()->nic }} </strong> &nbsp; <br>
                                        Signature of Applicant </p>
                                    <p> <strong>{{ Auth()->user()->father_name }}</strong> &nbsp; <br> Signature of
                                        Parent/Guardian</p>
                                    <p> <strong> {{ now()->format('M-d-Y') }}</strong> &nbsp; <br> Date</p>

                                </div>
                            </div>
                        </div>

                    </div>
                    {{-- @dump($data) --}}



                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Scholarship</label>
                                <select name="scholarship_id" class="form-control" id="exampleFormControlSelect1">
                                    @foreach ($scholarship as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" class="form-control" name="myNumber" id="myNumber"
                                    value="{{ json_encode($data) }}">


                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label for="">Applied for year</label>

                                <input type="number" class="form-control" value="2023" id="applied_year"
                                    name="applied_year" min="2023" max="2100" required>
                            </div>
                        </div>

                    </div>


                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="checkbox" id="myCheckbox" name="terms_conditions">
                            <label> I agree to the Terms and Conditions</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mx-auto my-3 " id="myButton">
                            <button type="button" id="applybtn" onclick='cc();'
                                class="btn btn-success btn-block">Submit</button>

                        </div>
                    </div>
                </div>
        </form>
    </div>

    <!-- users edit ends -->
@endsection

@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset(mix('js/scripts/components/components-navs.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/pages/app-slide-create.js')) }}"></script>
@endsection

@push('scripts')
    <script>
        // function cc() {
        //     var form = $('#submitForm'); // Store the form element
        //     var formData = form.serialize(); // Serialize the form data

        //     Swal.fire({
        //         title: 'Do you want to print the form?',
        //         showCancelButton: true,
        //         confirmButtonText: 'Yes, print it',
        //         cancelButtonText: 'No, return to dashboard',
        //         icon: 'question'
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             // If user confirms, proceed with AJAX form submission
        //             console.log(result.isConfirmed);

        //             $.ajax({
        //                 type: "POST",
        //                 url: form.attr('action'), // Use the stored form variable
        //                 data: formData,
        //                 success: function(response) {
        //                     if (confirm('Do you want to print the form?')) {
        //                         window.location.href = "{{ route('print') }}";
        //                     } else {
        //                         window.location.href = "{{ route('dashboard') }}";
        //                     }
        //                 },
        //                 error: function() {
        //                     alert('Error submitting form');
        //                 }
        //             });
        //         } else {
        //             // If user cancels, redirect to the dashboard
        //             window.location.href =
        //                 "{{ route('dashboard') }}"; // Redirect to the dashboard
        //         }
        //     });
        // }

        function cc() {
            var form = $('#submitForm'); // Store the form element
            var formData = form.serialize(); // Serialize the form data

            // Proceed with AJAX form submission
            $.ajax({
                type: "POST",
                url: form.attr('action'),
                data: formData,
                success: function(response) {
                    Swal.fire({
                        title: 'Do you want to print the form?',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, print it',
                        cancelButtonText: 'No, return to dashboard',
                        icon: 'question'
                    }).then((printResult) => {
                        if (printResult.isConfirmed) {
                            window.location.href = "{{ route('print') }}";
                        } else {
                            window.location.href = "{{ route('dashboard') }}";
                        }
                    });
                },
                error: function() {
                    alert('Error submitting form');
                }
            });
        }
    </script>
@endpush
