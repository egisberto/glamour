@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Lista de Métodos de Pagamento</div>
			</div>

			<div class="bs-example" data-example-id="striped-table"> 
				<table class="table table-striped"> 
					<thead> <tr> <th>#</th> <th>Nome</th> <th>Açoes</th> </tr> </thead> 
					<tbody> 
					@foreach ($items as $item)
						<tr> 
							<th scope="row">{{ $item->id }}</th>
							<td>{{ $item->name }}</td>
							<td>
								<a href="/payment_methods/{{ $item->id }}/edit">Edit</a>

								<a href="#"
                                            onclick="event.preventDefault();
                                                     document.getElementById('delete-form-{{ $item->id }}').submit();">Del</a>

                                        <form id="delete-form-{{ $item->id }}" action="{{ route('payment_methods.destroy', $item->id) }}" method="POST" style="display: none;">
                                        	<input name="_method" type="hidden" value="DELETE">
                                            {{ csrf_field() }}
                                        </form>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>

				<a href="/payment_methods/create"><span class="label label-primary">Novo</span></a>
			</div>
		</div>
	</div>
</div>

@endsection
