@extends('layouts/contentLayoutMaster')
@php
    $user = auth()->user();
@endphp

@if ($id == 3 || $id == 6)
    @php
        $status = 'Rejected';
    @endphp
@endif

@if ($id == 2)
    @php
        $status = 'Pending';
    @endphp
@endif


@if ($id == 4 && $user->hasRole('uni_admin'))
    @php
        $status = 'Approved';
    @endphp
@endif
@if (
    $id == 4 &&
        $user->roles()->where('id', 1)->exists())
    @php
        $status = 'Pending';
    @endphp
@endif

@if ($id == 5)
    @php
        $status = 'Approved';
    @endphp
@endif
@section('title', 'KPEF Scholarship Applied ' . $status)

@section('vendor-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap4.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap4.min.css')) }}">
@endsection

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-user.css')) }}">
@section('content')
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

                                        @auth


                                            @if ($user->hasRole('uni_admin'))
                                                <option value="2">Pending</option>
                                                <option value="4">University Approved For Further Process</option>

                                                <option value="3">Rejecte</option>
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
