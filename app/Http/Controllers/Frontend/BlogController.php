<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{


    public function blogCategory($slug)
    {
        $data['blogs'] = BlogCategory::all();
        $data['category'] = BlogCategory::where('slug', $slug)->firstOrFail();
        $data['allBlogs'] = Blog::where('blog_category_id', $data['category']->id)->with('blogCategory')->paginate(5);
        return view('frontend.blog')->with($data);
    }
}
