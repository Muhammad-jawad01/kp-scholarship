        <div class="banner_slider">
            @foreach ($slides as $slide)
                <div>

                    <div class="banner_items">
                        <div class="row">
                            <div class="col-md-10 mx-auto">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="left">
                                            <h2>
                                                <span>{{ $slide->title }}</span>
                                            </h2>
                                            <p>
                                                <b></b> <br />
                                            <p class="title-main">{!! \Helper::languageConvert($slide, 'description') !!}</p>

                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <img class="img-fluid" src="{{ $slide->getFirstMediaUrl('slide') }}"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
