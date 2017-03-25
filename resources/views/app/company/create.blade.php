@extends('layouts.app')

@section('content')
<div class="container">
    <form class="form-horizontal" role="form" method="POST" action="{{ url('companies') }}">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Usuário</div>
                    <div class="panel-body">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="user[name]" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                {{ Form::text('user[name]', null, ['class' => 'form-control', 'required', 'autofocus']) }}

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="user[email]" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                {{ Form::email('user[email]', null, ['class' => 'form-control', 'required']) }}

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="user[password]" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                {{ Form::password('user[password]', null, ['class' => 'form-control', 'required']) }}

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="user[password_confirmation]" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                {{ Form::password('user[password_confirmation]', null, ['class' => 'form-control', 'required']) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Empresa</div>
                    <div class="panel-body">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="company[name]" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                {{ Form::text('company[name]', null, ['class' => 'form-control', 'required']) }}

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('company[name]') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cnpj') ? ' has-error' : '' }}">
                            <label for="company[cnpj]" class="col-md-4 control-label">CNPJ</label>

                            <div class="col-md-6">
                                {{ Form::text('company[cnpj]', null, ['class' => 'form-control cnpj', 'required',
                                    'placeholder'=> '99.999.999/9999-99', 'data-mask' => '00.000.000/0000-00', 'data-mask-reverse' =>'true']) }}

                                @if ($errors->has('cnpj'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cnpj') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="company[phone]" class="col-md-4 control-label">Telefone</label>

                            <div class="col-md-6">
                                {{ Form::text('company[phone]', null, ['class' => 'form-control phone', 
                                    'placeholder'=> '(99)99999-9999', 'data-mask' => '(00)0000-0000']) }}

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('celphone') ? ' has-error' : '' }}">
                            <label for="company[celphone]" class="col-md-4 control-label">Celular</label>

                            <div class="col-md-6">
                                {{ Form::text('company[celphone]', null, ['class' => 'form-control celphone', 
                                    'placeholder'=> '(99)99999-9999', 'data-mask' => '(00)0000-0000']) }}

                                @if ($errors->has('celphone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('celphone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-md-1 col-md-offset-5">
                    <button type="submit" class="btn btn-primary">
                        Criar Conta
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
