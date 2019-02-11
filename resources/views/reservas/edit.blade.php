@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reserva en Estatus <strong>{{$reserva->estatus}}</strong> </div>

                <div class="panel-body">                    
                    {!! Form::model($reserva, ['route' => ['reservas.update', $reserva->id],
                    'method' => 'PUT']) !!}

                        @include('reservas.partials.form')
                        
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection