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
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Add Page Content</h5>

                        <!-- Multi Columns Form -->
                        <form class="row g-3" action="{{ route('admin.store-page') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('POST')

                            <div class="col-12 col-sm-12 col-md-12">
                                <label for="name" class="form-label">Page Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="name">
                            </div>
                            <div class="col-12 col-sm-12 col-md-12">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" id="title"
                                    placeholder="title">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="subtitle" class="form-label">Subtitle</label>
                                <input type="text" name="subtitle" class="form-control" id="subtitle"
                                    placeholder="subtitle">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="slug" class="form-label">slug</label>
                                <input type="text" class="form-control" name="slug" id="slug" placeholder="slug">
                            </div>
                            <div class="col-12 col-sm-12 col-md-12">
                                <label for="short_content" class="form-label">Short Content</label>
                                <textarea class="tinymce-editor @error('short_content') is-invalid @enderror" name="short_content" id="short_content"></textarea>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12">
                                <label for="content" class="form-label">Content</label>
                                <textarea class="tinymce-editor @error('content') is-invalid @enderror" name="content" id="content"></textarea>
                            </div>
                            {{-- <div class="col-12 col-sm-12 col-md-6">
                                <label for="template" class="form-label">Template</label>
                                <input type="text" class="form-control" name="template" id="template"
                                    placeholder="template">
                            </div> --}}
                            {{-- <div class="col-12 col-sm-12 col-md-6">
                                <label for="sort_order" class="form-label">Order</label>
                                <input type="text" class="form-control" name="sort_order" id="sort_order"
                                    placeholder="sort_order">
                            </div> --}}


                            {{-- <div class="col-12 col-sm-12 col-md-6">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" name="status" id="status"
                                    aria-label="Default select example">
                                    <option selected disabled>selete status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>

                                </select>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="show_in_menu" class="form-label">Show In Nenu</label>
                                <select class="form-select" name="show_in_menu" id="show_in_menu"
                                    aria-label="Default select example">
                                    <option selected disabled>selete status</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>

                                </select>
                            </div> --}}

                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="menu_type" class="form-label">Menu Type</label>
                                <select class="form-select" name="menu_type" id="menu_type"
                                    aria-label="Default select example">
                                    <option selected disabled>selete status</option>
                                    <option value="footer">Footer</option>
                                    <option value="header">Header</option>

                                </select>
                            </div>


                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="sort_order" class="form-label">Image</label>
                                <div class="upload-img-box">
                                    <img id="updateImageUrl" src="">
                                    <input class="form-control" type="file" name="featured_image" id="image"
                                        accept="image/*" onchange="previewFile(this)">
                                    <div class="upload-img-box-icon">
                                        <i class="bi bi-camera-fill"></i>
                                        <p class="m-0"></p>
                                    </div>
                                </div>
                            </div>

                             <div class="col-12 col-sm-12 col-md-6">
                                <label for="image_alt" class="form-label">Image alt text</label>
                                <input type="text" class="form-control" name="image_alt" id="image_alt"
                                    placeholder="alt">
                            </div>


                            {{-- seo --}}
                             {{-- seo --}}
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="meta_title" class="form-label">Meta Title</label>
                                <input type="text" class="form-control" name="meta_title" id="meta_title"
                                    placeholder="meta title">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="meta_description" class="form-label">Meta Description</label>
                               
                                     <textarea class="form-control" id="meta_description" name="meta_description"
                                        placeholder="meta description" cols="30" rows="3"></textarea>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="meta_keywords" class="form-label">Meta Keywords</label>
                                <input type="text" class="form-control" name="meta_keywords" id="meta_keywords"
                                    placeholder="meta keywords">
                            </div>

                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="auther" class="form-label">Site Auther</label>
                                <input type="text" class="form-control" name="auther" id="auther"
                                    placeholder="auther">
                            </div>
{{-- 
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="canonical_url" class="form-label">Canonical Url</label>
                                <input type="url" class="form-control" name="canonical_url" id="canonical_url"
                                    placeholder="canonical_url">
                            </div> --}}
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="og_title" class="form-label">Og Title</label>
                                <input type="text" class="form-control" name="og_title" id="og_title"
                                    placeholder="open graph title">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="og_description" class="form-label">Og Description</label>
                             
                                                                        <textarea class="form-control" id="og_description" name="og_description"
                                        placeholder="open graph description" cols="30" rows="3"></textarea>
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
                                    placeholder="open graph type">
                            </div>
                             {{-- <div class="col-12 col-sm-12 col-md-6">
                                <label for="og_url" class="form-label">Og URl</label>
                                <input type="url" class="form-control" name="og_url" id="og_url"
                                    placeholder="og url">
                            </div> --}}
                             <div class="col-12 col-sm-12 col-md-6">
                                <label for="og_site_name" class="form-label">Og Site Name</label>
                                <input type="text" class="form-control" name="og_site_name" id="og_site_name"
                                    placeholder="open graph site name">
                            </div>

                             <div class="col-12 col-sm-12 col-md-6">
                                <label for="twitter_card" class="form-label">Twitter Card</label>
                                <input type="text" class="form-control" name="twitter_card" id="twitter_card"
                                    placeholder="twitter card">
                            </div>
                             <div class="col-12 col-sm-12 col-md-6">
                                <label for="twitter_title" class="form-label">Twitter Title</label>
                                <input type="text" class="form-control" name="twitter_title" id="twitter_title"
                                    placeholder="twitter title">
                            </div>
                             <div class="col-12 col-sm-12 col-md-6">
                                <label for="twitter_description" class="form-label">Twitter Description</label>
                              
                                                                        <textarea class="form-control" id="twitter_description" name="twitter_description"
                                        placeholder="twitter description" cols="30" rows="3"></textarea>

                            </div>
                             <div class="col-12 col-sm-12 col-md-6">
                                <label for="twitter_site" class="form-label">Twitter Site</label>
                                <input type="text" class="form-control" name="twitter_site" id="twitter_site"
                                    placeholder="@/yourtwitterhandle">
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
                                <button type="reset" class="btn btn-secondary">Save</button>
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
