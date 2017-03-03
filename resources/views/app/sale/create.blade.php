@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Vendas - Novo/Edit</div>
			</div>

			@include('layouts.errors')

			<form method="{{ $method }}" action="{{ $action }}">
				{{ csrf_field() }}

				@if ($editMode)
                       <input name="_method" type="hidden" value="PUT">
               	@endif
				
				<div class="form-group">
					<label for="name">Cliente</label>
					<select class="form-control" name="client_id">
						<option value="">Escolha um cliente</option>
						@foreach ($clients as $client)
							<option value="{{ $client->id }}">{{ $client->name }}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label for="value">Valor Total</label>
					<input type="text" class="form-control" name="value" placeholder="999,999.99" value="{{ $item->value }}" >
				</div>

				<button type="submit" class="btn btn-default">Submit</button>
			</form>

		</div> 
	</div>
</div>

@endsection
