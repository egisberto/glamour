{!! Form::model($item, ['url' => $action, 
	'method' => 'POST',
	'id' => 'clientForm']) !!}
	@if ($editMode)
		{{ Form::hidden('_method','PUT') }}				
   	@endif

	<div class="form-group">
		{{ Form::label('Nome', null, ['class' => 'control-label']) }}
		{{ Form::text('name', null, ['class' => 'form-control', 'placeholder'=> 'Nome completo']) }}
	</div>
		

	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				{{ Form::label('E-mail', null, ['class' => 'control-label']) }}
				{{ Form::text('email', null, ['class' => 'form-control', 'placeholder'=> 'exemplo@gmail.com']) }}
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				{{ Form::label('Nascimento', null, ['class' => 'control-label']) }}
				{{ Form::text('birth_date', null, ['class' => 'form-control', 'placeholder'=> '00/00/0000', 
					'data-mask'=> '00/00/0000', 'data-mask-clearifnotmatch' => 'true']) }}
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				{{ Form::label('RG', null, ['class' => 'control-label']) }}
				{{ Form::text('rg', null, ['class' => 'form-control', 'placeholder'=> '9.999.999' ]) }}
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				{{ Form::label('CPF', null, ['class' => 'control-label']) }}
				{{ Form::text('cpf', null, ['class' => 'form-control', 'placeholder'=> '999.999.999-99', 
					'data-mask' => '000.000.000-00', 'data-mask-reverse' =>'true' ]) }}
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				{{ Form::label('Telefone', null, ['class' => 'control-label']) }}
				{{ Form::text('phone', null, ['class' => 'form-control celphone', 'placeholder'=> '(99)99999-9999',
					'data-mask' => '(00)0000-0000']) }}
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				{{ Form::label('Celular', null, ['class' => 'control-label']) }}
				{{ Form::text('celphone', null, ['class' => 'form-control phone_9_digits', 'placeholder'=> '(99)09999-9999']) }}
			</div>
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('Endereço', null, ['class' => 'control-label']) }}
		{{ Form::text('address', null, ['class' => 'form-control', 'placeholder'=> 'Endereço']) }}
	</div>

	{!! Form::submit('Submit', ['class' => 'btn btn-default', 
		'onclick' => 'event.preventDefault(); submitClienForm();']) !!}
		
{!! Form::close() !!}