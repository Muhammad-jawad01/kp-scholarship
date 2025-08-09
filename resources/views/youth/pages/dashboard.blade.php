@extends('layouts/scholarshipLayout')

@section('title', 'Dashboard')
@section('content')
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/wizard/bs-stepper.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-wizard.css')) }}">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            {{-- @dump(Auth()->user()->name) --}}

            <div class="row">
                <div class="col-xl-12 col-md-6 col-12">
                    <div class="card card-statistics">
                        <div class="card-header">
                            <h4 class="card-title">Statistics</h4>
                            <div class="d-flex align-items-center">
                                <p class="card-text font-small-2 me-25 mb-0">Updated </p>
                            </div>
                        </div>
                        <div class="card-body statistics-body">
                            <div class="row">
                                <div class="col-xl-3 col-sm-6 col-12">
                                    <div class="d-flex flex-row">
                                        <div class="avatar bg-light-success mx-1">
                                            <div class="avatar-content">
                                                <i data-feather="box" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                        <div class="my-auto">
                                            <h4 class="fw-bolder mb-0">{{ $total ?? '' }}</h4>
                                            <p class="card-text text-success font-small-3 mb-0">Total</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">


                                    <div class="d-flex flex-row">
                                        <div class="avatar bg-light-primary mx-1">
                                            <div class="avatar-content">
                                                <i data-feather="check-circle" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                        <div class="my-auto">
                                            <h4 class="fw-bolder mb-0">{{ $approved ?? '' }}</h4>
                                            <p class="card-text  text-primary font-small-3 mb-0">Approved</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">

                                    <div class="d-flex flex-row">
                                        <div class="avatar bg-light-warning mx-1">
                                            <div class="avatar-content">
                                                <i data-feather="refresh-cw" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                        <div class="my-auto">
                                            <h4 class="fw-bolder  mb-0">{{ $pending ?? '' }}</h4>
                                            <p class="card-text text-warning font-small-3 mb-0">Pending</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">


                                    <div class="d-flex flex-row">
                                        <div class="avatar bg-light-danger mx-1">
                                            <div class="avatar-content">
                                                <i data-feather="x-circle" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                        <div class="my-auto">
                                            <h4 class="fw-bolder mb-0">{{ $reject ?? '' }}</h4>
                                            <p class="card-text text-danger  font-small-3 mb-0">Rejected</p>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section class="app-user-list">
                <div class="card">

                    <div class="table table-responsive pt-0">

                        <table class=" table">
                            <thead class="thead-light">
                                <tr>
                                    <th></th>
                                    <th>name</th>
                                    <th>Schoarship</th>
                                    <th>Status</th>
                                    <th>Print</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($model as $data)
                                    <tr>
                                        <td class="">{{ $data->id }}</td>
                                        <td>{{ $data->user->name }}</td>
                                        <td>{{ $data->schoarship->name }}</td>
                                        <td>{!! \Helper::showStatus($data->status) !!}</td>
                                        <td>
                                            @if ($data->scholarship_id)
                                                <a href="{{ route('print', ['id' => encrypt($data->scholarship_id)]) }}">
                                                    <i data-feather="printer"></i> print
                                                </a>
                                            @else
                                                <span>Scholarship ID not available</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row p-1">
                        <div class="col-lg-12">
                            {{-- {!! $model->links() !!} --}}
                            {{ $model->links() }}

                        </div>
                    </div>
                    <!-- Modal to add new user Ends-->
                </div>


                <!-- Modal -->

            </section>


        </div>
    </div>

@endsection

