@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active">All User</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            
            <div class="col-lg-12">

                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">All Users</h5>
      
                    <!-- Table with stripped rows -->
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Phone</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach ($users as $user)
                        <tr>
                          <th scope="row">{{$loop->iteration}}</th>
                          <td>{{$user->name}}</td>
                          <td>{{$user->email}}</td>
                          <td>{{$user->phone}}</td>
                          <td>
                            <a href="{{route('admin.user-edit', $user->id)}}" class="mr-1"
                              title="Edit">
                               <img src="{{ asset('assets/backend/edit-2.svg') }}" alt="edit">
                          </a>
                          <a href="#" class="ms-2 deleteItem "
                              data-formid="delete_row_form_{{ $user->id }}">
                             <img src="{{ asset('assets/backend/trash-2.svg') }}" alt="trash">
                          </a>
                          <form action="{{route('admin.user-destroy', $user->id)}}" method="post"
                              id="delete_row_form_{{ $user->id }}">
                              {{ method_field('DELETE') }}
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          </form>

                          </td>
                        </tr>
                        @endforeach

                      </tbody>
                    </table>
                    <!-- End Table with stripped rows -->
      
                  </div>
                </div>
      
              
              </div>
        </div>
    </section>
@endsection
@push('style')
    <style>
       

    </style>
@endpush
