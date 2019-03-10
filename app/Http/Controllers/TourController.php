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
        $adults = Adults::where('tour_id', $id)->first();
        //dd($adults);
        $children = Children::where('tour_id', $id)->first();
        $infants = Infants::where('tour_id', $id)->first();
        $buggies = Buggies::where('tour_id', $id)->first();
        $horarios = Horarios::where('tour_id', $id)->first();
        return view('tours.show', compact('tour', 'adults', 'children', 'infants', 'buggies', 'horarios'));
    }

    public function store(Request $request){
        $data = array();
        $validator = $this->ValidateCreate($request);

        if($request->hasfile('fotos'))
         {

            foreach($request->file('fotos') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);  
                $data[] = $name;  
            }
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
            'days' => intval($request->days),
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
                'days' => 'required',
                'fotos' => 'required',
                'zona_id' => 'required',
            ], 
            [
                'name.required' => "Nombre es obligatorio", 
                'duracion.required' => "Duracion es obligatorio", 
                'precio.required' => "Precio es obligatorio", 
                'short_description.required' => "Descripción corta es obligatorio", 
                'long_description.required' => "Descripción larga es obligatorio",
                'days.required' => "Campo dias es obligatorio",
                'fotos.required' => "Fotos son obligatorias",
                'zona_id.required' => "Zona es obligatoria",
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
