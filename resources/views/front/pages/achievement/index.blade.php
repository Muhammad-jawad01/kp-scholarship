@extends('front/layouts/layout')

@section('title', 'Events')
@section('content')


    <x-inner-page-header page='Events' />

    <section class="our_projects">
        <div class="sub_section">
            <div class="row">
                <div class="col-md-10 mx-auto">

                    @foreach ($events as $data)
                        <div class="happnings_items">
                            <div class="row">

                                <div class=" col-md-4 "
                                    style="background-image: url('{{ $data->getFirstMediaUrl('event') }}');background-repeat: no-repeat; background-size: 100%;">


                                </div>
                                <div class="col-md-7">

                                    <span> {{ $data->created_at->format('D  M  Y') }}</span>
                                    <h4>
                                        {{ Str::limit($data->title, 30, $end = '...') }}

                                    </h4>

                                    <table class="table newtable">
                                        <tbody>
                                            <tr>

                                                <th>Audience</th>
                                                <td>{{ $data->audience }}</td>

                                                <th>Participants</th>

                                                <td>{{ $data->participants }}</td>

                                                <th colspan="2">Venue</th>

                                                <td colspan="2">{{ $data->venue }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p>
                                        {{ Str::limit($data->description, 30, $end = '...') }} <a
                                            href="{{ url('event/' . $data->id) }}">

                                            View Details </a>

                                    </p>
                                </div>

                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </section>

@endsection
