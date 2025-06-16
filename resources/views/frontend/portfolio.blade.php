@extends('frontend.layouts.web')
@section('content')
    <section class="portfolio-header">
        <div class="portfolio-title d-flex justify-content-center align-items-center">
            <div class="title text-center p-5">
                <h1>Aimplifying IT Complexity Aimplifying Business success</h1>
            </div>
        </div>
    </section>
    <section class="portfolio-body mb-4">
        <div class="portfolio-content d-flex justify-content-center align-items-center">
            <div class="success-menu text-center ps-5 pe-5 pt-0 pb-5">

                <button class="p-2 rounded-2 mt-1" onclick="openSuccess('All')">All</button>

                @foreach ($portfolioCategory as $item)
                    <button class="p-2 rounded-2 mt-1"
                        onclick="openSuccess('{{ $item->name }}')">{{ $item->name }}</button>
                @endforeach
            </div>
        </div>

        <div class="container-fluid m-0 p-0 d-flex justify-content-center align-items-center">
            <div class="tav-content">
                <div id="All" class="suName">
                    <div class="row g-0">
                        @foreach ($portfolio as $item)
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                <div class="content">
                                    <img src="{{ asset('storage/' . $item->featured_image) }}" alt="Portfolio 1">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                @foreach ($portfolioCategory as $item)
                    <div id="{{ $item->name }}" class="suName displayprop">
                        <div class="row g-0">

                            @foreach ($item->portfolio as $portfolioitem)
                                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                    <div class="content">
                                        <img src="{{ asset('storage/' . $portfolioitem->featured_image) }}" alt="">
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection


@push('style')
    <style>
        /* .portfolio-overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(51, 51, 51, 0.4);
                display: none;
                align-items: center;
                justify-content: center;
                z-index: 10;
            }

            .content:hover .portfolio-overlay {
                display: flex;
            }

            .overlay-text {
                color: white;
                font-size: 1.5rem;
                font-weight: bold;
                text-align: center;
            } */
    </style>
@endpush
