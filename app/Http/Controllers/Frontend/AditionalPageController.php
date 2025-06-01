<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AditionalPageController extends Controller
{
    public function aditionalPage()
    {
        return view('frontend.aditional-page');
    }
}
