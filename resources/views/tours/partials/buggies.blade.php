@if($tour->buggies)
<div class="col col-md-4">
    @if(!empty((array)$buggies))
    <div class="panel panel-info">
      <div class="panel-heading">Buggies
        @can('buggies.edit')
        <div class="btn-group">
          <button type="button" class="btn btn-info pull-rigth" data-toggle="modal" data-target="#edit-modal-buggies">
          <i class="fa fa-edit">Editar</i>
          </button>
        </div>
        @endcan
      </div>
      <div class="panel-body">
        <p><strong>Nombre: </strong> {{ $buggies->name or ''}}</p>
        <p><strong>Costo: </strong> {{ $buggies->cost or ''}}</p>
      </div>
    </div>
    @else
    <div class="panel panel-info">
      <div class="panel-heading">Buggies
          @can('buggies.create')
          <div class="btn-group">
            <button type="button" class="btn btn-info pull-rigth" data-toggle="modal" data-target="#create-modal-buggies">
            <i class="fa fa-edit">Editar</i>
            </button>
          </div>
          @endcan
      </div>
      <div class="panel-body">
        <p><strong>Nombre: </strong> </p>
        <p><strong>Costo: </strong> </p>
      </div>
    </div>
    @endif
</div>
<div class="modal fade" id="create-modal-buggies">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" align="center"><b>Editar Buggies</b></h4>
      </div>
      <div class="modal-body">
        {{ Form::open(['route' => 'buggies.store', "id" => "createbuggies", "name" => "createbuggies"]) }}
          <input type="hidden" name="tourid" value="{{$tour->id}}">
          <div class="box-body">
            <div class="form-group">
              <label for="name">Nombre</label>
              {!!Form::text('name',null,['id'=>'name', 'class'=>'form-control', 'placeholder'=>'Nombre de Buggie', 'required'=>'required'])!!}
            </div>
            <div class="form-group">
              <label for="cost">Costo</label> 
              {!!Form::text('cost',null,['id'=>'cost', 'class'=>'form-control', 'placeholder'=>'Costo por Buggie', 'required'=>'required'])!!}
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
<div class="modal fade" id="edit-modal-buggies">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" align="center"><b>Editar Buggies</b></h4>
      </div>
      <div class="modal-body">
        {!! Form::model($buggies, ['route' => ['buggies.update', $buggies->id], 'method'=>'PUT']) !!}
          <input type="hidden" name="tourid" value="{{$tour->id}}">
          <div class="box-body">
            <div class="form-group">
              <label for="name">Nombre</label>
              {!!Form::text('name',null,['id'=>'name', 'class'=>'form-control', 'placeholder'=>'Nombre de Buggie', 'required'=>'required'])!!}
            </div>
            <div class="form-group">
              <label for="cost">Costo</label> 
              {!!Form::text('cost',null,['id'=>'cost', 'class'=>'form-control', 'placeholder'=>'Costo por Buggie', 'required'=>'required'])!!}
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