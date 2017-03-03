@extends('layouts.app')

@section('content')

<script type="text/javascript">
	$(document).ready(function(){

		$('#newPayment').click(function(){
			$.ajax({
			  method: "GET",
			  url: "{{ route('sale_payments.create') }}",
			  dataType: "html",
			  data: { sale_id: {{ $item->id }} }
			}).done(function( data ) {
				$('#paymentHolder').html(data);
			    $('#paymentHolder').show();
			});
		});

		@if (count($errors) > 0)
			$('#newPayment').trigger('click');
		@endif

	});

	function editPayment(idPayment) {
			$.ajax({
			  method: "GET",
			  url: "/sale_payments/"+idPayment+"/edit",
			  dataType: "html"//,
			  // data: { id: idPayment  }
			}).done(function( data ) {
				$('#paymentHolder').html(data);
			    $('#paymentHolder').show();
			});
	}
</script>

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Vendas - Edit</div>
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
							@if ($client->id == $item->client_id)
								<option value="{{ $client->id }}" selected>{{ $client->name }}</option>	
							@else
								<option value="{{ $client->id }}">{{ $client->name }}</option>
							@endif
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label for="value">Valor Total</label>
					<input type="text" class="form-control" name="value" placeholder="999,999.99" value="{{ $item->value }}" >
				</div>

				<button type="submit" class="btn btn-default">Submit</button>
			</form>

			<div class="page-header">
			  <h1>Pagamentos <small>Lista</small></h1>
			</div>

			<div class="bs-example" data-example-id="striped-table"> 
				<table class="table table-striped"> 
					<thead> <tr> <th>#</th> <th>Forma</th> <th>Valor</th> <th>Descriçao</th> <th>Data/Hora</th> <th>Açoes</th> </tr> </thead> 
					<tbody> 
					@foreach ($payments as $payment)
						<tr> 
							<th scope="row">{{ $payment->id }}</th>
							<td>{{ $payment->paymentMethod->name }}</td>
							<td>{{ $payment->value }}</td>
							<td>{{ $payment->description }}</td>
							<td>{{ $payment->created_at }}</td>
							<td>
								<a href="javascript:editPayment( {{ $payment->id }} )">Edit</a>

								<!-- <a href="#" onclick="event.preventDefault();
                                                     document.getElementById('delete-form-{{ $payment->id }}').submit();">Del</a>

                                        <form id="delete-form-{{ $payment->id }}" action="{{ route('sales.destroy', $payment->id) }}" method="POST" style="display: none;">
                                        	<input name="_method" type="hidden" value="DELETE">
                                            {{ csrf_field() }}
                                        </form> -->
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>

				<a href="javascript:void(0);" id="newPayment"><span class="label label-primary">Novo</span></a>
			</div>

			<div class="jumbotron" id="paymentHolder" style="display: none;">
			</div>

		</div> 
	</div>
</div>

@endsection
