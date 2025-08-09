@extends('layouts/contentLayoutMaster')

@section('title', 'Project')

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
                @can('project-create')
                    <a class="btn btn-primary m-2" href="{{ route('projects.create') }}"> New Project</a>
                @endcan
            </div>
            <div class="table table-responsive pt-0">

                <table class=" table">
                    <thead class="thead-light">
                        <tr>
                            <th></th>
                            <th>Title</th>
                            <th>Approved PC1 Cost</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td>{{ $project->id }}</td>
                                <td title="{{ $project->title }}">{{ \Str::limit($project->title, 45) }}</td>
                                <td>{{ $project->approved_pc1_cost }}</td>
                                <td>{{ $project->status }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow"
                                            data-toggle="dropdown">
                                            {{-- <i data-feather="more-vertical"></i> --}}
                                            <i class="fas fa-cog mr-50"></i>

                                        </button>
                                        <div class="dropdown-menu">

                                            @can('project-edit')
                                                <a href="{{ route('projects.edit', $project->id) }}" class="dropdown-item">
                                                    {{-- <i data-feather="edit-2" class="mr-50"></i> --}}
                                                    <i class="fa fa-edit " aria-hidden="true"></i>

                                                    <span>Edit</span></a>
                                            @endcan

                                            @can('project-delete')
                                                {!! Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['projects.destroy', $project->id],
                                                    'style' => 'display:inline',
                                                ]) !!}
                                                <button type="submit" class="dropdown-item ">
                                                    {{-- <i data-feather="trash" class="mr-50"></i>  --}}
                                                    <i class="fa fa-trash " aria-hidden="true"></i>

                                                    <span>Delete</span></button>

                                                {!! Form::close() !!}
                                            @endcan
                                        </div>
                                    </div>
                                    <!-- <a href="{{ route('projects.show', $project->id) }}" class="btn btn-warning btn-sm"><i data-feather="eye" class="font-medium-3"></i></a> -->



                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>


            <div class="row p-1">
                <div class="col-lg-12">
                    {!! $projects->links() !!}
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
