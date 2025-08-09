@extends('front/layouts/layout')

@section('title', 'Board of Directors')
@section('content')
    <x-inner-page-header page='Board of Directors' slug='board-of-directors' />
    <style>
        .table_tr {
            background-color: #b8daff38
        }

          .toph2  {
            text-align: center;
            font-weight: bold;
            color: #125f69;
            font-size: 40px !important;
        }
    </style>
    <section class=" mt-5">

        <div class="custom-container">
            <div class="section">
                <div class="container">

                    <h2 class="toph2">
                        <span class="coloured">Board of
                            Directors</span>
                    </h2>

                    <p align="justify">The Government Khyber Pakhtunkhwa under Section 4 of KPEF Act III of 1992 as
                        amended from time to time, constituted Board of Directors empowered with decisions on all
                        affairs of KPEF regarding administration &amp; management .The existing Board comprised of the
                        following.</p>


                    <table class="table">
                        <tbody>
                            <tr class="table_tr">
                                <td>1</td>
                                <td>Chief Minister, Government of Khyber Pakhtunkhwa </td>
                                <td>Chairman</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Minister for Higher Education, Government of Khyber Pakhtunkhwa </td>
                                <td>Vice Chairman</td>
                            </tr>
                            <tr class="table_tr">
                                <td>3</td>
                                <td>Minister for Finance, Government of Khyber Pakhtunkhwa </td>
                                <td>Member</td>
                            </tr>
                            <tr class="table_tr">
                                <td>4</td>
                                <td>Secretary to Govt. of Khyber Pakhtunkhwa Higher Education, Archives &amp;
                                    Libraries Department.</td>
                                <td>Member</td>
                            </tr>
                            <tr class="table_tr">
                                <td>5</td>
                                <td>Secretary to Govt. of Khyber Pakhtunkhwa
                                    Planning &amp; Dev.Deptt.</td>
                                <td>Member</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Nominee of Education Deptt: Government of Pakistan Ministry of Education</td>
                                <td>Member</td>
                            </tr>
                            <tr class="table_tr">
                                <td>7</td>
                                <td>Three Nominees of the Chief Minister from private sector education
                                    Institutions<br>including a female</td>
                                <td>Member</td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>Managing Director Bank of Khyber</td>
                                <td>Member</td>
                            </tr>
                            <tr class="table_tr">
                                <td>9</td>
                                <td>President Khyber Pakhtunkhwa Bar Council or his nominee</td>
                                <td>Member</td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>President Pakistan Medical Association or his nominee</td>
                                <td>Member</td>
                            </tr>
                            <tr class="table_tr">
                                <td>11</td>
                                <td>President Chamber of Commerce and Industries, Khyber Pakhtunkhwa or his nominee
                                </td>
                                <td>Member</td>
                            </tr>
                            <tr>
                                <td>12</td>
                                <td>President Pakistan Engineering Council or his nominee</td>
                                <td>Member</td>
                            </tr>
                            <tr class="table_tr">
                                <td>13</td>
                                <td>One eminent educationist nominated by Chief Minister Khyber Pakhtunkhwa</td>
                                <td>Member</td>
                            </tr>
                            <tr>
                                <td>14</td>
                                <td>Managing Director Khyber Pakhtunkhwa Education Foundation</td>
                                <td>Member/Secretary</td>
                            </tr>
                        </tbody>
                    </table>

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
