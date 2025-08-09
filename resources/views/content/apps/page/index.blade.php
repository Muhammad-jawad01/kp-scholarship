@extends('layouts/contentLayoutMaster')

@section('title', 'Page')

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
                @can('page-create')
                    <a class="btn btn-primary m-2" href="{{ route('pages.create') }}"> New Page</a>
                @endcan
            </div>
            <div class="table table-responsive pt-0">

                <table class=" table">
                    <thead class="thead-light">
                        <tr>
                            <th></th>
                            <th>Page</th>
                            <th>Slug</th>
                            {{-- <th>Image</th> --}}
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pages as $page)
                            <tr>
                                <td>{{ $page->id }}</td>
                                <td>{{ $page->title }}</td>
                                <td>{{ $page->slug }}</td>
                                {{-- <td>
                                    @if ($page->getFirstMediaUrl('banner') != '')
                                        <img class="img-fluid rounded mb-75" src="{{ $page->getFirstMediaUrl('banner') }}"
                                            alt="{{ $page->title }}" width="100" />
                                    @endif
                                </td> --}}
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow"
                                            data-toggle="dropdown">
                                            {{-- <i data-feather="more-vertical"></i> --}}
                                            <i class="fas fa-cog mr-50"></i>

                                        </button>
                                        <div class="dropdown-menu">

                                            @can('page-edit')
                                                <a href="{{ route('pages.edit', $page->id) }}" class="dropdown-item">
                                                    {{-- <i data-feather="edit-2" class="mr-50"></i> --}}
                                                    <i class="fa fa-edit " aria-hidden="true"></i>

                                                    <span>Edit</span></a>
                                            @endcan

                                            @can('page-delete')
                                                @if ($page->deletable == 1)
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['pages.destroy', $page->id], 'style' => 'display:inline']) !!}
                                                    <button type="submit" class="dropdown-item ">
                                                        {{-- <i data-feather="trash"
                                                            class="mr-50"></i> --}}
                                                        <i class="fa fa-trash " aria-hidden="true"></i>

                                                        <span>Delete</span></button>

                                                    {!! Form::close() !!}
                                                @endcan
                                            @endif
                                        </div>
                                    </div>
                                    <!-- <a href="{{ route('pages.show', $page->id) }}" class="btn btn-warning btn-sm"><i data-feather="eye" class="font-medium-3"></i></a> -->



                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>


            <div class="row p-1">
                <div class="col-lg-12">
                    {!! $pages->links() !!}
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
