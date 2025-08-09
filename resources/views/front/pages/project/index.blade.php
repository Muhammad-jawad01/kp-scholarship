@extends('front/layouts/layout')

@section('title', 'Projects')
@section('content')
<x-inner-page-header page='projects' />
<section class="page-details">
    <div class="custom-container">
        <div class="d-flex flex-column flex-lg-row align-items-center justify-content-between gap-3">
            <div class="description align-self-stretch">
                <article>
                    <p class="top-text mt-0">{{ $pageData->slogan ?? 'KP Youth Affairs Department is continuously working with stakeholders'}}</p>
                    <h2 class="title">{{ $pageData->title?? 'To make sure citizens Receive the quality of life'}}</h2>
                    <p class="details-text">
                        {!! $pageData->description ?? 'Health Department-KP is a public entity; guiding health policies, governing healthcare institutions and leading healthcare interventions in Khyber Pakhtunkhwa. Towards decentralization and digitalization, it aims to provide
                        healthcare at your doorstep. Devolved into healthcare education and service provision, the department; ensure and realizes supply and demand equilibrium, channelizing healthcare knowledge attitudes and practices on modern
                        scientific patterns, however, synchronizing learned techniques with beliefs, local values and norms.'!!}
                    </p>

                </article>
            </div>
            <figure class="w-100 overflow-hidden m-0">
                <img class="w-100 h-auto" src="{{$pageData->getFirstMediaUrl('page')}}" alt="" />
            </figure>
        </div>
    </div>
</section>
<section class="all-projects">
    <div class="custom-container">
        <div class="sec-title">
            <p class="title-top text-uppercase text-center"> {{ __('locale.Projects') }}</p>
            <h2 class="title text-capitalize text-center"> {{ __('locale.Explore Our Department') }}</h2>
        </div>
        <div class="d-flex flex-row flex-wrap align-content-center justify-content-evenly justify-content-xl-between">

            @foreach($projects as $key=> $project)
            <div class="project-item position-relative">
                <div class="project-bg" style="background-image: url({{$project->getFirstMediaUrl('project')}});">
                    <div class="overlay"></div>
                </div>
                <div class="project-details d-flex flex-column align-items-center">
                    <div class="icon-border">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <img src="{{asset('front/assets/images/building-icon.svg')}}" class="hover-out" alt="" />
                            <img src="{{asset('front/assets/images/building-icon.svg')}}" class="hover-in" alt="" />
                        </div>
                    </div>
                    <div class="short-description text-center">
                        {{Helper::TitleTextLimit($project->description,80)}}
                    </div>
                    <div class="title-read-more-link text-left">
                        <p class="title">{{Helper::TitleTextLimit($project->title)}}</p>
                        <a href="{{url('projects',$project->slug)}}" class="read-more-link d-block text-center">{{ __('locale.Read More') }}</a>
                    </div>
                </div>
            </div>



            @endforeach
        </div>

        <div class="d-block w-100 text-center mb-5">
            {!! $projects->links('pagination::custom') !!}
        </div>
    </div>
</section>

@endsection