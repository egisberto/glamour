<label for="basic-url">{{ $label }}</label>
<div class="input-group">
  	<span class="input-group-addon" id="basic-addon3" data-toggle="modal" data-target="#clientModal" style="cursor:pointer;">+
  	</span>
  {!! Form::select($name, $clients, null, ['placeholder' => 'Selecione um cliente','class' => 'form-control']) !!}
</div>