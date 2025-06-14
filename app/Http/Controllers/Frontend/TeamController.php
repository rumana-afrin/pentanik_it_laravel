<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function team()
    {
        // $data['teams'] = Team::with('skills')->get();
        // return view('frontend.team')->with($data);
    }
}
