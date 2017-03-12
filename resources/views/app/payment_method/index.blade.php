@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="page-header">
			  <h1>Métodos de Pagamento <small>Lista</small></h1>
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

								<a href="#" onclick="event.preventDefault();
                                                     document.getElementById('delete-form-{{ $item->id }}').submit();">Del</a>

                                {!! Form::open(['route' => ['payment_methods.destroy', $item->id], 
                                	'method' => 'POST', 
                                	'id' => 'delete-form-' . $item->id]) !!}
                                	{{ Form::hidden('_method','DELETE') }}				
								{!! Form::close() !!}
							</td>
						</tr>

						<!-- <form id="delete-form-{{ $item->id }}" action="{{ route('payment_methods.destroy', $item->id) }}" method="POST" style="display: none;">
                                        	<input name="_method" type="hidden" value="DELETE">
                                            {{ csrf_field() }}
                                        </form> -->
					@endforeach
					</tbody>
				</table>

				<a href="/payment_methods/create"><button type="button" class="btn btn-primary btn-lg">Novo</button></a>
			</div>
		</div>
	</div>
</div>
@endsection