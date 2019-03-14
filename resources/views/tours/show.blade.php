@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tour</div>

                <div class="panel-body">                                        
                    <p><strong>Nombre</strong> {{ $tour->name }}</p>
                    <p><strong>Duracion</strong> {{ $tour->duracion }}</p>
                    <p><strong>Zona</strong>  {{ $tour->zona->name }}</p>
                    <p><strong>Dias disponibles</strong>  {{ $days_string }}</p>
                    <p><strong>Precio ($USD)</strong>  {{ $tour->precio  }} </p>

                    <div class="row">
                        @include('tours.partials.adults')
                        @include('tours.partials.children')
                        @include('tours.partials.infants')
                        @include('tours.partials.buggies')
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Galeria</div>

                <div class="panel-body">                                        
                    

                    <div class="row">
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection