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

                        <h5 class="card-title">Create Service Category</h5>

                        <!-- Multi Columns Form -->
                        <form class="row g-3" action="{{ route('admin.update-work-process', $workProcess->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" id="title"
                                    placeholder="title" value="{{$workProcess->title}}">
                            </div>

                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="step_number" class="form-label">Step Number</label>
                                <input type="text" class="form-control" name="step_number" id="step_number"
                                    placeholder="step number" value="{{$workProcess->step_number}}">
                            </div>

                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" name="status" id="status"
                                    aria-label="Default select example">
                                    <option selected>selete status</option>
                                    <option value="1" {{$workProcess->status == 1 ? 'selected' : ''}}>Active</option>
                                    <option value="0" {{$workProcess->status == 0 ? 'selected' : ''}}>Inactive</option>
                                </select>
                            </div>

                                
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" class="form-control" id="description" placeholder="description"
                                    cols="30" rows="3">{{$workProcess->description}}</textarea>

                            </div>
                                <div class="col-12 col-sm-12 col-md-6">
                                <label for="icon" class="form-label">Icon</label>
                                <div class="upload-img-box">
                                    <img id="updateImageUrl" src="{{ $workProcess->icon ? asset('storage/' . $workProcess->icon) : getDefaultImage() }}">
                                    <input class="form-control" type="file" name="icon" id="icon"
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
            height: 100px;
            width: 100px;
        }
    </style>
@endpush

