<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Pages / Register</title>
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
        .show-password {
            font-size: 14px !important;
            font-family: "Inter", sans-serif;
            font-weight: 350;
            font-style: normal;
        }
        .register-col {
            margin-top: 5px;
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

                            <div class="card mb-3 register-card">

                                <div class="card-body">
                                    <div class="pt-2 pb-2">
                                        <h6 class="card-title text-center pb-0 fs-4">Create an Account</h6>
                                        <p class="text-center register-subtitle">Enter your details to create
                                            account</p>
                                    </div>

                                    <form class="row g-3 needs-validation" action="{{ route('register.store') }}"
                                        method="POST" enctype="multipart/form-data" novalidate>
                                        @csrf

                                        <div class="col-12 register-col">
                                            <label for="name" class="form-label register-form-label">Your
                                                Name</label>
                                            <input type="text" name="name" class="form-control" id="name"
                                                required>
                                            <div class="invalid-feedback">Please, enter your name!</div>
                                        </div>


                                        <div class="col-12 register-col">
                                            <label for="email" class="form-label register-form-label">Your
                                                Email</label>
                                            <input type="email" name="email" class="form-control" id="email"
                                                required>
                                            <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                                        </div>


                                        <div class="col-12 register-col">
                                            <label for="password"
                                                class="form-label register-form-label">Password</label>
                                            <input type="password" name="password" class="form-control password"
                                                id="password" required>
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>
                                        <div class="col-12 register-col">
                                            <label for="confirm_password" class="form-label register-form-label">Confirm
                                                Password</label>
                                            <input type="password" name="password_confirmation"
                                                class="form-control password" id="confirm_password" required>
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>

                                        <div>
                                            <input type="checkbox" id="chk"> <span
                                                class="form-label show-password">show
                                                password</span>
                                        </div>

                                        <div class="col-12 register-col">
                                            <div class="form-check">
                                                <input class="form-check-input" name="terms" type="checkbox"
                                                    value="" id="acceptTerms" required>
                                                <label class="form-check-label register-terms" for="acceptTerms">I agree
                                                    and accept the <a href="#">terms and conditions</a></label>
                                                <div class="invalid-feedback">You must agree before submitting.</div>
                                            </div>
                                        </div>

                                        <div class="col-12 register-col">
                                            <button class="btn btn-register w-100" type="submit">Create
                                                Account</button>
                                        </div>
                                        <div class="col-12 register-col">
                                            <p class="small mb-0">Already have an account? <a
                                                    href="{{ route('login') }}">Log in</a></p>
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

    <script>
        "use strict";

        const pwd = document.getElementsByClassName('password'); // This gives you all password inputs
        const chk = document.getElementById('chk');

        chk.onchange = function() {
            for (let i = 0; i < pwd.length; i++) {
                pwd[i].type = chk.checked ? "text" : "password";
            }
        }
    </script>


</body>

</html>
