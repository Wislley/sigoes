@extends('adminlte::page')

@section('title', 'SIGOES - Escolas')

@section('content_header')
    <h1>Detalhe da Ocorrência</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <p><strong>Código do Aluno: </strong>  {{ $ocorrencia->aluno->codigo }}</p>
        <p><strong>Nome do Aluno: </strong>  {{ $ocorrencia->aluno->nome }}</p>
        <p><strong>Escola: </strong>  {{ $ocorrencia->escola->nome }}</p>
        <p><strong>Turno: </strong>  {{ $turnos[$ocorrencia->turno] }}</p>
        <p><strong>Data da ocorrência: </strong>  {{ $ocorrencia->created_at->format('d/m/Y') }}</p>
        <p><strong>Tipo da ocorrência: </strong>  {{ $ocorrencia->tipoOcorrencia->nome }}</p>
        @if ($ocorrencia->outros_envolvidos)
            <p><strong>Outros envolvidos: </strong>  {{ $ocorrencia->outros_envolvidos }}</p>
        @endif
        <p><strong>Detalhes da ocorrência: </strong>  {{ $ocorrencia->detalhes }}</p>
        <p><strong>Medidas Adotadas: </strong>  {{ $ocorrencia->medida->nome }}</p>
        <p><strong>Nome do Responsável: </strong>  {{ $ocorrencia->aluno->responsavel }}</p>
        <p><strong>Telefone do Responsável: </strong>  {{ $ocorrencia->aluno->telefone_responsavel }}</p>
    </div>
    <div class="card-footer clearfix">
        <a class="btn btn-primary btn-sm float-right" href="{{ route('ocorrencias.index') }}">Voltar</a>
    </div>
  </div>
@stop

