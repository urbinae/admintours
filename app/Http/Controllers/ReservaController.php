<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reserva;

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
}
