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

                        <h5 class="card-title">Create Service Category</h5>

                        <!-- Multi Columns Form -->
                        <form class="row g-3" action="{{ route('admin.update-blog', $blog->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="title"
                                    value="{{ $blog->title }}">
                            </div>

                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="subtitle" class="form-label">Subtitle</label>
                                <input type="text" class="form-control" name="subtitle" id="subtitle" placeholder="slug"
                                    value="{{ $blog->subtitle }}">
                            </div>

                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control" name="slug" id="slug" placeholder="slug"
                                    value="{{ $blog->slug }}">
                            </div>


                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="author_name" class="form-label">Author Name</label>
                                <input type="text" class="form-control" name="author_name" id="author_name"
                                    placeholder="author name" value="{{ $blog->author_name }}">
                            </div>

                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="sort_order" class="form-label">Thumbnail Image</label>
                                <div class="upload-img-box">
                                    <img id="updateImageUrl"
                                        src="{{ $blog->thumbnail_image ? asset('storage/' . $blog->thumbnail_image) : getDefaultImage() }}">
                                    <input class="form-control" type="file" name="thumbnail_image" id="image"
                                        accept="image/*" onchange="previewFile(this)">
                                    <div class="upload-img-box-icon">
                                        <i class="bi bi-camera-fill"></i>
                                        <p class="m-0"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="excerpt" class="form-label">Excerpt</label>
                                <textarea class="form-control" name="excerpt" id="excerpt" placeholder="excerpt" cols="30" rows="3">{{ $blog->excerpt }}</textarea>
                            </div>


                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="sort_order" class="form-label">Order</label>
                                <input type="text" class="form-control" name="sort_order" id="sort_order"
                                    placeholder="sort_order" value="{{ $blog->sort_order }}">
                            </div>

                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="sort_order" class="form-label">Tag</label>
                                <div class="multi-input-container">
                                    <div id="tags"></div>
                                    <input type="text" id="tagInput" placeholder="Type and press Enter..." />
                                </div>
                            </div>



                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" name="status" id="status"
                                    aria-label="Default select example">

                                    <option value="draft" {{ $blog == 'draft' ? 'selected' : '' }}>Draft</option>
                                    <option value="published" {{ $blog == 'published' ? 'selected' : '' }}>Published
                                    </option>
                                    <option value="pending" {{ $blog == 'pending' ? 'selected' : '' }}>Pending</option>

                                </select>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="is_featured" class="form-label">Is Featured?</label>
                                <select class="form-select" name="is_featured" id="is_featured"
                                    aria-label="Default select example">

                                    <option value="1" {{ $blog->is_featured == 1 ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ $blog->is_featured == 0 ? 'selected' : '' }}>No</option>
                                </select>

                                {{-- <input type="hidden" name="is_featured" value="0">
<input type="checkbox" name="is_featured" value="1" {{ $blog->is_featured ? 'checked' : '' }}> --}}

                            </div>


                            <div class="col-12 col-sm-12 col-md-12">
                                <label for="content" class="form-label">Content</label>
                                {{-- <div class="col-sm-10"> --}}
                                <textarea class="tinymce-editor @error('content') is-invalid @enderror" name="content" id="content">{{ $blog->content }}</textarea>
                                {{-- </div> --}}
                            </div>


                            <div class="col-12 col-sm-12 col-md-12">
                                <div class="repeater-container">
                                    <label for="gallary_image" class="form-label">Gallary Image</label>

                                    @if (count($blog->blogGallaryImage) > 0)
                                        <div class="d-flex justify-content-center" id="repeater">
                                            @foreach ($blog->blogGallaryImage as $item)
                                                <div class="hello d-flex justify-content-center">

                                                    <div class="repeater-item d-flex align-items-center me-3">
                                                        <div class="upload-img-box gallarybox">
                                                            <img id="updateImageUrl"
                                                                src="{{ $item->gallary_image ? asset('storage/' . $item->gallary_image) : getDefaultImage() }}">
                                                            <input class="form-control" type="file"
                                                                name="gallary_image[]" id="gallary_image"
                                                                accept="image/*" onchange="previewFile(this)">
                                                            <div class="upload-img-box-icon">
                                                                <i class="bi bi-camera-fill"></i>
                                                                <p class="m-0"></p>
                                                            </div>
                                                            <button type="button" class="btn-close closebtn"
                                                                aria-label="Close"
                                                                onclick="removeRepeaterItem(this)"></button>

                                                        </div>
                                                    </div>

                                                </div>
                                            @endforeach

                                        </div>
                                    @else
                                        <div class="d-flex justify-content-center" id="repeater">
                                            <div class="hello">
                                                <div class="repeater-item d-flex align-items-center me-3">
                                                    <div class="upload-img-box gallarybox">
                                                        <img id="updateImageUrl" src="">
                                                        <input class="form-control" type="file" name="gallary_image[]"
                                                            id="gallary_image" accept="image/*"
                                                            onchange="previewFile(this)">
                                                        <div class="upload-img-box-icon">
                                                            <i class="bi bi-camera-fill"></i>
                                                            <p class="m-0"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- @endif --}}
                                        </div>
                                    @endif

                                    <button type="button" class="add-btn btn btn-primary mt-4"
                                        onclick="addRepeaterItem(event)">Add Gallary</button>
                                </div>
                            </div>

                            {{-- seo --}}
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="meta_title" class="form-label">Meta Title</label>
                                <input type="text" class="form-control" name="meta_title" id="meta_title"
                                    placeholder="meta_title" value="{{ $blog->seoMetaTag?->meta_title }}">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="meta_description" class="form-label">Meta Description</label>
                                <input type="text" class="form-control" name="meta_description" id="meta_description"
                                    placeholder="meta_description" value="{{ $blog->seoMetaTag?->meta_description }}">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="meta_keywords" class="form-label">Meta Keywords</label>
                                <input type="text" class="form-control" name="meta_keywords" id="meta_keywords"
                                    placeholder="meta_keywords" value="{{ $blog->seoMetaTag?->meta_keywords }}">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="canonical_url" class="form-label">Canonical Url</label>
                                <input type="url" class="form-control" name="canonical_url" id="canonical_url"
                                    placeholder="canonical_url" value="{{ $blog->seoMetaTag?->canonical_url }}">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="og_title" class="form-label">Og Title</label>
                                <input type="text" class="form-control" name="og_title" id="og_title"
                                    placeholder="og_title" value="{{ $blog->seoMetaTag?->og_title }}">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="og_description" class="form-label">Og Description</label>
                                <input type="text" class="form-control" name="og_description" id="og_description"
                                    placeholder="og_description" value="{{ $blog->seoMetaTag?->og_description }}">
                            </div>

                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="og_image" class="form-label">Og Image</label>
                                <div class="upload-img-box">
                                    <img id="updateImageUrl"
                                        src="{{ $blog->seoMetaTag?->og_image ? asset('storage/' . $blog->seoMetaTag?->og_image) : getDefaultImage() }}">
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
                                    placeholder="og_type" value="{{ $blog->seoMetaTag?->og_type }}">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="twitter_card" class="form-label">Twitter Card</label>
                                <input type="text" class="form-control" name="twitter_card" id="twitter_card"
                                    placeholder="twitter_card" value="{{ $blog->seoMetaTag?->twitter_card }}">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="twitter_title" class="form-label">Twitter Title</label>
                                <input type="text" class="form-control" name="twitter_title" id="twitter_title"
                                    placeholder="twitter_title" value="{{ $blog->seoMetaTag?->twitter_title }}">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="twitter_description" class="form-label">Twitter Description</label>
                                <input type="text" class="form-control" name="twitter_description"
                                    id="twitter_description" placeholder="twitter_description"
                                    value="{{ $blog->seoMetaTag?->twitter_description }}">
                            </div>

                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="twitter_image" class="form-label">Twitter Image</label>
                                <div class="upload-img-box">
                                    <img id="updateImageUrl"
                                        src="{{ $blog->seoMetaTag?->twitter_image ? asset('storage/' . $blog->seoMetaTag?->twitter_image) : getDefaultImage() }}">
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

        .gallarybox {
            width: 100px;
            height: 100px;
            position: relative;

        }

        .closebtn {
            position: absolute;
            top: -33px;
            left: 78%;
            color: #f70202 !important;
            font-size: 36px;
        }

        .closebtn {
            z-index: 10;
        }
    </style>
