@extends('adminlte::page')

@section('title', 'SIGOES - Diretores')

@section('content_header')
    <h1>Diretores</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Diretores Cadastrados</h3>
      <div class="card-tools">
        <a class="btn btn-primary btn-sm" href="{{ route('diretores.create') }}">Cadastrar</a>
      </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered tabela-diretores">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>E-mail</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($diretores as $diretor)
                      <tr>
                            <td>{{ $diretor->name }}</td>
                            <td>{{ $diretor->email }}</td>
                            <td>
                                <a href="/diretores/{{ $diretor->id}}/edit" class="btn btn-sm btn-primary">Editar</a>
                            </td>
                      </tr>
                  @endforeach
              </tbody>
            </table>
        </div>
    </div>
  </div>
@stop

@section('js')
<script>
    $(document).ready(function() {
        $('.tabela-diretores').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json'
            },
        });
    })
</script>
@stop
