@extends('front/layouts/layout')

@section('title', 'Feedback')
@section('content')
<x-inner-page-header page='Feedback' slug='Feedback' />


    <div class="feedback">
        <div class="custom-container">
            <a  class="btn gradient-bg btn-block"  href="#" disabled>My Feedbacks</a>
            <a  class="btn gradient-bg btn-block"  href="{{route('feedback.logout')}}">Logout</a>
            {{-- <h5 class="gradient-bg feedback_heading">Add your feedback</h5> --}}
            <h3 class="mt-3">My Feedbacks</h3>

            <div class="row">

                @foreach ($feedbacks as $feedback)
                    <div class="col-md-12 feedbackItem">
                        <h4>{{$feedback->subject}}</h4>
                        <h5>{{$feedback->message}}</h5>
                        <div>
                            <span>{{$feedback->created_at}}</span>
                        </div><br>
                        <div class="p-3">
                            <h4 class="mb-3">Comments</h4>
                            @if(count($feedback->comments) > 0)
                                @foreach ($feedback->comments as $comment)
                                    <p class="mb-1">{{$comment->comment}}<br>{{$comment->created_at}}</p>
                                    <br>
                                @endforeach
                            @else
                                <p>No Comment(s) Yet.</p>
                            @endif
                        </div>
                        <hr />
                    </div>
                @endforeach
{{-- 
                <div class="col-md-12 feedbackItem">
                    <h4>Muhammad Abbas Awan</h4>
                    <h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry, has been the industry's
                        standard dummy text ever since the 1500s.</h5>
                    <p>It is a long established fact that a reader will be It is a long established fact that a reader will
                        be distracted by the readable content of a page when looking at its layout. distracted by the and
                        readable content of a page when looking at its layout. It is a long established fact that a reader
                        will be distracted by the readable content of a page when looking at its layout. It is a long the
                        established fact that a reader will be distracted by the readable content of a page when looking at
                        its layout.</p>
                    <hr />
                    <div>
                        <span>2023/01/06 </span>
                        <span>02:06:62</span>
                    </div>
                </div>

                <div class="col-md-12 feedbackItem">
                    <h4>Muhammad Abbas Awan</h4>
                    <h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry, has been the industry's
                        standard dummy text ever since the 1500s.</h5>
                    <p>It is a long established fact that a reader will be It is a long established fact that a reader will
                        be distracted by the readable content of a page when looking at its layout. distracted by the and
                        readable content of a page when looking at its layout. It is a long established fact that a reader
                        will be distracted by the readable content of a page when looking at its layout. It is a long the
                        established fact that a reader will be distracted by the readable content of a page when looking at
                        its layout.</p>
                    <hr />
                    <div>
                        <span>2023/01/06 </span>
                        <span>02:06:62</span>
                    </div>
                </div>

                <div class="col-md-12 feedbackItem">
                    <h4>Muhammad Abbas Awan</h4>
                    <h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry, has been the industry's
                        standard dummy text ever since the 1500s.</h5>
                    <p>It is a long established fact that a reader will be It is a long established fact that a reader will
                        be distracted by the readable content of a page when looking at its layout. distracted by the and
                        readable content of a page when looking at its layout. It is a long established fact that a reader
                        will be distracted by the readable content of a page when looking at its layout. It is a long the
                        established fact that a reader will be distracted by the readable content of a page when looking at
                        its layout.</p>
                    <hr />
                    <div>
                        <span>2023/01/06 </span>
                        <span>02:06:62</span>
                    </div>
                </div> --}}


            </div>
        </div>
    </div>




@endsection
