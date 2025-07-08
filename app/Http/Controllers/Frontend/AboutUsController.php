<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function aboutUs()
    {
           $data['aboutUs'] = Page::where('slug', 'about-us')->firstOrFail();
            $data['meta'] = $data['aboutUs']->seoMetaTag;
            return view('frontend.about-us')->with($data);
    }
}
