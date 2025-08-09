@extends('front/layouts/layout')

@section('title', 'Hospitals')
@section('content')
<x-inner-page-header page='Hospitals' />

<section class="news-page-details">
    <div class="custom-container">


        <div class="card">
            <div class="card-header">
                <h3>{{$category->title ?? ''}}</h3>
            </div>
            <div class="card-body">
                <div class="table table-responsive pt-0">

                    <table class="table table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>District</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($hospitals)==0)
                            <tr>
                                <td colspan="5">Sorry No Data Found!</td>
                            </tr>
                            @endif

                            @foreach($hospitals as $key=> $hospital)


                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$hospital->name}}</td>
                                <td>{{$hospital->has('hospital_category')? $hospital->hospital_category->title: ''}}</td>
                                <td>
                                    {{$hospital->has('district')? $hospital->district->district_name: ''}}
                                </td>
                                <td>
                                    <a href="https://www.google.com/maps/search/?api=1&query={{$hospital->lat}},{{$hospital->lng}}" target="_blank" class="btn btn-sm btn-primary">View</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="d-block w-100 text-center mb-5">



            {!! $hospitals->links('pagination::custom') !!}

        </div>
    </div>
</section>
@endsection