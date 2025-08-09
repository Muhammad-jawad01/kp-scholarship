@extends('front/layouts/layout')

@section('title', 'Directorate of Implementations and Works')
@section('content')    
    <x-WorkWelcome />
    <div class="onograme">
        <h2>Oganogram</h2>

        <div class="row">
            <div class="col-md-12 ">
                <div class="img_div_onograme">
                    <img src="{{ asset('4031618.png') }}" alt="Ogoranm" class="img-fluid" />
                </div>
            </div>
        </div>
    </div>
    <x-WorkProjects />
    <x-WorkObjectives />  
  
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
