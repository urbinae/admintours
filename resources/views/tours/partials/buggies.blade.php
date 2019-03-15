@if($tour->buggies)
<div class="col col-md-12">
  @if(!empty($buggies))
  <div class="panel panel-info">
    <div class="panel-heading">Buggies
      <div class="btn-group">
        <button type="button" class="btn btn-info pull-rigth" data-toggle="modal" data-target="#create-modal-buggies">
          <i class="fa fa-edit">Nuevo</i>
        </button>
      </div>
    </div>
    <div class="panel-body">
      <table class="table table-striped table-hover table-responsive" id="myTable">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Precio ($USD)</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($buggies as $buggie)
          <tr>
            <td>{{ $buggie->name or  ''}}</td>
            <td>{{ $buggie->cost or  '' }}</td>
            <td><button type="button" class="btn btn-info pull-rigth" data-toggle="modal" data-target="#edit-modal-buggies-{{$buggie->id}}">
              <i class="fa fa-edit">Editar</i>
            </button></td>
            <div class="modal fade" id="edit-modal-buggies-{{$buggie->id}}" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" align="center"><b>Editar Buggies</b></h4>
                  </div>
                  <div class="modal-body">
                    {!! Form::model($buggie, ['route' => ['buggies.update', $buggie->id], 'method'=>'PUT']) !!}
                    <input type="hidden" name="tourid" value="{{$tour->id}}">
                    <input type="hidden" name="token" value="{{csrf_token()}}">
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
                      <button value="{{$buggie->id}}" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                    {!! Form::close() !!}
                  </div>
                </div>
              </div>
            </div>
            @endforeach()    
          </tr> 
        </tbody>
      </table>
    </div>
  </div>
  @else
  <div class="panel panel-info">
    <div class="panel-heading">Buggies

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
@endif