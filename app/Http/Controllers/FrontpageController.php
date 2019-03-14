<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour;

class FrontpageController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$tours = Tour::all();
        return view('frontpage.index', compact('tours'));
    }
}
