@extends('front/layouts/layout')

@section('title', 'Kohat Academy')
@section('content')
    <x-inner-page-header page='Kohat Academy' slug='kohat-academy' />
    <style>
        .toph2 {
            text-align: center;
            font-weight: bold;
            color: #125f69;
            font-size: 40px !important;
        }

        .subP {
            color: #125f69;
            font-family: Calibri, sans-serif;
            font-size: 11pt;
            text-align: center
        }

        .ptitle {
            color: #125f69;
            font-family: Calibri, sans-serif;
            text-align: center;
            font-size: 18px;
        }

        ol[type="I"] li::marker {
            font-weight: bold;
            list-style-type: upper-roman;

        }

        ol li {
            margin-top: 10px !important;
            margin-bottom: 10px !important;

        }
    </style>
    <section class=" mt-5">

        <div class="custom-container">
            <div class="section">
                <div class="container">

                    <div class="col-md-12 mb-4">
                        <h2 class="toph2"><span class="coloured">KPEF Academy Kohat
                            </span></h2>



                        <p>&nbsp;</p>

                        <p>
                            <span>KPEF Academy works under the ambit of Khyber Pakhtunkhwa Education Foundation, a corporate
                                body established under an act of the Provincial Assembly in 1992. Khyber Pakhtunkhwa
                                Education Foundation established the first institute for training of college teachers in the
                                country. KPEF Academy at Kohat is functioning successfully since 2003 and has so far trained
                                3738 trainees including 1305 female teachers through as many as 99 courses and workshops.
                                In view of un-deniable importance of the role of teacher training in improving the teaching
                                standards and ensuring learning outcomes, KPEF is giving special support in terms of
                                finance, guidance, infrastructure, HR & equipment etc to strengthen KPEF Academy Kohat. The
                                Academy has its own purpose built building in KDA Kohat to make the training courses more
                                effective.</span>
                        </p>
                        <p>&nbsp;</p>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="gallery_section mt-5">

        <div class="custom-container">
            <div class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="gallery_portfolio">
                                <div class="box">
                                    <a href="{{ asset('assets/kpefa/fefa2.jpg') }}" data-fancybox="gallery">
                                        <img src="{{ asset('assets/kpefa/fefa2.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="box">
                                    <a href="{{ asset('assets/kpefa/fefa3.jpg') }}" data-fancybox="gallery">
                                        <img src="{{ asset('assets/kpefa/fefa3.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="box">
                                    <a href="{{ asset('assets/kpefa/fefa4.jpg') }}" data-fancybox="gallery">
                                        <img src="{{ asset('assets/kpefa/fefa4.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="box">
                                    <a href="{{ asset('assets/kpefa/fefa5.jpg') }}" data-fancybox="gallery">
                                        <img src="{{ asset('assets/kpefa/fefa5.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="box">
                                    <a href="{{ asset('assets/kpefa/fefa6.jpg') }}" data-fancybox="gallery">
                                        <img src="{{ asset('assets/kpefa/fefa6.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="box">
                                    <a href="{{ asset('assets/kpefa/fefa7.jpg') }}" data-fancybox="gallery">
                                        <img src="{{ asset('assets/kpefa/fefa7.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="box">
                                    <a href="{{ asset('assets/kpefa/fefa8.jpg') }}" data-fancybox="gallery">
                                        <img src="{{ asset('assets/kpefa/fefa8.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="box">
                                    <a href="{{ asset('assets/kpefa/fefa9.jpg') }}" data-fancybox="gallery">
                                        <img src="{{ asset('assets/kpefa/fefa9.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="box">
                                    <a href="{{ asset('assets/kpefa/fefa14.jpg') }}" data-fancybox="gallery">
                                        <img src="{{ asset('assets/kpefa/fefa14.jpg') }}" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
    <script type="text/javascript">
        //
    </script>
@endsection
