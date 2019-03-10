@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('admintours.cargarzonas') }} </div>

                <div class="panel-body">                    
                    {{ Form::open(['route' => 'zonas.store', "id" => "createZonas", "name" => "createZonas"]) }}
                        <div id="form-errors"></div>
                        <div class="form-group">

                            <label>{{ trans('admintours.name') }}</label>
                            <div class="input-field">
                                {!!Form::text('name',null,['id'=>'name', 'class'=>'form-control'])!!}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::button('Guardar', ['class' => 'btn btn-sm btn-primary', "name" => "save-zona", "id" => "save-zona"])}}
                        </div>
                        
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>



@endsection