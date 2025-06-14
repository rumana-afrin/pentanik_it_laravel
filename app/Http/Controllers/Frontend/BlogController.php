<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // public function blog()
    // {
    //     $data['blogs'] = Blog::paginate(1); // Show 6 blogs per page
    //     $data['meta'] = $data['blogs']->seoMetaTag;

    //     return view('frontend.blog')->with($data);
    // }
}
