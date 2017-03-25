@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="page-header">
				<h1>Métodos de Pagamento 
					  <small>@if ($editMode) Edição @else Novo @endif</small>
				</h1>
			</div>

			@include('layouts.errors')

			{!! Form::model($item, ['url' => $action, 'method' => 'POST']) !!}
				@if ($editMode)
					{{ Form::hidden('_method','PUT') }}				
               	@endif

				<div class="form-group">
					{{ Form::label('Nome', null, ['class' => 'control-label']) }}
    				{{ Form::text('name', null, ['class' => 'form-control', 'placeholder'=> 'Nome do método de pagamento']) }}
				</div>

				{!! Form::submit('Submit', ['class' => 'btn btn-default']) !!}
			{!! Form::close() !!}

		</div> 
	</div>
</div>

@endsection