<div class="row">
	<div class="form-group">
		<div class="col-md-6">
		{{ Form::label('name', 'Nombre de usuario') }}
		{{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
		</div>
	</div>
</div>
<div class="row">
	<div class="form-group">

		<div class="col-md-3">
			{{ Form::label('name', '% Descuento') }}
			{{ Form::text('percent', null, ['class' => 'form-control', 'id' => 'percent']) }}
		</div>
	</div>
</div>
<hr>

<h3>Rol</h3>
<div class="form-group">
	<ul class="list-unstyled">
		@foreach($roles as $role)
		<li>
			<label>
				{{ Form::checkbox('roles[]', $role->id, null) }}
				{{ $role->name }}
				<em>({{ $role->description }})</em>
			</label>
		</li>
		@endforeach
	</ul>
</div>
<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>