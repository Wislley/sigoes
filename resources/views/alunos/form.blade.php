@extends('adminlte::page')

@section('title', 'SIGOES - Alunos')

@section('content_header')
    <h1>Alunos</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Formulário de Alunos</h3>
    </div>
    <div class="card-body">
        @if(isset($aluno))
        {!! Form::model($aluno, ['route' => ['alunos.update', $aluno->id], 'method' => 'PUT', 'id' => 'formulario']) !!}
        @else
        {!! Form::open(['route' => 'alunos.store', 'id' => 'formulario']) !!}
        @endif
            <div class="row">
                <div class="form-group col-md-12">
                    {!! Form::label('codigo', 'Código do Aluno', []) !!}
                    {!! Form::text('codigo', null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
                <div class="form-group col-md-12">
                    {!! Form::label('nome', 'Nome do Aluno') !!}
                    {!! Form::text('nome', null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
                <div class="form-group col-md-12">
                    {!! Form::label('responsavel', 'Nome do Responsável') !!}
                    {!! Form::text('responsavel', null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
                <div class="form-group col-md-12">
                    {!! Form::label('telefone_responsavel', 'Telefone do Responsável') !!}
                    {!! Form::text('telefone_responsavel', null, ['class' => 'form-control', 'required' => 'required']) !!}
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
        <a href="{{ route('alunos.index') }}" class="btn btn-danger float-right mr-2">Cancelar</a>
    </div>
  </div>
@stop

@section('js')
<script>
    $(document).ready(function() {
        $('#codigo').mask('#');
        $('#telefone_responsavel').mask('(00) 00000-0000');
    })
</script>
@stop
