<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{-- <title>Document</title> --}}

    <!-- Performance Optimization: Preconnect to external CDNs -->
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">

    <!-- DNS Prefetch for faster loading -->
    <link rel="dns-prefetch" href="//cdn.jsdelivr.net">
    <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">

    <!-- Content Security Policy for better security -->
    <meta http-equiv="Content-Security-Policy"
        content="default-src 'self'; 
                   script-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net; 
                   style-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net https://cdnjs.cloudflare.com; 
                   font-src 'self' https://cdnjs.cloudflare.com; 
                   img-src 'self' data: https: blob:; 
                   connect-src 'self';">

    @include('frontend.layouts.style')

    @if (!empty($meta))
        <title>{{ $meta->meta_title }}</title>
        <meta name="description" content="{{ $meta->meta_description }}">
        <meta name="keywords" content="{{ $meta->meta_keywords }}">
        <meta name="author" content="John Doe">
        <meta name="robots" content="index, follow, max-snippet:-1, max-video-preview:30, max-image-preview:standard">
        <!-- index = show in search, follow = follow links -->

        <meta name="geo.region" content="BD-D" />
        <meta name="geo.placename" content="Dhaka" />
        <meta name="geo.position" content="23.7935;90.3654" />
        <meta name="ICBM" content="23.7935, 90.3654" /> <!-- Alternative format for geo position -->

        <link rel="canonical" href="{{ $meta->canonical_url ?? url()->current() }}">

        <meta property="og:title" content="{{ $meta->og_title ?? $meta->meta_title }}">
        <meta property="og:description" content="{{ $meta->og_description ?? $meta->meta_description }}">
        <meta property="og:image" content="{{ asset('storage/' . $meta->og_image) }}">
        <meta property="og:type" content="{{ $meta->og_type }}">
        
        <meta property="og:url" content="https://yourwebsite.com/this-page">
       
        <meta property="og:site_name" content="Your Website Name">
        <meta property="og:locale" content="en_US" />
        <meta property="og:locale:alternate" content="bn_BD" />

        <meta name="twitter:card" content="{{ $meta->twitter_card }}">
        <meta name="twitter:title" content="{{ $meta->twitter_title ?? $meta->meta_title }}">
        <meta name="twitter:description" content="{{ $meta->twitter_description ?? $meta->meta_description }}">
        <meta name="twitter:image" content="{{ asset('storage/' . $meta->twitter_image) }}">
        <meta name="twitter:site" content="@yourtwitterhandle"> <!-- optional -->
    @else
        <title>{{ getOption('home_meta_title') }}</title>
        <meta name="description" content="{{ getOption('home_meta_description') }}">
        <meta name="keywords" content="{{ getOption('home_meta_keywords') }}">
        
        <meta name="author" content="John Doe">
      
        <meta name="robots" content="index, follow, max-video-preview:30, max-image-preview:standard">
        <!-- index = show in search, follow = follow links -->

        <link rel="canonical" href="{{ getOption('home_canonical_url') ?? url()->current() }}">

        <meta property="og:title" content="{{ getOption('home_og_title') }}">
        <meta property="og:description" content="{{ getOption('home_og_description') }}">
        <meta property="og:type" content="{{ getOption('home_og_type') }}">
        <meta property="og:url" content="https://yourwebsite.com/this-page">
       <meta property="og:site_name" content="Your Website Name">
        <meta property="og:locale" content="en_US">
        <meta property="og:locale:alternate" content="bn_BD" />

        <meta name="twitter:card" content="{{ getOption('home_twitter_card') }}">
        <meta name="twitter:title" content="{{ getOption('home_twitter_title') }}">
        <meta name="twitter:description" content="{{ getOption('home_twitter_description') }}">
        <meta name="twitter:site" content="@yourtwitterhandle"> <!-- optional -->
    @endif

    @stack('style')

    {{-- <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "LocalBusiness",
            "name": "{{ getOption('business_name', 'Pentanik IT') }}",
            "image": "{{ getOption('business_logo') ? asset('storage/' . getOption('business_logo')) : asset('images/logo.png') }}",
            "url": "{{ url('/') }}",
            "telephone": "{{ getOption('business_phone', '+8801XXXXXXXXX') }}",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "{{ getOption('business_street', '46 West Shewrapara, Mirpur') }}",
                "addressLocality": "{{ getOption('business_city', 'Dhaka') }}",
                "postalCode": "{{ getOption('business_postal', '1216') }}",
                "addressCountry": "{{ getOption('business_country', 'BD') }}"
            },
            "geo": {
                "@type": "GeoCoordinates",
                "latitude": {{ getOption('business_latitude', '23.7935') }},
                "longitude": {{ getOption('business_longitude', '90.3654') }}
            },
            "openingHours": "{{ getOption('business_hours', 'Mo-Sa 09:00-18:00') }}",
            "sameAs": [
                @if(getOption('facebook_url'))
                    "{{ getOption('facebook_url') }}"{{ getOption('linkedin_url') ? ',' : '' }}
                @endif
                @if(getOption('linkedin_url'))
                    "{{ getOption('linkedin_url') }}"
                @endif
            ]
        }
    </script> --}}

    


