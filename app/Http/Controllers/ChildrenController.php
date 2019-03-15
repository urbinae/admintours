<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Children;

class ChildrenController extends Controller
{
    public function store(Request $request){
    	$children = new Children();

        $children->tour_id = $request->input('tourid');
        $children->max = $request->input('max');
        $children->min = $request->input('min');
        $children->cost = $request->input('cost');
        $children->age_from = $request->input('age_from');
        $children->age_to = $request->input('age_to');

        if ($children->save()) {
        	return redirect()->route('tours.show', $children->tour_id);
        }
    }

    public function update(Request $request, $id)
    {
        $children = Children::find($id);
        $children->max = $request->input('max');
        $children->min = $request->input('min');
        $children->cost = $request->input('cost');
        $children->age_from = $request->input('age_from');
        $children->age_to = $request->input('age_to');
        $children->update();

        return redirect()->route('tours.show', $children->tour_id)
            ->with('info', 'Registro guardado con éxito');
    }
}
