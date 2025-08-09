@extends('front/layouts/layout')

@section('title', 'Project Details')
@section('content')




<main>
    <section class="d-block page-title-banner" style="background-image: url('{{ $pageData? $pageData->getFirstMediaUrl('banner'): '#'}}');">
        <div class="banner-overlay">
            <div class="custom-container">
                <div class="d-flex flex-column align-items-center justify-content-center title-con">
                    <div>
                        <!-- <h1 class="page-title fw-bold">Project</h1> -->
                        <h1 class="page-title fw-bold d-block"></h1>
                    </div>

                </div>
                <div class="breadcrumbs-con">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{url('/')}}" class="text-decoration-none">{{ __('locale.Home') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{url('projects')}}" class="text-decoration-none">Projects</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$project->title?? 'Page'}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="page-details">
        <div class="custom-container">
            <div class="d-flex flex-column flex-md-row justify-content-between project-details gap-3">
                <div class="text-con">
                    <h2 class="title">{{$project->title}}</h2>
                    {!!$project->description!!}
                </div>
                <div class="client-details position-relative overflow-hidden">
                    <div class="project-title" style="background-image: url('{{$project->getFirstMediaUrl('project')}}');">
                        <div class="overlay">
                            <div class="icon-border m-auto">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <img src="{{asset('front/assets/images/building-icon.svg')}}" alt="" />
                                </div>
                            </div>
                            <h3 class="title text-capitalize text-center">Project Details</h3>
                        </div>
                    </div>
                    <div class="client-data ms-auto me-auto">
                        <div class="d-flex flex-row align-items-center justify-content-between gap-3 mb-30px">
                            <div class="c-label text-capitalize">{{ __('locale.Client Name') }}:</div>
                            <div class="c-value text-capitalize">{{$project->client_name}}</div>
                        </div>
                        <div class="d-flex flex-row align-items-center justify-content-between gap-3 mb-30px">
                            <div class="c-label text-capitalize">{{ __('locale.Client Company Name') }}:</div>
                            <div class="c-value text-capitalize">{{$project->client_company_name}}</div>
                        </div>
                        <div class="d-flex flex-row align-items-center justify-content-between gap-3 mb-30px">
                            <div class="c-label text-capitalize">{{ __('locale.Project Start Date') }}:</div>
                            <div class="c-value text-capitalize">{{$project->start_date}}</div>
                        </div>
                        <div class="d-flex flex-row align-items-center justify-content-between gap-3 mb-30px">
                            <div class="c-label text-capitalize">{{ __('locale.Project End Date') }}:</div>
                            <div class="c-value text-capitalize">{{$project->end_date}}</div>
                        </div>
                        <div class="c-label">{{ __('locale.Client Comment') }}</div>
                        <div class="comments">{{$project->client_comment}}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection