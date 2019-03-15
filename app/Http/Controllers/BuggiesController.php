<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buggies;

class BuggiesController extends Controller
{
    public function store(Request $request){
    	$buggies = new Buggies();

        $buggies->tour_id = $request->input('tourid');
        $buggies->name = $request->input('name');
        $buggies->cost = $request->input('cost');

        if ($buggies->save()) {
        	return redirect()->route('tours.show', $buggies->tour_id);
        }
    }

    public function update(Request $request, $id)
    {
        $buggies = Buggies::find($id);
        $buggies->tour_id = $request->input('tourid');
        $buggies->name = $request->input('name');
        $buggies->cost = $request->input('cost');
        $buggies->update();

        return redirect()->route('tours.show', $buggies->tour_id)
            ->with('info', 'Registro guardado con éxito');
    }
}
