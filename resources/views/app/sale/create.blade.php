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

			{!! Form::model($item, ['url' => $action, 'method' => 'POST']) !!}
				{{ Form::clientListPlus('client_id', 'Cliente', $clients) }}
				
				<div class="form-group">
					{{ Form::label('Condições de Pagamento', null, ['class' => 'control-label']) }}
    				{{ Form::textarea('condition', $conditionDefault, ['class' => 'form-control']) }}
				</div>
		
				<div class="form-group">
					{{ Form::label('Observações', null, ['class' => 'control-label']) }}
    				{{ Form::textarea('description', null, ['class' => 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('Valor Final', null, ['class' => 'control-label']) }}
    				{{ Form::text('value', null, ['class' => 'form-control', 'placeholder'=> '999.999,99']) }}
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
									{{ Form::text('longe_od_esferico', null, ['class' => 'form-control']) }}
								</td>
								<td valign="center" align="center">
									{{ Form::text('longe_od_cilindrico', null, ['class' => 'form-control']) }}
								</td>
								<td valign="center" align="center">
									{{ Form::text('longe_od_eixo', null, ['class' => 'form-control']) }}
								</td>
								<td valign="center" align="center">
									{{ Form::text('longe_od_dp', null, ['class' => 'form-control']) }}
								</td>
							</tr>
							<tr>
								<td valign="center" align="center">OE</td>
								<td valign="center" align="center">
									{{ Form::text('longe_oe_esferico', null, ['class' => 'form-control']) }}
								</td>
								<td valign="center" align="center">
									{{ Form::text('longe_oe_cilindrico', null, ['class' => 'form-control']) }}
								</td>
								<td valign="center" align="center">
									{{ Form::text('longe_oe_eixo', null, ['class' => 'form-control']) }}
								</td>
								<td valign="center" align="center">
									{{ Form::text('longe_oe_dp', null, ['class' => 'form-control']) }}
								</td>
							</tr>
							<tr>
								<td rowspan="2" colspan="2" valign="center" align="center">PERTO</td>
								<td valign="center" align="center">OD</td>
								<td valign="center" align="center">
									{{ Form::text('perto_od_esferico', null, ['class' => 'form-control']) }}
								</td>
								<td valign="center" align="center">
									{{ Form::text('perto_od_cilindrico', null, ['class' => 'form-control']) }}
								</td>
								<td valign="center" align="center">
									{{ Form::text('perto_od_eixo', null, ['class' => 'form-control']) }}
								</td>
								<td valign="center" align="center">
									{{ Form::text('perto_od_dp', null, ['class' => 'form-control']) }}
								</td>
							</tr>
							<tr>
								<td valign="center" align="center">OE</td>
								<td valign="center" align="center">
									{{ Form::text('perto_oe_esferico', null, ['class' => 'form-control']) }}
								</td>
								<td valign="center" align="center">
									{{ Form::text('perto_oe_cilindrico', null, ['class' => 'form-control']) }}
								</td>
								<td valign="center" align="center">
									{{ Form::text('perto_oe_eixo', null, ['class' => 'form-control']) }}
								</td>
								<td valign="center" align="center">
									{{ Form::text('perto_oe_dp', null, ['class' => 'form-control']) }}
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
					{{ Form::label('Observações Laboratório', null, ['class' => 'control-label']) }}
	    			{{ Form::textarea('description_lab', null, ['class' => 'form-control']) }}
				</div>

				{!! Form::submit('Submit', ['class' => 'btn btn-default']) !!}

            {!! Form::close() !!}
		</div> 
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="clientModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Novo Cliente</h4>
      </div>
      <div class="modal-body">
      	<div id="errorsHolder"></div>
        @include('app.client.form')
      </div>
    </div>
  </div>
</div>

@endsection

@section('js')
	<script type="text/javascript">
		$(document).ready(function(){
		});	

		function submitClienForm(){
			$.ajax({
                type: "POST",
                url : "/clients",
                data : $('#clientForm').serialize(),
                success : function(data){
                    location.reload();
                },
                error : function(jqXhr){
                	var data = jqXhr.responseJSON;

                    console.log(data);

		            errorsHtml = '<div class="alert alert-danger"><ul>';

			        $.each( data, function( key, value ) {
			            errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
			        });

		        errorsHtml += '</ul></di>';

		        $( '#clientModal #errorsHolder' ).html( errorsHtml );
                }
            },"json");
	    };
	</script>
	
@endsection