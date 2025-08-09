<section class="footer">
    <div class="sub_section">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="footer_about">
                            <img src="{{ \Helper::renderImageUrl($themeSetting->footer_logo, 'footer_logo') }}"
                                class="f-logo" width="250" alt="" />
                            {!! $themeSetting->footer_note !!}


                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="footer_link">
                            <h3>Quick Links</h3>
                            <ul>
                                @foreach ($quickLinks as $quicklink)
                                    <li>
                                        <a href="{{ $quicklink->link }}">{{ $quicklink->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="footer_link">
                            <h3>Important linlks</h3>
                            <ul>
                                @foreach ($importantLinks as $importantlink)
                                    <li>
                                        <a href="{{ $importantlink->link }}">{{ $importantlink->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-4">
                <div class="footer_link">
                    <h3>Get In Touch</h3>
                    <ul>
                        <li class="f_head">Address:</li>
                        <li class="f_text">
                            {!! $themeSetting->address !!}

                        </li>

                        <li class="f_head mt-3">Phone:</li>
                        <li class="f_text">{{ $themeSetting->phone }}</li>

                        <li class="f_head mt-4">Email: <a
                                href="mailto:{{ $themeSetting->email }}">{{ $themeSetting->email }}</a></li>
                        <li class="f_text">{{ $themeSetting->email }}</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>
