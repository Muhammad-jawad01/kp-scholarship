<section class="custom-container latest-news-section">
    <div class="sec-title">
        <p class="title-top text-uppercase text-center">NEWS</p>
        <h2 class="title text-capitalize text-center">Latest from Our Department</h2>
    </div>
    <div class="news-slider-arrows d-flex flex-row align-items-center justify-content-end gap-2">
        <div>
            <img src="{{ asset('front/assets/images/news-prev-arrow.svg') }}" class="prev-arrow arrows" alt="" />
        </div>
        <div>
            <img src="{{ asset('front/assets/images/news-next-arrow.svg') }}" class="next-arrow arrows" alt="" />
        </div>
    </div>
    <div class="latest-news-slider-box">
        <div class="latest-news-slider">

            @foreach ($news as $new)
                <div>
                    <div class="news-item position-relative">
                        <div class="news-image" style="background-image: url('{{ $new->getFirstMediaUrl('news') }}');">
                        </div>
                        <div class="news-details-box">
                            <div class="news-details">
                                <button class="btn fullscreen" d-data="{{ $new->getFirstMediaUrl('news') }}"><i
                                        class="fa fa-expand"></i></button>
                                <div class="d-flex justify-content-end align-items-start">
                                    <div class="date text-center">
                                        <span class="day d-block">{{ $new->created_at->format('d') }}</span>
                                        <span class="month d-block">{{ $new->created_at->format('M, y') }}</span>
                                    </div>
                                </div>
                                <div class="d-flex flex-column description align-items-start">
                                    <div>
                                        <span class="text-uppercase title-sm">{{ ucfirst($new->categoryTitle) }}</span>
                                    </div>
                                    <div class="m-title">
                                        <a href="{{ url('news/' . $new->slug) }}">
                                            {{ Str::limit($new->title, 30, $end = '...') }}</a>
                                    </div>
                                    <div class="short-description">
                                        {{ Str::limit($new->short_description, 30, $end = '...') }}
                                    </div>
                                    <div class="read-more-link">
                                        <a href="{{ url('news/' . $new->slug) }}"
                                            class="d-flex flex-row align-items-center justify-content-center gap-2"><span>Read
                                                More</span><img
                                                src="{{ asset('front/assets/images/angle-small-right.svg') }}"
                                                alt="" /></a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <img src="" id="showImage" alt="">
            </div>
        </div>
    </div>
</div>
@section('script')
    <script>
        $(document).ready(function() {
            $('.fullscreen').click(function() {
                let value = $(this).attr('d-data');
                let img = $("#showImage")
                let path = value
                img.attr('src', path)
                $('#exampleModal').modal('show');
            });
        });
    </script>
@endsection
