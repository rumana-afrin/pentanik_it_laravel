<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class AditionalPageController extends Controller
{
    public function aditionalPage($slug)
    {
        if ($slug === 'team-member') {
            return redirect()->route('team');
        }
        $data['page'] = Page::where('slug', $slug)->firstOrFail();
        return view('frontend.aditional-page')->with($data);
    }
}
