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
                        <form class="row g-3" action="{{ route('admin.store-package') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('POST')

                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="package_category_id" class="form-label">Package Category</label>
                                <select class="form-select" name="package_category_id" id="package_category_id"
                                    aria-label="Default select example">
                                    <option selected value="">selete status</option>
                                    @foreach ($packageCategory as $item)
                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="package_name" class="form-label">Package Name</label>
                                <input type="text" name="package_name" class="form-control"
                                    value="{{ old('package_name') }}" id="package_name" placeholder="package name" required>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="package_subtitle" class="form-label">Subtitle</label>
                                <textarea name="package_subtitle" class="form-control" id="package_subtitle" value="{{ old('package_subtitle') }}"
                                    placeholder="package subtitle" cols="30" rows="2"></textarea>

                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="star_rating" class="form-label">Star Rating</label>
                                <input type="number" class="form-control" value="{{ old('star_rating') }}"
                                    name="star_rating" id="star_rating" placeholder="star rating">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="display_order" class="form-label">Order</label>
                                <input type="number" class="form-control" value="{{ old('display_order') }}"
                                    name="display_order" id="display_order" placeholder="display order">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" class="form-control" value="{{ old('price') }}" name="price"
                                    id="price" placeholder="price">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="currency" class="form-label">Currency</label>
                                <input type="text" class="form-control" value="{{ old('currency') }}" name="currency"
                                    id="currency" placeholder="currency">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="billing_period" class="form-label">Billing Period</label>
                                <input type="text" class="form-control" value="{{ old('billing_period') }}"
                                    name="billing_period" id="billing_period" placeholder="billing period">
                            </div>

                            {{-- features --}}
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="repeater-container">
                                    <label for="package_feature" class="form-label">Package Features</label>
                                    <div class="repeater" id="repeater">
                                        <div class="repeater-item d-flex align-items-center">
                                            <input class="form-control image-input" type="text" name="package_feature[]"
                                                placeholder="package feature" />
                                            <button type="button" class="remove-btn btn btn-primary ms-4"
                                                onclick="removeItem(event, this)">
                                                <a href="" class="mr-1" title="Edit">
                                                    <img src="{{ asset('assets/backend/image/minus.png') }}"
                                                        alt="">
                                                </a>
                                            </button>
                                        </div>

                                    </div>

                                    <button type="button" class="add-btn btn btn-primary mt-4"
                                        onclick="addRepeaterItem(event)">Add Feature</button>
                                </div>
                            </div>
                            {{-- features --}}

                            {{-- icon --}}
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="repeater-container">
                                    <label for="icon" class="form-label">Icon</label>
                                    <div class="icon" id="icon">
                                        <div class="repeater-item d-flex align-items-center">

                                            <div class="upload-img-box me-5">
                                                <img id="updateImageUrl" src="">
                                                <input class="form-control" type="file" name="icon[]" id="icon"
                                                    accept="image/*" onchange="previewFile(this)">
                                                <div class="upload-img-box-icon">
                                                    <i class="bi bi-camera-fill"></i>
                                                    <p class="m-0"></p>
                                                </div>
                                            </div>

                                            <button type="button" class="remove-btn btn btn-primary ms-4"
                                                onclick="removeItem(event, this)">
                                                <a href="" class="mr-1" title="Edit">
                                                    <img src="{{ asset('assets/backend/image/minus.png') }}"
                                                        alt="">
                                                </a>
                                            </button>
                                        </div>
                                    </div>

                                    <button type="button" class="add-btn btn btn-primary mt-4"
                                        onclick="addIconItem(event)">Add Feature</button>
                                </div>
                            </div>
                            {{-- icon --}}

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
        function addRepeaterItem() {
            const repeater = document.getElementById('repeater');
            const newItem = document.createElement('div');
            newItem.className = 'repeater';
            newItem.innerHTML = `
                        <div class="repeater-item d-flex align-items-center mt-3">
                                <input class="form-control image-input" type="text" name="package_feature[]" placeholder="package feature"/>
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

        // icon
        function addIconItem() {
            const repeaterIcon = document.getElementById('icon');
            const iconItem = document.createElement('div');
            iconItem.className = 'icon';
            iconItem.innerHTML = `
                        <div class="repeater-item d-flex align-items-center mt-3">
                                <div class="upload-img-box me-5">
                                    <img id="updateImageUrl" src="">
                                    <input class="form-control" type="file" name="icon[]" id="icon"
                                        accept="image/*" onchange="previewFile(this)">
                                    <div class="upload-img-box-icon">
                                        <i class="bi bi-camera-fill"></i>
                                        <p class="m-0"></p>
                                    </div>
                                </div> 
                                <button type="button" class="remove-btn btn btn-primary ms-4" onclick="removeItem(event, this)">
                                    <a href="" class="mr-1" title="Edit">
                                        <img src="{{ asset('assets/backend/image/minus.png') }}" alt="">
                                    </a>
                                </button>
                        </div>
                                                                
                    `;

            repeaterIcon.appendChild(iconItem);
        }
    </script>
@endpush
