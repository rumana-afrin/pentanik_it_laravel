@extends('frontend.layouts.web')
@section('content')
    <section class="title-section">
        <div class="aboutus-title text-center p-2 pt-3">
            <h1> About Us</h1>
        </div>
    </section>
    <section class="banner-section d-flex justify-content-center align-items-center">
        <div class="about-image">
            <img src="{{ asset('storage/' . $aboutUs->featured_image) }}" alt="">
        </div>
    </section>
    <section class="about-section mt-4">
        <div class="about-head-content text-center">
            <h3 class="abouthead-text">{!! $aboutUs->subtitle !!}</h3>
        </div>
        {{-- <div class="d-flex justify-content-center align-items-center">
            <div class="about-content d-flex justify-content-center align-items-center">
                <div class="about-head-section">
                    <div class="about-head-content">
                        <p class="abouthead-text">{!! $aboutUs->short_content !!}</p>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="about-bottom-content d-flex justify-content-center align-items-center mb-4">
            <div class="bottom-content p-2">
                <p>{!! $aboutUs->content !!}</p>
            </div>
        </div>

    </section>
@endsection
