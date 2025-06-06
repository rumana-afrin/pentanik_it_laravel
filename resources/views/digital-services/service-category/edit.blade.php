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
                        <form class="row g-3" action="{{ route('admin.update-service-category', $serviceCategory->id) }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="write your name" value="{{ $serviceCategory->name }}">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control" name="slug" id="slug" placeholder="slug"
                                    value="{{ $serviceCategory->slug }}">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="sort_order" class="form-label">Order</label>
                                <input type="text" class="form-control" name="sort_order" id="sort_order"
                                    placeholder="sort_order" value="{{ $serviceCategory->sort_order }}">
                            </div>



                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" name="status" id="status"
                                    aria-label="Default select example">
                                    <option selected>selete status</option>
                                    <option value="featured" {{ $serviceCategory->status == 'featured' ? 'selected' : '' }}>
                                        Featured</option>
                                    <option value="regular" {{ $serviceCategory->status == 'regular' ? 'selected' : '' }}>
                                        Regular</option>

                                </select>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="is_active" class="form-label">Is Active?</label>
                                <select class="form-select" name="is_active" id="is_active"
                                    aria-label="Default select example">
                                    <option selected>selete status</option>
                                    <option value="1" {{ $serviceCategory->is_active == 1 ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="0" {{ $serviceCategory->is_active == 0 ? 'selected' : '' }}>Inactive
                                    </option>
                                </select>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6">
                                <label for="short_description" class="form-label">Short Description</label>
                                <textarea name="short_description" class="form-control" id="short_description" placeholder="description" cols="30"
                                    rows="3">{{ $serviceCategory->name }}</textarea>

                            </div>

                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="repeater-container">
                                    <label for="slug" class="form-label">Feature</label>
                                    @if (count($serviceCategory->features) > 0)
                                        @foreach ($serviceCategory->features as $item)
                                            <div class="repeater" id="repeater">
                                                <div class="repeater-item d-flex align-items-center mt-3">
                                                    <input class="form-control image-input" type="text" name="feature[]"
                                                        placeholder="feature" value="{{ $item->name }}"/>
                                                    <button type="button" class="remove-btn btn btn-primary ms-4"
                                                        onclick="removeItem(event, this)">
                                                        <a href="" class="mr-1" title="Edit">
                                                            <img src="{{ asset('assets/backend/image/minus.png') }}"
                                                                alt="">
                                                        </a>
                                                    </button>
                                                </div>

                                            </div>
                                        @endforeach
                                        {{-- @endif --}}
                                    @else
                                        <div class="repeater" id="repeater">
                                            <div class="repeater-item d-flex align-items-center">
                                                <input class="form-control image-input" type="text" name="feature[]"
                                                    placeholder="feature" />
                                                <button type="button" class="remove-btn btn btn-primary ms-4"
                                                    onclick="removeItem(event, this)">
                                                    <a href="" class="mr-1" title="Edit">
                                                        <img src="{{ asset('assets/backend/image/minus.png') }}"
                                                            alt="">
                                                    </a>
                                                </button>
                                            </div>

                                        </div>
                                    @endif

                                    <button type="button" class="add-btn btn btn-primary mt-4"
                                        onclick="addRepeaterItem(event)">Add Feature</button>
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
    </style>
@endpush

@push('script')
    <script>
        function addRepeaterItem() {
            const newItem = document.createElement('div');
            newItem.className = 'repeater';
            newItem.innerHTML = `
                        <div class="repeater-item d-flex align-items-center mt-3">
                                                                    <input class="form-control image-input" type="text" name="feature[]" placeholder="feature"/>
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
