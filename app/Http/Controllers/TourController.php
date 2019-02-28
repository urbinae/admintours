<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour;
use App\Adults;
use App\Children;
use App\Infants;
use App\Buggies;
use App\Horarios;

class TourController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tours = Tour::paginate();
        return view('tours.index', compact('tours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tours.create');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $tour = Tour::find($id);
        $adults = Adults::all();
        $children = Children::all();
        $infants = Infants::all();
        $buggies = Buggies::all();
        $horarios = Horarios::all();
        return view('tours.show', compact('tour', 'adults', 'children', 'infants', 'buggies', 'horarios'));
    }

    //Adultos, niños, infantes , buggies y horarios
    public function add_adults(Request $request)
    {
        //$adults = new Adults();

        /*$adults->tour_id = $request->input('tour_id');
        $adults->max = $request->input('max');
        $adults->min = $request->input('min');
        $adults->price = $request->input('price');*/
        $data = $request->all();
        $adult = Adults::create($data);
        
        return redirect()->route('tours.show');
    }

    public function add_children(Request $request)
    {
        $data = $request->all();
        $children = Children::create($data);
        
        return redirect()->route('tours.show');
    }

    public function add_infants(Request $request)
    {
        $data = $request->all();
        $infants = Infants::create($data);
        
        return redirect()->route('tours.show');
    }

    public function add_buggies(Request $request)
    {
        $data = $request->all();
        $buggies = Buggies::create($data);
        
        return redirect()->route('tours.show');
    }

    public function add_horarios(Request $request)
    {
        $data = $request->all();
        $horarios = Horarios::create($data);
        
        return redirect()->route('tours.show');
    }

}
