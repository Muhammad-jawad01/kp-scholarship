@extends('front/layouts/layout')

@section('title', 'Feedback')
@section('content')
<x-inner-page-header page='Feedback' slug='Feedback' />


    <div class="feedback">
        <div class="custom-container">
            <a  class="btn gradient-bg btn-block"  href="{{route('user.feedbacks')}}">My Feedbacks</a>
            <a  class="btn gradient-bg btn-block"  href="{{route('feedback.logout')}}">Logout</a>
            @if(Session::get('success'))
            <p class="bg-success p-3 opacity-75 rounded text-white">{{Session::get('success')}}</p>
            @endif
            @if(Session::get('error'))
                <p class="bg-danger p-3 opacity-75 rounded text-white">{{Session::get('error')}}</p>
            @endif
            <form action="{{route('add.feedback')}}" method="POST" class="confitation" accept-charset="utf-8">
                @csrf
                <div class="row">

                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label for="subject">Subject <span>*</span></label>
                            <input type="text" name="subject" class="form-control" placeholder="Enter subject">
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label for="message">Feedback <span>*</span></label>
                            <textarea name="message" id="" cols="90" rows="3" class="form-control"
                                placeholder="Enter your feedback"></textarea>
                            @error('message')
                                <span><b style="color: red">{{ $message }}</b></span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <button type="submit" class="btn gradient-bg btn-block w-100 py-2">Submit feedback</button>
                        </div>
                    </div>

                </div>

            </form>

        </div>
    </div>




@endsection
