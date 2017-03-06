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

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Vendas - Novo</div>
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
					<label for="value">Condições de pagamento</label>
					<textarea class="form-control" name="condition" style="height: 174px;">{{ $conditionDefault }}</textarea>
				</div>

				<div class="form-group">
					<label for="value">Observações</label>
					<textarea class="form-control" name="description" style="height: 174px;"></textarea>
				</div>

				<div class="form-group">
					<label for="value">Valor Final</label>
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
									<input type="text" name="longe_od_esferico" class="form-control"/>
								</td>
								<td valign="center" align="center">
									<input type="text" name="longe_od_cilindrico" class="form-control"/>
								</td>
								<td valign="center" align="center">
									<input type="text" name="longe_od_eixo" class="form-control"/>
								</td>
								<td valign="center" align="center">
									<input type="text" name="longe_od_dp" class="form-control"/>
								</td>
							</tr>
							<tr>
								<td valign="center" align="center">OE</td>
								<td valign="center" align="center">
									<input type="text" name="longe_oe_esferico" class="form-control"/>
								</td>
								<td valign="center" align="center">
									<input type="text" name="longe_oe_cilindrico" class="form-control"/>
								</td>
								<td valign="center" align="center">
									<input type="text" name="longe_oe_eixo" class="form-control"/>
								</td>
								<td valign="center" align="center">
									<input type="text" name="longe_oe_dp" class="form-control"/>
								</td>
							</tr>
							<tr>
								<td rowspan="2" colspan="2" valign="center" align="center">PERTO</td>
								<td valign="center" align="center">OD</td>
								<td valign="center" align="center">
									<input type="text" name="perto_od_esferico" class="form-control"/>
								</td>
								<td valign="center" align="center">
									<input type="text" name="perto_od_cilindrico" class="form-control"/>
								</td>
								<td valign="center" align="center">
									<input type="text" name="perto_od_eixo" class="form-control"/>
								</td>
								<td valign="center" align="center">
									<input type="text" name="perto_od_dp" class="form-control"/>
								</td>
							</tr>
							<tr>
								<td valign="center" align="center">OE</td>
								<td valign="center" align="center">
									<input type="text" name="perto_oe_esferico" class="form-control"/>
								</td>
								<td valign="center" align="center">
									<input type="text" name="perto_oe_cilindrico" class="form-control"/>
								</td>
								<td valign="center" align="center">
									<input type="text" name="perto_oe_eixo" class="form-control"/>
								</td>
								<td valign="center" align="center">
									<input type="text" name="perto_oe_dp" class="form-control"/>
								</td>
							</tr>
							<tr>
								<td valign="center" align="center" colspan="5" >Adição</td>
								<td valign="center" align="center" colspan="2" ><input type="text" name="addition" class="form-control"/></td>
							</tr>
							
						</tbody>
					</table>
				</div>

				<div class="form-group">
					<label for="description_lab">Observações Laboratório.</label>
					<textarea class="form-control" name="description_lab" style="height: 174px;">{{ $descriptionLabDefault }}</textarea>
				</div>

				<button type="submit" class="btn btn-default">Submit</button>
			</form>

		</div> 
	</div>
</div>

@endsection
