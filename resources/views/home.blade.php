@extends('layouts.app')

@section('content')
<div class="container">
    @include('layouts.success')
    @include('layouts.errors')
    
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    Você está logado!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection