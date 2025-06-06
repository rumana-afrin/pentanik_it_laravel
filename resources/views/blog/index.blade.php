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

            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">All Blogs</h5>

                        <!-- Table with stripped rows -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Subtitle</th>
                                    <th scope="col">slug </th>
                                    <th scope="col">Excerpt</th>
                                    {{-- <th scope="col">Content</th> --}}
                                    <th scope="col">Author Name</th>
                                    {{-- <th scope="col">Stutas</th> --}}
                                    <th scope="col">Image</th>
                                    <th scope="col">Order</th>
                                    <th scope="col">Is Featured ?</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($blogs as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->subtitle }}</td>
                                        <td>{{ $item->slug }}</td>
                                        <td>{{ $item->excerpt }}</td>
                                        {{-- <td>{{ $item->content }}</td> --}}
                                        <td>{{ $item->author_name }}</td>
                                        {{-- <td>{{ $item->status }}</td> --}}
                                        <td>
                                            <img src="{{ asset('storage/' . $item->thumbnail_image) }}" alt=""
                                                width="100" height="100">
                                        </td>
                                        <td>{{ $item->sort_order }}</td>
                                        <td>{{ $item->is_featured == 1 ? 'YES' : 'NO'}}

                                        </td>

                                        <td>
                                            <a href="{{ route('admin.edit-blog', $item->id) }}" class="mr-1"
                                                title="Edit">
                                                <img src="{{ asset('assets/backend/edit-2.svg') }}" alt="edit">
                                            </a>
                                            <a href="#" class="ms-2 deleteItem "
                                                data-formid="delete_row_form_{{ $item->id }}">
                                                <img src="{{ asset('assets/backend/trash-2.svg') }}" alt="trash">
                                            </a>
                                            <form action="{{ route('admin.delete-blog', $item->id) }}" method="post"
                                                id="delete_row_form_{{ $item->id }}">
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
