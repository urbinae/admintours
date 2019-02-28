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
                    <p><strong>Precio ($USD)</strong>  {{ $tour->precio  }} </p>

                    <div class="row">
                        @if($tour->adults)
                            <div class="col col-md-4">
                            @if(isset($adults))
                            <div class="panel panel-info">
                              <div class="panel-heading">
                                <h3 class="panel-title">Adultos</h3>
                              </div>
                              <div class="panel-body">
                                <p><strong>Min </strong> {{ $adults->min or ''}}</p>
                                <p><strong>Max </strong> {{ $adults->max or '' }}</p>
                                <p><strong>Costo </strong> {{ $adults->cost or ''}}</p>
                              </div>
                            </div>
                            @else
                                <div class="panel panel-info">
                                  <div class="panel-body">
                                    Agregar Adultos
                                  </div>
                                </div>
                            @endif
                            </div>
                        @endif
                        @if($tour->children)
                            <div class="col col-md-4">
                            @if(isset($children))
                            <div class="panel panel-info">
                              <div class="panel-heading">
                                <h3 class="panel-title">Ninos</h3>
                              </div>
                              <div class="panel-body">
                                <p><strong>Min </strong> {{ $children->min or ''}}</p>
                                <p><strong>Max </strong> {{ $children->max or '' }}</p>
                                <p><strong>Costo </strong> {{ $children->cost or ''}}</p>
                              </div>
                            </div>
                            @else
                                <div class="panel panel-info">
                                  <div class="panel-body">
                                    Agregar Ninos
                                  </div>
                                </div>
                            @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection