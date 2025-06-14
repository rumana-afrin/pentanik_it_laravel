<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\ServiceCategory;
use App\Models\Setting;
use App\Models\WorkProcess;

class HomeController extends Controller
{
   public function home()
   {
      $data['services'] = ServiceCategory::with('features')->get();
      $data['workProcess'] = WorkProcess::all();
      $data['pages'] = Page::select('slug', 'title')->get();
      return view('frontend.home')->with($data);
   }
}
