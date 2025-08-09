@foreach ($administratives as $key => $administrative)
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="team_item line_div">
            <div class="img_div">
                @if ($administrative->getFirstMediaUrl('team') != '')
                    <img src="{{ $administrative->getFirstMediaUrl('team') }}" alt="" />
                @else
                    <img src="{{ asset('images/avatars/male.png') }}" alt="" />
                @endif
            </div>
            <h3>{{ $administrative->name }}</h3>
            <span> {{ $administrative->designation }}</span>
            <p>
                {!! substr($administrative->description, 0, 100) !!}...
                <a href="{{ route('show.message', $administrative->id) }}" class="more_link">See more</a>
            </p>
        </div>
    </div>
@endforeach
