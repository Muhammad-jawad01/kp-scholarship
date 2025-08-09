@extends('front/layouts/layout')

@section('title', 'Language Center')
@section('content')
    <x-inner-page-header page='Language Center' slug='language-center' />
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

        .table_tr {
            background-color: #b8daff38
        }
    </style>
    <section class=" mt-5">

        <div class="custom-container">
            <div class="section">
                <div class="container">

                    <div class="col-md-12 mb-4">
                        <h2 class="toph2"><span class="coloured">KHYBER PAKHTUNKHWA EDUCATION FOUNDATION
                                LANGUAGE CENTERS
                            </span></h2>



                        <p>&nbsp;</p>

                        <p><span>The Chief Minister of Khyber Pakhtunkhwa launched the Chief Minister Foreign Scholarship
                                Program in 2017 to help students, educators, and the general public learn Chinese language
                                and culture, and to equip them to gain admission to various disciplines and study programs
                                at selected universities in the People's Republic of China. Under the Higher Education China
                                Pakistan Economic Cooperation (HE CPEC), 463 students were awarded foreign scholarships on
                                merit cum in-affordability basis to study in Chinese universities at the BS, MS, and PhD
                                levels.
                                To further support students in their language learning, the Khyber Pakhtunkhwa Education
                                Foundation (KPEF), upon approval by its Board of Directors (with the Chief Minister as
                                Chairman), has established Chinese Language Centers in Peshawar (Central Region). This
                                center offers Chinese University Certification courses, such as HSK-I to IV and English
                                language courses.
                                Moreover, the KPEF Management has planned to launch other language programs like Turkish and
                                German. We are committed to providing high-quality education and language training
                                opportunities to our students. KPEF invites you to join us in this endeavor.
                                .
                            </span></p>
                        <p>&nbsp;</p>
                        <h2 class="toph2">Courses Offered</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="subP"> S#</th>
                                    <th class="subP">Language</th>
                                    <th class="subP">Courses</th>
                                    <th class="subP">Duration</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="table_tr">

                                    <td>01</td>
                                    <td>Chinese</td>
                                    <td>HSK-I to HSK-III</td>
                                    <td>06 months</td>
                                </tr>
                                <tr>
                                    <td>02</td>
                                    <td>English</td>
                                    <td>Communication Skills, Academic English, IELTS & TOEFL Preparation, A1-A2, B1-B2,
                                        C1-C3
                                    </td>
                                    <td>3 months (each)</td>
                                </tr>
                            </tbody>
                        </table>

                        <h2 class="toph2">Fee Structure</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="subP">S#</th>
                                    <th class="subP">Particular</th>
                                    <th class="subP">English</th>
                                    <th class="subP">Chinese</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="table_tr">
                                    <td>01.</td>
                                    <td>Registration/Admission Fee</td>
                                    <td>1000</td>
                                    <td>1000</td>
                                </tr>
                                <tr>
                                    <td>02.</td>
                                    <td>Monthly Tuition Fee</td>
                                    <td>2000</td>
                                    <td>1000</td>
                                </tr>
                                <tr class="table_tr">
                                    <td>03.</td>
                                    <td>Student Card Fee</td>
                                    <td>100</td>
                                    <td>100</td>
                                </tr>
                                <tr>
                                    <td>04.</td>
                                    <td>Security (Refundable)</td>
                                    <td>1000</td>
                                    <td>1000</td>
                                </tr>
                            </tbody>
                        </table>

                        <h2 class="toph2">Timings</h2>
                        <p >Morning: 11:00 hrs to 13:00 hrs</p>
                        <p>Evening:</p>
                        <p>A) 14:00 hrs to 16:00 hrs</p>
                        <p>B) 16:00 hrs to 18:00 hrs</p>
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
