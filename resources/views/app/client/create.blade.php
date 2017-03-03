@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Clientes - Novo/Edit</div>
			</div>

			@include('layouts.errors')

			<form method="{{ $method }}" action="{{ $action }}">
				{{ csrf_field() }}

				@if ($editMode)
                       <input name="_method" type="hidden" value="PUT">
               	@endif
				
				<div class="form-group">
					<label for="name">Nome</label>
					<input type="text" class="form-control" name="name" placeholder="Nome completo" value="{{ $item->name }}" >
				</div>

				<div class="form-group">
					<label for="email">E-mail</label>
					<input type="email" class="form-control" name="email" placeholder="E-mail" value="{{ $item->email }}" >
				</div>

				<div class="form-group">
					<label for="rg">RG</label>
					<input type="text" class="form-control"  name="rg" placeholder="RG" value="{{ $item->rg }}" >
				</div>

				<div class="form-group">
					<label for="cpf">CPF</label>
					<input type="text" class="form-control" name="cpf" placeholder="CPF" value="{{ $item->cpf }}" >
				</div>

				<div class="form-group">
					<label for="address">Endereço</label>
					<input type="text" class="form-control" name="address" placeholder="Endereço Completo" value="{{ $item->address }}" >
				</div>

				<button type="submit" class="btn btn-default">Submit</button>
			</form>

		</div> 
	</div>
</div>

@endsection
