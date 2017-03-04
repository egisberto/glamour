<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
	    <meta name="viewport" content="width=device-width, initial-scale=1">

	    <!-- CSRF Token -->
	    <meta name="csrf-token" content="{{ csrf_token() }}">

	    <title>{{ config('app.name', 'Laravel') }}</title>

	    <!-- Styles -->
	    <style type="text/css">
	    	html {
	    		margin:0px 10px;
	    		padding:0;
	    	}

			table {
				font-size: 14px;
				font-family: sans-serif;
				color: black;
				width: 160mm;
				/*height: 65mm;*/
				margin: 5px 0px 10px 0px;
				table-layout: fixed;
			}
				table, th, td {
				    border: 1px solid black;
				    border-collapse: collapse;
				}

				td { padding-left: 5px; }

			.page-break {
			    page-break-after: always;
			}
		</style>

	    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
	</head>
	<body>

		@for ($i = 1; $i <= $qtd; $i++)

			@php
				
				if ($i > 1 ) {
					date_add($dateInit, date_interval_create_from_date_string( '1 month'));
				}
			@endphp
		    <table> 
				<tbody> 
					<tr valign="middle">
						<td height="28">PEDIDO NÚMERO</td><td height="28">{{ $sale->id }}</td><td height="28">VALOR TOTAL</td><td height="28">R$ {{ $value }}</td>
					</tr>
					<tr valign="middle">
						<td height="28">NOME</td><td colspan="3">{{ $sale->client->name }}</td>
					</tr>
					<tr valign="middle">
						<td height="28">ENDEREÇO</td><td colspan="3">{{ $sale->client->address }}</td>
					</tr>
					<tr valign="middle">
						<td height="28">IDENTIDADE</td><td height="28">{{ $sale->client->rg }}</td><td height="28">CPF</td><td height="28">{{ $sale->client->cpf }}</td>
					</tr>
					<tr valign="middle">
						<td height="28">DATA DE EMISSÃO</td><td height="28">{{ date('d/m/Y') }}</td><td height="28">PARCELA</td><td height="28">{{ $i/$qtd }}</td>
					</tr>
					<tr valign="middle">
						<td height="28">VENCIMENTO PARC.</td><td height="28">{{ date_format($dateInit,'d/m/Y') }}</td><td height="28">VALOR DA PARCELA</td><td height="28">R$ {{ $value/$qtd }}</td>
					</tr>
				</tbody>
			</table>
		@endfor
	</body>
</html>