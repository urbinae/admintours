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
                                <th >&nbsp;</th>
                                <th >&nbsp;</th>
                                <th >&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tours as $tour)
                            <tr>
                                <td>{{ "var1" }}</td>
                                <td>{{ "var1" }}</td>
                                <td>{{ "var1" }}</td>
                                <td>{{ "var1" }}</td>
                                
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