@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Theme Setting' )

@section('vendor-style')
{{-- Vendor Css files --}}

<link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/katex.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/monokai-sublime.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/quill.snow.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/quill.bubble.css')) }}">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Inconsolata&family=Roboto+Slab&family=Slabo+27px&family=Sofia&family=Ubuntu+Mono&display=swap" rel="stylesheet">
@endsection


@section('page-style')
{{-- Page Css files --}}

<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-quill-editor.css')) }}">
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
              <form action="{{ route('settings.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <hr>
                <h3>Front Setting</h3>
                <hr>

                <div class="form-group row" id="app">

                  {{ BsForm::image('header_logo')->label('Header Logo')->collection('header_logo')->files($setting->getMediaResource('header_logo')) }}
                  {{ BsForm::image('footer_logo')->label('Footer Logo')->collection('footer_logo')->files($setting->getMediaResource('footer_logo')) }}
                  {{ BsForm::image('inner_page_logo')->label('Inner Page Logo')->collection('inner_page_logo')->files($setting->getMediaResource('inner_page_logo')) }}
                  {{ BsForm::image('logo')->label('AdminPanel Side Logo')->collection('logo')->files($setting->getMediaResource('logo')) }}
                  {{ BsForm::image('work_logo')->label('Directorate of Implementation and Work Logo')->collection('work_logo')->files($setting->getMediaResource('work_logo')) }}
                  {{ BsForm::image('work_footer_logo')->label('Directorate of Implementation and Work Footer Logo')->collection('work_footer_logo')->files($setting->getMediaResource('work_footer_logo')) }}
                </div>



                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" id="email" name="email" value="{{ $setting->email }}" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" class="form-control" id="phone" name="phone" value="{{ $setting->phone }}" placeholder="Enter phone">
                </div>

                <div class="form-group">
                  <label for="address">Address</label>
                  <textarea class="form-control" id="address" name="address" rows="3"> {{ $setting->address }}</textarea>
                </div>




                <div class="form-group">
                  <label>Footer Note</label>
                  <div id="snow-wrapper">
                    <div id="footernote-container">
                      <div class="footernote_editor pb-5">

                        {!!$setting->footer_note!!}

                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="footer_note" id="footer_note" value="{{$setting->footer_note}}" />
                </div>
                <div class="form-group">
                  <label for="android_app_link">Android App Link (IF any) </label>
                  <input type="text" class="form-control" id="android_app_link" name="android_app_link" value="{{ $setting->android_app_link }}" placeholder="Enter android app link">
                </div>

                <div class="form-group">
                  <label for="ios_app_link">IOS App Link (IF any) </label>
                  <input type="text" class="form-control" id="ios_app_link" name="ios_app_link" value="{{ $setting->ios_app_link}}" placeholder="Enter IOS app link">
                </div>


                <div class="form-group">
                  <label for="twitter">Twitter</label>
                  <input type="text" class="form-control" id="twitter" name="twitter" value="{{ $setting->twitter }}" placeholder="Enter twitter link">
                </div>

                <div class="form-group">
                  <label for="facebook">Facebook</label>
                  <input type="text" class="form-control" id="facebook" name="facebook" value="{{ $setting->facebook }}" placeholder="Enter facebook link">
                </div>

                <div class="form-group">
                  <label for="instagram">Instagram</label>
                  <input type="text" class="form-control" id="instagram" name="instagram" value="{{ $setting->instagram }}" placeholder="Enter instagram link">
                </div>

                <div class="form-group">
                  <label for="youtube">Youtube</label>
                  <input type="text" class="form-control" id="youtube" name="youtube" value="{{ $setting->youtube }}" placeholder="Enter youtube link">
                </div>
                <hr>
                <h3>Dashboard Setting</h3>
                <hr>
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ $setting->name }}">
                </div>
                <div class="form-group">
                  <label for="name">Website Name</label>
                  <input type="text" class="form-control" name="websiteName" value="{{ $setting->websiteName }}">
                </div>




                <div class="form-group">
                  <label>Footer </label>
                  <div id="snow-wrapper">
                    <div id="full-container">
                      <div class="editor pb-5">

                        {!!$setting->footer!!}

                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="footer" id="footer" value="{{$setting->footer}}" />
                </div>

                <div class="form-group">
                  <label for="basicSelect">Nav Bar Color</label>
                  {!! Form::select('navbarColor', \Helper::getThemeData()['navbarColor'],$setting->navbarColor, array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label for="basicSelect">Main Layout Type</label>
                  {!! Form::select('mainLayoutType', \Helper::getThemeData()['mainLayoutType'],$setting->mainLayoutType, array('class' => 'form-control')) !!}
                </div>

                <div class="form-group">
                  <label for="basicSelect">Theme</label>
                  {!! Form::select('theme', \Helper::getThemeData()['theme'],$setting->theme, array('class' => 'form-control')) !!}
                </div>

                <div class="custom-control custom-switch custom-switch-primary">
                  <p class="mb-50">Sidebar Collapsed</p>
                  <input type="checkbox" name="sidebarCollapsed" class="custom-control-input" id="customSwitch10" {{$setting->sidebarCollapsed==true? 'checked': ''}} />
                  <label class="custom-control-label" for="customSwitch10">
                    <span class="switch-icon-left"><i data-feather="check"></i></span>
                    <span class="switch-icon-right"><i data-feather="x"></i></span>
                  </label>
                </div>

                <div class="form-group">
                  <label for="basicSelect">Horizontal Menu Type</label>
                  {!! Form::select('horizontalMenuType', \Helper::getThemeData()['horizontalMenuType'],$setting->horizontalMenuType, array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label for="basicSelect">Horizontal Menu Class</label>
                  {!! Form::select('horizontalMenuType', \Helper::getThemeData()['horizontalMenuType'],$setting->horizontalMenuType, array('class' => 'form-control')) !!}
                </div>

                <div class="form-group">
                  <label for="basicSelect">Vertical Menu Navbar Type </label>
                  {!! Form::select('verticalMenuNavbarType', \Helper::getThemeData()['verticalMenuNavbarType'],$setting->verticalMenuNavbarType, array('class' => 'form-control')) !!}
                </div>

                <div class="form-group">
                  <label for="basicSelect">Footer Type</label>
                  {!! Form::select('footerType', \Helper::getThemeData()['footerType'],$setting->footerType, array('class' => 'form-control')) !!}
                </div>


                <div class="form-group">
                  <label for="basicSelect">Layout Width</label>
                  {!! Form::select('layoutWidth',\Helper::getThemeData()['layoutWidth'],$setting->layoutWidth, array('class' => 'form-control')) !!}
                </div>


                <div class="custom-control custom-switch custom-switch-primary">
                  <p class="mb-50">SHow Menu</p>
                  <input type="checkbox" name="showMenu" class="custom-control-input" id="showmenuswitch" {{$setting->showMenu==true? 'checked': ''}} />
                  <label class="custom-control-label" for="showmenuswitch">
                    <span class="switch-icon-left"><i data-feather="check"></i></span>
                    <span class="switch-icon-right"><i data-feather="x"></i></span>
                  </label>
                </div>
                <div class="custom-control custom-switch custom-switch-primary">
                  <p class="mb-50">Page Header</p>
                  <input type="checkbox" name="pageHeader" class="custom-control-input" id="pageheaderswitch" {{$setting->pageHeader==true? 'checked': ''}} />
                  <label class="custom-control-label" for="pageheaderswitch">
                    <span class="switch-icon-left"><i data-feather="check"></i></span>
                    <span class="switch-icon-right"><i data-feather="x"></i></span>
                  </label>
                </div>

                <div class="custom-control custom-switch custom-switch-primary">
                  <p class="mb-50">Blank Page</p>
                  <input type="checkbox" name="blankPage" class="custom-control-input" id="blankpageswitch" {{$setting->blankPage==true? 'checked': ''}} />
                  <label class="custom-control-label" for="blankpageswitch">
                    <span class="switch-icon-left"><i data-feather="check"></i></span>
                    <span class="switch-icon-right"><i data-feather="x"></i></span>
                  </label>
                </div>
                <div class="form-group">
                  <label for="basicSelect">Default Language</label>
                  {!! Form::select('defaultLanguage',\Helper::getThemeData()['defaultLanguage'],$setting->defaultLanguage, array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label for="basicSelect">Sidebar Position Class</label>
                  {!! Form::select('sidebarPositionClass',\Helper::getThemeData()['sidebarPositionClass'],$setting->sidebarPositionClass, array('class' => 'form-control')) !!}
                </div>

                <div class="form-group">
                  <label for="basicSelect">Content Sidebar Class</label>
                  {!! Form::select('contentsidebarClass',\Helper::getThemeData()['contentsidebarClass'],$setting->contentsidebarClass, array('class' => 'form-control')) !!}
                </div>

                <div class="form-group">
                  <label for="basicSelect">Direction</label>
                  {!! Form::select('direction',\Helper::getThemeData()['direction'],$setting->direction, array('class' => 'form-control')) !!}
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

<script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/editors/quill/katex.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/editors/quill/highlight.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/editors/quill/quill.min.js')) }}"></script>
@endsection

@section('page-script')
{{-- Page js files --}}
<script src="{{ asset(mix('js/scripts/pages/app-user-edit.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/components/components-navs.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/pages/app-setting-edit.js')) }}"></script>

@endsection