<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour;
use App\Zona;

class FrontpageController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $zonas = Zona::all();
    	$tours = Tour::all();
        return view('frontpage.index', compact('tours', 'zonas'));
    }

    public function tures_front($id){
        if($id == "all"){
            error_log("entro en if");
            $tours = Tour::all();
        }else{
            error_log("entro en else");
            $tours = Tour::where('zona_id', $id)->get();
        }
        return view('frontpage.tures_front', compact('tours'));
    }
}
