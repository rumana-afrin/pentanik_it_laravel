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
      $data['services'] = ServiceCategory::with('features')->orderBy('sort_order', 'asc')->get();
      $services = $data['services'];
      $data['workProcess'] = WorkProcess::all();
      // $data['pages'] = Page::select('slug', 'title')->get();
      $graphData = [];

      foreach ($services as $service) {
         $graphData[] = [
            '@type' => 'Product',
            'name' => $service->name,
            'description' => $service->short_description,
            'url' => url('/')  
         ];
      }

      $data['schema'] = [
         '@graph' => $graphData
      ];
      return view('frontend.home')->with($data);
   }
}
