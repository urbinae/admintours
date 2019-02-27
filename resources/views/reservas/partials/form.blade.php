<div class="form-group">
	<label>Nombre</label>
	<div class="input-field">
	{!!Form::text('tour',null,['id'=>'tour', 'class'=>'form-control'])!!}
	</div>
</div>
<div class="form-group">
	<label>Nuevo Status</label>
	<div class="input-field">
		{!! Form::select('status_id', $status, null, ['class' => 'form-control']) !!}
	</div>
</div>

<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary'])}}
</div>