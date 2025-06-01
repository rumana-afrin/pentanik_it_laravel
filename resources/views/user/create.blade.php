@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active">User</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Multi Columns Form -->
            <form class="row g-3" action="{{route('admin.store-user')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="col-12 col-sm-12 col-md-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="write your name">
                </div>
                <div class="col-12 col-sm-12 col-md-6">
                    <label for="designation" class="form-label">Designation</label>
                    <input type="text" class="form-control" name="designation" id="designation"
                        placeholder="designation">
                </div>
                <div class="col-12 col-sm-12 col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email"
                        placeholder="example@gmail.com">
                </div>
                <div class="col-12 col-sm-12 col-md-6">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="+8801700000000">
                </div>

                {{-- <div class="col-12 col-sm-12 col-md-6">
                    <label for="phone" class="form-label">Status</label>
                    <select class="form-select" name="status" aria-label="Default select example">
                        <option selected>selete status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>

                    </select>
                </div> --}}
                <div class="col-12 col-sm-12 col-md-6">
                    <label for="password" class="form-label">password</label>
                    <input type="text" class="form-control" name="password" id="password" placeholder="password">
                </div>

                <div class="col-12 col-sm-12 col-md-6">
                    <label for="phone" class="form-label">Role</label>
                    <select class="form-select" name="status" aria-label="Default select example">
                        <option selected>selete status</option>                        
                        <option value="super admin">super admin</option>                        
                        <option value="admin">admin</option>                        
                        <option value="manager">manager</option>                        
                        <option value="sales man">sales man</option>                        
                        <option value="user">user</option>                        
                    </select>
                </div>

               

                <div class="col-6 col-sm-6 col-md-4 col-lg-2">
                    <label for="phone" class="form-label">Image</label>
                    <div class="upload-img-box mb-25">
                        <img src="{{ getDefaultImage() }}">
                        <input type="file" name="image" id="image" accept="image/*" onchange="previewFile(this)"
                            required>
                        <div class="upload-img-box-icon">
                            <i class="fa-solid fa-camera"></i>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-5">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form><!-- End Multi Columns Form -->

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
