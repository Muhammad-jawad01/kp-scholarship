@extends('layouts/contentLayoutMaster')

@section('title', 'Results')

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

            <div class="col-lg-12 ">
                <h3 class="text-lift mt-2"><strong>Scholarship Report</strong></h3>

                <form action="{{ route('reports.index') }}" method="get">
                    <div class="row my-3">
                        <div class="col-sm-3">
                            <select name="uni_id" id="" class="form-control">
                                <option value="">Select University</option>
                                @foreach ($universities as $university)
                                    <option value="{{ $university->id }}">{{ $university->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3">
                            {{-- <label for="year">Select Year:</label> --}}
                            <select name="applied_year" id="year" class="form-control">
                                <option value="">Select Year</option>
                                @php
                                    $currentYear = date('Y');
                                    $startYear = 2015; // Change this to your desired start year
                                @endphp

                                @for ($year = $currentYear; $year >= $startYear; $year--)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select name="status" id="" class="form-control">
                                <option value=""> -- Select Status -- </option>
                                <option value="4">Uni Approved</option>
                                <option value="3">Uni Rejected</option>
                                <option value="2"> Uni Pending</option>

                                <option value="5">Approved</option>
                                <option value="2"> Kpef Pending</option>
                                <option value="6">Kpef Rejected</option>

                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select name="action" id="" class="form-control">
                                <option value=""> -- Select Mood -- </option>
                                <option value="download">Download CVS /Excel</option>
                                <option value="view">View</option>

                            </select>
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" data-inline="true" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="table table-responsive pt-0">

                <table class=" table">
                    <thead class="thead-light">
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>University</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($report)

                            @foreach ($report as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->user->name }}</td>
                                    <td>{{ $data->uni->name }}</td>
                                    <td>{!! \Helper::showStatus($data->status) !!}</td>

                                    <td>
                                        {{-- <div class="dropdown-menu"> --}}

                                        <a href="{{ route('reports.show', $data->id) }}" class="dropdown-item"><i
                                                data-feather="edit-2" class="mr-50"></i><span>Show</span></a>

                                    </td>


                                </tr>
                            @endforeach
                        @endif

                        {{-- <td>
              <div class="dropdown">
                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                  <i data-feather="more-vertical"></i>
                </button>
                <div class="dropdown-menu">

                  <!-- @can('competition-categories-edit') -->
                  <!-- <a href="{{ route('result.edit', $result->id) }}" class="dropdown-item"><i data-feather="edit-2" class="mr-50"></i><span>Edit</span></a> -->
                  <!-- @endcan -->

             
                  {!! Form::open(['method' => 'DELETE','route' => ['result.destroy', $result->id],'style'=>'display:inline']) !!}
                  <button type="submit" class="dropdown-item "><i data-feather="trash" class="mr-50"></i> <span>Delete</span></button>
                  {!! Form::close() !!}
                
                </div>
              </div>
            </td> --}}
                    </tbody>
                </table>

            </div>


            <div class="row p-1">
                <div class="col-lg-12">
                    @if ($report)
                        {!! $report->links() !!}
                    @endif

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
