@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('admintours.tour') }} </div>

                <div class="panel-body">                    
                    {{ Form::open(['route' => 'products.store']) }}

                       <div class="form-group">
                            <label>{{ trans('admintours.name') }}</label>
                            <div class="input-field">
                                {!!Form::text('tour',null,['id'=>'name', 'class'=>'form-control'])!!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admintours.duration') }}</label>
                            <div class="input-field"> 
                                {!!Form::text('duration',null,['id'=>'duration', 'class'=>'form-control'])!!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admintours.price') }}</label>
                            <div class="input-field"> 
                                {!!Form::number('price',null,['id'=>'price', 'class'=>'form-control'])!!}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary'])}}
                        </div>
                        
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection