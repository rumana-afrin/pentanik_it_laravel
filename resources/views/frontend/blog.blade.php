@extends('frontend.layouts.web')
@section('content')
    <!-- start blog section -->
    <section>
        <div class="blog-title d-flex justify-content-center align-items-center p-2">
            <h1>Blog</h1>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <div class="blog mb-5 pe-0 ps-0">
                <div class="row blog-section gy-4 gx-4">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-3 mt-4">

                        <div class="">
                            <div class="blog-menu">
                                <div class="cat d-flex justify-content-between align-items-center">
                                    <h5 class="fw-semibold">Category</h5>
                                    <h5><i class="fa-solid fa-list"></i></h5>
                                </div>
                                <li class="sidebar-item border-bottom mt-3">
                                    <a href="{{ route('dynamic-page', ['slug' => 'blog']) }}"
                                        class="{{ request()->is('blog') ? 'active' : '' }}">All</a>
                                </li>
                                @foreach ($blogs as $blog)
                                    <li class="sidebar-item border-bottom mt-3">
                                        <a href="{{ route('blog-category', $blog->slug) }}"
                                            class="{{ request()->is('blog/' . $blog->slug) ? 'active' : '' }}">{{ $blog->name }}</a>
                                    </li>
                                @endforeach
                            </div>
                        </div>
                        <div class="blog-menu-mobile">
                            <div class="border-bottom">
                                <p class="d-flex justify-content-between align-items-center gap-1 my-account m-0">
                                    <a class="text-decoration-none text-dark fw-semibold fs-4 stretched-link"
                                        data-bs-toggle="collapse" href="#collapseExample" role="button"
                                        aria-expanded="false" aria-controls="collapseExample">
                                        Blog Category
                                    </a>
                                    <i class="fa-solid fa-list"></i>
                                </p>
                            </div>
                            <div class="collapse" id="collapseExample">
                                <div class="">
                                    @foreach ($blogs as $blog)
                                        <li class="sidebar-item border-bottom">
                                            <a href="{{ route('blog-category', $blog->slug) }}"
                                                class="{{ request()->routeIs('blog/' . $blog->slug) ? 'active' : '' }}">{{ $blog->name }}</a>
                                        </li>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-12 col-lg-9">
                        <div class="row">
                            @foreach ($allBlogs as $blog)
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-4 mb-4">
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
                                                            class="fa-solid fa-circle-user"></i></span>{{ $blog->author_name }}
                                                </p>
                                                <p class="p-0 m-0 blog-inner-head"><span class="blog-auther-icon ps-3"><i
                                                            class="fa-solid fa-calendar-days"></i></span>{{ $blog->created_at->format('M d, Y') }}
                                                </p>
                                            </div>
                                            <p class="card-text blog-card-text">{{ $blog->subtitle }}</p>
                                            <a href="{{ route('blog-details', ['category_slug' => $blog->blogCategory->slug, 'blog_slug' => $blog->slug]) }}"
                                                class="blog-btn stretched-link">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- end blog section -->
                    <section>
                        <div class="container mb-5">
                            <div class="d-flex justify-content-center align-items-center">
                                <nav aria-label="...">
                                    <ul class="pagination">
                                        @if ($allBlogs->onFirstPage())
                                            <li class="page-item disabled m-2"><span class="page-link">Previous</span></li>
                                        @else
                                            <li class="page-item m-2"><a class="page-link"
                                                    href="{{ $allBlogs->previousPageUrl() }}">Previous</a></li>
                                        @endif
                                        @for ($i = 1; $i <= $allBlogs->lastPage(); $i++)
                                            <li class="page-item m-2 {{ $allBlogs->currentPage() == $i ? 'active' : '' }}">
                                                <a class="page-link"
                                                    href="{{ $allBlogs->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor
                                        @if ($allBlogs->hasMorePages())
                                            <li class="page-item m-2"><a class="page-link"
                                                    href="{{ $allBlogs->nextPageUrl() }}">Next</a></li>
                                        @else
                                            <li class="page-item disabled m-2"><span class="page-link">Next</span></li>
                                        @endif

                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('style')
    <style>
        a.active {
            color: #0354bd;
            font-weight: bold;
        }
    </style>
@endpush

