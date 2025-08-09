@extends('layouts/contentLayoutMaster')

@section('title', 'Events')

@section('vendor-style')
{{-- vendor css files --}}
<link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap4.min.css')) }}">
@endsection
@section('page-style')
{{-- Page css files --}}
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/dashboard-ecommerce.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/charts/chart-apex.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
@endsection

@section('content')
<!-- Dashboard Ecommerce Starts -->
<section id="dashboard-ecommerce">
  <div class="row match-height">
    <!-- Medal Card -->
    <div class="col-xl-4 col-md-6 col-12">
      <!-- <div class="card card-congratulation-medal">
        <div class="card-body">
          <h5>Congratulations 🎉 {{Auth::User()->name}}!</h5>
          <p class="card-text font-small-3">You have won gold medal</p>
          <h3 class="mb-75 mt-2 pt-50">
            <a href="javascript:void(0);">$48.9k</a>
          </h3>
          <button type="button" class="btn btn-primary">View Sales</button>
          <img src="{{asset('images/illustration/badge.svg')}}" class="congratulation-medal" alt="Medal Pic" />
        </div>
      </div> -->
    </div>
    <!--/ Medal Card -->

    <!-- Statistics Card -->
    <div class="col-lg-12">
      <div class="card card-statistics">
        <div class="card-header">
          <h4 class="card-title">Statistics</h4>
          <div class="d-flex align-items-center">
            <p class="card-text font-small-2 mr-25 mb-0"></p>
          </div>
        </div>
        <div class="card-body statistics-body">
          <div class="row">
            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
              <div class="media">
                <div class="avatar bg-light-dark mr-2">
                  <a href="{{route('levels.index', ['id' => $eventId])}}">
                    <div class="avatar-content">
                      <i data-feather="trending-up" class="avatar-icon"></i>
                    </div>
                  </a>
                </div>
                <div class="media-body my-auto">
                  <h4 class="font-weight-bolder mb-0">{{$totalLevels}}</h4>
                  <p class="card-text font-small-3 mb-0">Levels</p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
              <div class="media">
                <div class="avatar bg-light-danger mr-2">
                  <div class="avatar-content">
                    <i data-feather="users" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="media-body my-auto">
                  <h4 class="font-weight-bolder mb-0">{{$totalApplications}}</h4>
                  <p class="card-text font-small-3 mb-0">Applications</p>
                </div>
              </div>
            </div>
            <!-- <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
              <div class="media">
                <div class="avatar bg-light-danger mr-2">
                  <a href="">
                    <div class="avatar-content">
                      <i data-feather="upload-cloud" class="avatar-icon"></i>
                    </div>
                  </a>
                </div>
                <div class="media-body my-auto">
                  <h4 class="font-weight-bolder mb-0">0</h4>
                  <p class="card-text font-small-3 mb-0">Uploaded Result(s)</p>
                </div>
              </div>
            </div> -->

            <!--<div class="col-xl-3 col-sm-6 col-12">
              <div class="media">
                <div class="avatar bg-light-success mr-2">
                  <div class="avatar-content">
                    <i data-feather="dollar-sign" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="media-body my-auto">
                  <h4 class="font-weight-bolder mb-0">$9745</h4>
                  <p class="card-text font-small-3 mb-0">Revenue</p>
                </div>
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </div>
    <!--/ Statistics Card -->

    <div class="col-sm-12 card">
      <table class="table table-bordered data-table">
        <thead>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th width="100px">Action</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>


  </div>
</section>
<!-- Dashboard Ecommerce ends -->
@endsection

@section('vendor-script')
{{-- vendor files --}}
<script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap4.js')) }}"></script>

@endsection
@section('page-script')
{{-- Page js files --}}
<script src="{{ asset(mix('js/scripts/pages/dashboard-ecommerce.js')) }}"></script>

<script type="text/javascript">
  $(function() {

    var table = $('.data-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('competition-sub-categories.show',$id) }}",
      columns: [{
          data: 'id',
          name: 'id'
        },
        {
          data: 'participant.name',
          name: 'participant.name'
        },
        {
          data: 'action',
          name: 'action',
          orderable: false,
          searchable: false
        },
      ]
    });

  });
</script>
@endsection