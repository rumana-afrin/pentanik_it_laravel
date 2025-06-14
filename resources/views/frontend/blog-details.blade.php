@extends('frontend.layouts.web')
@section('content')
    <div class="container-fluid">
        <div class="row blog-details-row mt-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-8 mb-5">

                <div class="blog-content">
                    <div class="blog-details-banenr">
                        <img src="{{ asset('storage/' . $blog->thumbnail_image) }}" alt="">
                    </div>
                    <div class="blog-details-title mt-4">
                        <h2>{{$blog->title}}</h2>
                    </div>
                    <div class="blog-writer d-flex justify-content-start align-items-center">
                        <p class="p-0 m-0 writer-name"><span class="blog-writer-icon"><i
                                    class="fa-solid fa-circle-user"></i></span>{{$blog->author_name}}</p>
                        <p class="p-0 m-0 writer-name"><span class="blog-writer-icon ps-3"><i
                                    class="fa-solid fa-calendar-days"></i></span>{{ $blog->created_at->format('M d, Y') }}</p>
                    </div>
                    <div class="blog-details mt-5">{!! $blog->content !!}</div>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-4">

                <div class="blog-content">
                    <h3>Popular Post</h3>
                    <div class="blog-right-content mt-4">
                        @foreach ($blogs as $item)
                       
                        <div class="card side-blog-item mb-3">
                            <div class="row g-0">
                                <div class="col-4 col-sm-4 col-md-4 blog-item-image">
                                    <img src="{{ asset('storage/' . $item->thumbnail_image) }}" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-8 col-sm-8 col-md-8">
                                    <div class="card-body card-blog-details">
                                        <h6 class="card-title blog-details-title">{{ $item->title }}</h6>
                                        <div class="blog-writer d-flex justify-content-start align-items-center mb-2">
                                            <p class="p-0 m-0 writer-name"><span class="blog-writer-icon"><i
                                                        class="fa-solid fa-circle-user"></i></span>{{ $item->author_name }}</p>
                                            <p class="p-0 m-0 writer-name"><span class="blog-writer-icon ps-3"><i
                                                        class="fa-solid fa-calendar-days"></i></span>{{ $item->created_at->format('M d, Y') }}</p>
                                        </div>
                                        <a href="{{route('blog-details', $item->id)}}" class="stretched-link blog-details-btn">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                         @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
