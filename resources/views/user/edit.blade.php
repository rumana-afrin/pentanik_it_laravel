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
            <form class="row g-3" action="{{ route('admin.user-update', $user->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="col-12 col-sm-12 col-md-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="write your name"
                        value="{{ $user->name }}">
                </div>
                <div class="col-12 col-sm-12 col-md-6">
                    <label for="designation" class="form-label">Designation</label>
                    <input type="text" class="form-control" name="designation" id="designation" placeholder="designation"
                        value="{{ $user->designation }}">
                </div>
                <div class="col-12 col-sm-12 col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="designation" placeholder="example@gmail.com"
                        value="{{ $user->email }}">
                </div>
                <div class="col-12 col-sm-12 col-md-6">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="+8801700000000"
                        value="{{ $user->phone }}">
                </div>

                <div class="col-12 col-sm-12 col-md-6">
                    @php
                        use App\Helpers\CoreConstant;
                    @endphp
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" name="status" id="status" aria-label="Default select example">
                        <option selected>selete status</option>
                        <option value="1" {{ $user->status == CoreConstant::ACTIVE ? 'selected' : '' }}>Active</option>
                        <option value="2" {{ $user->status == CoreConstant::INACTIVE ? 'selected' : '' }}>Inactive</option>
                        
                    </select>
                </div>
                <div class="col-12 col-sm-12 col-md-6">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-select" name="role" id="role" aria-label="Default select example">
                        <option selected>selete status</option>                        
                        <option value="super admin" {{$user->role == 'super admin' ? 'selected' : '' }}>super admin</option>                        
                        <option value="admin" {{$user->role == 'admin' ? 'selected' : '' }}>admin</option>                        
                        <option value="manager" {{$user->role == 'manager' ? 'selected' : '' }}>manager</option>                        
                        <option value="sales man" {{$user->role == 'sales man' ? 'selected' : '' }}>sales man</option>                        
                        <option value="user" {{$user->role == 'user' ? 'selected' : '' }}>user</option>                        
                    </select>
                </div>

                <div class="col-6 col-sm-6 col-md-4 col-lg-2">
                    <label for="phone" class="form-label">Image</label>
                    <div class="upload-img-box mb-25">
                        <img src="{{ $user->image ? asset('storage/' . $user->image) : getDefaultImage() }}">
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
