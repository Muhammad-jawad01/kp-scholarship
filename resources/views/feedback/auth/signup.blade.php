@extends('layouts.LoginLayout')

@section('title', 'Sign Up - Feedback')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/page-auth.css')) }}">
@endsection

@section('content')
<div class="auth-wrapper auth-v1 px-2">
  <div class="auth-inner py-2">
    <!-- Login v1 -->
    <div class="card mb-0">
      <div class="card-body">
        <a href="javascript:void(0);" class="brand-logo">

     
          <!-- <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="28">
            <defs>
              <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                <stop stop-color="#000000" offset="0%"></stop>
                <stop stop-color="#FFFFFF" offset="100%"></stop>
              </lineargradient>
              <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                <stop stop-color="#FFFFFF" offset="100%"></stop>
              </lineargradient>
            </defs>
            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
              <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                <g id="Group" transform="translate(400.000000, 178.000000)">
                  <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill: currentColor"></path>
                  <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
                  <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                  <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                  <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                </g>
              </g>
            </g>
          </svg> -->
          <h2 class="brand-text text-primary ml-1">{{$themeSetting->websiteName}}</h2>
        </a>

        <!-- <h4 class="card-title mb-1">Welcome to {{$themeSetting->websiteName}}! 👋</h4>
        <p class="card-text mb-2">Please sign-in to your account and start the adventure</p> -->

        <form class="auth-login-form mt-2" method="POST" action="{{route('feedback.register')}}" enctype="multipart/form-data">
          @csrf
         
          <div class="form-group">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" aria-describedby="name" tabindex="1" autofocus value="{{ old('name') }}" />
                    @error('name')
                    <span>
                    <p style="color: red;">{{ $message }}</p>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="gender" class="form-label">Gender</label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="0"> -- Select Gender -- </option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Transgender">Transgender</option>
                    </select>
                    @error('gender')
                    <span>
                    <p style="color: red;">{{ $message }}</p>
                    </span>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" aria-describedby="email" tabindex="1" autofocus value="{{ old('email') }}" />
                    @error('email')
                    <span>
                    <p style="color: red;">{{ $message }}</p>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="mobile_no" class="form-label">Mobile Number</label>
                    <input type="text" class="form-control @error('mobile_no') is-invalid @enderror" id="mobile_no" name="mobile_no" placeholder="Mobile Number" aria-describedby="mobile_no" tabindex="1" autofocus value="{{ old('mobile_no') }}" />
                    @error('mobile_no')
                    <span>
                    <p style="color: red;">{{ $message }}</p>
                    </span>
                    @enderror
                </div>
             
                <div class="form-group">
                <label for="password" class="form-label">Password</label>
                    <div class="input-group input-group-merge form-password-toggle">
                    <input type="password" class="form-control form-control-merge" id="password" name="password" tabindex="2" placeholder="Password" aria-describedby="password" />
                    <div class="input-group-append">
                        <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                    </div>
                    </div>
                    @error('password')
                    <span>
                    <p style="color: red;">{{ $message }}</p>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <div class="input-group input-group-merge form-password-toggle">
                    <input type="password" class="form-control form-control-merge" id="" name="password_confirmation" tabindex="2" placeholder="Confirm Password" aria-describedby="password_confirmation" />
                    <div class="input-group-append">
                        <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                    </div>
                    </div>
                    @error('password_confirmation')
                    <span>
                    <p style="color: red;">{{ $message }}</p>
                    </span>
                    @enderror
                </div>
        
                <div class="form-group">
                  <strong>ReCaptcha:</strong>
                  <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
                  @if ($errors->has('g-recaptcha-response'))
                      <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                  @endif
              </div>  

          <!-- <div class="form-group">
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox" id="remember" name="remember" tabindex="3" {{ old('remember') ? 'checked' : '' }} />
              <label class="custom-control-label" for="remember"> Remember Me </label>
            </div>
          </div> -->
          <button type="submit" class="btn btn-primary btn-block" tabindex="4">Sign Up</button>
        </form>

        <p class="text-center mt-2">
          <span>Already have an account? <a class="btn btn-success" href="{{route('feedback.login')}}">Login</a></span>
          @if (Route::has('register'))
          <a href="{{ route('register') }}">
            <span>Create an account</span>
          </a>
          @endif
        </p>

        <!-- <div class="divider my-2">
          <div class="divider-text">or</div>
        </div> -->

        <!-- <div class="auth-footer-btn d-flex justify-content-center">
          <a href="javascript:void(0)" class="btn btn-facebook">
            <i data-feather="facebook"></i>
          </a>
          <a href="javascript:void(0)" class="btn btn-twitter white">
            <i data-feather="twitter"></i>
          </a>
          <a href="javascript:void(0)" class="btn btn-google">
            <i data-feather="mail"></i>
          </a>
          <a href="javascript:void(0)" class="btn btn-github">
            <i data-feather="github"></i>
          </a>
        </div> -->
      </div>
    </div>
    <!-- /Login v1 -->
  </div>
</div>
@endsection