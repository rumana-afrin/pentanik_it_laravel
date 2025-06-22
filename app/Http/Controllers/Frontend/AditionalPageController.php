<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Team;
use Illuminate\Http\Request;

class AditionalPageController extends Controller
{
    public function aditionalPage($slug)
    {
        if ($slug === 'team-member') {
            $data['teams'] = Team::with('skills')->get();
            $data['page'] = Page::where('slug', $slug)->firstOrFail();
            $data['meta'] = $data['page']->seoMetaTag;
            return view('frontend.team')->with($data);
        }
        $data['page'] = Page::where('slug', $slug)->firstOrFail();
        $data['meta'] = $data['page']->seoMetaTag;
        return view('frontend.aditional-page')->with($data);
    }
}
