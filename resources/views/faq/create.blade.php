@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active">{{ $pageTitle }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-md-8 stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Create FAQ</h5>

                        <!-- Multi Columns Form -->
                        <form class="row g-3" action="{{ route('admin.store-faq') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('POST')

                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="question" class="form-label">Question</label>
                                <input type="text" name="question" class="form-control" value="{{ old('question') }}"
                                    id="question" placeholder="question">
                            </div>

                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="answer" class="form-label">Answer</label>
                                <textarea class="form-control" name="answer" id="answer" placeholder="answer" cols="30" rows="3"></textarea>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select" name="category" id="category"
                                    aria-label="Default select example">
                                    <option selected value="">selete status</option>
                                    
                                    @foreach ($pageSlug as $item)
                                        <option value="{{$item}}">{{$item}}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="sort_order" class="form-label">Order</label>
                                <input type="number" class="form-control" value="{{ old('sort_order') }}" name="sort_order"
                                    id="sort_order" placeholder="sort_order">
                            </div>

                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form><!-- End Multi Columns Form -->

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('style')
    <style>
        ::placeholder {
            color: #888;
            font-style: italic;
            font-size: 13px;
            opacity: 0.7;
        }
    </style>
@endpush
