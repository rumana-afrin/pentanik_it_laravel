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

                        <h5 class="card-title">Create Advisory</h5>

                        <!-- Multi Columns Form -->
                        <form class="row g-3" action="{{ route('admin.update-package', $package->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="package_category_id" class="form-label">Package Category</label>
                                <select class="form-select" name="package_category_id" id="package_category_id"
                                    aria-label="Default select example">
                                    <option selected value="">selete status</option>
                                    @foreach ($packageCategory as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $package->packageCategory->id === $item->id ? 'selected' : '' }}>
                                            {{ $item->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="package_name" class="form-label">Package Name</label>
                                <input type="text" name="package_name" class="form-control"
                                    value="{{ $package->package_name }}" id="package_name" placeholder="package name"
                                    required>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="package_subtitle" class="form-label">Subtitle</label>
                                <textarea name="package_subtitle" class="form-control" id="package_subtitle" placeholder="package subtitle"
                                    cols="30" rows="2">{{ $package->package_subtitle }}</textarea>

                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="star_rating" class="form-label">Star Rating</label>
                                <input type="number" class="form-control" value="{{ $package->star_rating }}"
                                    name="star_rating" id="star_rating" placeholder="star rating">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="display_order" class="form-label">Order</label>
                                <input type="number" class="form-control" value="{{ $package->display_order }}"
                                    name="display_order" id="display_order" placeholder="display order">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" class="form-control" value="{{ $package->price }}" name="price"
                                    id="price" placeholder="price" step="0.01" min="0">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="currency" class="form-label">Currency</label>
                                <input type="text" class="form-control" value="{{ $package->currency }}" name="currency"
                                    id="currency" placeholder="currency">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="billing_period" class="form-label">Billing Period</label>
                                <input type="text" class="form-control" value="{{ $package->billing_period }}"
                                    name="billing_period" id="billing_period" placeholder="billing period">
                            </div>

                            <div class="col-12 col-sm-12 col-md-12">
                                <label for="billing_period" class="form-label">Package Feature</label>

                                <div class="feature-icon-container">
                                    @if (count($package->packageFeature) > 0)
                                        @foreach ($package->packageFeature as $feature)
                                            <div class="feature-icon-row d-flex gap-4 align-items-start mt-2">
                                                {{-- Feature Text --}}
                                                <div class="flex-grow-1">
                                                    <input type="hidden" name="feature_id[]" value="{{ $feature->id }}">
                                                    <input class="form-control" type="text" name="package_feature[]"
                                                        placeholder="Package Feature"
                                                        value="{{ $feature->feature_text }}" />
                                                </div>
                                                {{-- Feature Icon --}}
                                                <div class="upload-img-box">
                                                    <img id="updateImageUrl"
                                                        src="{{ $feature->icon ? asset('storage/' . $feature->icon->icon) : getDefaultImage() }}">
                                                    <input class="form-control" type="file" name="icon[]"
                                                        id="icon" accept="image/*" onchange="previewFile(this)">
                                                    <div class="upload-img-box-icon">
                                                        <i class="bi bi-camera-fill"></i>
                                                        <p class="m-0"></p>
                                                    </div>
                                                </div>

                                                {{-- Button --}}
                                                <div>
                                                    <button type="button" class="remove-btn btn btn-primary ms-2"
                                                        onclick="removeItem(event, this)">
                                                        <img src="{{ asset('assets/backend/image/minus.png') }}"
                                                            alt="">
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                {{-- Add Feature Button --}}
                                <button type="button" class="add-btn btn btn-primary mt-4"
                                    onclick="addFeatureIconRow()">Add
                                    Feature</button>

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
            height: 50px;
            width: 50px;
        }
    </style>
@endpush

@push('script')
    <script>
        function addFeatureIconRow() {
            const container = document.querySelector('.feature-icon-container');

            const row = document.createElement('div');
            row.className = 'feature-icon-row d-flex gap-4 align-items-start mt-2';

            row.innerHTML = `
        <div class="flex-grow-1">
            <input type="hidden" name="feature_id[]" value="">
            <input class="form-control" type="text" name="package_feature[]" placeholder="Package Feature" />
        </div>

         <div class="upload-img-box">
                                <img id="updateImageUrl" src="">
                                <input class="form-control" type="file" name="icon[]" id="icon"
                                    accept="image/*" onchange="previewFile(this)">
                                <div class="upload-img-box-icon">
                                    <i class="bi bi-camera-fill"></i>
                                    <p class="m-0"></p>
                                </div>
                            </div>

        <div>
            <button type="button" class="remove-btn btn btn-primary ms-2" onclick="removeItem(event, this)">
                <img src="/assets/backend/image/minus.png" alt="">
            </button>
        </div>
    `;

            container.appendChild(row);
        }

        function removeItem(event, button) {
            event.preventDefault();
            const row = button.closest('.feature-icon-row');
            if (row) {
                row.remove();
            }
        }
    </script>
@endpush
