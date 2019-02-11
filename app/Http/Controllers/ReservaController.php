<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reserva;
use App\Status;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservas = Reserva::paginate();
        return view('reservas.index', compact('reservas'));
    }

    public function show($id)
    {
        $reserva = Reserva::find($id);
        return view('reservas.show', compact('reserva'));
    }

    public function edit(Reserva $reserva)
    {
        $status = Status::pluck('name', 'id');
        return view('reservas.edit', compact('reserva', 'status'));
    }

    public function update(Request $request, Reserva $reserva)
    {
        $status_id = $request->input('status_id');
        $status = Status::find($status_id);
        $reserva->estatus = $status->name;
        //$reserva->estatus = $status->name;
        //dd($reserva);

        $reserva->update();
        return redirect()->route('reservas.edit', $reserva->id)->with('info', 'Reserva actualizada con éxito');

    }
}
