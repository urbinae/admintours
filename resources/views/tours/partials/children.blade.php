@if($tour->children)
<div class="col col-md-4">
    @if(empty((array)$children))
    <div class="panel panel-info">
      <div class="panel-heading">Ninos
        @can('children.edit')
        <div class="btn-group">
          <button type="button" class="btn btn-info pull-rigth" data-toggle="modal" data-target="#edit-modal">
          <i class="fa fa-edit">Editar</i>
          </button>
        </div>
        @endcan
      </div>
      <div class="panel-body">
        <p><strong>Min: </strong> {{ $children->min or ''}}</p>
        <p><strong>Max: </strong> {{ $children->max or '' }}</p>
        <p><strong>Costo/Nino: </strong> {{ $children->cost or ''}}</p>
      </div>
    </div>
    @else
    <div class="panel panel-info">
      <div class="panel-heading">Ninos
          @can('children.create')
          <div class="btn-group">
            <button type="button" class="btn btn-info pull-rigth" data-toggle="modal" data-target="#create-modal">
            <i class="fa fa-edit">Editar</i>
            </button>
          </div>
          @endcan
      </div>
      <div class="panel-body">
        <p><strong>Min: </strong> </p>
        <p><strong>Max: </strong> </p>
        <p><strong>Costo/Nino: </strong> </p>
      </div>
    </div>
    @endif
</div>
<div class="modal fade" id="create-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" align="center"><b>Editar liminte de ninos</b></h4>
      </div>
      <div class="modal-body">
        {{ Form::open(['route' => 'children.store', "id" => "createChildren", "name" => "createChildren"]) }}
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
            <div class="form-group">
              <label for="cost">Costo</label> 
              <input type="text" class="form-control" name="cost" placeholder="">
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
<div class="modal fade" id="edit-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" align="center"><b>Editar liminte de ninos</b></h4>
      </div>
      <div class="modal-body">
        {!! Form::model($children, ['route' => ['children.update', $children->id], 'method'=>'PUT']) !!}
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
            <div class="form-group">
              <label for="cost">Costo</label> 
              {!!Form::text('cost',null,['id'=>'cost', 'class'=>'form-control', 'placeholder'=>'Costo por nino', 'required'=>'required'])!!}
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