@extends('layouts.os')

<!-- Styles -->
<style type="text/css" media="all">
	@page {
        margin: 0px !important;
        padding: 0px !important;
        size: 149mm 210mm;
    }

	body {
		font-size: 14px !important;
		margin: 0px !important;
		padding: 0px !important;
	}

	html {
		margin: 0px !important;
		padding: 0px !important;
	}

	.container {
	    margin: 0px !important;
		padding: 2px !important;
		width: 149mm !important; /*A8 (A4/2)*/
	}

	.form-group {
	    margin: 0px !important;
	}

	h1, h2, h3, h4, h5, h6 {
		margin:  2px !important;
		padding:  2px !important;
	}

	hr {
		margin:  1px !important;
		padding:  1px !important;
	}

	.page-header {
		margin:  2px !important;
		padding:  2px !important;
	}

	pre {
		font-size: 10px !important;
		margin: 0px !important;
		padding: 3px !important;
	}

	table {
		font-size: 12px !important;
		color: black;
		margin: 5px 0px 10px 8px;
		table-layout: fixed !important;
		page-break-inside: avoid !important;
		font-family: "Helvetica Neue",Helvetica,Arial,sans-serif !important;
	}
		table, th, td {
		    border: 1px solid black;
		    border-collapse: collapse;
		}

		.table>thead>tr>th {
			padding: 4px 4px 4px 0px !important;
			text-align: center !important;
		}
		.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td {
			padding: 0px !important;
		}

	address {
		font-size: 12px !important;
		margin-bottom: 2px !important;
	}

</style>

@section('content')

<div class="container">
	
	<!-- HEADER -->
	<div class="row">
		<div class="col-xs-10">
			<hr>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-4">
			<img src="{{ public_path() }}/images/logo_glamour.png" alt="logo" class="img-thumbnail">
		</div>
		<div class="col-xs-6">
			<address class="text-right">
			  <strong>Guaraí - TO</strong> Av. Bernardo Sayão - Esq. c/Rua 1 <br /> 
			  Tel: (63) 3464-4979
			</address>

			<address class="text-right">
			  <strong>Colméia - TO</strong> Av. Longuinho Vieira Júnior nº 603 <br /> 
			  Tel: (63) 3457-1915
			</address>

			<address class="text-right">
			  <strong>Palmas - TO</strong> Medical Center - Térreo - Sala 08 <br /> 
			  Tel: (63) 3214-6718
			</address>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-10">
			<hr>
		</div>
	</div>
	<!-- /HEADER -->
	<div class="row">
		<div class="col-xs-10">
			<h4 class="text-center">Ordem de Serviço: <strong>{{ $item->id }}</strong></h4>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-10">
			<hr>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-10">
			<span for="name">Cliente: <strong>{{ $client->name }}</strong></span>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-10">
			<span for="address">Endereço: <strong>{{ $item->address }}</strong></span>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-5">
			<span for="name">Telefone: <strong>{{ $item->phone }}</strong></span>
		</div>
		<div class="col-xs-5">
			<span for="address">Celular: <strong>{{ $item->celphone }}</strong></span>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-10">
			<hr>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-10">
	 		<span for="value">Observações</span>
	 		<pre>{{ $item->description }}</pre>
	 	</div>
	 </div>

	 <div class="row">
		<div class="col-xs-10">
			<span for="value">Condições de pagamento</span>
			<pre>{{ $item->condition }}</pre>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-10">
			<h5 class="text-right">Valor Total: <strong>{{ $item->value }}</strong></h5>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-10">
			<div> 
				<table class="table table-bordered">
					<!-- <thead>
						<tr>
							<th colspan="3" align="center">RECEITA</th>
							<th align="center">Esférico</th>
							<th align="center">Cilíndrico</th>
							<th align="center">Eixo</th>
							<th align="center">D.P.</th>
						</tr>
					</thead> -->
					<tbody>
						<tr>
							<td colspan="3" align="center"><strong>RECEITA</strong></td>
							<td align="center"><strong>Esférico</strong></td>
							<td align="center"><strong>Cilíndrico</strong></td>
							<td align="center"><strong>Eixo</strong></td>
							<td align="center"><strong>D.P.</strong></td>
						</tr>
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
		</div>
	</div>

	<div class="row">
		<div class="col-xs-10">
			<span>Observações Lab.</span>
			<pre>{{ $item->description_lab }}</pre>
		</div>
	</div>

</div>

@endsection
