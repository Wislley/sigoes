@extends('adminlte::page')

@section('title', 'SIGOES - Alunos')

@section('content_header')
    <h1>Alunos</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Buscar aluno</h3>
        <div class="card-tools">
            <a class="btn btn-primary btn-sm" href="{{ route('alunos.create') }}">Cadastrar</a>
        </div>
    </div>
    <div class="card-body">
        <form>
            @csrf
            <div class="input-group">
                <input type="text" class="form-control" name="busca" placeholder="Nome do aluno, código" aria-label="Nome do aluno, código" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <input type="submit" class="btn btn-primary" value="Pesquisar">
                </div>
              </div>
    </div>
</div>

@if (isset($alunos))
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Resultado da busca</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered tabela-alunos">
              <thead>
                <tr>
                  <th>Cód. Aluno</th>
                  <th>Nome</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($alunos as $aluno)
                      <tr>
                          <td>{{ $aluno->codigo }}</td>
                          <td>{{ $aluno->nome }}</td>
                          <td class="align-center">
                            <a href="/alunos/{{ $aluno->id }}/edit" class="btn btn-sm btn-primary">Editar</a>
                          </td>
                      </tr>
                  @endforeach
              </tbody>
            </table>
        </div>
    </div>
</div>
@endif
@stop

@section('js')
<script>
    $(document).ready(function() {
        $('.tabela-alunos').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json'
            },
        });
    })
</script>
@stop