@section('script')
    <script src="{{ asset(mix('vendors/js/forms/wizard/bs-stepper.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>

    <!-- Page js files -->
    <!-- <script src="{{ asset(mix('js/scripts/forms/form-wizard.js')) }}"></script> -->



    <!-- ====== Youth Form Wizard ==== -->
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });



            // Get Educational Status
            var userId = "{{ auth()->user()->id }}";
            var isEducated = false;

            function GetEducationalStatus(id, numberStepper) {
                $.ajax({
                    url: '{{ url('youth/get_educational_status') }}' + '/' + userId,
                    method: 'GET',
                    success: function(response) {
                        if (!response) {
                            if (numberStepper._currentIndex == 1) {
                                numberStepper.to(4);
                            } else {
                                numberStepper.next();
                            }
                        } else {
                            numberStepper.next();
                        }
                    }
                });
            }

            // save ProfileImage

            // save Personal Information
            $("#submit").on('click', function() {
                var form = $("#profilePicture");
                $.ajax({
                    type: "POST",
                    url: "{{ route('personalinformation') }}",
                    data: form.serialize(), // serializes the form's elements.
                    success: function(data) {
                        if (data.response === 'success') {
                            Alert("SUccess");
                        }
                    }
                });
            });


            // save Personal Information
            function submitPersonalFrom() {
                var form = $("#personalinformation");

                $.ajax({
                    type: "POST",
                    url: "{{ route('personalinformation') }}",
                    data: form.serialize(), // serializes the form's elements.
                    success: function(data) {
                        if (data.response === 'success') {
                            numberedStepper.next();
                        }
                    }
                });
            };

            // Error-Block
            $('#error-block').hide();

            //Delete User Experience
            $('body').on('click', '.deleteExperience', function() {
                $('#addExperience').trigger('reset');
                $('#addExperienceBtn').text('Add');
                var id = $(this).attr("data-id");
                if (confirm('Do you want to delete ?')) {

                    $.ajax({
                        type: "POST",
                        url: "{{ route('removeExperience') }}",
                        data: {
                            id: id
                        }, // serializes the form's elements.
                        success: function(data) {
                            if (data.response === 'success') {
                                $('#experience_row_' + id).remove();
                            }
                        }
                    });

                }
            });


            //=======================
            // Youth Experience
            //======================

            var stillWorking = false;

            // CheckBox code
            $('#present').click(function() {
                if ($(this).is(':checked')) {
                    stillWorking = true;
                    $('#ending_date').val('');
                    $('#ending_date').attr('disabled', 'disabled');
                } else {
                    $('#ending_date').removeAttr('disabled');
                }
            });


            //update User Experience
            $('body').on('click', '.editExperience', function() {
                //$('.editExperience').on('click', function() {
                var id = $(this).attr("data-id");
                $.ajax({
                    type: "GET",
                    url: "{{ url('youth/editExperience') }}" + '/' + id,
                    success: function(data) {

                        if (data.response === 'success') {
                            $('#error-block').hide();
                            $('#addExperienceBtn').html('Update');
                            var experience = data.experience;
                            $('#id').val(experience.id);
                            $('#company').val(experience.company);
                            $('#designation').val(experience.designation);
                            $('#starting_date').val(experience.starting_date);
                            if (experience.ending_date === null) {
                                $('#present').prop('checked', true);
                                $('#ending_date').val('');
                                $('#ending_date').attr('disabled', 'disabled');
                            } else {
                                $('#ending_date').val(experience.ending_date);
                            }
                            $('#description').val(experience.description);
                        }
                    }
                });


            });



            // add User experience
            $('#addExperience').submit(function(e) {
                e.preventDefault();
                $('#ending_date').removeAttr('disabled');
                var form = $(this);
                form.description = $('#description').val();
                $.ajax({
                    type: "POST",
                    url: "{{ route('addExperience') }}",
                    data: form.serialize(), // serializes the form's elements.
                    success: function(data) {

                        if (data.response === 'success') {
                            $('#error-block').hide();
                            var experience = data.experience;
                            //var row = '<tr id="experience_row_' + experience.id + '"><td>' + experience.company + '</td><td>' + experience.designation + '</td><td>' + experience.starting_date + '</td><td>' + experience.ending_date === '' ? '' : experience.ending_date + '</td><td><button class="btn btn-sm btn-primary editExperience" data-id="' + experience.id + '"><i class="fa fa-edit"></i></button><button class="btn btn-sm btn-danger deleteExperience" data-id="' + experience.id + '"><i class="fa fa-trash"></i></button></td></tr>';
                            var card = "";

                            card += '<div class="card" id="experience_row_' + experience.id +
                                '">';
                            card += '<div class="card-header bg-info p-1 mb-1 text-white"><b>' +
                                experience.designation + '</b></div>';
                            card += '<div class="card-text pl-1 font-weight-bold"><b>' +
                                experience.company + '</b></div>';

                            if (experience.ending_date === null) {
                                card += '<div class="card-text pl-1 font-weight-bold"><b>' +
                                    experience.starting_date + ' - Present</b></div>';
                            } else {
                                card += '<div class="card-text pl-1 font-weight-bold"><b>' +
                                    experience.starting_date + ' - ' + experience.ending_date +
                                    '</b></div>';
                            }
                            if (experience.description === null) {
                                card += '<div class="card-body"></div>';
                            } else {
                                card += '<div class="card-body">' + experience.description +
                                    '</div>';
                            }

                            card += '<div class="card-footer bg-info">';
                            card += '<table>';
                            card += '<tr>';
                            card +=
                                '<td><button class="btn btn-sm btn-primary editExperience" data-id="' +
                                experience.id + '"><i class=" fa fa-edit"></i></button></td>';
                            card +=
                                '<td><button class="btn btn-sm btn-danger deleteExperience" data-id="' +
                                experience.id + '"><i class=" fa fa-trash"></i></button></td>';
                            card += '</tr>';
                            card += '</table>';
                            card += '</div>';


                            if (data.isNew === true) {
                                $('#experienceBody').prepend(card);
                            } else {
                                $('#experience_row_' + experience.id).replaceWith(card);
                            }
                            card = "";
                            $('#NoExperienceRow').remove();
                            $('#addExperience').trigger("reset");
                            $('#addExperienceBtn').html('Add');
                        }

                        // Error Occures
                        if (data.response === 'error') {
                            $('#error-block').show(500);
                            $('#error-block').text(data.message);
                        }
                    }
                });
            });

            // Clear experience form
            $('#clrExperienceForm').click(function() {
                $('#ending_date').removeAttr('disabled');
                $('#addExperience').trigger('reset');
                $('#addExperienceBtn').html('Add');
            });

            //============================
            // User Education
            //============================
            $('#addEducation').submit(function(e) {
                e.preventDefault();
                var form = $(this);

                $.ajax({
                    type: "POST",
                    url: "{{ route('addEducation') }}",
                    data: form.serialize(), // serializes the form's elements.
                    success: function(data) {

                        //console.log("Response: " + data)
                        if (data.response === 'success') {
                            var education = data.education;
                            //var row = '<tr id="education_row_' + education.id + '"><td>' + education.degree_certificate + '</td><td>' + education.university_board + '</td><td>' + education.obtained_marks + '</td><td>' + education.total_marks + '</td><td>' + education.percentage + '</td><td><button class="btn btn-sm btn-primary editEducation" data-id="' + education.id + '"><i class=" fa fa-edit"></i></button><button class="btn btn-sm btn-danger deleteEducation" data-id="' + education.id + '"><i class="fa fa-trash"></i></button></td></tr>';
                            console.log(education);
                            var row = "";
                            row += '<tr id="education_row_' + education.id + '">';
                            row += '<td>' + education.degree + '</td>';
                            row += '<td>' + education.university_board + '</td>';
                            row += '<td>' + education.obtained_marks + '</td>';
                            row += '<td>' + education.total_marks + '</td>';
                            row += '<td>' + education.percentage + '%</td>';
                            row +=
                                '<td><button class="btn btn-sm btn-primary editEducation" data-id="' +
                                education.id + '"><i class="fa fa-edit"></i>';
                            row +=
                                '<button class="btn btn-sm btn-danger deleteEducation" data-id="' +
                                education.id + '"><i class="fa fa-trash"></i></td>';
                            row += "<tr>";

                            if (data.isNew === true) {
                                $('#educationBody').prepend(row);
                            } else {
                                $('#education_row_' + education.id).replaceWith(row);
                            }
                            row = "";
                            $('#NoEducationRow').remove();
                            $('#addEducation').trigger("reset");
                            $('#addEducationBtn').html('Add');
                        }
                    }
                });
            });

            //update User Education
            $('body').on('click', '.editEducation', function() {
                var id = $(this).attr("data-id");
                $.ajax({
                    type: "GET",
                    url: "{{ url('youth/editEducation') }}" + '/' + id,
                    success: function(data) {
                        if (data.response === 'success') {
                            $('#addEducationBtn').html('Update');
                            var education = data.education;
                            $('#education_Id').val(education.id);
                            $('#degree_certificate').val(education.degree_certificate);
                            $('#university_board').val(education.university_board);
                            $('#obtained_marks').val(education.obtained_marks);
                            $('#total_marks').val(education.total_marks);
                            $('#percentage').val(education.percentage);

                        }
                    }
                });


            });

            // Delete Education
            $('body').on('click', '.deleteEducation', function() {
                $('#addEducation').trigger('reset');
                $('#addEducationBtn').text('Add');
                var id = $(this).attr("data-id");
                if (confirm('Do you want to delete ?')) {

                    $.ajax({
                        type: "POST",
                        url: "{{ route('removeEducation') }}",
                        data: {
                            id: id
                        }, // serializes the form's elements.
                        success: function(data) {
                            if (data.response === 'success') {
                                $('#education_row_' + id).remove();
                            }
                        }
                    });

                }
            });

            // Clear education form
            $('#clrEducationForm').click(function() {
                $('#addEducation').trigger('reset');
                $('#addEducationBtn').html('Add');
            });



            var bsStepper = document.querySelectorAll('.bs-stepper');


            select = $('.select2');
            select.each(function() {
                var $this = $(this);
                $this.wrap('<div class="position-relative"></div>');
                $this.select2({
                    placeholder: 'Select value',
                    dropdownParent: $this.parent()
                });
            });


            horizontalWizard = document.querySelector('.horizontal-wizard-example');

            // form wizard

            if (typeof horizontalWizard !== undefined && horizontalWizard !== null) {
                var numberedStepper = new Stepper(horizontalWizard),
                    $form = $(horizontalWizard).find('form');

                // for development purpose


                // Input Validations
                $form.each(function() {
                    var $this = $(this);
                    $this.validate({
                        rules: {
                            username: {
                                required: true
                            },
                            email: {
                                required: true
                            },

                            'name': {
                                required: true
                            },

                        }
                    });
                });

                $(horizontalWizard)
                    .find('.btn-next')
                    .each(function() {
                        $(this).on('click', function(e) {

                            var isValid = $(this).parent().siblings('form').valid();
                            if (isValid) {
                                if (numberedStepper._currentIndex === 0) {
                                    submitPersonalFrom();
                                } else {
                                    GetEducationalStatus(userId, numberedStepper);
                                    //numberedStepper.next();
                                }

                                // numberedStepper.next();
                            } else {
                                e.preventDefault();
                            }
                        });
                    });

                $(horizontalWizard)
                    .find('.btn-prev')
                    .on('click', function() {
                        $.ajax({
                            url: '{{ url('youth/get_educational_status') }}' + '/' + userId,
                            method: 'GET',
                            success: function(response) {
                                if (!response) {
                                    if (numberedStepper._currentIndex == 3) {
                                        numberedStepper.to(2);
                                    } else {
                                        numberedStepper.previous();
                                    }
                                } else {
                                    numberedStepper.previous();
                                }
                            }
                        });
                    });

                $(horizontalWizard)
                    .find('.btn-submit')
                    .on('click', function() {
                        var isValid = $(this).parent().siblings('form').valid();
                        if (isValid) {
                            alert('Submitted..!!');
                        }
                    });
            }

            $('#educational_status').change(function() {
                GetEducationalStatus(userId);
            });

        });
    </script>

@stop
