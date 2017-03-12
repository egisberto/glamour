<div class="form-group">
	<label for="$name">{{ $label }}</label>
	{!! Form::select($name, $clients, null, ['placeholder' => 'Selecione um cliente','class' => 'form-control']) !!}
</div>