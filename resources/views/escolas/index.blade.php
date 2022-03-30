@extends('adminlte::page')

@section('title', 'SIGOES - Escolas')

@section('content_header')
    <h1>Escolas</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Escolas Cadastradas</h3>
      <div class="card-tools">
        <a class="btn btn-primary btn-sm" href="{{ route('escolas.create') }}">Cadastrar</a>
      </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered tabela-escolas">
          <thead>
            <tr>
                <th>Cód. Escola</th>
                <th>Nome</th>
                <th>INEP</th>
                <th>Ações</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($escolas as $escola)
                  <tr>
                      <td>{{ $escola->codigo }}</td>
                      <td>{{ $escola->nome }}</td>
                      <td>{{ $escola->inep }}</td>
                      <td class="align-center">
                          <a href="/escolas/{{ $escola->id}}/edit" class="btn btn-sm btn-primary">Editar</a>
                      </td>
                  </tr>
              @endforeach
          </tbody>
        </table>
    </div>
  </div>
@stop

@section('js')
<script>
    $(document).ready(function() {
        $('.tabela-escolas').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json'
            },
        });
    })
</script>
@stop

