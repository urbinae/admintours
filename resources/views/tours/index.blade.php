@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('admintours.tours') }} 
                    @can('tours.create')
                    <a href="{{ route('tours.create') }}" 
                    class="btn btn-sm btn-primary pull-right">
                        {{ trans('admintours.create') }} 
                    </a>
                    @endcan
                </div>

                <div class="panel-body">
                    <table class="table table-striped table-hover" id="myTable">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Duracion</th>
                                <th>Zona</th>
                                <th>Precio ($USD)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tours as $tour)
                            <tr>
                                <td>{{ $tour->name }}</td>
                                <td>{{ $tour->duracion  }}</td>
                                <td>{{ $tour->zona  }}</td>
                                <td>{{ $tour->precio  }}</td>

                                @can('reservas.show')
                                <td width="10px">
                                    <a href="{{ route('tours.show', $tour->id) }}" 
                                    class="btn btn-sm btn-default">
                                        ver
                                    </a>
                                </td>
                                @endcan 
                                
                            @endforeach()    
                            </tr> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection