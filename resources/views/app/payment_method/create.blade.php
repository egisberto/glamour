@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Métodos de Pagamento - Novo/Edit</div>
			</div>

			@include('layouts.errors')

			<form method="{{ $method }}" action="{{ $action }}">
				{{ csrf_field() }}

				@if (count($item) > 0)
					<input name="_method" type="hidden" value="PUT">
				@endif

				<div class="form-group">
					<label for="exampleInputEmail1">Nome</label>
					<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nome do método de pagamento" name="name"
						value="{{ $item->name }}" >
				</div>

				<button type="submit" class="btn btn-default">Submit</button>
			</form>

		</div> 
	</div>
</div>

@endsection
