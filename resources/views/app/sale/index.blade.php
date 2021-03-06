@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="page-header">
			  <h1>Vendas <small>Lista</small></h1>
			</div>

			<div class="bs-example" data-example-id="striped-table"> 
				<table class="table table-striped"> 
					<thead> <tr> <th>#</th> <th>Cliente</th> <th>Data/Hora</th> <th>Açoes</th> </tr> </thead> 
					<tbody> 
					@foreach ($items as $item)
						<tr> 
							<th scope="row">{{ $item->id }}</th>
							<td>{{ $item->client->name }}</td>
							<td>{{ $item->created_at }}</td>
							<td>
								<a href="/sales/{{ $item->id }}/edit">Edit</a>

								<!-- <a href="#" onclick="event.preventDefault();
                                                     document.getElementById('delete-form-{{ $item->id }}').submit();">Del</a>

                                        <form id="delete-form-{{ $item->id }}" action="{{ route('sales.destroy', $item->id) }}" method="POST" style="display: none;">
                                        	<input name="_method" type="hidden" value="DELETE">
                                            {{ csrf_field() }}
                                        </form> -->
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>

				<a href="/sales/create"><button type="button" class="btn btn-primary btn-lg">Novo</button></a>
			</div>
		</div>
	</div>
</div>

@endsection
