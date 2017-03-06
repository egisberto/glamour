@extends('layouts.app')

<!-- Styles -->
<style type="text/css">
	table {
		font-size: 14px;
		/*font-family: sans-serif;*/
		color: black;
		width: 160mm;
		margin: 5px 0px 10px 0px;
		table-layout: fixed;
		page-break-inside: avoid;
	}
		table, th, td, th {
		    border: 1px solid black;
		    border-collapse: collapse;
		}

		td { padding-left: 5px; }

		th { text-align: center !important; }
</style>

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

			    $('html, body').animate({
			        scrollTop: $("#paymentHolder").offset().top
			    }, 1000);

			    $('#newPayment').hide();
			});
		});

		$('#newBordero').click(function(){
			$('#borderoForm').slideToggle();
		});

		@if (count($errors) > 0)
			$('#newPayment').trigger('click');
		@endif

	});

	function editPayment(idPayment) {
			$.ajax({
			  method: "GET",
			  url: "/sale_payments/"+idPayment+"/edit",
			  dataType: "html"
			}).done(function( data ) {
				$('#paymentHolder').html(data);
			    $('#paymentHolder').show();

			    $('html, body').animate({
			        scrollTop: $("#paymentHolder").offset().top
			    }, 1000);
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

			<div class="row">
				<div class="col-md-2">
					@if ( !empty($file) )
						<a href="/borderos/bordero_{{ $item->id }}.pdf" target="_new">
							<i class="fa fa-file-pdf-o fa-3x" aria-hidden="true" title="Download do Borderô previamente gerado"></i>
						</a>
					@endif
				</div>
			</div>
			
			<br />

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
					<label for="value">Condições de pagamento</label>
					<textarea class="form-control" name="condition" style="height: 174px;">{{ $item->condition }}</textarea>
				</div>

				<div class="form-group">
					<label for="value">Observações</label>
					<textarea class="form-control" name="description" style="height: 174px;">{{ $item->description }}</textarea>
				</div>

				<div class="form-group">
					<label for="value">Valor Total</label>
					<input type="text" class="form-control" name="value" placeholder="999,999.99" value="{{ $item->value }}" >
				</div>

				<div class="bs-example" data-example-id="striped-table"> 
					<table class="table table-bordered">
						<thead>
							<tr>
								<th colspan="3" align="center">RECEITA</th>
								<th align="center">Esférico</th>
								<th align="center">Cilíndrico</th>
								<th align="center">Eixo</th>
								<th align="center">D.P.</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td rowspan="2" colspan="2" valign="center" align="center">LONGE</td>
								<td valign="center" align="center">OD</td>
								<td valign="center" align="center">
									<input type="text" name="longe_od_esferico" class="form-control" value="{{ $item->longe_od_esferico }}"/>
								</td>
								<td valign="center" align="center">
									<input type="text" name="longe_od_cilindrico" class="form-control" value="{{ $item->longe_od_cilindrico }}"/>
								</td>
								<td valign="center" align="center">
									<input type="text" name="longe_od_eixo" class="form-control" value="{{ $item->longe_od_eixo }}"/>
								</td>
								<td valign="center" align="center">
									<input type="text" name="longe_od_dp" class="form-control" value="{{ $item->longe_od_dp }}"/>
								</td>
							</tr>
							<tr>
								<td valign="center" align="center">OE</td>
								<td valign="center" align="center">
									<input type="text" name="longe_oe_esferico" class="form-control" value="{{ $item->longe_oe_esferico }}"/>
								</td>
								<td valign="center" align="center">
									<input type="text" name="longe_oe_cilindrico" class="form-control" value="{{ $item->longe_oe_cilindrico }}"/>
								</td>
								<td valign="center" align="center">
									<input type="text" name="longe_oe_eixo" class="form-control" value="{{ $item->longe_oe_eixo }}"/>
								</td>
								<td valign="center" align="center">
									<input type="text" name="longe_oe_dp" class="form-control" value="{{ $item->longe_oe_dp }}"/>
								</td>
							</tr>
							<tr>
								<td rowspan="2" colspan="2" valign="center" align="center">PERTO</td>
								<td valign="center" align="center">OD</td>
								<td valign="center" align="center">
									<input type="text" name="perto_od_esferico" class="form-control" value="{{ $item->perto_od_esferico }}"/>
								</td>
								<td valign="center" align="center">
									<input type="text" name="perto_od_cilindrico" class="form-control" value="{{ $item->perto_od_cilindrico }}"/>
								</td>
								<td valign="center" align="center">
									<input type="text" name="perto_od_eixo" class="form-control" value="{{ $item->perto_od_eixo }}"/>
								</td>
								<td valign="center" align="center">
									<input type="text" name="perto_od_dp" class="form-control" value="{{ $item->perto_od_dp }}"/>
								</td>
							</tr>
							<tr>
								<td valign="center" align="center">OE</td>
								<td valign="center" align="center">
									<input type="text" name="perto_oe_esferico" class="form-control" value="{{ $item->perto_oe_esferico }}"/>
								</td>
								<td valign="center" align="center">
									<input type="text" name="perto_oe_cilindrico" class="form-control" value="{{ $item->perto_oe_cilindrico }}"/>
								</td>
								<td valign="center" align="center">
									<input type="text" name="perto_oe_eixo" class="form-control" value="{{ $item->perto_oe_eixo }}"/>
								</td>
								<td valign="center" align="center">
									<input type="text" name="perto_oe_dp" class="form-control" value="{{ $item->perto_oe_dp }}"/>
								</td>
							</tr>
							
						</tbody>
					</table>
				</div>
				

				<div class="row">
					<div class="col-md-4">
						<button type="submit" class="btn btn-default">Submit</button>
					</div>

					<div class="col-md-4 col-md-offset-4">
						<button type="button" class="btn btn-danger btn-md" onclick="event.preventDefault();
                                                     document.getElementById('generateOS-form').submit();">Gerar OS</button>
					</div>
				</div>
				
			</form>

			<form id="generateOS-form" action="{{ url('/sales/generate_os') }}" method="POST" style="display: none;">
            	{{ csrf_field() }}

            	<input name="id" type="hidden" value="{{ $item->id }}" />
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
			</div>

			<div class="row">
				<div class="col-md-4">
					<a href="javascript:void(0);"><button type="button" class="btn btn-primary btn-md">Novo</button></a>
				</div>

				<div class="col-md-4 col-md-offset-4">
					<button id="newBordero" type="button" class="btn btn-success btn-md">Gerar novo borderô</button>
				</div>

			</div>

			<!--  GERAÇÃO DE BORDERÔ -->
			<div class="row">
				<div class="col-sm-6 col-sm-offset-6 col-md-4 col-md-offset-8 col-xl-4 col-xl-offset-8">
					<form id="borderoForm" method="POST" action="/sale_payments/create_bordero" style="display: none;">
						{{ csrf_field() }}

						<input name="sale_id" type="hidden" value="{{ $item->id }}">

						<div class="form-group">
							<label for="value">Valor Total a ser pago</label>
							<input type="text" class="form-control" name="value" placeholder="999,999.99">
						</div>

						<div class="form-group">
							<label for="date_init">Primeiro Vencimento</label>
							<input type="text" class="form-control" name="date_init" placeholder="yyyy-mm-dd">
						</div>

						<div class="form-group">
							<label for="qtd">Quantidade de prestações</label>
							<input type="text" class="form-control" name="qtd">
						</div>

						<button type="submit" class="btn btn-default">Criar</button>

					</form>
				</div>
			</div>
			
			<!--  /GERAÇÃO DE BORDERÔ -->

			<div class="jumbotron" id="paymentHolder" style="display: none;">
			</div>

		</div> 
	</div>
</div>

@endsection