<!-- এটা Product page এর জন্য -->
<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "Product",
  "name": "Product Name",                    // Required
  "description": "Product description",
  "image": ["image1.jpg", "image2.jpg"],

}
</script>

<!-- এটা FAQPage page এর জন্য -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [{                          // Required
    "@type": "Question",
    "name": "Question text?",               // Required
    "acceptedAnswer": {                     // Required
      "@type": "Answer",
      "text": "Answer text here"              // Required
    }
  }]
}
</script>
<!-- এটা Article page এর জন্য -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Article",
  "headline": "Article Title",              // Required
  "author": {                              // Required
    "@type": "Person",
    "name": "Author Name"
  },
  "publisher": {                           // Required
    "@type": "Organization",
    "name": "Publisher Name",
    "logo": {
      "@type": "ImageObject",
      "url": "logo.png"
    }
  },
  "datePublished": "2024-01-01",           // Required
  "dateModified": "2024-06-01",
  "image": "article-image.jpg",
  "articleBody": "Full article text...",
  "wordCount": "1500",
  "articleSection": "Technology",
  "keywords": "TV, Samsung, Review"
}
</script>
<!-- এটা Organization page এর জন্য -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "Company Name",                   // Required
  "url": "https://website.com",
  "logo": "logo.png",
  "description": "Company description",
  "foundingDate": "2010-01-01",
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "+880-XXX-XXXXX",
    "contactType": "Customer Service",
    "email": "contact@example.com"
  },
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "123 Main St",
    "addressLocality": "Dhaka",
    "addressRegion": "Dhaka Division",
    "postalCode": "1000",
    "addressCountry": "BD"
  },
  "sameAs": [
    "https://facebook.com/page",
    "https://twitter.com/handle"
  ]
}
</script>
<!-- এটা LocalBusiness page এর জন্য -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "Business Name",                  // Required
  "address": {                             // Required
    "@type": "PostalAddress",
    "streetAddress": "Address",
    "addressLocality": "Dhaka",
    "addressCountry": "BD"
  },
  "telephone": "+880-XXX-XXXXX",
  "openingHours": "Mo-Sa 09:00-18:00",
  "priceRange": "$$",
  "servesCuisine": "Bengali",              // Restaurant এর জন্য
  "acceptsReservations": true,
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": "23.8103",
    "longitude": "90.4125"
  }
}
</script>

<!-- এটা LocalBusiness page এর জন্য -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebSite",
  "name": "Website Name",                   // Required
  "url": "https://website.com",            // Required
  "description": "Website description",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "https://website.com/search?q={search_term_string}",
    "query-input": "required name=search_term_string"
  }
}
</script>
</head>

<body>
    <!--start header-->
    @include('frontend.layouts.header')
    <!--end header-->
    <main>

        @yield('content')
    </main>

    <!-- start footer -->
    @include('frontend.layouts.footer')
    <!-- end footer -->

    <!-- start back to top -->
    <button id="backToTopBtn" title="Go to top">↑</button>
    <!-- end back to top -->

    <!--script -->
    @include('frontend.layouts.script')
    @stack('script')
    <!--script -->

</body>

</html>
