@extends('layouts.app')

@section('content')
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
                                {!!Form::text('duracion',null,['id'=>'duracion', 'class'=>'form-control'])!!}
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

                        <div class="form-group">
                            <label>{{ trans('admintours.adults') }}</label>
                            <div class="input-field"> 
                                {!! Form::checkbox('adults', 1, ['class'=>'form-control', 'id' => 'adults', ]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label>{{ trans('admintours.children') }}</label>
                            <div class="input-field"> 
                                {!! Form::checkbox('children', 1, ['class'=>'form-control', 'id' => 'children', ]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admintours.infants') }}</label>
                            <div class="input-field"> 
                                {!! Form::checkbox('infants', 1, ['class'=>'form-control', 'id' => 'infants', ]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label>{{ trans('admintours.buggies') }}</label>
                            <div class="input-field"> 
                                {!! Form::checkbox('buggies', 1, ['class'=>'form-control', 'id' => 'buggies', ]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label>{{ trans('admintours.status') }}</label>
                            <div class="input-field"> 
                                {!! Form::checkbox('status', 1, ['class'=>'form-control', 'id' => 'status', ]) !!}
                            </div>
                        </div>


                        <div class="form-group">
                            <label>{{ trans('admintours.important') }}</label>
                            <div class="input-field"> 
                                {!! Form::checkbox('important', null, ['class'=>'form-control', 'id' => 'important', ]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label>{{ trans('admintours.days') }}</label>
                            <div class="input-field"> 
                                {!! Form::number('days', null, ['class'=>'form-control', 'id' => 'days', ]) !!}
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
@endsection