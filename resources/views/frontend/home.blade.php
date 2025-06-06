@extends("frontend.layouts.web")
@section('content')
    
        <!-- start hero section -->
        <section>
            <div class="container-fluid hero-container">
                <div class="hero-section d-flex justify-content-start align-items-center">
                    <div class="hero-image d-flex justify-content-between align-items-center">
                        <div class="main-image">
                            <img src="{{asset('assets/frontend/img/Artboard 15.png')}}" alt="Hero image">

                            <!-- <picture>
                                <source media="(max-width: 992px)" srcset="/img/hero-2.jpg" width="350" height="450">
                                <source media="(max-width: 1200px)" srcset="/img/hero-6.png" width="500" height="450">
                                <img src="/img/Artboard 15.png" alt="Hero Image" width="900" height="450">
                                <img src="/img/hero-6.png" alt="Hero Image" width="650" height="450">
                            </picture> -->
                        </div>

                    </div>
                    <div class="hero-info">
                        <div class="ps-5 info-conatainer">
                            <div class="heroinfo">
                                <p class="wave-text">
                                    <span>SMART</span><span>&nbsp SOLUTION</span>
                                </p>
                            </div>
                            <div class="heroinfo mt-3">
                                <h1 class="hero-title">Building the tech Future One Byte at a Time</h1>
                            </div>
                            <div class="heroinfo info-subtitle mt-3">
                                <p>We have been operating for over a decade, providing top-notch services to our clients
                                    and building</p>
                            </div>
                            <div class="d-flex justify-content-start align-items-center heroinfo mt-5">
                                <!-- <div> -->
                                <div class="readmore-button">
                                    <button class="btn">Read More</button>
                                </div>
                                <div class="hero-icon d-flex justify-content-center align-items-center ms-4">
                                    <div class="hero-icon2 d-flex justify-content-center align-items-center">
                                        <i class="fa-solid fa-phone"></i>
                                    </div>
                                </div>
                                <div class="ms-4 hero-help">
                                    <p class="p-0 m-0"> - Need Help ?</p>
                                    <p class="p-0 m-0"><a href="#" class="text-dark">0125469387</a></p>
                                </div>
                                <!-- </div> -->

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- end hero section -->

        <!-- start service section -->
        <section class="service-section p-0 mt-5 mb-5">
            <div class="d-flex justify-content-center align-items-center">
                <div class="w-100 d-flex flex-column justify-content-center align-items-center">
                    <div class="service-header d-flex justify-content-center align-items-center">
                        <div class="service-icon d-flex justify-content-center align-items-center">
                            <i class="fa-solid fa-pen-clip"></i>
                        </div>
                    </div>
                    <div class="service-title d-flex justify-content-center align-items-center mt-3">
                        <h2>Pentanik IT - Digital Services</h2>
                    </div>
                </div>
            </div>

            <div class="mt-2 d-flex justify-content-center">
                <div class="service-container">
                    <div class="row d-flex justify-content-center m-0">

                        <div
                            class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 d-flex justify-content-center service-card">
                            <div class="card-left-side">
                                <img src="{{asset('assets/frontend/img/Screenshot_1.png')}}" alt="" width="74" height="67">
                            </div>
                            <div class="card-right-side">
                                <h5><a href="#">Search Engine Optimization (SEO)</a></h5>
                                <p>The ultimate goal of digital marketing is to turn a visitor or a potential customer
                                    towards a confirmed purchase The ultimate goal of digital marketing is to turn a visitor or a potential customer
                                    towards a confirmed purchase</p>
                                <ul class="p-3" class="p-3">
                                    <li>Marketing</li>
                                    <li>Marketing</li>
                                    <li>Marketing</li>
                                </ul>
                            </div>
                        </div>
                        <div
                            class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 d-flex justify-content-center service-card">
                            <div class="card-left-side">
                                <img src="{{asset('assets/frontend/img/Screenshot_2.png')}}" alt="" width="74" height="67">
                            </div>
                            <div class="card-right-side">
                                <h5><a href="#">Digital Marketing</a></h5>
                                <p>The ultimate goal of digital marketing is to turn a visitor or a potential customer
                                    towards a confirmed purchase</p>
                                <ul class="p-3">
                                    <li>Marketing</li>
                                    <li>Marketing</li>
                                    <li>Marketing</li>
                                </ul>
                            </div>
                        </div>
                        <div
                            class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 d-flex justify-content-center service-card">
                            <div class="card-left-side">
                                <img src="{{asset('assets/frontend/img/Screenshot_3.png')}}" alt="" width="74" height="70">
                            </div>
                            <div class="card-right-side">
                                <h5><a href="#">Digital Marketing</a></h5>
                                <p>The ultimate goal of digital marketing is to turn a visitor or a potential customer
                                    towards a confirmed purchase</p>
                                <ul class="p-3">
                                    <li>Marketing</li>
                                    <li>Marketing</li>
                                    <li>Marketing</li>
                                </ul>
                            </div>
                        </div>
                        <div
                            class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 d-flex justify-content-center service-card">
                            <div class="card-left-side">
                                <img src="{{asset('assets/frontend/img/Screenshot_8.png')}}" alt="" width="74" height="70">
                            </div>
                            <div class="card-right-side">
                                <h5><a href="#">Digital Marketing</a></h5>
                                <p>The ultimate goal of digital marketing is to turn a visitor or a potential customer
                                    towards a confirmed purchase</p>
                                <ul class="p-3">
                                    <li>Marketing</li>
                                    <li>Marketing</li>
                                    <li>Marketing</li>
                                </ul>
                            </div>
                        </div>
                        <div
                            class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 d-flex justify-content-center service-card">
                            <div class="card-left-side">
                                <img src="{{asset('assets/frontend/img/Screenshot_1.png')}}" alt="" width="74" height="70">
                            </div>
                            <div class="card-right-side">
                                <h5><a href="#">Digital Marketing</a></h5>
                                <p>The ultimate goal of digital marketing is to turn a visitor or a potential customer
                                    towards a confirmed purchase</p>
                                <ul class="p-3">
                                    <li>Marketing</li>
                                    <li>Marketing</li>
                                    <li>Marketing</li>
                                </ul>
                            </div>
                        </div>
                        <div
                            class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 d-flex justify-content-center service-card">
                            <div class="card-left-side">
                                <img src="{{asset('assets/frontend/img/Screenshot_1.png')}}" alt="" width="74" height="70">
                            </div>
                            <div class="card-right-side">
                                <h5><a href="#">Digital Marketing</a></h5>
                                <p>The ultimate goal of digital marketing is to turn a visitor or a potential customer
                                    towards a confirmed purchase</p>
                                <ul class="p-3">
                                    <li>Marketing</li>
                                    <li>Marketing</li>
                                    <li>Marketing</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end service section -->

        <!-- start contact section -->
        <section class="contact-section mt-3">
            <div class="devices-contact-section d-flex justify-content-center">
                <div class="contact-banner w-50">
                    <img src="{{asset('assets/frontend/img/Artboard 3 copy 4.png')}}" alt="">
                </div>
                <div class="contact-info w-50 d-flex justify-content-center align-items-center p-5">
                    <div class="devices-contact-info">
                        <div class="text-center">
                            <h3>Hire/Contact Us</h3>
                        </div>
                        <div class="text-center mt-3">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti.Lorem ipsum dolor sit
                                amet, consectetur adipisicing elit. Deleniti.Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. Deleniti.Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Deleniti. Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, voluptas.</p>
                        </div>
                        <div class="text-center d-flex justify-content-center align-items-center mt-5">
                            <p class="contact-number">+01868366628</p>
                        </div>
                        <div class="contact-social-icon  d-flex justify-content-center align-items-center mt-5">
                            <div class="followus me-5">
                                <div class="follow-us-image">
                                    <img src="{{asset('assets/frontend/img/follow-us.png')}}" alt="" height="50">
                                </div>
                            </div>
                            <div class="contact-icon text-center d-flex justify-content-center align-items-center">
                                <a href=""><img src="{{asset('assets/frontend/img/icon/icons8-facebook.svg')}}" alt=""></a>
                                <a href=""><img src="{{asset('assets/frontend/img/icon/icons8-gmail.svg')}}" alt=""></a>
                                <a href=""><img src="{{asset('assets/frontend/img/icon/icons8-linkedin.svg')}}" alt=""></a>
                                <a href=""><img src="{{asset('assets/frontend/img/icon/icons8-whatsapp.svg')}}" alt=""></a>
                                <a href=""><img src="{{asset('assets/frontend/img/icon/icons8-youtube.svg')}}" alt=""></a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>
        <!-- end contact section -->

        <!-- start work section -->
        <section class="work-section mt-4">
            <div class="work-header">
                <div class="work-top-header d-flex justify-content-center align-items-center">
                    <div class="woek-line-shap"></div>
                    <h4 class="p-3">WORK PROCESS</h4>
                    <div class="woek-line-shap"></div>
                </div>
                <div class="title d-flex justify-content-center align-items-center">
                    <h1>How We Do?</h1>
                </div>
            </div>
            <!-- <div class="working-way"> -->
            <div class="working-way p-0 d-flex justify-content-center">
                <div class="work-content-section">
                    <div class="row d-flex justify-content-center">
                        <!-- Card 1 -->
                        <div class="col-12 col-sm-6 col-lg-4">
                            <div class="bg-light work-way p-3">
                                <div class="work-card-top d-flex justify-content-between align-items-center ps-2 pe-2">
                                    <div class="work-number">
                                        <h1>01</h1>
                                    </div>
                                    <div class="work-shap">
                                        <img src="{{asset('assets/frontend/img/pattern-1.png')}}" alt="" width="100" height="100">
                                    </div>
                                </div>
                                <div class="work-card-body">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <img src="{{asset('assets/frontend/img/icon/icons8-idea-64.png')}}" alt="" width="80"
                                            height="80">
                                        <h4 class="ms-3">Strategy Session</h4>
                                    </div>
                                    <div class="work-card-content mt-3">
                                        <p>We begin by understanding your business goals, target audience, competitors,
                                            and pain points. Then we develop a tailored digital strategy to match your
                                            unique needs.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="col-12 col-sm-6 col-lg-4">
                            <div class="bg-light work-way p-3">
                                <div class="work-card-top d-flex justify-content-between align-items-center ps-2 pe-2">
                                    <div class="work-number">
                                        <h1>02</h1>
                                    </div>
                                    <div class="work-shap">
                                        <img src="{{asset('assets/frontend/img/pattern-1.png')}}" alt="" width="100" height="100">
                                    </div>
                                </div>
                                <div class="work-card-body">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <img src="{{asset('assets/frontend/img/icon/market-research.svg')}}" alt="" width="80"
                                            height="80">
                                        <h4 class="ms-3">Audit & Research</h4>
                                    </div>
                                    <div class="work-card-content mt-3">
                                        <p>
                                            Whether it’s your website, ad account, or current content — we perform a
                                            full audit. This includes keyword research, market trends, audience
                                            behavior, and performance gaps.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-12 col-sm-6 col-lg-4">
                            <div class="bg-light work-way p-3">
                                <div class="work-card-top d-flex justify-content-between align-items-center ps-2 pe-2">
                                    <div class="work-number">
                                        <h1>03</h1>
                                    </div>
                                    <div class="work-shap">
                                        <img src="{{asset('assets/frontend/img/pattern-1.png')}}" alt="" width="100" height="100">
                                    </div>
                                </div>
                                <div class="work-card-body">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <img src="{{asset('assets/frontend/img/icon/research.svg')}}" alt="" width="80"
                                            height="80">
                                        <h4 class="ms-3">Campaign Planning & Asset Creation</h4>
                                    </div>
                                    <div class="work-card-content mt-3">
                                        <p>
                                            From SEO plans and ad funnels to video scripts and creatives — we prepare
                                            everything with conversion in mind. Every word, image, and dollar is used
                                            with purpose.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 4 -->
                        <div class="col-12 col-sm-6 col-lg-4">
                            <div class="bg-light work-way p-3">
                                <div class="work-card-top d-flex justify-content-between align-items-center ps-2 pe-2">
                                    <div class="work-number">
                                        <h1>04</h1>
                                    </div>
                                    <div class="work-shap">
                                        <img src="{{asset('assets/frontend/img/pattern-1.png')}}" alt="" width="100" height="100">
                                    </div>
                                </div>
                                <div class="work-card-body">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <img src="{{asset('assets/frontend/img/icon/research.svg')}}" alt="" width="80"
                                            height="80">
                                        <h4 class="ms-3">Launch & Optimization</h4>
                                    </div>
                                    <div class="work-card-content mt-3">
                                        <p>
                                            We execute your campaigns across the chosen platforms. Whether it’s a Google
                                            PPC ad or Facebook video ad, we monitor performance in real-time and
                                            optimize continuously.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 5 -->
                        <div class="col-12 col-sm-6 col-lg-4">
                            <div class="bg-light work-way p-3">
                                <div class="work-card-top d-flex justify-content-between align-items-center ps-2 pe-2">
                                    <div class="work-number">
                                        <h1>05</h1>
                                    </div>
                                    <div class="work-shap">
                                        <img src="{{asset('assets/frontend/img/pattern-1.png')}}" alt="" width="100" height="100">
                                    </div>
                                </div>
                                <div class="work-card-body">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <img src="{{asset('assets/frontend/img/icon/research.svg')}}" alt="" width="80"
                                            height="80">
                                        <h4 class="ms-3">Tracking & Reporting</h4>
                                    </div>
                                    <div class="work-card-content mt-3">
                                        <p>We use Conversion API and advanced tracking tools to measure the real results
                                            that matter — leads, sales, and growth. You’ll get regular,
                                            easy-to-understand reports.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 6 -->
                        <div class="col-12 col-sm-6 col-lg-4">
                            <div class="bg-light work-way p-3">
                                <div class="work-card-top d-flex justify-content-between align-items-center ps-2 pe-2">
                                    <div class="work-number">
                                        <h1>06</h1>
                                    </div>
                                    <div class="work-shap">
                                        <img src="{{asset('assets/frontend/img/pattern-1.png')}}" alt="" width="100" height="100">
                                    </div>
                                </div>
                                <div class="work-card-body">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <img src="{{asset('assets/frontend/img/icon/research.svg')}}" alt="" width="80"
                                            height="80">
                                        <h4 class="ms-3">Ongoing Support & Scaling</h4>
                                    </div>
                                    <div class="work-card-content mt-3">
                                        <p>
                                            Marketing doesn’t stop at launch. We refine, retarget, and scale your
                                            campaigns based on performance data to achieve long-term business growth.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>


            <!-- </div> -->
        </section>
        <!-- end contact section -->
@endsection