@extends('layouts/contentLayoutMaster')

@section('title', 'Slide')

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
      @can('slide-create')
      <a class="btn btn-primary m-2" href="{{ route('slides.create') }}">{{ __('locale.New-Slide') }} </a>
      @endcan
    </div>
    <div class="table table-responsive pt-0">

      <table class=" table">
        <thead class="thead-light">
          <tr>
            <th></th>
            <th>{{ __('locale.Title') }}</th>
            <th>{{ __('locale.Status') }}</th>
            <th>{{ __('locale.Image') }}</th>
            <th>{{ __('locale.Action') }}</th>
          </tr>
        </thead>
        <tbody>



          @foreach($slides as $slide)

          <tr>
            <td>{{$slide->id}}</td>
            <td>{{\Helper::languageConvert($slide,'title')}}</td>
            <td>{!! \Helper::showStatus($slide->status)!!}</td>
            <td>
              @if($slide->getFirstMediaUrl('slide')!='')
              <img class="img-fluid rounded mb-75" src="{{$slide->getFirstMediaUrl('slide')}}" alt="{{$slide->title}}" width="100" />
              @endif
            </td>
            <td>

              <div class="dropdown">
                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                  <i data-feather="more-vertical"></i>
                </button>
                <div class="dropdown-menu">

                  @can('slide-edit')
                  <a href="{{ route('slides.edit', $slide->id) }}" class="dropdown-item"><i data-feather="edit-2" class="mr-50"></i><span> {{ __('locale.Edit') }}</span></a>
                  @endcan

                  @can('slide-delete')
                  {!! Form::open(['method' => 'DELETE','route' => ['slides.destroy', $slide->id],'style'=>'display:inline']) !!}
                  <button type="submit" class="dropdown-item "><i data-feather="trash" class="mr-50"></i> <span> {{ __('locale.Delete') }}</span></button>

                  {!! Form::close() !!}
                  @endcan
                </div>
              </div>


              <!-- <a href="{{ route('slides.show', $slide->id) }}" class="btn btn-warning btn-sm"><i data-feather="eye" class="font-medium-3"></i></a> -->



            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>


    <div class="row p-1">
      <div class="col-lg-12">
        {!! $slides->links() !!}
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
<!-- <script src="{{ asset(mix('js/scripts/pages/app-slide-list.js')) }}"></script> -->


<script>
  $(function() {



  });
</script>
@endsection