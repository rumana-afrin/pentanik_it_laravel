@extends("frontend.layouts.web")
@section('content')
        <!-- start team banner section -->
        <section>
            <div class="container-fluid p-0 m-0">
                <div class="team-banner">
                    <!-- <img class="w-100" src="/img/team-banner-7.jpg" alt=""> -->
                    <picture>
                        <source class="w-100 team-banner-imag" media="(max-width: 992px)"
                            srcset="{{ getimage(getOption('team_banner_small')) }}">
                        <img class="w-100" src="{{ getimage(getOption('team_banner_large')) }}" alt="Hero Image">
                    </picture>
                </div>
            </div>
        </section>
        <!-- end team banner section -->

        <!-- start CEO section -->
        <section class="auther-section">
            <div class="team-title d-flex justify-content-center align-items-center pb-3">
                <h2>Our Team</h2>
            </div>
            <div class="d-flex justify-content-center align-items-center mt-4">
                <div class="ceo-section d-flex justify-content-center align-items-start">
                    <div class="ceo-img">
                        <img src="{{ getimage(getOption('ceo_image')) }}" alt="">
                    </div>
                    <div class="ceo-info">
                        <div class="info">
                            <p>{{ getOption('short_summary') }}</p>
                        </div>
                        <div class="ceo-contact-info">
                            <p class="fs-5 p-0 m-0">{{ getOption('ceo_name') }}</p>
                            <p class="fs-5 p-0 m-0">{{ getOption('ceo_title') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end CEO section -->

        <!-- start other member section -->
        <section class="member-section p-5">
            <div class="team-title d-flex justify-content-center align-items-center mt-4">
                <h2>Other Team Members</h2>
            </div>
            <div class="container">
                <div class="row m-0 p-0 g-5 d-flex justify-content-center align-items-start">

                    @foreach ($teams as $item)
                    <div class="col-12 col-sm-6 col-lg-3 col-xl-3 flex-column align-items-center member-column">
                        <div class="member-image">
                            <img src="{{asset('storage/' . $item->image)}}" alt="">
                        </div>
                        <div class="member-info d-flex flex-column justify-content-center align-items-center mt-2">
                            <p class="p-0 m-0 member-name">{{$item->name}}</p>
                            <p class="p-0 m-0 member-designation">{{$item->designation}}</p>
                            <p class="p-0 m-2 text-center member-info-content">{{$item->bio}}</p>
                        </div>
                    </div>
                     @endforeach


                </div>
            </div>
        </section>
        <!-- end other member section -->
@endsection

@push('script')
<script>
    {
  "@context": "https://schema.org",
  "@type": "Person",
  "name": "{{ getOption('ceo_name') }}",                                        
  "honorificPrefix": "CEO",                    
  "sameAs": [
    "{{ getOption('social_link_fb') }}",
    "{{ getOption('social_link_linkedin') }}",
    "{{ getOption('social_link_youtube') }}",
    "{{ getOption('social_link_twitter') }}"
  ],
  "image": "{{ getimage(getOption('ceo_image')) }}", 
  "gender": "Male",    

  "address": {
    "@type": "PostalAddress",
    "streetAddress": "{{ getOption('app_address') }}",
    "addressLocality": "Dhaka",
    "addressRegion": "Dhaka Division",
    "postalCode": "{{ getOption('postal_code') }}",
    "addressCountry": "BD"
  },

  "jobTitle": "businessman",
  "worksFor": {
    "@type": "Organization",
    "name": "{{ getOption('company_name') }}"
  },

  "nationality": "Bangladeshi",
  "description": "{{ getOption('short_summary') }}",
  "identifier": "ceo-pentanik-it",     
  "memberOf": [
    {
      "@type": "Organization",
      "name": "Founder's Community Club Ltd"
    }
  ]
}
</script>
@endpush