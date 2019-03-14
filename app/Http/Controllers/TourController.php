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
use App\Zona;

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
        $zonas = Zona::all();
        return view('tours.create', compact("zonas"));
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

        $days = explode(',', $tour->days);
        $days_string = '';
        foreach ($days as $day) {
            if ($day == 0) $d = 'Domingo';
            if ($day == 1) $d = 'Lunes';
            if ($day == 2) $d = 'Martes';
            if ($day == 3) $d = 'Miercoles';
            if ($day == 4) $d = 'Jueves';
            if ($day == 5) $d = 'Viernes';
            if ($day == 6) $d = 'Sabado';

            $days_string = $days_string.$d.', ';
        }
        $adults = Adults::where('tour_id', $id)->first();
        if ($adults == null) $adults = new Adults();

        $children = Children::where('tour_id', $id)->first();
        if ($children == null) $children = new Children();
        
        $infants = Infants::where('tour_id', $id)->first();
        if ($infants == null) $infants = new Infants();

        $buggies = Buggies::where('tour_id', $id)->first();
        if ($buggies == null) $buggies = new Buggies();

        $horarios = Horarios::where('tour_id', $id)->first();
        if ($horarios == null) $horarios = new Horarios();

        return view('tours.show', compact('tour', 'adults', 'children', 'infants', 'buggies', 'horarios', 'days_string'));
    }

    public function store(Request $request){
        $data = array();
        $validator = $this->ValidateCreate($request);

        if($request->hasfile('fotos'))
         {

            foreach($request->file('fotos') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/'.$request->name.'/', $name);  
                $data[] = $name;  
            }
         }



            foreach($request->days_array as $day)
            {
                
                $days[] = $day;  
            }
        

          Tour::insert([
            'name' => $request->name,
            'duracion' => intval($request->duracion),
            'precio' => intval($request->precio),
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'adults' => intval($request->adults),
            'children' => intval($request->children),
            'infants' => intval($request->infants),
            'buggies' => intval($request->buggies),
            'status' => intval($request->status),
            'important' => intval($request->important),
            'days' => $this->array_to_str($days),
            'likes' => intval("1"),
            'fotos' => $this->array_to_str($data),
            'zona_id' => intval($request->zona_id),
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
                'short_description' => 'required',
                'long_description' => 'required',
                'days_array' => 'required',
                'fotos' => 'required',
                'zona_id' => 'required',
            ], 
            [
                'name.required' => "Nombre es obligatorio", 
                'duracion.required' => "Duracion es obligatorio", 
                'precio.required' => "Precio es obligatorio", 
                'short_description.required' => "Descripción corta es obligatorio", 
                'long_description.required' => "Descripción larga es obligatorio",
                'days_array.required' => "Campo dias es obligatorio",
                'fotos.required' => "Fotos son obligatorias",
                'zona_id.required' => "Zona es obligatoria",
            ]
        );
    }


    //Adultos, niños, infantes , buggies y horarios
    public function add_adults(Request $request)
    {
        $adult = new Adults();

        $adult->tour_id = $request->input('tourid');
        $adult->max = $request->input('max');
        $adult->min = $request->input('min');
        $adult->price = $request->input('price');

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

    public function array_to_str($arrays){
      $paramarrays = '';
      $larrays = count($arrays);
      $i = 1;
      foreach ($arrays as $array) {
        $paramarrays .= $array;
        if($i < $larrays){
          $paramarrays .= ',';
        }
        $i++;
      }
      return $paramarrays;
    }
}
