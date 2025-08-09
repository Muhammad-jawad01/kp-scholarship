@extends('layouts/contentLayoutMaster')

@section('title', 'Role Edit' )

@section('vendor-style')
{{-- Vendor Css files --}}
<link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-user.css')) }}">
@endsection

@section('content')
<!-- users edit start -->
<section class="app-user-edit">
  <div class="card">
    <div class="card-body">
      <div class="tab-content">
        <!-- Account Tab starts -->
        <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">

          <!-- users edit account form ends -->
        </div>
        <!-- Account Tab ends -->

        {{-- edit roles form --}}
        <div>
          <div class="card">

            <div class="card-body">
              <form action="{{ route('roles.update', $role->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ $role->name }}">
                </div>
                {{-- guard_name --}}
                <!-- <div class="form-group">
                  <label for="guard_name">Guard Name</label>
                  <input type="text" class="form-control" id="guard_name" name="guard_name" value="{{ $role->guard_name }}">
                </div> -->
                {{-- permissions in checkbox --}}


                <div class="form-group">
                  <div class="table-responsive border rounded mt-1">
                    <h6 class="py-1 mx-1 mb-0 font-medium-2">
                      <i data-feather="lock" class="font-medium-3 mr-25"></i>
                      <span class="align-middle">Permission</span>
                    </h6>
                    <table class="table table-striped table-borderless">
                      <thead class="thead-light">
                        <tr>
                          <th>Module</th>
                          <th>View</th>
                          <th>Create</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($menus as $key=> $menu)
                        <tr>
                          <td>{{ucfirst($menu->title)}}</td>
                          @foreach($menu->permissionsList as $value)
                          <td>
                            <div class="custom-control custom-checkbox">
                              <!-- <input name="permission[]" type="checkbox" value="{{$value->id}}" class="custom-control-input" id="per_{{$value->id}}" /> -->
                              {{ Form::checkbox('permission[]', $value->id,in_array($value->id, $rolePermissions) ? true : false, array('class' => 'custom-control-input','id' =>"per_".$value->id )) }}
                              <label class="custom-control-label" for="per_{{$value->id}}"></label>
                            </div>
                          </td>
                          @endforeach

                        </tr>
                        @endforeach


                      </tbody>
                    </table>
                  </div>
                </div>

                <button type="submit" class="btn btn-primary float-right">Update</button>
              </form>
            </div>
          </div>
        </div>



      </div>
    </div>
  </div>
</section>
<!-- users edit ends -->
@endsection

@section('vendor-script')
{{-- Vendor js files --}}
<script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection

@section('page-script')
{{-- Page js files --}}
<script src="{{ asset(mix('js/scripts/pages/app-user-edit.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/components/components-navs.js')) }}"></script>
@endsection