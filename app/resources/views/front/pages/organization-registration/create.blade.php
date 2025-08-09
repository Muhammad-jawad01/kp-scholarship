@extends('front/layouts/layout')

@section('title', 'Organization Registration')
@section('content')
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')) }}">
<section class="d-block page-title-banner" style="background-image: url('{{ $pageData? $pageData->getFirstMediaUrl('banner'): '#'}}');">
    <div class="banner-overlay">
        <div class="custom-container">
            <div class="d-flex flex-column align-items-center justify-content-center title-con">
                <div>
                    <!-- <h1 class="page-title fw-bold">Project</h1> -->
                    <h1 class="page-title fw-bold d-block">{{$category->title?? 'Organization Registration'}}</h1>
                </div>

            </div>
            <!-- <div class="breadcrumbs-con">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{url('/')}}" class="text-decoration-none">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$category->title?? 'Page'}}</li>
                    </ol>
                </nav>
            </div> -->
        </div>
    </div>
</section> 
<section class="news-page-details">
    <div class="custom-container">
    @if(Session::get('success'))
        <p class="p-2 text-center bg-success text-white">{{ Session::get('success') }}</p>
    @endif
    <form action="{{route('organization.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="organization">Organization</label>
                    <input type="text" class="form-control" id="organization" name="organization" placeholder="Organization" value="{{old('organization')}}">
                    @error('organization')
                        <span><b style="color: red">{{$message}}</b></span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="executive-bodies">List of Executive Bodies</label>
                    <select class="form-control" name="executive-bodies" id="">
                        <option value="">CEO</option>
                        <option value="">CIO</option>
                    </select>
                </div>        
            </div>
            </div>
            <br>
            <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="general-bodies">List of General Bodies</label>
                    <select class="form-control" name="general-bodies" id="">
                        <option value="">CEO</option>
                        <option value="">CIO</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="affidavit">Affidavit (only image and pdf are allowed)</label>
                    <input type="file" name="affidavit" id="affidavit" class="form-control" value="{{old('affidavit')}}">
                    @error('affidavit')
                        <span><b style="color: red">{{$message}}</b></span>
                    @enderror
                </div>        
            </div>
            </div>
            <br>
            <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="affiliation-non-political">Affiliation Non Political</label>
                    <select class="form-control" name="affiliation-non-political" id="">
                        <option value="">CEO</option>
                        <option value="">CIO</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control" placeholder="Address" value="{{old('address')}}">
                    @error('address')
                        <span><b style="color: red">{{$message}}</b></span>
                    @enderror
                </div>        
            </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="contact">Contact</label>
                        <input type="text" name="contact" id="contact" class="form-control" placeholder="Contact" value="{{old('contact')}}">
                        @error('contact')
                            <span><b style="color: red">{{$message}}</b></span>
                        @enderror
                    </div>        
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cnic-formb">CNIC/Form-B</label>
                        <input type="text" name="cnic-formb" id="cnic-formb" class="form-control" placeholder="CNIC/Form-B" value="{{old('cnic-formb')}}">
                        @error('cnic-formb')
                            <span><b style="color: red">{{$message}}</b></span>
                        @enderror
                    </div>        
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="registered-youth">Registered Youth (Max: 200)</label>
                        <input type="number" name="registered-youth" id="registered-youth" class="form-control" value="{{old('registered-youth')}}">
                        @error('registered-youth')
                            <span><b style="color: red">{{$message}}</b></span>
                        @enderror
                    </div>        
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="age">Age (Min: 15, Max: 29)</label>
                        <input type="number" name="age" id="age" class="form-control" value="{{old('age')}}">
                        @error('age')
                            <span><b style="color: red">{{$message}}</b></span>
                        @enderror
                    </div>        
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="office-setup">Office Setup</label>
                        <select class="form-control" name="office-setup" id="">
                            <option value="">Setup 1</option>
                            <option value="">Setup 2</option>
                        </select>
                    </div>        
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="bank-account-number">Bank Account Number</label>
                        <input type="text" name="bank-account-number" class="form-control" placeholder="Bank Account Number" value="{{old('bank-account-number')}}">
                        @error('bank-account-number')
                            <span><b style="color: red">{{$message}}</b></span>
                        @enderror
                    </div>        
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ntn">National Tax Number</label>
                        <input type="text" name="ntn" id="ntn" class="form-control" placeholder="National Tax Number" value="{{old('ntn')}}">
                        @error('ntn')
                            <span><b style="color: red">{{$message}}</b></span>
                        @enderror
                    </div>        
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="previous-record">Previous Record (document proof)</label>
                        <input type="file" name="previous-record" id="previous-record" class="form-control" value="{{old('previous-record')}}">
                        @error('previous-record')
                            <span><b style="color: red">{{$message}}</b></span>
                        @enderror
                    </div>       
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="website-link">Website Link</label>
                        <input type="text" name="website-link" class="form-control" placeholder="Website Link" value="{{old('website-link')}}">
                        @error('website-link')
                            <span><b style="color: red">{{$message}}</b></span>
                        @enderror
                    </div>   
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="{{old('email')}}">
                        @error('email')
                            <span><b style="color: red">{{$message}}</b></span>
                        @enderror
                    </div>   
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="controlling-authority">Controlling Authority</label>
                        <input type="text" name="controlling-authority" class="form-control" placeholder="Controlling Authority" value="{{old('controlling-authority')}}">
                    </div>  
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="">
                            <option value="">National</option>
                            <option value="">International</option>
                            <option value="">Provisonal</option>
                            <option value="">Local</option>
                        </select>
                    </div>         
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="work-field-area">Area of Work Field</label>
                        <input type="text" name="work-field-area" class="form-control" placeholder="Area of Work Field" value="{{old('work-field-area')}}">
                        @error('work-field-area')
                            <span><b style="color: red">{{$message}}</b></span>
                        @enderror
                    </div>       
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="">
                            <option value="">Profitable</option>
                            <option value="">Non Profitable</option>
                        </select>
                    </div>        
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="funding-source">Source of Funding</label>
                        <input type="text" name="funding-source" class="form-control" placeholder="Source of Funding" value="{{old('funding-source')}}">
                        @error('funding-source')
                            <span><b style="color: red">{{$message}}</b></span>
                        @enderror
                    </div>          
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6 d-flex justify-content-end">
                <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Captcha</label>
                            <div class="col-md-8">
                                {!! app('captcha')->display() !!}
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                </div>
                <div class="col-md-4">
                <button class="btn btn-primary mt-5">Register</button>
                </div>
            </div>
            </form>
        </div>
</section>

@endsection

@section('script')
{{-- vendor files --}}

{!! NoCaptcha::renderJs() !!}
<script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
<script>
    $(document).ready(function() {

        $('.datatable').DataTable();
    });
</script>
@endsection