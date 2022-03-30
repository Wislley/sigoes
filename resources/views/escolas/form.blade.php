@extends('adminlte::page')

@section('title', 'SIGOES - Escolas')

@section('content_header')
    <h1>Escolas</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Formulário de Escolas</h3>
    </div>
    <div class="card-body">
        @if(isset($escola))
            {!! Form::model($escola, ['route' => ['escolas.update', $escola->id], 'method' => 'PUT', 'id' => 'formulario']) !!}
        @else
        {!! Form::open(['route' => 'escolas.store', 'id' => 'formulario']) !!}
        @endif
            <div class="row">
                <div class="form-group col-md-6">
                    {!! Form::label('codigo', 'Código da Escola', []) !!}
                    {!! Form::text('codigo', null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
                <div class="form-group col-md-6">
                    {!! Form::label('inep', 'Cód. INEP', []) !!}
                    {!! Form::text('inep', null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
                <div class="form-group col-md-12">
                    {!! Form::label('nome', 'Nome da Escola', []) !!}
                    {!! Form::text('nome', null, ['class' => 'form-control', 'required']) !!}
                </div>
                <div class="form-group col-md-12">
                    {!! Form::label('telefone', 'Telefone', []) !!}
                    {!! Form::text('telefone', null, ['class' => 'form-control', 'required']) !!}
                </div>
                <div class="form-group col-md-12">
                    {!! Form::label('endereco', 'Endereço', []) !!}
                    {!! Form::text('endereco', null, ['class' => 'form-control', 'required']) !!}
                </div>

                <div class="form-group col-md-4">
                    {!! Form::label('cidade', 'Cidade', []) !!}
                    {!! Form::text('cidade', null, ['class' => 'form-control', 'required']) !!}
                </div>

                <div class="form-group col-md-4">
                    {!! Form::label('estado', 'Estado', []) !!}
                    {!! Form::text('estado', null, ['class' => 'form-control', 'required']) !!}
                </div>

                <div class="form-group col-md-4">
                    {!! Form::label('pais', 'País', []) !!}
                    {!! Form::text('pais', null, ['class' => 'form-control', 'required']) !!}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
    <div class="card-footer clearfix">
        {!! Form::submit('Salvar', ['class' => 'btn btn-primary float-right', 'form' => 'formulario']) !!}
        <a href="{{ route('escolas.index') }}" class="btn btn-danger float-right mr-2">Cancelar</a>
    </div>
  </div>
@stop

@section('js')
<script>
    $(document).ready(function() {
        $('#codigo').mask('#')
        $('#inep').mask('#')
        $('#telefone').mask('(00) 00000-0000')
    })
</script>
@stop
