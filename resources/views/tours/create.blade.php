@extends('layouts.app')

@section('content')

<script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('admintours.tour') }} </div>

                <div class="panel-body">                    
                    {{ Form::open(['route' => 'tours.store', "id" => "createTour", "name" => "createTour"]) }}
                        <div id="form-errors"></div>
                        <div class="form-group">

                            <label>{{ trans('admintours.name') }}</label>
                            <div class="input-field">
                                {!!Form::text('name',null,['id'=>'name', 'class'=>'form-control'])!!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admintours.duration') }}</label>
                            <div class="input-field"> 
                                {!!Form::number('duracion',null,['id'=>'duracion', 'class'=>'form-control'])!!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admintours.precio') }}</label>
                            <div class="input-field"> 
                                {!!Form::number('precio',null,['id'=>'precio', 'class'=>'form-control'])!!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label>{{ trans('admintours.short_descripcion') }}</label>
                            <div class="input-field"> 
                                {!! Form::textarea('short_description', null, ['class'=>'form-control', 'id' => 'short_description', ]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label>{{ trans('admintours.long_descripcion') }}</label>
                            <div class="input-field"> 
                                {!! Form::textarea('long_description', null, ['class'=>'form-control', 'id' => 'long_description', ]) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{ trans('admintours.adults') }}</label>
                                    <div class="input-field"> 
                                        {!! Form::checkbox('adults', true, ['class'=>'form-control', 'id' => 'adults', ]) !!}
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{ trans('admintours.children') }}</label>
                                    <div class="input-field"> 
                                        {!! Form::checkbox('children', true, ['class'=>'form-control', 'id' => 'children', ]) !!}
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{ trans('admintours.infants') }}</label>
                                    <div class="input-field"> 
                                        {!! Form::checkbox('infants', true, ['class'=>'form-control', 'id' => 'infants', ]) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{ trans('admintours.buggies') }}</label>
                                    <div class="input-field"> 
                                        {!! Form::checkbox('buggies', true, ['class'=>'form-control', 'id' => 'buggies', ]) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{ trans('admintours.status') }}</label>
                                    <div class="input-field"> 
                                        {!! Form::checkbox('status', true, ['class'=>'form-control', 'id' => 'status', ]) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{ trans('admintours.important') }}</label>
                                    <div class="input-field"> 
                                        {!! Form::checkbox('important', true, ['class'=>'form-control', 'id' => 'important', ]) !!}
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="form-group">
                            <label>{{ trans('admintours.days') }}</label>
                            <select class="days-multiple form-control" name="days_array[]" multiple>
                              <option value="0">Domingo</option>
                              <option value="1">Lunes</option>
                              <option value="2">Martes</option>
                              <option value="3">Miercoles</option>
                              <option value="4">Jueves</option>
                              <option value="5">Viernes</option>
                              <option value="6">Sabado</option>
                            </select>
                        </div>
                            
                        
                        <div class="input-group control-group increment" >
                          <input type="file" name="fotos[]" class="form-control fotos">
                          <div class="input-group-btn"> 
                            <button class="btn btn-success" type="button"><i class=""></i>Add</button>
                          </div>
                        </div>
                        <div class="clone hide">
                          <div class="control-group input-group" style="margin-top:10px">
                            <input type="file" name="fotos[]" class="form-control fotos">
                            <div class="input-group-btn"> 
                              <button class="btn btn-danger" type="button"><i class="e"></i> Remove</button>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admintours.selectzona') }}</label>
                            <div class="input-field">
                                <select class="js-example-basic-simple form-control" name="zona_id" id="zona_id" >
                                    @forelse ($zonas as $zona)
                                        <option value="{{ $zona->id }}">{{ $zona->name }}</option>
                                    @empty
                                        <option value="">No se han creado zonas</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::button('Guardar', ['class' => 'btn btn-sm btn-primary', "name" => "save-tour", "id" => "save-tour"])}}
                        </div>
                        
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">


</script>



@endsection