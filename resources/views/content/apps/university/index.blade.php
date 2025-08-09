@extends('layouts/contentLayoutMaster')

@section('title', 'Universities')

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
@endsection

@section('content')
    <!-- users list start -->
    <section class="app-user-list">
        <!-- users filter start -->

        <!-- users filter end -->
        <!-- list section start -->
        <div class="card">
            <div class="col-lg-12 text-right">
                @can('download-create')
                    <a class="btn btn-primary m-2" href="{{ route('universities.create') }}">New University</a>
                @endcan
            </div>
            <div class="table table-responsive pt-0">

                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th></th>
                            <th>University</th>
                            <th>Organized By</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Details</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($universities as $university)
                            <tr>
                                <td>{{ $university->id }}</td>
                                <td>{{ $university->name }}</td>
                                <td>{{ $university->organized_by }}</td>
                                <td>{{ $university->address }}</td>
                                <td>{{ $university->phone }}</td>
                                <td><a href="{{ route('university-details.show', $university->id) }}">Details</a></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow"
                                            data-toggle="dropdown">
                                            {{-- <i data-feather="more-vertical"></i> --}}
                                            <i class="fas fa-cog mr-50"></i>

                                        </button>
                                        <div class="dropdown-menu">

                                            @can('download-edit')
                                                <a href="{{ route('universities.edit', $university->id) }}"
                                                    class="dropdown-item">
                                                    <!--<i data-feather="edit-2" class="mr-50"></i>-->
                                                    <i class="fa fa-edit " aria-hidden="true"></i>

                                                    <span>Edit</span></a>
                                            @endcan

                                            @can('download-delete')
                                                {!! Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['universities.destroy', $university->id],
                                                    'style' => 'display:inline',
                                                ]) !!}
                                                <button type="submit" class="dropdown-item ">
                                                    {{-- <i data-feather="trash"
                                                        class="mr-50"></i> --}}
                                                    <i class="fa fa-trash " aria-hidden="true"></i>

                                                    <span>Delete</span></button>

                                                {!! Form::close() !!}
                                            @endcan
                                        </div>
                                    </div>
                                    {{-- <a href="{{ route('downloads.show', $download->id) }}" class="btn btn-warning btn-sm"><i data-feather="eye" class="font-medium-3"></i></a> --}}



                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>



            <div class="row p-1">
                <div class="col-lg-12">
                    {!! $universities->links() !!}
                </div>
            </div>
            <!-- Modal to add new user Ends-->
        </div>

        <!-- list section end -->
    </section>
    <!-- users list ends -->
@endsection

@section('vendor-script')
    {{-- Vendor js files --}}
    <script>
        // Initialize Feather Icons
        feather.replace();
    </script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap4.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap4.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>

@endsection

@section('page-script')
    {{-- Page js files --}}


@endsection
