@extends('frontend.layouts.web')
@section('content')

    <section class="page-content-section">
        <div class="aditional-page-title d-flex justify-content-center align-items-center">
            <h2>{{$page->title }}</h2>
        </div>
        <div class="container mt-3 mb-5">
            <div class="aditional-page-contnet">
                {!! $page->content !!}
            </div>
        </div>
    </section>
    
@endsection
