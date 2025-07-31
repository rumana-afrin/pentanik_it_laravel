<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Faq;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function aboutUs()
    {
           $data['aboutUs'] = Page::where('slug', 'about-us')->firstOrFail();
            $data['meta'] = $data['aboutUs']->seoMetaTag;

            
            // $data['faq'] = Faq::where('category', 'about-us')->get();
            // $mainEntity = [];

            // foreach ($data['faq'] as $faq) {
            //     $mainEntity[] = [
            //         '@type' => 'Question',
            //         'name' => $faq->question,
            //         'acceptedAnswer' => [
            //             '@type' => 'Answer',
            //             'text' => $faq->answer
            //         ]
            //     ];
            // }
            // $data['schema'] = [
            //     '@context' => 'https://schema.org',
            //     '@type' => 'FAQPage',
            //     'mainEntity' => $mainEntity
            // ];

            return view('frontend.about-us')->with($data);
    }
}
