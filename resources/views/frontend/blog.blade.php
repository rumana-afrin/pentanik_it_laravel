@extends('frontend.layouts.web')
@section('content')
    <!-- start blog section -->
    <section class="blog-section">
        <div class="blog-title d-flex justify-content-center align-items-center p-5">
            <h1>Blog</h1>
        </div>
        <div class="container mb-5 mt-5">
            <div class="row gy-4 gx-4">

                @foreach ($blogs as $blog)
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                        <div class="card blog-item-card">
                            <div class="blog-card">
                                <img src="{{ asset('storage/' . $blog->thumbnail_image) }}" class="card-img-top"
                                    alt="...">
                                <div class="blog-card-title">
                                    <h6>{{ $blog->title }}</h6>
                                </div>
                            </div>


                            <div class="card-body blog-card-body">
                                <div class="d-flex justify-content-start align-items-center">
                                    <p class="p-0 m-0 blog-inner-head"><span class="blog-auther-icon"><i
                                                class="fa-solid fa-circle-user"></i></span>{{ $blog->author_name }}</p>
                                    <p class="p-0 m-0 blog-inner-head"><span class="blog-auther-icon ps-3"><i
                                                class="fa-solid fa-calendar-days"></i></span>{{ $blog->created_at->format('M d, Y') }}
                                    </p>
                                </div>
                                <p class="card-text blog-card-text">{{ $blog->subtitle }}</p>
                                <a href="{{ route('blog-details', $blog->slug) }}" class="blog-btn stretched-link">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
    <!-- end
                  blog section -->
    <section>
        <div class="container mb-5">
            <div class="d-flex justify-content-center align-items-center">
                <nav aria-label="...">
                    <ul class="pagination">
                        {{-- Previous Page Link --}}
                        @if ($blogs->onFirstPage())
                            <li class="page-item disabled m-2"><span class="page-link">Previous</span></li>
                        @else
                            <li class="page-item m-2"><a class="page-link"
                                    href="{{ $blogs->previousPageUrl() }}">Previous</a></li>
                        @endif

                        {{-- Page Numbers --}}
                        @for ($i = 1; $i <= $blogs->lastPage(); $i++)
                            <li class="page-item m-2 {{ $blogs->currentPage() == $i ? 'active' : '' }}">
                                <a class="page-link" href="{{ $blogs->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor

                        {{-- Next Page Link --}}
                        @if ($blogs->hasMorePages())
                            <li class="page-item m-2"><a class="page-link" href="{{ $blogs->nextPageUrl() }}">Next</a></li>
                        @else
                            <li class="page-item disabled m-2"><span class="page-link">Next</span></li>
                        @endif

                    </ul>
                </nav>
            </div>
        </div>

    </section>
@endsection
{{-- 
    <!-- এটা Article page এর জন্য -->
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Article",
  "headline": "Article Title",             
  "author": {                             
    "@type": "Person",
    "name": "Author Name"
  },
  "publisher": {                          
    "@type": "Organization",
    "name": "Publisher Name",
    "logo": {
      "@type": "ImageObject",
      "url": "logo.png"
    }
  },
  "datePublished": "2024-01-01",          
  "dateModified": "2024-06-01",
  "image": "article-image.jpg",
  "articleBody": "Full article text...",
  "wordCount": "1500",
  "articleSection": "Technology",
  "keywords": "TV, Samsung, Review"
}
</script> --}}
