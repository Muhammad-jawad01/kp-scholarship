@extends('front.layouts.layout')

@section('title', 'Directorate of Implementations and Work')
@section('content')

    <x-HealthWelcome />
    <x-AdminHead />

    <x-Acievement />
    <!-- <x-Projects /> -->

    <!-- <x-Counter /> -->
    <x-news />

    <!-- <x-Twitter />  -->

@endsection
@section('script')

<script>
    $(document).ready(function(){
        $('.show-more-btn').click(function(){
            $('.less-content').each(function(){ 
                var id = $(this).attr('d-data');
                alert(id);
            });

        });
        
    });
</script>
@endsection
