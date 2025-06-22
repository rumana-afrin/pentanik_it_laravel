@extends('frontend.layouts.web')
@section('content')
    <!-- start hero section -->
    <section>
        <div class="container-fluid hero-container">
            <div class="hero-section d-flex justify-content-start align-items-center">
                <div class="hero-image d-flex justify-content-between align-items-center">
                    <div class="main-image">
                        <img src="{{ getimage(getOption('home_banner')) }}" alt="Hero image">

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
                            <h1 class="hero-title">{{ getOption('home_title') }}</h1>
                        </div>
                        <div class="heroinfo info-subtitle mt-3">
                            <h6>{{ getOption('home_subtitle') }}</h6>
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
                                <p class="p-0 m-0"><a href="#" class="text-dark">{{ getOption('contact_phone') }}</a>
                                </p>
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
                    
                    @foreach ($services as $item)
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 d-flex justify-content-center service-card">
                            <div class="card-left-side">
                                <img src="{{ asset('assets/frontend/img/Screenshot_1.png') }}" alt="" width="74"
                                    height="67">
                            </div>
                            <div class="card-right-side">
                                <h5><a href="#" class="service-title">{{ $item->name }}</a></h5>
                                <p>{{ $item->short_description }}</p>
                                <ul class="p-3">
                                    @foreach ($item->features as $feature)
                                        <li>{{ $feature->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- end service section -->

    <!-- start contact section -->
    <section class="contact-section mt-3">
        <div class="devices-contact-section d-flex justify-content-center">
            <div class="contact-banner w-50">
                <img src="{{ getimage(getOption('contact_banner')) }}" alt="">
            </div>
            <div class="contact-info w-50 d-flex justify-content-center align-items-center p-5">
                <div class="devices-contact-info">
                    <div class="text-center">
                        <h3>Hire/Contact Us</h3>
                    </div>
                    <div class="text-center mt-3">
                        <p>{{ getOption('contact_summary') }}</p>
                    </div>
                    <div class="text-center d-flex justify-content-center align-items-center mt-5">
                        <p class="contact-number">{{ getOption('contact_phone') }}</p>
                    </div>
                    <div class="contact-social-icon  d-flex justify-content-center align-items-center mt-5">
                        <div class="followus me-5">
                            <div class="follow-us-image">
                                <img src="{{ asset('assets/frontend/img/follow-us.png') }}" alt="" height="50">
                            </div>
                        </div>
                        <div class="contact-icon text-center d-flex justify-content-center align-items-center">
                            <a href="{{ getOption('social_link_fb') }}" target="_blank"><img
                                    src="{{ asset('assets/frontend/img/icon/icons8-facebook.svg') }}" alt=""></a>
                            <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ urlencode(getOption('social_link_gmail')) }}"
                                target="_blank">
                                <img src="{{ asset('assets/frontend/img/icon/icons8-gmail.svg') }}" alt="Gmail Icon">
                            </a>
                            <a href="{{ getOption('social_link_linkedin') }}" target="_blank"><img
                                    src="{{ asset('assets/frontend/img/icon/icons8-linkedin.svg') }}" alt=""></a>
                            <a href="https://wa.me/{{ getOption('whatsapp_number') }}" target="_blank"
                                rel="noopener noreferrer">
                                <img src="{{ asset('assets/frontend/img/icon/icons8-whatsapp.svg') }}" alt="WhatsApp">
                            </a>

                            <a href="{{ getOption('social_link_youtube') }}" target="_blank"><img
                                    src="{{ asset('assets/frontend/img/icon/icons8-youtube.svg') }}" alt=""></a>
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

                    @foreach ($workProcess as $item)
                        <div class="col-12 col-sm-6 col-lg-4">
                            <div class="bg-light work-way p-3">
                                <div class="work-card-top d-flex justify-content-between align-items-center ps-2 pe-2">
                                    <div class="work-number">
                                        <h1>{{ $item->step_number }}</h1>
                                    </div>
                                    <div class="work-shap">
                                        <img src="{{ asset('assets/frontend/img/pattern-1.png') }}" alt=""
                                            width="100" height="100">
                                    </div>
                                </div>
                                <div class="work-card-body">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <img src="{{ asset('storage/' . $item->icon) }}"
                                            alt="" width="80" height="80">
                                        <h4 class="ms-3"><a href="#" class="service-title work-process">{{ $item->title }}</a></h4>
                                    </div>
                                    <div class="work-card-content mt-3">
                                        <p>{{ $item->description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>


        <!-- </div> -->
    </section>
    <!-- end contact section -->
@endsection

{{-- <script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "Product",
  {!! json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) !!}
}
</script> --}}

@push('style')
    <style>
        .service-title:hover{
            color: rgb(151, 0, 0);
        }
        .work-process{
            text-decoration: none;
            color: black;
        }
    </style>
@endpush

@push('script')
    <script>
        <!-- Product Schema 
        -->
    <script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "Product",
  {!! json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) !!}
}
</script>

    </script>
@endpush
