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
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Create Service Category</h5>

                        <!-- Multi Columns Form -->
                        <form class="row g-3" action="{{ route('admin.store-portfolio') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('POST')


                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="portfolio_category_id" class="form-label">Portfolio Category</label>
                                <select class="form-select" name="portfolio_category_id" id="portfolio_category_id"
                                    aria-label="Default select example">
                                    <option value="" disabled selected>Select option...</option>
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" id="title"
                                    placeholder="title">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="subtitle" class="form-label">SubTitle</label>
                                <input type="text" name="subtitle" class="form-control" id="subtitle"
                                    placeholder="subtitle">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="slug" class="form-label">slug</label>
                                <input type="text" class="form-control" name="slug" id="slug" placeholder="slug">
                            </div>

                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="short_description" class="form-label">Short Description</label>
                                <textarea class="form-control" name="short_description" id="short_description" placeholder="short_description"
                                    cols="30" rows="3"></textarea>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="client_name" class="form-label">Client Name</label>
                                <input type="text" class="form-control" name="client_name" id="client_name"
                                    placeholder="client_name">
                            </div>


                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="sort_order" class="form-label">Order</label>
                                <input type="number" class="form-control" name="sort_order" id="sort_order"
                                    placeholder="sort_order">
                            </div>

                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="project_url" class="form-label">Project Url</label>
                                <input type="url" class="form-control" name="project_url" id="project_url"
                                    placeholder="project_url">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="is_featured" class="form-label">Is Featured?</label>
                                <select class="form-select" name="is_featured" id="is_featured"
                                    aria-label="Default select example">
                                    <option selected>selete status</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="status" class="form-label">Is Active</label>
                                <select class="form-select" name="is_active" id="status"
                                    aria-label="Default select example">
                                    <option selected>selete status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>

                                </select>
                            </div>


                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="featured_image" class="form-label">Image</label>
                                <div class="upload-img-box">
                                    <img id="updateImageUrl" src="">
                                    <input class="form-control" type="file" name="featured_image" id="featured_image"
                                        accept="image/*" onchange="previewFile(this)">
                                    <div class="upload-img-box-icon">
                                        <i class="bi bi-camera-fill"></i>
                                        <p class="m-0"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="repeater-container">
                                    <label for="technology" class="form-label">Technology</label>
                                    <div class="repeater" id="repeater">
                                        <div class="repeater-item d-flex align-items-center">
                                            <input class="form-control image-input" type="text" name="technology[]"
                                                placeholder="technology" />
                                            <button type="button" class="remove-btn btn btn-primary ms-4"
                                                onclick="removeItem(event, this)">
                                                <a href="" class="mr-1" title="Edit">
                                                    <img src="{{ asset('assets/backend/image/minus.png') }}"
                                                        alt="">
                                                </a>
                                            </button>
                                        </div>

                                    </div>
                                    {{-- @endif --}}

                                    <button type="button" class="add-btn btn btn-primary mt-4"
                                        onclick="addRepeaterItem(event)">Add Feature</button>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="tinymce-editor @error('description') is-invalid @enderror" name="description" id="description"></textarea>
                            </div>

                            {{-- seo --}}
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="meta_title" class="form-label">Meta Title</label>
                                <input type="text" class="form-control" name="meta_title" id="meta_title"
                                    placeholder="meta_title">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="meta_description" class="form-label">Meta Description</label>
                                <input type="text" class="form-control" name="meta_description" id="meta_description"
                                    placeholder="meta_description">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="meta_keywords" class="form-label">Meta Keywords</label>
                                <input type="text" class="form-control" name="meta_keywords" id="meta_keywords"
                                    placeholder="meta_keywords">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="canonical_url" class="form-label">Canonical Url</label>
                                <input type="url" class="form-control" name="canonical_url" id="canonical_url"
                                    placeholder="canonical_url">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="og_title" class="form-label">Og Title</label>
                                <input type="text" class="form-control" name="og_title" id="og_title"
                                    placeholder="og_title">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="og_description" class="form-label">Og Description</label>
                                <input type="text" class="form-control" name="og_description" id="og_description"
                                    placeholder="og_description">
                            </div>
                          
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="og_image" class="form-label">Og Image</label>
                                <div class="upload-img-box">
                                    <img id="updateImageUrl" src="">
                                    <input class="form-control" type="file" name="og_image" id="image"
                                        accept="image/*" onchange="previewFile(this)">
                                    <div class="upload-img-box-icon">
                                        <i class="bi bi-camera-fill"></i>
                                        <p class="m-0"></p>
                                    </div>
                                </div>
                            </div>
                             <div class="col-12 col-sm-12 col-md-6">
                                <label for="og_type" class="form-label">Og Type</label>
                                <input type="text" class="form-control" name="og_type" id="og_type"
                                    placeholder="og_type">
                            </div>
                             <div class="col-12 col-sm-12 col-md-6">
                                <label for="twitter_card" class="form-label">Twitter Card</label>
                                <input type="text" class="form-control" name="twitter_card" id="twitter_card"
                                    placeholder="twitter_card">
                            </div>
                             <div class="col-12 col-sm-12 col-md-6">
                                <label for="twitter_title" class="form-label">Twitter Title</label>
                                <input type="text" class="form-control" name="twitter_title" id="twitter_title"
                                    placeholder="twitter_title">
                            </div>
                             <div class="col-12 col-sm-12 col-md-6">
                                <label for="twitter_description" class="form-label">Twitter Description</label>
                                <input type="text" class="form-control" name="twitter_description" id="twitter_description"
                                    placeholder="twitter_description">
                            </div>

                                   <div class="col-12 col-sm-12 col-md-6">
                                <label for="twitter_image" class="form-label">Twitter Image</label>
                                <div class="upload-img-box">
                                    <img id="updateImageUrl" src="">
                                    <input class="form-control" type="file" name="twitter_image" id="image"
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


@push('script')
    <script>
        function addRepeaterItem() {
            const repeater = document.getElementById('repeater');

            const newItem = document.createElement('div');
            newItem.className = 'repeater';
            newItem.innerHTML = `
                        <div class="repeater-item d-flex align-items-center mt-3">
                                                                    <input class="form-control image-input" type="text" name="technology[]" placeholder="feature"/>
                                                                    <button type="button" class="remove-btn btn btn-primary ms-4" onclick="removeItem(event, this)">
                                                                        <a href="" class="mr-1" title="Edit">
                                                                            <img src="{{ asset('assets/backend/image/minus.png') }}" alt="">
                                                                        </a>
                                                                    </button>
                                                                </div>
                                                                
                    `;

            repeater.appendChild(newItem);
        }


        function removeItem(event, button) {
            event.preventDefault();
            const repeaterItem = button.closest('.repeater-item');
            const wrapper = button.closest('.hello');
            if (wrapper) {
                wrapper.remove();
            }
            repeaterItem.remove();
        }
    </script>
@endpush
