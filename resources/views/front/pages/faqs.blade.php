@extends('front/layouts/layout')

@section('title', 'FAQs')
@section('content')
    <x-inner-page-header page='faqs' slug='faqs' />

    <section class="page-details">
        <div class="container mt-5 mb-4">
            <div class="row justify-content-between">
                @forelse ($faqs as $faq)
                    <b>{{ $loop->iteration }}: {{ $faq->question }}?</b>
                    <p>{{ $faq->answer }}</p>
                    <hr>
                @empty
                    <p>No question found.</p>
                @endforelse

            </div>
            <div class="d-block w-100 text-center mb-5">
                {!! $faqs->links('pagination::custom') !!}
            </div>
        </div>
    </section>
@endsection
