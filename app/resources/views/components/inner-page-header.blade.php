@section('bannertext')
    <div class="col-md-12">
        <h2 class="mx-3"> <span>{{ $pageData->title ?? 'page' }}</span></h2>
        <p>
            {{ $pageData->decription ?? '' }}
        </p>
        <div class="">
            <ol class="bcrumb m-0">
                <li class="bcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none text-Capitalize">Home</a>
                </li>
                @if (request()->is('aboutus/*') == true)
                    <li class="bcrumb-item"><a href="" class="text-decoration-none text-Capitalize">About</a>
                    </li>
                @endif

                <li class="bcrumb-item text-Capitalize active" aria-current="page">
                    {{ $pageData->banner_title ?? '' }}</li>
            </ol>
        </div>
    </div>
@endsection
