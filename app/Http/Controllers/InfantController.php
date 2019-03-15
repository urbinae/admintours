<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Infants;

class InfantController extends Controller
{
    public function store(Request $request){
    	$infants = new Infants();

        $infants->tour_id = $request->input('tourid');
        $infants->max = $request->input('max');
        $infants->min = $request->input('min');

        if ($infants->save()) {
        	return redirect()->route('tours.show', $infants->tour_id);
        }
    }

    public function update(Request $request, $id)
    {
        $infants = infants::find($id);
        $infants->tour_id = $request->input('tourid');
        $infants->max = $request->input('max');
        $infants->min = $request->input('min');
        $infants->update();

        return redirect()->route('tours.show', $infants->tour_id)
            ->with('info', 'Registro guardado con éxito');
    }
}
