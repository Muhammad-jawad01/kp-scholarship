@extends('front/layouts/layout')

@section('title', $pageData->title)
@section('content')
    <x-inner-page-header page='{{ $pageData->title }}' slug='{{ $pageData->slug }}' />
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
    </style>
    <section class=" mt-5">

        <div class="custom-container">
            <div class="section">
                <div class="container">

                    <div class="col-md-12 mb-4" align="center">
                        <h2 class="toph2"><span class="coloured">{{ $scholarship->name }}</span></h2>
                        <p style="margin-left:0in; margin-right:0in; text-align:justify"><span style="font-size:18px"><span
                                    style="font-family:Calibri,sans-serif"></span>{{ $scholarship->description }}</span></p>


                        <p style="margin-left:0in; margin-right:0in; text-align:justify"><span style="font-size:18px"><span
                                    style="font-family:Calibri,sans-serif">For Year : </span>{{ $scholarship->year }}</span>
                        </p>

                        <p style="margin-left:0in; margin-right:0in; text-align:justify"><span style="font-size:18px"><span
                                    style="font-family:Calibri,sans-serif">Uploaded On :
                                </span>{{ $scholarship->created_at }}</span></p>



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
