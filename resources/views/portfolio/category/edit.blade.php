@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item">Portfolio</li>
                <li class="breadcrumb-item active">{{ $pageTitle }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-md-8 stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Create Service Category</h5>

                        <!-- Multi Columns Form -->
                        <form class="row g-3" action="{{ route('admin.update-portfolio-category', $pCategory->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="name" value="{{$pCategory->name}}">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="slug" class="form-label">slug</label>
                                <input type="text" class="form-control" name="slug" id="slug"
                                    placeholder="slug" value="{{$pCategory->slug}}">
                            </div>
                            
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description" placeholder="description" cols="30" rows="3">{{$pCategory->description}}</textarea>
                            </div>
                        

                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="sort_order" class="form-label">Order</label>
                                <input type="number" class="form-control" name="sort_order" id="sort_order"
                                    placeholder="sort_order" value="{{$pCategory->sort_order}}">
                            </div>


                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="status" class="form-label">Is Active</label>
                                <select class="form-select" name="is_active" id="status"
                                    aria-label="Default select example">
                                    <option value="1" {{$pCategory->is_active == 1 ? "selected" : ''}}>Active</option>
                                    <option value="0" {{$pCategory->is_active == 0 ? "selected" : ''}}>Inactive</option>

                                </select>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="sort_order" class="form-label">Image</label>
                                <div class="upload-img-box">
                                    <img id="updateImageUrl" src="{{ $pCategory->image ? asset('storage/' . $pCategory->image) : getDefaultImage()}}">
                                    <input class="form-control" type="file" name="image" id="image"
                                        accept="image/*" onchange="previewFile(this)">
                                    <div class="upload-img-box-icon">
                                        <i class="bi bi-camera-fill"></i>
                                        <p class="m-0"></p>
                                    </div>
                                </div>
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

        .upload-img-box {
            height: 200px;
            width: 200px;
        }
    </style>
@endpush

