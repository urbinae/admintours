<div class="form-group">
	<label>Nombre</label>
	<div class="input-field">
	{!!Form::text('tour',null,['id'=>'tour', 'class'=>'form-control')!!}
	</div>
</div>
<div class="form-group">
	<label>Status</label>
	<div class="input-field">
		{!! Form::select('status_id', $status, null, ['class' => 'form-control']) !!}
	</div>
</div>
<div class="form-group">
	<label>Precio</label>
	<div class="input-field">
	{!!Form::text('sale_price',null,['id'=>'sale_price', 'class'=>'form-control', 'placeholder'=>'Precio de Venta', 'required'=>'required'])!!}
	</div>
</div>
<div class="form-group">
	<label>Descripción</label>
	<div class="input-field">
	{!! Form::textarea('description',null,['id'=>'description', 'class'=>'form-control', 'rows' => 5, 'cols' => 40, 'required'=>'required']) !!}
	</div>
</div>
<div class="form-group">
	<label>Foto</label>
	<div class="input-field">
	{!! Form::File('imgs',null,['id'=>'imgs', 'class'=>'form-control']) !!}
	</div>
</div>

<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary'])}}
</div>