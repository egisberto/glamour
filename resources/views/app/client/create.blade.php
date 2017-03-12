@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="page-header">
				<h1>Clientes 
					  <small>@if ($editMode) Edição @else Novo @endif</small>
				</h1>
			</div>
			
			@include('layouts.errors')
			@include('app.client.form')
		</div> 
	</div>
</div>

@endsection

@section('js')
	<script type="text/javascript">
		function submitClienForm(){
			$('#clientForm').submit();
	    };
	</script>
	
@endsection