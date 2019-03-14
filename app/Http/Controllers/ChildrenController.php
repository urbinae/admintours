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

        if ($children->save()) {
        	return redirect()->route('tours.show', $children->tour_id);
        }
    }

    public function update(Request $request, $id)
    {
        $children = Children::find($id);
        $data = $request->all();
        $children->update($data);

        return redirect()->route('tours.show', $children->id)
            ->with('info', 'Registro guardado con éxito');
    }
}
