@extends('adminlte::page')

@section('title', 'SIGOES - Medidas')

@section('content_header')
    <h1>Medidas</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Medidas Cadastradas</h3>
      <div class="card-tools">
        <a class="btn btn-primary btn-sm" href="{{ route('medidas.create') }}">Cadastrar</a>
      </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered tabela-medidas">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($medidas as $medida)
                      <tr>
                            <td>{{ $medida->nome }}</td>
                            <td class="align-center">
                                <a href="/medidas/{{ $medida->id }}/edit" class="btn btn-sm btn-primary">Editar</a>
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
        $('.tabela-medidas').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json'
            },
        });
    })
</script>
@stop
