<section class="achievement d-block">
    <div class="custom-container">
        <div class="items position-relative">
            <div class="row">

                @foreach($categories as $key=> $category)
                <div class="col-12 col-sm-6 col-lg-4 text-center">
                    <div class="icon-border">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <img src="{{asset('front/assets/images/inj-icon-new-hover.svg')}}" class="hover-out" alt="">
                        </div>
                    </div>
                    <div class="p-3 pb-0">
                        <p class="mt-3"><a href="{{url('hospitals',$category->slug)}}" class="read-more-link text-capitalize">{{$category->title}}</a></p>
                        <p class="description mt-3 mb-0"> {{Helper::TitleTextLimit(strip_tags($category->description),80)}}</p>
                    </div>
                </div>

                @endforeach

            </div>
        </div>
    </div>
</section>