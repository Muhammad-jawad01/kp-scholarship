<div class="custom-container banner-section">
    <div class="banner-slider">

        @foreach ($slides as $slide)
            <div data-bgImage="{{ $slide->getFirstMediaUrl('slide') }}">
               
            </div>
        @endforeach

    </div>
    <!--Slider arrow append here. please do not delete-->
    <!-------------------------------------------------->

</div>
