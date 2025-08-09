@extends('layouts/contentLayoutMaster')

@section('title', 'KPEF Scholarship Applied ')

@section('vendor-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap4.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap4.min.css')) }}">
@endsection

@php
    $user = auth()->user();
@endphp
@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-user.css')) }}">
@section('content')
    <section class="app-user-list">



        <div class="row match-height">
            <!-- Medal Card -->
            <div class="col-xl-4 col-md-6 col-12">
                <div class="card card-congratulation-medal">
                    <div class="card-body">

                        <h5>KPEF Scholarship</h5>
                        <p class="card-text font-small-3">Scholarship we provide</p>

                        <h3 class="mb-75 mt-2 pt-50">
                            <a href="#">{{ $total ?? '' }}</a>
                        </h3>
                        <button type="button" class="btn btn-primary">View All</button>
                        {{-- @endif --}}

                        <img src="{{ asset('app-assets/images/badge.svg') }}" class="congratulation-medal"
                            alt="Medal Pic" />
                    </div>
                </div>
            </div>
            <!--/ Medal Card -->

            <!-- Statistics Card -->
            <div class="col-xl-8 col-md-6 col-12">
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
                                @if ($user->hasRole('uni_admin'))
                                    <a href="{{ route('scholarship_applied.statistics', ['id' => 4]) }}">
                                @endif

                                @if ($user->roles()->where('id', 1)->exists())
                                    <a href="{{ route('scholarship_applied.statistics', ['id' => 5]) }}">
                                @endif

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
                                </a>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                @if ($user->hasRole('uni_admin'))
                                    <a href="{{ route('scholarship_applied.statistics', ['id' => 2]) }}">
                                @endif

                                @if ($user->roles()->where('id', 1)->exists())
                                    <a href="{{ route('scholarship_applied.statistics', ['id' => 4]) }}">
                                @endif
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
                                </a>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                @if ($user->hasRole('uni_admin'))
                                    <a href="{{ route('scholarship_applied.statistics', ['id' => 3]) }}">
                                @endif

                                @if ($user->roles()->where('id', 1)->exists())
                                    <a href="{{ route('scholarship_applied.statistics', ['id' => 6]) }}">
                                @endif
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
                                </a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!--/ Statistics Card -->
        </div>
        @if ($user->roles()->where('id', 1)->exists())
            <div class="row match-height">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card mb-2">
                        <div class="card-header flex-column align-items-start pb-0">
                            <div class="avatar bg-light-success p-50 m-0">
                                <div class="avatar-content">
                                    <i data-feather="package" class="font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="fw-bolder mt-1">{{ $unitotal ?? '' }}</h2>
                            <p class="card-text">Total On the University Level</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card mb-2 ">
                        <div class="card-header flex-column align-items-start pb-0">
                            <div class="avatar bg-light-primary p-50 m-0">
                                <div class="avatar-content">
                                    <i data-feather="check-square" class="font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="fw-bolder mt-1">{{ $approved ?? '' }}</h2>
                            <p class="card-text">Approved On the University Level</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card mb-2">
                        <div class="card-header flex-column align-items-start pb-0">
                            <div class="avatar bg-light-warning p-50 m-0">
                                <div class="avatar-content">
                                    <i data-feather="refresh-cw" class="font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="fw-bolder mt-1">{{ $unipending ?? '' }}</h2>
                            <p class="card-text">Pending On the University Level</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card mb-2">
                        <div class="card-header flex-column align-items-start pb-0">
                            <div class="avatar bg-light-danger p-50 m-0">
                                <div class="avatar-content">
                                    <i data-feather="x-square" class="font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="fw-bolder mt-1">{{ $unireject ?? '' }}</h2>
                            <p class="card-text">Rejected On the University Level</p>
                        </div>
                    </div>
                </div>


            </div>
        @endif


        <div class="card">

            <div class="table table-responsive pt-0">

                <table class=" table">
                    <thead class="thead-light">
                        <tr>
                            <th></th>
                            <th>name</th>
                            <th>Schoarship</th>
                            <th>Status</th>
                            <th>Actions</th>
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
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow"
                                            data-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item getDataId" data-id={{ $data->id }}
                                                data-toggle="modal" data-target="#exampleModal"><i
                                                    data-feather="edit-2"class="mr-50"></i><span>Edit</span></a>

                                        </div>
                                    </div>


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
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Schoarship Change Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form id="change_status_form">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="hidden" name="id" id="sch_id">
                                    <select class="form-select form-control" id="selectval"
                                        aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="2">Pending</option>

                                        @auth

                                            @if ($user->hasRole('uni_admin'))
                                                <option value="3">Rejecte</option>
                                                <option value="4">University Approved For Further Process</option>
                                                <option value="2">Pending</option>
                                            @endif

                                            @if ($user->roles()->where('id', 1)->exists())
                                                <option value="4">Pending</option>

                                                <option value="6">Rejecte</option>

                                                <option value="5">Approved </option>

                                            @endauth
                                        @endif
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="Textarea"></textarea>
                                    <label for="Textarea">Comments</label>
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>



@endsection



@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset(mix('js/scripts/components/components-navs.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/pages/app-slide-create.js')) }}"></script>

    <script>
        function changeStatus(id) {
            // alert('test')
            $('#sch_id').val(id);
            $('#exampleModal').modal('show');



        }

        $(document).ready(function() {
            $('#change_status_form').submit(function(event) {
                event.preventDefault(); // Prevent the default form submission
                var EditId = $('.getDataId').attr('data-id');
                var status = $('#selectval').val();
                var comment = $('#Textarea').val();

                var url = '{{ route('scholarship_applied.update') }}';
                // Get the form data
                var data = {
                    status: status,
                    comment: comment,
                    id: EditId,
                };


                // Send the AJAX request
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    },
                    url: url,
                    method: 'POST',
                    data: data,
                    success: function(response) {
                        location.reload(); // This will refresh the page
                        $('#exampleModal').modal('hide');
                        console.log(response)
                    },
                    error: function(xhr) {
                        // Handle the error response
                        console.log('An error occurred');
                    }
                });
            });
        });
    </script>




@endsection
