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

    <!-- এটা FAQPage page এর জন্য -->
    {{-- <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What is your service time?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "We are open from 10 AM to 6 PM, 6 days a week."
      }
    },
    {
      "@type": "Question",
      "name": "Where are you located?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "We are located at 123 Main Street, Dhaka."
      }
    },
    {
      "@type": "Question",
      "name": "Do you offer home delivery?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes, we provide home delivery within Dhaka city."
      }
    }
  ]
}
</script> --}}
