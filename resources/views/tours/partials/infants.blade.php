@if($tour->infants)
<div class="col col-md-4">
    @if(!empty($infants))
    <div class="panel panel-info">
      <div class="panel-heading">Infantes
        <div class="btn-group">
          <button type="button" class="btn btn-info pull-rigth" data-toggle="modal" data-target="#edit-modal-infants">
          <i class="fa fa-edit">Editar</i>
          </button>
        </div>
      </div>
      <div class="panel-body">
        <p><strong>Min: </strong> {{ $infants->min}}</p>
        <p><strong>Max: </strong> {{ $infants->max}}</p>
      </div>
    </div>
    @else
    <div class="panel panel-info">
      <div class="panel-heading">Infantes
          @can('infants.create')
          <div class="btn-group">
            <button type="button" class="btn btn-info pull-rigth" data-toggle="modal" data-target="#create-modal-infants">
            <i class="fa fa-edit">Nuevo</i>
            </button>
          </div>
          @endcan
      </div>
      <div class="panel-body">
        <p><strong>Min: </strong> </p>
        <p><strong>Max: </strong> </p>
      </div>
    </div>
    @endif
</div>
@if(empty($infants))
<div class="modal fade" id="create-modal-infants">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" align="center"><b>Editar liminte de Infantes</b></h4>
      </div>
      <div class="modal-body">
        {{ Form::open(['route' => 'infants.store', "id" => "createinfants", "name" => "createinfants"]) }}
          <input type="hidden" name="tourid" value="{{$tour->id}}">
          <div class="box-body">
            <div class="form-group">
              <label for="min">Min</label>
              {!!Form::number('min',null,['id'=>'min', 'class'=>'form-control', 'placeholder'=>'Cantidad minima', 'required'=>'required'])!!}
            </div>
            <div class="form-group">
              <label for="max">Max</label> 
              {!!Form::number('max',null,['id'=>'max', 'class'=>'form-control', 'placeholder'=>'Cantidad maxima', 'required'=>'required'])!!}
            </div>           
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
          </div>
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>
@else
<div class="modal fade" id="edit-modal-infants">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" align="center"><b>Editar liminte de Infantes</b></h4>
      </div>
      <div class="modal-body">
        {!! Form::model($infants, ['route' => ['infants.update', $infants->id], 'method'=>'PUT']) !!}
          <input type="hidden" name="tourid" value="{{$tour->id}}">
          <div class="box-body">
            <div class="form-group">
              <label for="min">Min</label>
              {!!Form::number('min',null,['id'=>'min', 'class'=>'form-control', 'placeholder'=>'Cantidad minima', 'required'=>'required'])!!}
            </div>
            <div class="form-group">
              <label for="max">Max</label> 
              {!!Form::number('max',null,['id'=>'max', 'class'=>'form-control', 'placeholder'=>'Cantidad maxima', 'required'=>'required'])!!}
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
          </div>
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>
@endif
@endif