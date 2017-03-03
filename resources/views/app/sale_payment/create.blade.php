<!-- @include('layouts.errors') -->

<div class="page-header">
  <h3><small>Novo Pagamento</small></h3>
</div>
					
<form method="POST" action="{{ $action }}" >

	{{ csrf_field() }}
	
	<input name="sale_id" type="hidden" value="{{ $sale_id }}">

	@if ($editMode)
        <input name="_method" type="hidden" value="PUT">
   	@endif

   	<div class="form-group">
		<label for="payment_method_id">Método de Pagamento</label>
		<select class="form-control" name="payment_method_id">
			<option value="">Escolha um método</option>
			@foreach ($paymentMethods as $paymentMethod)
				@if ($paymentMethod->id == $item->payment_method_id)
					<option value="{{ $paymentMethod->id }}" selected>{{ $paymentMethod->name }}</option>
				@else
					<option value="{{ $paymentMethod->id }}">{{ $paymentMethod->name }}</option>
				@endif
			@endforeach
		</select>
	</div>

	<div class="form-group">
		<label for="value">Valor do pagamento</label>
		<input type="text" class="form-control" name="value" placeholder="999,999.99" value="{{ $item->value }}">
	</div>

	<div class="form-group">
		<label for="bandeira">Bandeira</label>
		<input type="text" class="form-control" name="bandeira" placeholder="VISA, MASTER ..." value="{{ $item->bandeira }}">
	</div>

	<div class="form-group">
		<label for="description">Descrição</label>
		<textarea class="form-control" name="description">{{ $item->description }}</textarea>
	</div>

	<button type="submit" class="btn btn-default">Submit</button>
</form>