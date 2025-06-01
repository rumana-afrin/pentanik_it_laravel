<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Pages / Login - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    @include('layouts.style')

    <style>
        .register-card {
            border: 1px solid #e6e6eb !important;
        }

        .register-subtitle,
        .register-form-label,
        .register-terms,
        .alert {
            font-size: 14px !important;
        }

        .register-form-label {
            margin-bottom: 2px !important;
        }

        .register-terms {
            font-size: 13.5px !important;
        }

        .btn-register {
            background-color: #2E3192;
            color: white;
        }

        .btn-register:hover {
            border: 1px solid #e6e6eb;
            background-color: #191b68;
            color: white;
        }
    </style>
</head>

<body>

    <main>


        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">


                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="{{ asset('assets/frontend/Pentanik IT Logo.png') }}" alt="">
                                    <span class="d-none d-lg-block"><img src="{{ asset('assets/logo.png') }}"
                                            alt="">
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                        <p class="text-center register-subtitle">Enter your email & password to login
                                        </p>
                                    </div>
                                  
                                 
                                    <form class="row g-3 needs-validation" action="{{ route('login.store') }}"
                                        method="POST" novalidate>
                                        @csrf
                                        @method('POST')


                                        <div class="col-12">
                                            <label for="email" class="form-label register-form-label">Email</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                <input type="text" name="email" class="form-control" id="email"
                                                    required>
                                                <div class="invalid-feedback">Please enter your username.</div>
                                            </div>
                                        </div>



                                        <div class="col-12">
                                            <label for="yourPassword"
                                                class="form-label register-form-label">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                id="yourPassword" required>
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    value="true" id="rememberMe">
                                                <label class="form-check-label register-terms" for="rememberMe">Remember
                                                    me</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-register w-100" type="submit">Login</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Don't have account? <a
                                                    href="{{ url('/') }}">Create an account</a></p>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

            @include('layouts.script')

</body>

</html>
