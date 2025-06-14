<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function aboutUs($slug)
    {
        // $data['aboutUs'] = Page::where('slug', $slug)->firstOrFail();
        // $data['meta'] = $data['aboutUs']->seoMetaTag;

        // if ($slug === 'portfolio') {
        //     $data['portfolioMeta'] = Page::where('slug', $slug)->firstOrFail();
        //     $data['meta'] = $data['portfolioMeta']->seoMetaTag;
        //     $data['portfolio'] = Portfolio::all();
        //     $data['portfolioCategory'] = PortfolioCategory::with('portfolio')->get();
        //     // dd($data['portfolioCategory']);
        //     return view('frontend.portfolio')->with($data);
        // }

        // return view('frontend.about-us')->with($data);
    }
}