@endpush

@push('script')
    <script>
       
    function addRepeaterItem(event) {
        event.preventDefault();

        const repeater = document.getElementById('repeater'); // Correct container reference

        const newItem = document.createElement('div');
        newItem.className = 'hello d-flex justify-content-center';
        newItem.innerHTML = `
            <div class="repeater-item d-flex align-items-center me-3 position-relative">
                <div class="upload-img-box gallarybox">
                    <img src="" class="preview-img" />
                    <input class="form-control" type="file" name="gallary_image[]" accept="image/*" onchange="previewFile(this)">
                    <div class="upload-img-box-icon">
                        <i class="bi bi-camera-fill"></i>
                        <p class="m-0"></p>
                    </div>
                    <button type="button" class="btn-close closebtn" aria-label="Close" onclick="removeRepeaterItem(this)"></button>
                </div>
            </div>
        `;

        repeater.appendChild(newItem);
    }

    function removeRepeaterItem(button) {
        const wrapper = button.closest('.hello');
        if (wrapper) {
            wrapper.remove();
        }
    }

    function previewFile(input) {
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                input.closest('.upload-img-box').querySelector('.preview-img').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
        //start tag
        document.addEventListener('DOMContentLoaded', function() {
            const tagInput = document.getElementById('tagInput');
            const tagsContainer = document.getElementById('tags');

            const existingTags = @json($blog->blogTags->pluck('tag_name'));

            existingTags.forEach(tag => {
                if (tag.trim()) addTag(tag.trim());
            });

            tagInput.addEventListener('keydown', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    const tagValue = tagInput.value.trim();
                    if (tagValue) {
                        addTag(tagValue);
                        tagInput.value = '';
                    }
                }
            });

            function addTag(value) {
                const span = document.createElement('span');
                span.className = 'tag';
                span.innerHTML = `${value} <span class="remove" style="cursor:pointer;">×</span>`;

                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'tag[]';
                hiddenInput.value = value;
                span.appendChild(hiddenInput);

                span.querySelector('.remove').addEventListener('click', function() {
                    span.remove();
                });

                tagsContainer.appendChild(span);
            }
        });

        //end blog tag
    </script>
@endpush
