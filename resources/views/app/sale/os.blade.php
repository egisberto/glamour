@extends('layouts.os')

<!-- Styles -->
<style type="text/css">
	/*table {
		font-size: 14px;
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

		th { text-align: center !important; }*/
		
	:before{}
</style>

@section('content')

<div class="container">
	<div class="row">
		<!-- HEADER -->
		<div class="col-xs-6 col-xs-offset-3">
			<hr>
		</div>
		
		<div class="col-xs-3 col-xs-offset-3">
			<img src="http://glamour.dev/images/logo_glamour.png" alt="logo" class="img-thumbnail">
		</div>
		<div class="col-xs-3">
			<address>
			  <strong>Twitter, Inc.</strong><br>
			  1355 Market Street, Suite 900<br>
			  San Francisco, CA 94103<br>
			  <abbr title="Phone">P:</abbr> (123) 456-7890
			</address>

			<address>
			  <strong>Full Name</strong><br>
			  <a href="mailto:#">first.last@example.com</a>
			</address>
		</div>
		
		<div class="col-xs-6 col-xs-offset-3">
			<hr>
		</div>
		<!-- /HEADER -->

		<div class="col-xs-6 col-xs-offset-3">
			<div class="page-header">
			  <h1>Ordem de Serviço: <small class="text-danger">{{ $item->id }}</small></h1>
			</div>
			<form action="#">
				<div class="form-group">
					<label for="name">Cliente: {{ $client->name }}</label>
				</div>

				<div class="form-group">
					<label for="address">Endereço: {{ $item->address }}</label>
				</div>

				<div class="row">
					<div class="col-xs-6 col-xl-6">
						<div class="form-group">
							<label for="phone">Telefone: {{ $item->phone }}</label>
						</div>
					</div>
				 	<div class="col-xs-6 col-xl-6">
						<div class="form-group">
							<label for="celphone">Celular: {{ $item->celphone }}</label>
						</div>
				 	</div>
				</div>

				<div class="row">
					<div class="col-xs-6">
						<div class="form-group">
							<label for="value">Condições de pagamento</label>
							<textarea class="form-control" name="condition" style="height: 174px;">{{ $item->condition }}</textarea>
						</div>
					</div>
				 	<div class="col-xs-6">
				 		<div class="form-group">
							<label for="value">Observações</label>
							<textarea class="form-control" name="description" style="height: 174px;">{{ $item->description }}</textarea>
						</div>
				 	</div>
				</div>

				<div class="form-group">
					<label for="value">Valor Total: {{ $item->value }}</label>
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
									{{ $item->longe_od_esferico }}
								</td>
								<td valign="center" align="center">
									{{ $item->longe_od_cilindrico }}
								</td>
								<td valign="center" align="center">
									{{ $item->longe_od_eixo }}
								</td>
								<td valign="center" align="center">
									{{ $item->longe_od_dp }}
								</td>
							</tr>
							<tr>
								<td valign="center" align="center">OE</td>
								<td valign="center" align="center">
									{{ $item->longe_oe_esferico }}
								</td>
								<td valign="center" align="center">
									{{ $item->longe_oe_cilindrico }}
								</td>
								<td valign="center" align="center">
									{{ $item->longe_oe_eixo }}
								</td>
								<td valign="center" align="center">
									{{ $item->longe_oe_dp }}
								</td>
							</tr>
							<tr>
								<td rowspan="2" colspan="2" valign="center" align="center">PERTO</td>
								<td valign="center" align="center">OD</td>
								<td valign="center" align="center">
									{{ $item->perto_od_esferico }}
								</td>
								<td valign="center" align="center">
									{{ $item->perto_od_cilindrico }}
								</td>
								<td valign="center" align="center">
									{{ $item->perto_od_eixo }}
								</td>
								<td valign="center" align="center">
									{{ $item->perto_od_dp }}
								</td>
							</tr>
							<tr>
								<td valign="center" align="center">OE</td>
								<td valign="center" align="center">
									{{ $item->perto_oe_esferico }}
								</td>
								<td valign="center" align="center">
									{{ $item->perto_oe_cilindrico }}
								</td>
								<td valign="center" align="center">
									{{ $item->perto_oe_eixo }}
								</td>
								<td valign="center" align="center">
									{{ $item->perto_oe_dp }}
								</td>
							</tr>

							<tr>
								<td valign="center" align="center" colspan="5" >Adição</td>
								<td valign="center" align="center" colspan="2" >{{ $item->addition }}</td>
							</tr>
							
						</tbody>
					</table>
				</div>

				<div class="form-group">
					<label for="description_lab">Observações Lab.</label>
					<textarea class="form-control" name="description_lab" style="height: 174px;">{{ $item->description_lab }}</textarea>
				</div>
				
			</form>
	</div>
</div>

@endsection
