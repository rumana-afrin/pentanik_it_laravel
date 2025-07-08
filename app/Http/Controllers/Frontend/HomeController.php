<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PackageCategory;
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
      $data['packageCategory'] = PackageCategory::with('package.packageFeature')->orderBy('display_order', 'asc')->get();
   //    $data['packageCategory'] = PackageCategory::with('package.packageFeature')
   //  ->where('status', 1)
   //  ->orderBy('display_order', 'asc')
   //  ->get();

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
