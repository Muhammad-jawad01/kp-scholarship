@extends('front/layouts/layout')

@section('title', 'Contact Us')
@section('content')
    <x-inner-page-header page='contact-us' slug='contact-us' />

    <section class="contactus">
        <div class="sub_section">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="contact_detial">
                        <h3>Contact Us</h3>
                        <p></p>

                        <h3>Head Office Peshawar</h3>

                        <ul>
                            <li class="f_head">Address: </li>
                            <li class="f_text"> {!! $themeSetting->address !!}</li>


                            <li class="f_head mt-3">Phone: </li>
                            <li class="f_text"> {{ $themeSetting->phone }}</li>

                            <li class="f_head mt-4">Email: </li>
                            <li class="f_text">{{ $themeSetting->email }}</li>
                        </ul>


                        <h3>KPEF Academy Kohat</h3>

                        <ul>
                            <li class="f_head">Address: </li>
                            <li class="f_text">KPEF Academy Gate # 03 Near Family Park Sector # 09 KDA, Kohat.</li>


                            <li class="f_head mt-3">Phone: </li>
                            <li class="f_text">Phone: 0922-513943</li>

                            <li class="f_head mt-4">Email: </li>
                            <li class="f_text">kpefacademy@kpef.edu.pk</li>
                        </ul>


 			<h3>KPEF Language Center Peshawar</h3>

                        <ul>
                            <li class="f_head">Address: </li>
                            <li class="f_text">E-1 , Near Rivoli Guest House Abdara Road University Town, Peshawar.</li>


                            <li class="f_head mt-3">Phone: </li>
                            <li class="f_text">Phone: 091-5619540</li>

                            <li class="f_head mt-4">Email: </li>
                            <li class="f_text">lcpesh@kpef.edu.pk</li>
                        </ul>

                        <div class="contact_social">
                            <ul>
                                <li><a href=""><i class="fab fa-facebook"></i></a></li>
                                <li><a href=""><i class="fab fa-twitter"></i></a></li>
                                <li><a href=""><i class="fab fa-google"></i></a></li>
                                <li><a href=""><i class="fab fa-instagram"></i></a></li>
                                <li><a href=""><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="contact_form">
                        <h2>Have Questions?</h2>
                       <form action="{{ url('sendemail') }}" class="" method="post" accept-charset="utf-8">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" placeholder="Your name *"
                                    name="name" value="{{ old('name') }}" />
                                @error('name')
                                    <span><b style="color: red">{{ $message }}</b></span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Your e-mail address *"
                                    name="email" value="{{ old('email') }}" />
                                @error('email')
                                    <span><b style="color: red">{{ $message }}</b></span>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <input type="text" class="form-control" pattern="[0][3][0-9]{9}" id="phone"
                                    placeholder="Phone Number *" name="phone" value="{{ old('phone') }}" />
                                @error('phone')
                                    <span><b style="color: red">{{ $message }}</b></span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Subject *" name="subject"
                                    value="{{ old('subject') }}" />
                                @error('subject')
                                    <span><b style="color: red">{{ $message }}</b></span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <textarea name="message" class="form-control" placeholder="Your message" id="" cols="30" rows="8"></textarea>
                            </div>

                            <div class="form-group">
                                <button class="active" type="submit" name="form_contact">Send Message</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>


@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js">
        < script >
            $(document).ready(function() {
                function allowOnlyAlphabets(event) {
                    var value = String.fromCharCode(event.which);
                    var pattern = new RegExp(/[a-zåäö ]/i);
                    return pattern.test(value);
                }

                $("#name").bind('keypress', allowOnlyAlphabets);
            });
    </script>
    <script>
        $(() => {
            function allowOnlyAlphabets(event) {
                var value = String.fromCharCode(event.which);
                var pattern = new RegExp(/[a-zåäö ]/i);
                return pattern.test(value);
            }
            $("#phone").inputmask("03999999999");
            $("#name").bind('keypress', allowOnlyAlphabets);
        });
    </script>
@endsection
