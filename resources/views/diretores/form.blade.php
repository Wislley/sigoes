@extends('adminlte::page')

@section('title', 'SIGOES - Diretores')

@section('content_header')
    <h1>Diretores</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Formulário de Diretores</h3>
    </div>
    <div class="card-body">
        @if(isset($diretor))
            {!! Form::model($diretor, ['route' => ['diretores.update', $diretor->id], 'method' => 'PUT', 'id' => 'formulario']) !!}
        @else
        {!! Form::open(['route' => 'diretores.store', 'id' => 'formulario']) !!}
        @endif
            <div class="row">
                <div class="form-group col-md-12">
                    {!! Form::label('name', 'Nome do Diretor') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
                <div class="form-group col-md-12">
                    {!! Form::label('email', 'Endereço de E-mail') !!}
                    {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
                <div class="form-group col-md-6">
                    {!! Form::label('password', 'Senha') !!}
                    {!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
                <div class="form-group col-md-6">
                    {!! Form::label('confirm_password', 'Confirme a Senha') !!}
                    {!! Form::password('confirm_password', ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
                <div class="form-group col-md-12">
                    {!! Form::label('escola_id', 'Selecione a Escola') !!}
                    {!! Form::select('escola_id', $escolas, isset($diretor) ? $diretor->escola->id : null, ['class' => 'form-control escola-select']) !!}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
    <div class="card-footer clearfix">
        {!! Form::submit('Salvar', ['class' => 'btn btn-primary float-right', 'form' => 'formulario']) !!}
        <a href="{{ route('diretores.index') }}" class="btn btn-danger float-right mr-2">Cancelar</a>
    </div>
  </div>
@stop

@section('js')
<script>
    $(document).ready(function() {
        $('.escola-select').select2();
    })
</script>
@stop

