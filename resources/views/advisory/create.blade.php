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
                        <form class="row g-3" action="{{ route('admin.store-advisory') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('POST')

                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" id="name" placeholder="name">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="designation" class="form-label">Designation</label>
                                <input type="text" class="form-control" value="{{ old('designation') }}" name="designation" id="designation"
                                    placeholder="designation">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="bio" class="form-label">Biography</label>
                                <textarea class="form-control" name="bio" id="bio" placeholder="biography" cols="30" rows="3"></textarea>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" value="{{ old('email') }}" name="email" id="email"
                                    placeholder="email">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" value="{{ old('phone') }}" name="phone" id="phone"
                                    placeholder="phone">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">

                                <label for="experience_years" class="form-label">Experience Years</label>
                                <input type="number" class="form-control" value="{{ old('experience_years') }}" name="experience_years" id="experience_years"
                                    placeholder="experience years">
                            </div>

                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="sort_order" class="form-label">Order</label>
                                <input type="number" class="form-control" value="{{ old('sort_order') }}" name="sort_order" id="sort_order"
                                    placeholder="sort_order">
                            </div>


                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" name="status" id="status"
                                    aria-label="Default select example">
                                    <option selected value="">selete status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>

                                </select>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="repeater-container">
                                    <label for="skill" class="form-label">Skills</label>
                                    <div class="repeater" id="repeater">
                                        <div class="repeater-item d-flex align-items-center">
                                            <input class="form-control image-input" type="text" name="skill[]"
                                                placeholder="skill" />
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

                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="sort_order" class="form-label">Image</label>
                                <div class="upload-img-box">
                                    <img id="updateImageUrl" src="">
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

@push('script')
    <script>
        function addRepeaterItem() {
            const newItem = document.createElement('div');
            newItem.className = 'repeater';
            newItem.innerHTML = `
                        <div class="repeater-item d-flex align-items-center mt-3">
                                                                    <input class="form-control image-input" type="text" name="skill[]" placeholder="feature"/>
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
