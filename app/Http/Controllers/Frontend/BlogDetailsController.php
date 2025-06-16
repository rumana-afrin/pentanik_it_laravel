<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogDetailsController extends Controller
{
    public function blogDetails($slug)
    {

        $data['blog'] = Blog::where('slug', $slug)->firstOrFail();
        $data['blogs'] = Blog::latest()->get();
        $data['meta'] = $data['blog']->seoMetaTag;
        return view('frontend.blog-details')->with($data);
    }
}
