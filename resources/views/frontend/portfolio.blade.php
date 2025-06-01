@extends("frontend.layouts.web")
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
                    <button class="p-2 rounded-2 mt-1" onclick="openSuccess('DataGuard')">DataGuard</button>
                    <button class="p-2 rounded-2 mt-1" onclick="openSuccess('DataSense')">DataSense</button>
                    <button class="p-2 rounded-2 mt-1" onclick="openSuccess('ITConsult')">ITConsult</button>
                    <button class="p-2 rounded-2 mt-1" onclick="openSuccess('ITStrategize')">ITStrategize</button>
                </div>
            </div>
            <!-- https://www.w3schools.com/w3css/w3css_tabulators.asp
            https://www.w3schools.com/w3css/tryit.asp?filename=tryw3css_tabulators -->
            <div class="container-fluid m-0 p-0 d-flex justify-content-center align-items-center">
                <div class="tav-content">
                    <div id="All" class="suName">
                        <div class="row g-0">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                <div class="content">
                                    <img src="{{asset('assets/frontend/img/portfolio-img-1.jpg')}}" alt="Portfolio 1">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                <div class="content">
                                    <img src="{{asset('assets/frontend/img/images.jpeg')}}" alt="Portfolio 2">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                <div class="content">
                                    <img src="{{asset('assets/frontend/img/portfolio-img-3.jpg')}}" alt="Portfolio 3">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                <div class="content">
                                    <img src="{{asset('assets/frontend/img/portfolio-img-4.jpg')}}" alt="Portfolio 4">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                <div class="content">
                                    <img src="{{asset('assets/frontend/img/portfolio-img.jpg')}}" alt="Portfolio 5">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                <div class="content">
                                    <img src="{{asset('assets/frontend/img/hero-image.webp')}}" alt="Portfolio 6">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="DataGuard" class="suName displayprop">
                        <div class="row g-0">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                <div class="content">
                                    <img src="{{asset('assets/frontend/img/images.jpeg')}}" alt="Portfolio 1">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                <div class="content">
                                    <img src="{{asset('assets/frontend/img/images.jpeg')}}" alt="Portfolio 2">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                <div class="content">
                                    <img src="{{asset('assets/frontend/img/images.jpeg')}}" alt="Portfolio 3">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                <div class="content">
                                    <img src="{{asset('assets/frontend/img/images.jpeg')}}" alt="Portfolio 4">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                <div class="content">
                                    <img src="{{asset('assets/frontend/img/images.jpeg')}}" alt="Portfolio 5">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                <div class="content">
                                    <img src="{{asset('assets/frontend/img/images.jpeg')}}" alt="Portfolio 6">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="DataSense" class="suName displayprop">
                        <div class="row g-0">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                <div class="content">
                                    <img src="{{asset('assets/frontend/img/portfolio-img-3.jpg')}}" alt="Portfolio 1">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                <div class="content">
                                    <img src="{{asset('assets/frontend/img/portfolio-img-3.jpg')}}" alt="Portfolio 2">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                <div class="content">
                                    <img src="{{asset('assets/frontend/img/portfolio-img-3.jpg')}}" alt="Portfolio 3">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                <div class="content">
                                    <img src="{{asset('assets/frontend/img/portfolio-img-3.jpg')}}" alt="Portfolio 4">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                <div class="content">
                                    <img src="{{asset('assets/frontend/img/portfolio-img-3.jpg')}}" alt="Portfolio 5">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                <div class="content">
                                    <img src="{{asset('assets/frontend/img/portfolio-img-3.jpg')}}" alt="Portfolio 6">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="ITConsult" class="suName displayprop">
                        <div class="row g-0">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                <div class="content">
                                    <img src="{{asset('assets/frontend/img/portfolio-img-4.jpg')}}" alt="Portfolio 1">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                <div class="content">
                                    <img src="{{asset('assets/frontend/img/portfolio-img-4.jpg')}}" alt="Portfolio 2">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                <div class="content">
                                    <img src="{{asset('assets/frontend/img/portfolio-img-4.jpg')}}" alt="Portfolio 3">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                <div class="content">
                                    <img src="{{asset('assets/frontend/img/portfolio-img-4.jpg')}}" alt="Portfolio 4">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                <div class="content">
                                    <img src="{{asset('assets/frontend/img/portfolio-img-4.jpg')}}" alt="Portfolio 5">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                <div class="content">
                                    <img src="{{asset('assets/frontend/img/portfolio-img-4.jpg')}}" alt="Portfolio 6">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="ITStrategize" class="suName displayprop">
                        <div class="row g-0">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                <div class="content">
                                    <img src="{{asset('assets/frontend/img/portfolio-img-1.jpg')}}" alt="Portfolio 1">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                <div class="content">
                                    <img src="{{asset('assets/frontend/img/portfolio-img-1.jpg')}}" alt="Portfolio 2">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                <div class="content">
                                    <img src="{{asset('assets/frontend/img/portfolio-img-1.jpg')}}" alt="Portfolio 3">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                <div class="content">
                                    <img src="{{asset('assets/frontend/img/portfolio-img-1.jpg')}}" alt="Portfolio 4">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                <div class="content">
                                    <img src="{{asset('assets/frontend/img/portfolio-img-1.jpg')}}" alt="Portfolio 5">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                <div class="content">
                                    <img src="{{asset('assets/frontend/img/portfolio-img-1.jpg')}}" alt="Portfolio 6">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection