@extends('frontend.layouts.web')
@section('content')
    <section class="about-section mt-4 consult-section">
        <div class="about-bottom-content d-flex justify-content-center align-items-center mb-4 consult">
            <div class="bottom-content p-4 text-center mx-auto vh-75 consult-contnet">
                <h1 class="text-success">Thank You!</h1>
                <p>Your request has been received. Our expert will contact you shortly.</p>

                <h4 class="mt-4">Your Details</h4>
                <div class="d-flex justify-content-center">
                    <ul class="list-unstyled text-start mt-2 customer-details">
                        <li><strong>Name:</strong> {{ $consult->full_name }}</li>
                        <li><strong>Email:</strong> {{ $consult->email }}</li>
                        <li><strong>Phone:</strong> {{ $consult->phone }}</li>
                        <li><strong>Address:</strong> {{ $consult->address }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('style')
    <style>
        .consult-contnet {
            width: 50%;
        }
        .customer-details {
                width: 50%;
        }
        .consult-section{
            height: 75vh;
        }
        .consult{
            height: 70vh;

        }

        @media only screen and (max-width: 1100px) {
            .consult-contnet {
                width: 80%;
            }
        }

        @media only screen and (max-width: 700px) {
            .consult-contnet {
                width: 90%;
            }
        }

        @media only screen and (max-width: 633px) {
            .customer-details {
                width: 88%;
                font-size: 16px;
            }
        }
    </style>
@endpush
