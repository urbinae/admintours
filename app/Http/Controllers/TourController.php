<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        $adults = Adults::where('tour_id', $id)->first();
        //dd($adults);
        $children = Children::where('tour_id', $id)->first();
        $infants = Infants::where('tour_id', $id)->first();
        $buggies = Buggies::where('tour_id', $id)->first();
        $horarios = Horarios::where('tour_id', $id)->first();
        return view('tours.show', compact('tour', 'adults', 'children', 'infants', 'buggies', 'horarios'));
    }

    public function store(Request $request){

        $validator = $this->ValidateCreate($request);

        

       Tour::insert([
          'name' => $request->name,
          'duracion' => intval($request->duracion),
          'precio' => intval($request->precio),
          'short_description' => $request->short_description,
          'long_description' => $request->long_description,
          'adults' => intval("1"),
          'children' => intval("1"),
          'infants' => intval("1"),
          'buggies' => intval("1"),
          'status' => intval("1"),
          'important' => intval("1"),
          'buggies' => intval("1"),
          'days' => intval("1"),
          'likes' => intval("1"),
          'fotos' => "asdasd",
          'zona_id' => intval("1"),
          'created_at' => date("Y-m-d"),
          'updated_at' => date("Y-m-d"),
        ]);


    }

    public function ValidateCreate($request)
    {
        $this->validate($request,[
                'name' => 'required',
                'duracion' => 'required',
                'precio' => 'required',
                //'short_description' => 'required',
                //'long_description' => 'required',
            ], 
            [
                'name.required' => "Nombre es obligatorio", 
                'duracion.required' => "Duracion es obligatorio", 
                'precio.required' => "Precio es obligatorio", 
                //'short_description.required' => "Descripción corta es obligatorio", 
                //'long_description.required' => "Descripción larga es obligatorio",
            ]
        );
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
