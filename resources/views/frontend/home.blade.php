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
                                        <img src="{{ asset('storage/' . $item->icon) }}" alt="" width="80"
                                            height="80">
                                        <h4 class="ms-3"><a href="#"
                                                class="service-title work-process">{{ $item->title }}</a></h4>
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
    <!-- end work section -->


    <!-- start package section -->
    <section class="package-section mt-5 mb-4">
        <div class="packages container">
            <div class="text-center mb-4">
                <h1>Find Your Perfect Social Media Package</h1>
                <h5>We've translated our service report into a simple, interactive guide. Compare our packages to
                    find the ideal fit for your brand's journey and budget.</h5>
            </div>
            <div class="row justify-content-center package-item">
                <!-- Repeat this block for each package -->
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-4">
                    <div class="package one">
                        <div class="package-header text-center">
                            <div class="fs-4 mt-3">
                                <i class="fa-solid fa-star p-2"></i>
                                <i class="fa-solid fa-star p-2"></i>
                                <i class="fa-solid fa-star p-2"></i>
                            </div>
                            <h1>One star Package</h1>
                            <h5>New Brands Starting Their Journey</h5>
                        </div>
                        <div class="package-body px-3">
                            <div class="price pac-item text-center">
                                <h1>BDT-5,000/Month</h1>
                            </div>
                            <div class="pac-item">
                                <p>10 Basic Social Media Posts</p>
                            </div>
                            <div class="pac-item">
                                <p>1 Edited Promotional Video</p>
                            </div>
                            <div class="pac-item">
                                <p>Reach up to 20,000+ per month</p>
                            </div>
                            <div class="pac-item">
                                <p>Report Per 15 Days & Consultancy</p>
                            </div>
                        </div>
                        <div class="get-consult d-flex justify-content-center align-items-center">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Get Consultant</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-4">
                    <div class="package three">
                        <div class="package-header text-center">
                            <p class="fs-4">
                                <i class="fa-solid fa-star p-2"></i>
                                <i class="fa-solid fa-star p-2"></i>
                                <i class="fa-solid fa-star p-2"></i>
                            </p>
                            <h1>One star Package</h1>
                            <h5>New Brands Starting Their Journey</h5>
                        </div>
                        <div class="package-body px-3">
                            <div class="price pac-item text-center">
                                <h1>BDT-5,000/Month</h1>
                            </div>
                            <div class="pac-item">
                                <p>10 Basic Social Media Posts</p>
                            </div>
                            <div class="pac-item">
                                <p>1 Edited Promotional Video</p>
                            </div>
                            <div class="pac-item">
                                <p>Reach up to 20,000+ per month</p>
                            </div>
                            <div class="pac-item">
                                <p>Report Per 15 Days & Consultancy</p>
                            </div>
                        </div>
                        <div class="get-consult d-flex justify-content-center align-items-center">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Get Consultant</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-4">
                    <div class="package five">
                        <div class="package-header text-center">
                            <p class="fs-4">
                                <i class="fa-solid fa-star p-2"></i>
                                <i class="fa-solid fa-star p-2"></i>
                                <i class="fa-solid fa-star p-2"></i>
                            </p>
                            <h1>One star Package</h1>
                            <h5>New Brands Starting Their Journey</h5>
                        </div>
                        <div class="package-body px-3">
                            <div class="price pac-item text-center">
                                <h1>BDT-5,000/Month</h1>
                            </div>
                            <div class="pac-item">
                                <p>10 Basic Social Media Posts</p>
                            </div>
                            <div class="pac-item">
                                <p>1 Edited Promotional Video</p>
                            </div>
                            <div class="pac-item">
                                <p>Reach up to 20,000+ per month</p>
                            </div>
                            <div class="pac-item">
                                <p>Report Per 15 Days & Consultancy</p>
                            </div>
                        </div>
                        <div class="get-consult d-flex justify-content-center align-items-center">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Get Consultant</a>
                        </div>
                    </div>
                </div>

                <!-- Copy and paste the above .col block to create more packages -->
            </div>
        </div>
        <!-- ---------------- -->
        <div class="packages container mt-4">
            <div class="text-center mb-4">
                <h1>Find Your Perfect Development Package</h1>
                <h5>We've translated our service report into a simple, interactive guide. Compare our packages to
                    find the ideal fit for your brand's journey and budget.</h5>
            </div>
            <div class="row justify-content-center package-item">
                <!-- Repeat this block for each package -->
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-4">
                    <div class="package one">
                        <div class="package-header text-center">
                            <div class="fs-4 mt-3">
                                <i class="fa-solid fa-star p-2"></i>
                                <i class="fa-solid fa-star p-2"></i>
                                <i class="fa-solid fa-star p-2"></i>
                            </div>
                            <h1>One star Package</h1>
                            <h5>New Brands Starting Their Journey</h5>
                        </div>
                        <div class="package-body px-3">
                            <div class="price pac-item text-center">
                                <h1>BDT-5,000/Month</h1>
                            </div>
                            <div class="pac-item">
                                <p>10 Basic Social Media Posts</p>
                            </div>
                            <div class="pac-item">
                                <p>1 Edited Promotional Video</p>
                            </div>
                            <div class="pac-item">
                                <p>Reach up to 20,000+ per month</p>
                            </div>
                            <div class="pac-item">
                                <p>Report Per 15 Days & Consultancy</p>
                            </div>
                        </div>
                        <div class="get-consult d-flex justify-content-center align-items-center">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Get Consultant</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-4">
                    <div class="package three">
                        <div class="package-header text-center">
                            <div class="fs-4 mt-3">
                                <i class="fa-solid fa-star p-2"></i>
                                <i class="fa-solid fa-star p-2"></i>
                                <i class="fa-solid fa-star p-2"></i>
                            </div>
                            <h1>One star Package</h1>
                            <h5>New Brands Starting Their Journey</h5>
                        </div>
                        <div class="package-body px-3">
                            <div class="price pac-item text-center">
                                <h1>BDT-5,000/Month</h1>
                            </div>
                            <div class="pac-item">
                                <p>10 Basic Social Media Posts</p>
                            </div>
                            <div class="pac-item">
                                <p>1 Edited Promotional Video</p>
                            </div>
                            <div class="pac-item">
                                <p>Reach up to 20,000+ per month</p>
                            </div>
                            <div class="pac-item">
                                <p>Report Per 15 Days & Consultancy</p>
                            </div>
                        </div>
                        <div class="get-consult d-flex justify-content-center align-items-center">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Get Consultant</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-4">
                    <div class="package five">
                        <div class="package-header text-center">
                            <p class="fs-4">
                                <i class="fa-solid fa-star p-2"></i>
                                <i class="fa-solid fa-star p-2"></i>
                                <i class="fa-solid fa-star p-2"></i>
                            </p>
                            <h1>One star Package</h1>
                            <h5>New Brands Starting Their Journey</h5>
                        </div>
                        <div class="package-body px-3">
                            <div class="price pac-item text-center">
                                <h1>BDT-5,000/Month</h1>
                            </div>
                            <div class="pac-item">
                                <p>10 Basic Social Media Posts</p>
                            </div>
                            <div class="pac-item">
                                <p>1 Edited Promotional Video</p>
                            </div>
                            <div class="pac-item">
                                <p>Reach up to 20,000+ per month</p>
                            </div>
                            <div class="pac-item">
                                <p>Report Per 15 Days & Consultancy</p>
                            </div>
                        </div>
                        <div class="get-consult d-flex justify-content-center align-items-center">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Get Consultant</a>
                        </div>
                    </div>
                </div>

                <!-- Copy and paste the above .col block to create more packages -->
            </div>
        </div>
        <!-- ----------------modal-------------------- -->
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <form action="#" method="POST" id="consultation-form">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Request Consultation</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <!-- Form Inputs -->
                                <div class="col-lg-6 mb-4">
                                    <input type="hidden" name="package_name" id="selected-package-name">

                                    <div class="mb-3">
                                        <label for="full_name" class="form-label">Full Name</label>
                                        <input type="text" class="form-control" id="full_name" name="full_name"
                                            placeholder="Your Name" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="name@example.com" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="tel" class="form-control" id="phone" name="phone"
                                            placeholder="01XXXXXXXXX" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="address" name="address"
                                            placeholder="Street, City" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="message" class="form-label">Additional Message</label>
                                        <textarea class="form-control" id="message" name="message" rows="3" placeholder="Optional message..."></textarea>
                                    </div>

                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" value="1" id="consent"
                                            name="consent" required>
                                        <label class="form-check-label" for="consent">
                                            I agree to the <a href="#">privacy policy</a> and terms of contact.
                                        </label>
                                    </div>
                                </div>

                                <!-- Package Details -->
                                <div class="col-lg-6 mb-5">
                                    <div class="package-body px-3">
                                        <div class="price pac-item text-center">
                                            <h4 id="modal-package-title">One star Package</h4>
                                            <h5 id="modal-package-price">BDT-5,000/Month</h5>
                                        </div>
                                        <div id="modal-package-features">
                                            <div class="pac-item">
                                                <p>10 Basic Social Media Posts</p>
                                            </div>
                                            <div class="pac-item">
                                                <p>1 Edited Promotional Video</p>
                                            </div>
                                            <div class="pac-item">
                                                <p>Reach up to 20,000+ per month</p>
                                            </div>
                                            <div class="pac-item">
                                                <p>Report Per 15 Days & Consultancy</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <p class="mt-4"><strong>Note:</strong> Thank you! Our expert will contact you shortly.
                            </p>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Confirm</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <!-- Modal -->


    </section>
    <!-- end package section -->
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
        .service-title:hover {
            color: rgb(151, 0, 0);
        }

        .work-process {
            text-decoration: none;
            color: black;
        }
    </style>
@endpush

@push('script')
    
         <!-- Product Schema -->
            <script type="application/ld+json">
                        {
                        "@context": "https://schema.org/",
                        "@type": "Product",
                        {!! json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) !!}
                        }
            </script>
@endpush
