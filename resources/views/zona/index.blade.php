@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('admintours.Listarzonas') }} 
                    @can('tours.create')
                    <a href="{{ route('zonas.create') }}" 
                    class="btn btn-sm btn-primary pull-right">
                        {{ trans('admintours.create') }} 
                    </a>
                    @endcan
                </div>

                <div class="panel-body">
                    <table class="table table-striped table-hover" id="myTable">
                        <thead>
                            <tr>
                                <th>{{ trans('admintours.name') }}</th>
                                @can('zonas.show')
                                <th></th>
                                @endcan 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($zonas as $zona)
                            <tr>
                                <td>{{ $zona->name or  '' }}</td>

                                @can('zonas.show')
                                <td width="">
                                    <a href="{{ route('zonas.show', $zona->id) }}" 
                                    class="btn btn-sm btn-default">
                                        Editar
                                    </a>
                                    <a href="" 
                                    class="btn btn-sm btn-default">
                                        Borrar
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