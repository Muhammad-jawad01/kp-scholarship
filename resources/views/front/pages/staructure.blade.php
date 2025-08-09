@extends('front/layouts/layout')

@section('title', 'Staructure /Organogram')
@section('content')
    <x-inner-page-header page='Staructure /Organogram' slug='staructure' />
    <style>
        .toph2 {
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

                    <div class="col-md-12 mb-4" align="center">
                        <h2 class="toph2"><span class="coloured">Organization Structure</span></h2>


                        <img src="{{ asset('front_assets/imgs/organization-structure.jpg') }}">
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
