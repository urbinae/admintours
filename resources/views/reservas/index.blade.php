@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Reservas 
                </div>

                <div class="panel-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10px">Fecha</th>
                                <th>Tour</th>
                                <th>Estatus</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservas as $reserva)
                            <tr>
                                <td>{{ $reserva->fecha }}</td>
                                <td>{{ $reserva->tour }}</td>
                                <td>{{ $reserva->estatus }}</td>
                                
                                @can('reservas.show')
                                <td width="10px">
                                    <a href="{{ route('reservas.show', $reserva->id) }}" 
                                    class="btn btn-sm btn-default">
                                        ver
                                    </a>
                                </td>
                                @endcan 
                                @can('reservas.edit')
                                <td>
                                    <a href="{{route('reservas.edit', $reserva->id)}}" class="btn btn-sm btn-default">
                                        Editar
                                    </a>
                                </td> 
                                @endcan
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $reservas->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection