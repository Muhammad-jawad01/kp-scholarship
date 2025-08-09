<section class="gallery_section">

    <div class="custom-container">
        <div class="section">
            <div class="container">
                {{-- @if (count($galleries) > 0) --}}
                <div class="row">
                    <div class="col-xs-12">
                        <div class="gallery_portfolio">
                            @foreach ($galleries as $gallery)
                                @php $mediaItems = $gallery->getMedia('gallary') @endphp
                                {{-- @if (count($mediaItems) > 0) --}}
                                @foreach ($mediaItems as $key => $media)
                                    <div class="box">
                                        <a href="{{ $mediaItems[$key]->getFullUrl() }}" data-fancybox="gallery">
                                            <img src="{{ $mediaItems[$key]->getFullUrl() }}" alt="">
                                        </a>
                                    </div>
                                @endforeach
                                {{-- @endif --}}
                            @endforeach
                        </div>
                    </div>
                </div>
                {{-- @else
                <h4 class="text p-4">No Image Found !</h4> --}}

                {{-- @endif --}}
            </div>
        </div>
    </div>
</section>
