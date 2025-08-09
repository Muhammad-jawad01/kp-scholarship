@extends('layouts/contentLayoutMaster')

@section('title', 'KPEF Scholarship ')

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
            <div class="col-lg-12 text-right">
                {{-- @can('notification-create') --}}
                <a class="btn btn-primary m-2" href="{{ route('admin.scholarship.create') }}"> New Scholarship</a>
                {{-- @endcan --}}
            </div>
            <div class="table table-responsive pt-0">

                <table class=" table">
                    <thead class="thead-light">
                        <tr>
                            <th></th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($model as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->description ?? '' }}</td>
                                <td>{!! \Helper::showStatus($data->status) !!}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow"
                                            data-toggle="dropdown">
                                            {{-- <i data-feather="more-vertical"></i> --}}
                                            <i class="fas fa-cog mr-50"></i>

                                        </button>
                                        <div class="dropdown-menu">

                                            {{-- @can('scholarship-edit') --}}
                                            <a href="{{ route('scholarship.edit', $data->id) }}" class="dropdown-item">
                                                {{-- <i data-feather="edit-2" class="mr-50"></i> --}}
                                                <i class="fa fa-edit " aria-hidden="true"></i>

                                                <span>Edit</span></a>
                                            {{-- @endcan --}}

                                            {{-- @can('scholarship-delete') --}}
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'route' => ['scholarship.destroy', $data->id],
                                                'style' => 'display:inline',
                                            ]) !!}
                                            <button type="submit" class="dropdown-item ">
                                                {{-- <i data-feather="trash" class="mr-50"></i>  --}}
                                                <i class="fa fa-trash " aria-hidden="true"></i>

                                                <span>Delete</span></button>

                                            {!! Form::close() !!}
                                            {{-- @endcan --}}

                                            <a href="{{ route('scholarship.show', $data->id) }}" class="dropdown-item">
                                                <i data-feather="eye" class="font-medium-3">show</i></a>
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
                    {!! $model->links() !!}
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
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection



@section('page-script')
    {{-- Page js files --}}
    <script>
        // Initialize Feather Icons
        feather.replace();
    </script>
    <script src="{{ asset(mix('js/scripts/components/components-navs.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/pages/app-slide-create.js')) }}"></script>



@endsection
