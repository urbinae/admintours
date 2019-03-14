<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Adults;

class AdultController extends Controller
{
    public function store(Request $request){
    	$adult = new Adults();

        $adult->tour_id = $request->input('tourid');
        $adult->max = $request->input('max');
        $adult->min = $request->input('min');
        $adult->cost = $request->input('cost');

        if ($adult->save()) {
        	return redirect()->route('tours.show', $adult->tour_id);
        }
    }

    public function update(Request $request, $id)
    {
        $adult = Adults::find($id);
        $adult->tour_id = $request->input('tourid');
        $adult->max = $request->input('max');
        $adult->min = $request->input('min');
        $adult->cost = $request->input('cost');
        $adult->update();

        return redirect()->route('tours.show', $adult->id)
            ->with('info', 'Registro guardado con éxito');
    }
}
