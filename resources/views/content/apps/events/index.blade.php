@extends('layouts/contentLayoutMaster')

@section('title', 'Events')

@section('vendor-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap4.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap4.min.css')) }}">
    <style>
        .event_card_body {
            padding: 0px !important;
        }
    </style>
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
                @can('event-create')
                    <a class="btn btn-primary m-2" href="{{ route('events.create') }}">New Event</a>
                @endcan
            </div>
            <!-- <div class="table table-responsive pt-0">

                      <table class=" table">
                        <thead class="thead-light">
                          <tr>
                            <th></th>
                            <th>District</th>
                            <th>Title</th>
                            <th>GPS Coordinates</th>
                            <th>Venue</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($events as $event)
    <tr>
                            <td>{{ $event->id }}</td>
                            <td>{{ $event->name }}</td>
                            <td>{{ $event->title }}</td>
                            <td><b>lat:</b> {{ $event->latitude }}, <b>long:</b> {{ $event->longitude }}</td>
                            <td>{{ $event->venue }}</td>
                            <td>{{ $event->start }}</td>
                            <td>{{ $event->end }}</td>
                            <td>
                               <div class="dropdown">
                                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                  <i data-feather="more-vertical"></i>
                                </button>
                                <div class="dropdown-menu">

                                  @can('event-edit')
        <a href="{{ route('events.edit', $event->id) }}" class="dropdown-item"><i data-feather="edit-2" class="mr-50"></i><span>Edit</span></a>
    @endcan

                                  @can('event-delete')
        {!! Form::open(['method' => 'DELETE', 'route' => ['events.destroy', $event->id], 'style' => 'display:inline']) !!}
                                                  <button type="submit" class="dropdown-item "><i data-feather="trash" class="mr-50"></i> <span>Delete</span></button>

                                                  {!! Form::close() !!}
    @endcan
                                </div>
                              </div>
                              

                            </td>
                          </tr>
    @endforeach
                        </tbody>
                      </table>

                    </div> -->

            <div class="row p-1">
                @foreach ($events as $event)
                    <div class="col-md-4">
                        <div class="card border">
                            <div class="card-header btn btn-primary">{{ $event->title }}</div>
                            <div class="card-body event_card_body">
                                <div
                                    style="height: 200px;width:100%; background-image: url({{ $event->getFirstMediaUrl('event') }}); background-size: cover;">
                                </div>
                            </div>
                            <div class="card-footer">
                                <table>
                                    <tr>
                                        <td>
                                            <a title="Show Details" href="{{ route('event-details', $event->id) }}"
                                                class="btn btn-primary">
                                                {{-- <i data-feather="eye" class="mr-50"></i> --}}
                                                <i class="fa fa-eye" aria-hidden="true"></i>

                                            </a>
                                        </td>
                                        <td>
                                            @can('event-edit')
                                                <a title="Edit" href="{{ route('events.edit', $event->id) }}"
                                                    class="btn btn-primary">
                                                    {{-- <i data-feather="edit-2" class="mr-50"></i> --}}
                                                    <i class="fa fa-edit " aria-hidden="true"></i>

                                                </a>
                                            @endcan
                                        </td>
                                        <td>
                                            @can('event-delete')
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['events.destroy', $event->id], 'style' => 'display:inline']) !!}
                                                <button title="Delete" style="border: none;" type="submit"
                                                    class="btn btn-small btn-primary">
                                                    {{-- <i data-feather="trash"
                                                        class="mr-50"></i> --}}
                                                    <i class="fa fa-trash " aria-hidden="true"></i>

                                                </button>

                                                {!! Form::close() !!}
                                            @endcan
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


            <div class="row p-1">
                <div class="col-lg-12">
                    {!! $events->links() !!}
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
