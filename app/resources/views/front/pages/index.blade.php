@extends('front/layouts/layout')

@section('title', 'Home')
@section('content')

    <x-image />
    <section class="text_section">
        <div class="sub_section">

            <x-HealthWelcome />
            <div class="team">
                <div class="row">
                    <x-AdminHead />

                </div>
            </div>
        </div>
    </section>


    <x-Acievement />
    <!-- <x-Projects /> -->

    <!-- <x-Counter /> -->

    <!-- <x-Twitter />  -->
    <x-gallery />

    {{-- <x-Projects /> --}}



@endsection
@section('script')

    <script>
        $(document).ready(function() {
            $('.show-more-btn').click(function() {
                $('.less-content').each(function() {
                    var id = $(this).attr('d-data');
                    alert(id);
                });

            });

        });
    </script>
@endsection
