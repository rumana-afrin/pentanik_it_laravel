@extends('frontend.layouts.web')
@section('content')
    <section class="title-section">
        <div class="aboutus-title text-center p-5">
            <h1> About Us</h1>
        </div>
    </section>

    <section class="about-section mt-4">
        <div class=" d-flex justify-content-center align-items-center">
            <div class="about-content d-flex justify-content-between align-items-center">
                <div class="about-head-section">
                    <div class="about-head-content">
                        <h5 class="abouthead-text">{!! $aboutUs->short_content !!}</div>
                    <div class="about-image">
                        <img src="{{ asset('storage/' . $aboutUs->featured_image) }}" alt="">
                    </div>
                </div>
                {{-- <div class="about-head-section">
                    <div class="about-head-content">
                        <h5 class="abouthead-text">Welcome to Pentanik IT, your trusted partner in digital
                            innovation and business growth since 2019. We have
                            been at the forefront of providing comprehensive IT
                            solutions to clients both in Bangladesh and around the
                            globe.</h5>

                        <h2 class="mt-4">Our expertise spans a wide range of services:</h2>
                        <p>Digital Marketing
                            Social Media Marketing
                            Search Engine Optimization (SEO)
                            Website Design & Development
                            E-commerce Design & Development
                            UI/UX Design
                            Business Developmen</p>
                    </div>
                    <div class="about-image">
                        <img src="{{ asset('assets/frontend/img/about-us.png') }}" alt="">
                    </div>
                </div> --}}
            </div>
        </div>

        <div class="about-bottom-content d-flex justify-content-center align-items-center mb-4">
            <div class="bottom-content p-4">
                <p>{!! $aboutUs->content !!}</p>
                {{-- <p>We take pride in our growing reputation as a reliable IT service provider in Bangladesh,
                    recognized for delivering quality and value to our clients. With a passionate team of
                    professionals, we aim to empower businesses by offering innovative strategies and cutting-edge
                    solutions tailored to meet their unique needs.

                    At Pentanik IT, our mission extends beyond just business. We are deeply committed to sharing
                    knowledge and skills with the community. Over the years, we have offered free courses on
                    platforms like YouTube and Facebook, covering topics such as Ethical Hacking, Graphics
                    Designing, Digital Marketing, and Corporate Training. These initiatives continue to make
                    high-quality education accessible to everyone, fostering the next generation of digital experts.
                    As we grow, our vision remains clear: to bridge the gap between technology and business,
                    enabling success for all our clients while giving back to the community. Partner with Pentanik
                    IT to transform your ideas into impactful digital experiences and convert your visitors into
                    loyal customers.</p> --}}
            </div>
        </div>

    </section>
@endsection
