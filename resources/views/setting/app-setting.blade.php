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
            <div class="col-md-8 stretch-card">
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('admin.update-setting') }}" class="forms-sample" method="post"
                            enctype="multipart/form-data">
                            @csrf

                            {{-- home page --}}
                            <h6 class="card-title text-decoration-underline fs-4 mt-4">Home Page</h6>
                            <div class="row mb-3">
                                <label for="home_title" class="col-sm-3 col-form-label">Title</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="home_title" name="home_title"
                                        placeholder="Title" value="{{ getOption('home_title') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="home_subtitle" class="col-sm-3 col-form-label">Subtitle</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="home_subtitle" name="home_subtitle"
                                        placeholder="subtitle" value="{{ getOption('home_subtitle') }}">
                                </div>
                            </div>

                            <div class="row mb-3">

                                <label for="home_banner" class="col-sm-3 col-form-label">Banner</label>
                                <div class="col-sm-8">
                                    <div class="upload-img-box">
                                        <img id="updateImageUrl" src="{{ getimage(getOption('home_banner')) }}">
                                        <input class="form-control" type="file" name="home_banner" id="home_banner"
                                            accept="image/*" onchange="previewFile(this)">
                                        <div class="upload-img-box-icon">
                                            <i class="bi bi-camera-fill"></i>
                                            <p class="m-0"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- home page --}}

                            {{-- contact page --}}
                            <h6 class="card-title text-decoration-underline fs-4 mt-4">Contact Section</h6>
                            <div class="row mb-3">
                                <label for="contact_summary" class="col-sm-3 col-form-label">Contact Details</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" id="contact_summary" name="contact_summary"
                                        placeholder="write short details about contact" cols="30" rows="3">{{ getOption('contact_summary') }}</textarea>


                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="contact_phone" class="col-sm-3 col-form-label">Phone</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="contact_phone" name="contact_phone"
                                        placeholder="phone" value="{{ getOption('contact_phone') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="social_link_fb" class="col-sm-3 col-form-label">Facebook</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="social_link_fb" name="social_link_fb"
                                        placeholder="facebook link" value="{{ getOption('social_link_fb') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="social_link_gmail" class="col-sm-3 col-form-label">Gmail</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="social_link_gmail"
                                        name="social_link_gmail" placeholder="gmail"
                                        value="{{ getOption('social_link_gmail') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="social_link_linkedin" class="col-sm-3 col-form-label">Linkedin</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="social_link_linkedin"
                                        name="social_link_linkedin" placeholder="linkedin link"
                                        value="{{ getOption('social_link_linkedin') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="whatsapp_number" class="col-sm-3 col-form-label">Whatsapp</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="whatsapp_number"
                                        name="whatsapp_number" placeholder="whatsapp"
                                        value="{{ getOption('whatsapp_number') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="social_link_youtube" class="col-sm-3 col-form-label">Youtube</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="social_link_youtube"
                                        name="social_link_youtube" placeholder="youtube link"
                                        value="{{ getOption('social_link_youtube') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="contact_banner" class="col-sm-3 col-form-label">Contact Banner</label>
                                <div class="col-sm-8">
                                    <div class="upload-img-box">
                                        <img id="updateImageUrl" src="{{ getimage(getOption('contact_banner')) }}">
                                        <input class="form-control" type="file" name="contact_banner"
                                            id="contact_banner" accept="image/*" onchange="previewFile(this)">
                                        <div class="upload-img-box-icon">
                                            <i class="bi bi-camera-fill"></i>
                                            <p class="m-0"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- home page --}}

                            {{-- general setting --}}
                            <h6 class="card-title text-decoration-underline fs-4 mt-4">General Setting</h6>
                            <div class="row mb-3">
                                <label for="app_title" class="col-sm-3 col-form-label">App Title</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="app_title" name="app_title"
                                        placeholder="app titile" value="{{ getOption('app_title') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="footer_logo" class="col-sm-3 col-form-label">Footer Logo</label>
                                <div class="col-sm-8">
                                    <div class="upload-img-box">
                                        <img id="updateImageUrl" src="{{ getimage(getOption('footer_logo')) }}">
                                        <input class="form-control" type="file" name="footer_logo" id="footer_logo"
                                            accept="image/*" onchange="previewFile(this)">
                                        <div class="upload-img-box-icon">
                                            <i class="bi bi-camera-fill"></i>
                                            <p class="m-0"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="header_logo" class="col-sm-3 col-form-label">Header Logo</label>
                                <div class="col-sm-8">
                                    <div class="upload-img-box">
                                        <img id="updateImageUrl" src="{{ getimage(getOption('header_logo')) }}">
                                        <input class="form-control" type="file" name="header_logo" id="header_logo"
                                            accept="image/*" onchange="previewFile(this)">
                                        <div class="upload-img-box-icon">
                                            <i class="bi bi-camera-fill"></i>
                                            <p class="m-0"></p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row mb-3">
                                <label for="app_gmail" class="col-sm-3 col-form-label">App Email</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="app_gmail" name="app_gmail"
                                        placeholder="email" value="{{ getOption('app_gmail') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="app_address" class="col-sm-3 col-form-label">App Address</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="app_address" name="app_address"
                                        placeholder="address" value="{{ getOption('app_address') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="app_phone" class="col-sm-3 col-form-label">App Phone</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="app_phone" name="app_phone"
                                        placeholder="phone" value="{{ getOption('app_phone') }}">
                                </div>
                            </div>
                            {{-- home page --}}

                            {{-- team page --}}
                            <h6 class="card-title text-decoration-underline fs-4 mt-4">Team Page</h6>

                            <div class="row mb-3">
                                <label for="team_banner_large" class="col-sm-3 col-form-label">Banner (desktop)</label>
                                <div class="col-sm-8">
                                    <div class="upload-img-box">
                                        <img id="updateImageUrl" src="{{ getimage(getOption('team_banner_large')) }}">
                                        <input class="form-control" type="file" name="team_banner_large"
                                            id="team_banner_large" accept="image/*" onchange="previewFile(this)">
                                        <div class="upload-img-box-icon">
                                            <i class="bi bi-camera-fill"></i>
                                            <p class="m-0"></p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row mb-3">
                                <label for="team_banner_small" class="col-sm-3 col-form-label">Banner (mobile)</label>
                                <div class="col-sm-8">
                                    <div class="upload-img-box">
                                        <img id="updateImageUrl" src="{{ getimage(getOption('team_banner_small')) }}">
                                        <input class="form-control" type="file" name="team_banner_small"
                                            id="team_banner_small" accept="image/*" onchange="previewFile(this)">
                                        <div class="upload-img-box-icon">
                                            <i class="bi bi-camera-fill"></i>
                                            <p class="m-0"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- team page --}}

                            {{-- ceo info --}}
                            <h6 class="card-title text-decoration-underline fs-4 mt-4">CEO Info</h6>

                            <div class="row mb-3">
                                <label for="ceo_name" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="ceo_name" name="ceo_name"
                                        placeholder="name" value="{{ getOption('ceo_name') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="ceo_title" class="col-sm-3 col-form-label">Title</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="ceo_title" name="ceo_title"
                                        placeholder="Title" value="{{ getOption('ceo_title') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="short_summary" class="col-sm-3 col-form-label">Short Summary</label>
                                <div class="col-sm-8">

                                    <textarea class="form-control" id="short_summary" name="short_summary" placeholder="write short details about CEO"
                                        cols="30" rows="3">{{ getOption('short_summary') }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="ceo_image" class="col-sm-3 col-form-label">Image</label>
                                <div class="col-sm-8">
                                    <div class="upload-img-box">
                                        <img id="updateImageUrl" src="{{ getimage(getOption('ceo_image')) }}">
                                        <input class="form-control" type="file" name="ceo_image" id="ceo_image"
                                            accept="image/*" onchange="previewFile(this)">
                                        <div class="upload-img-box-icon">
                                            <i class="bi bi-camera-fill"></i>
                                            <p class="m-0"></p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{-- team page --}}

                            {{-- seo meta info --}}
                            <h6 class="card-title text-decoration-underline fs-4 mt-4">SEO Meta Info</h6>

                            <div class="row mb-3">
                                <label for="home_meta_title" class="col-sm-3 col-form-label">Meta Title</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="home_meta_title"
                                        name="home_meta_title" placeholder="meta title"
                                        value="{{ getOption('home_meta_title') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="home_meta_description" class="col-sm-3 col-form-label">Meta
                                    Description</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="home_meta_description"
                                        name="home_meta_description" placeholder="meta description"
                                        value="{{ getOption('home_meta_description') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="home_meta_keywords" class="col-sm-3 col-form-label">Meta Keywords</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="home_meta_keywords"
                                        name="home_meta_keywords" placeholder="meta keywords"
                                        value="{{ getOption('home_meta_keywords') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="home_meta_auther" class="col-sm-3 col-form-label">Site Auther</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="home_meta_auther"
                                        name="home_meta_auther" placeholder="meta auther"
                                        value="{{ getOption('home_meta_auther') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="home_meta_business_name" class="col-sm-3 col-form-label">Business Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="home_meta_business_name"
                                        name="home_meta_business_name" placeholder="meta business_name"
                                        value="{{ getOption('home_meta_business_name') }}">
                                </div>
                            </div>
                          
                            <div class="row mb-3">
                                <label for="home_canonical_url" class="col-sm-3 col-form-label">Canonical Url</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="home_canonical_url"
                                        name="home_canonical_url" placeholder="meta canonical url"
                                        value="{{ getOption('home_canonical_url') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="home_og_title" class="col-sm-3 col-form-label">Open Graph Title</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="home_og_title" name="home_og_title"
                                        placeholder="open graph title" value="{{ getOption('home_og_title') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="home_og_description" class="col-sm-3 col-form-label">Open Graph
                                    Description</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" id="home_og_description" name="home_og_description"
                                        placeholder="open graph description" cols="30" rows="3">{{ getOption('home_og_description') }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="home_og_image" class="col-sm-3 col-form-label">Open Graph Image</label>
                                <div class="col-sm-8">
                                    <div class="upload-img-box">
                                        <img id="updateImageUrl" src="{{ getimage(getOption('home_og_image')) }}">
                                        <input class="form-control" type="file" name="home_og_image"
                                            id="home_og_image" accept="image/*" onchange="previewFile(this)">
                                        <div class="upload-img-box-icon">
                                            <i class="bi bi-camera-fill"></i>
                                            <p class="m-0"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="home_og_type" class="col-sm-3 col-form-label">Open Graph Type</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="home_og_type" name="home_og_type"
                                        placeholder="open graph type" value="{{ getOption('home_og_type') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="home_og_url" class="col-sm-3 col-form-label">Open Graph URl</label>
                                <div class="col-sm-8">
                                    <input type="url" class="form-control" id="home_og_url" name="home_og_url"
                                        placeholder="open graph url" value="{{ getOption('home_og_url') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="home_og_site_name" class="col-sm-3 col-form-label">Open Graph Site
                                    Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="home_og_site_name"
                                        name="home_og_site_name" placeholder="open graph site_name"
                                        value="{{ getOption('home_og_site_name') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="home_twitter_card" class="col-sm-3 col-form-label">Twitter Card Type</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="home_twitter_card"
                                        name="home_twitter_card" placeholder="twitter card"
                                        value="{{ getOption('home_twitter_card') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="home_twitter_title" class="col-sm-3 col-form-label">Twitter Title</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="home_twitter_title"
                                        name="home_twitter_title" placeholder="twitter title"
                                        value="{{ getOption('home_twitter_title') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="home_twitter_description" class="col-sm-3 col-form-label">Twitter
                                    Description</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" id="home_twitter_description" name="home_twitter_description"
                                        placeholder="twitter description" cols="30" rows="3">{{ getOption('home_twitter_description') }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="site" class="col-sm-3 col-form-label">Twitter Site name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="home_twitter_site"
                                        name="home_twitter_site" placeholder="@/yourtwitterhandle"
                                        value="{{ getOption('home_twitter_site') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="home_twitter_image" class="col-sm-3 col-form-label">Twitter Image</label>
                                <div class="col-sm-8">
                                    <div class="upload-img-box">
                                        <img id="updateImageUrl" src="{{ getimage(getOption('home_twitter_image')) }}">
                                        <input class="form-control" type="file" name="home_twitter_image"
                                            id="home_twitter_image" accept="image/*" onchange="previewFile(this)">
                                        <div class="upload-img-box-icon">
                                            <i class="bi bi-camera-fill"></i>
                                            <p class="m-0"></p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{-- seo meta info --}}




                            <button type="submit" class="btn btn-primary mt-4">Submit</button>
                            <button type="button" class="btn btn-secondary mt-4">Cancel</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
@push('style')
    <style>
        .upload-img-box {
            height: 200px;
            width: 200px;
        }
    </style>
@endpush
