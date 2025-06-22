<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advisory;
use App\Models\Page;
use App\Models\Blog;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Models\Team;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function handle($slug)
    {
        // Check if the slug is for a static "header" page
        $headerPages = ['about-us', 'portfolio', 'team-member', 'blog'];
        if (in_array($slug, $headerPages)) {
            return $this->headerPage($slug);
        }

        // Otherwise, treat it as an additional page
        return $this->additionalPage($slug);
    }

    private function headerPage($slug)
    {
        // Logic for header pages
        if ($slug === 'portfolio') {
            $data['portfolioMeta'] = Page::where('slug', $slug)->firstOrFail();
            $data['meta'] = $data['portfolioMeta']->seoMetaTag;
            $data['portfolio'] = Portfolio::all();
            $data['portfolioCategory'] = PortfolioCategory::with('portfolio')->get();
            return view('frontend.portfolio')->with($data);
        } elseif ($slug === 'team-member') {
            $data['teams'] = Team::with('skills')->orderBy('sort_order', 'asc')->get();
            $data['advisory'] = Advisory::with('advisorySkills')->orderBy('sort_order', 'asc')->get();
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

    private function additionalPage($slug)
    {
        if ($slug === 'team-member') {
            $data['teams'] = Team::with('skills')->orderBy('sort_order', 'asc')->get();
            $data['advisory'] = Advisory::with('advisorySkills')->orderBy('sort_order', 'asc')->get();
            $data['page'] = Page::where('slug', $slug)->firstOrFail();
            $data['meta'] = $data['page']->seoMetaTag;
            return view('frontend.team')->with($data);
        }
        $data['page'] = Page::where('slug', $slug)->firstOrFail();
        $data['meta'] = $data['page']->seoMetaTag;
        return view('frontend.aditional-page')->with($data);
    }
}
