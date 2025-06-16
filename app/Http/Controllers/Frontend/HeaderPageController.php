<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Page;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Models\Team;
use Illuminate\Http\Request;

class HeaderPageController extends Controller
{
    public function pages($slug)
    {

        if ($slug === 'portfolio') {
            $data['portfolioMeta'] = Page::where('slug', $slug)->firstOrFail();
            $data['meta'] = $data['portfolioMeta']->seoMetaTag;
            $data['portfolio'] = Portfolio::all();
            $data['portfolioCategory'] = PortfolioCategory::with('portfolio')->get();
            return view('frontend.portfolio')->with($data);
        } elseif ($slug === 'team-member') {
            $data['teams'] = Team::with('skills')->get();
            $data['page'] = Page::where('slug', $slug)->firstOrFail();
            $data['meta'] = $data['page']->seoMetaTag;
            return view('frontend.team')->with($data);
        } elseif ($slug === 'blog') {
            $data['blogs'] = Blog::paginate(6); 
             $data['page'] = Page::where('slug', $slug)->firstOrFail();
            $data['meta'] = $data['page']->seoMetaTag;
            return view('frontend.blog')->with($data);
        } else {
            $data['aboutUs'] = Page::where('slug', $slug)->firstOrFail();
            $data['meta'] = $data['aboutUs']->seoMetaTag;
            return view('frontend.about-us')->with($data);
        }
    }
}
