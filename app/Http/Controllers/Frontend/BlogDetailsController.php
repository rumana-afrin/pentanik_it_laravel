<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogDetailsController extends Controller
{
    public function blogDetails($category_slug, $blog_slug)
    {
// dd($blog_slug);
        $data['blog'] = Blog::where('slug', $blog_slug)->firstOrFail();
        // dd($data['blog']);
        $data['blogs'] = Blog::with('blogCategory')->latest()->get();
        $data['meta'] = $data['blog']->seoMetaTag;
        // dd($data['blog']);
        return view('frontend.blog-details')->with($data);
    }

    // public function blogDetails($category_slug, $blog_slug)
    // {
    //     // Example logic to find the blog post with both slugs
    //     $data['category'] = BlogCategory::where('slug', $category_slug)->firstOrFail();

    //     $data['blogs'] = Blog::where('slug', $blog_slug)
    //         ->where('blog_category_id', $data['category']->id)
    //         ->firstOrFail();

    //     return view('frontend.blog-details')->with($data);
    // }
}
