@extends('adminlte::page')

@section('title', 'SIGOES - Medidas')

@section('content_header')
    <h1>Medidas</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Formulário de Medida</h3>
    </div>
    <div class="card-body">
        @if(isset($medida))
        {!! Form::model($medida, ['route' => ['medidas.update', $medida->id], 'method' => 'PUT', 'id' => 'formulario']) !!}
        @else
        {!! Form::open(['route' => 'medidas.store', 'id' => 'formulario']) !!}
        @endif
            <div class="form-group">
                {!! Form::label('nome', 'Nome', []) !!}
                {!! Form::text('nome', null, ['class' => 'form-control', 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('status', 'Status', []) !!}
                {!! Form::select('status', [1 => 'Ativo', 0 => 'Inativo'], null, ['class' => 'form-control']) !!}
            </div>
        {!! Form::close() !!}
    </div>
    <div class="card-footer clearfix">
        {!! Form::submit('Salvar', ['class' => 'btn btn-primary float-right', 'form' => 'formulario']) !!}
        <a href="{{ route('medidas.index') }}" class="btn btn-danger float-right mr-2">Cancelar</a>
    </div>
  </div>
@stop

