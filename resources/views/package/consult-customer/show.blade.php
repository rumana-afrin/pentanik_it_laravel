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
                    <div class="card-body text-center p-5">
                        <h5 class="card-title fs-2">Consult Details</h5>
                       
                        <div class="customer-details py-5">

                            <div class="row g-2" id="printableArea">
                                <div class="col-md-6 mt-4">
                                    <div class="customer-info">
                                        <h4 class="fw-bolder text-decoration-underline">Customer Info</h4>
                                    </div>
                                    <div class="text-start pe-5 mt-4">
                                        <p><span class="fw-bolder">Customer Name:</span> {{ $consult->full_name }}</p>
                                        <p><span class="fw-bolder">Customer Email:</span> {{ $consult->email }}</p>
                                        <p><span class="fw-bolder">Customer Phone:</span> {{ $consult->phone }}</p>
                                        <p><span class="fw-bolder">Customer Address:</span> {{ $consult->address }}</p>
                                        <div>
                                            <span class="fw-bolder">Customer Message:</span>
                                            <p> {{ $consult->message }}</p>
                                        </div>

                                        <p><span class="fw-bolder">Customer Agreement :</span>
                                            {{ $consult->consent === 1 ? 'Agreed to the privacy policy and terms of contact.' : 'Did not agree' }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <div class="customer-info">
                                        <h4 class="fw-bolder text-decoration-underline">Package Details</h4>
                                    </div>
                                    <div class="text-start mt-4">
                                        <p><span class="fw-bolder">Package Category:</span>
                                            {{ $package->packageCategory->title }}</p>
                                        <p><span class="fw-bolder">Package Name:</span>
                                            {{ ucfirst($package->package_name) }} Star
                                            package</p>
                                        <p><span class="fw-bolder">Package Price:</span>{{ $package->currency }}
                                            {{ number_format($package->price, 2) }}/{{ $package->billing_period }}</p>

                                        <div class="pac-item"><span class="fw-bolder">Package Feature:</span>
                                            @foreach ($package->packageFeature as $feature)
                                                <p class="ps-5">{{ $feature->feature_text }}</p>
                                            @endforeach
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="me-5">
                            <button onclick="printOrder()" class="btn btn-primary">Print</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script>
        function printOrder() {
            var printContent = document.getElementById("printableArea").innerHTML;
            var originalContent = document.body.innerHTML;

            document.body.innerHTML = printContent;
            window.print();
            document.body.innerHTML = originalContent;
            location.reload(); 
        }
    </script>
@endpush
