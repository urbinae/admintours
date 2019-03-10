<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Zona;

class ZonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zonas = Zona::all();
        return view('zona.index', compact('zonas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('zona.create');
    }


    public function store(Request $request){
        $validator = $this->ValidateCreate($request);

          Zona::insert([
            'name' => $request->name,
            'created_at' => date("Y-m-d"),
            'updated_at' => date("Y-m-d"),
          ]);
          
    }

    public function ValidateCreate($request)
    {
        $this->validate($request,[
                'name' => 'required',
            ], 
            [
                'name.required' => "Nombre es obligatorio", 
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $zona = Zona::find(decrypt($id));
        return view('zona.show', compact('zona'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Zona::where('id', $request->id)
            ->update([
                'name' => $request->name,
            ]);

    }
}
