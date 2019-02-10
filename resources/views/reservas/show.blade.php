@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reserva</div>

                <div class="panel-body">                                        
                    <p><strong>Tour</strong>     {{ $reserva->tour }}</p>
                    <p><strong>Fecha</strong>     {{ $reserva->fecha }}</p>
                    <p><strong>Nombre</strong>      {{ $reserva->nombre }} {{ $reserva->apellido }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection