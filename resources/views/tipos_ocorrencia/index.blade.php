@extends('adminlte::page')

@section('title', 'SIGOES - Tipos de Ocorrência')

@section('content_header')
    <h1>Tipos de Ocorrência</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Tipos de Ocorrência Cadastrados</h3>
      <div class="card-tools">
        <a class="btn btn-primary btn-sm" href="{{ route('tipos_ocorrencia.create') }}">Cadastrar</a>
      </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered tabela-tipos">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($tiposOcorrencia as $tipoOcorrencia)
                      <tr>
                          <td>{{ $tipoOcorrencia->nome }}</td>
                          <td>
                            <a href="/tipos_ocorrencia/{{ $tipoOcorrencia->id }}/edit" class="btn btn-sm btn-primary">Editar</a>
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
        $('.tabela-tipos').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json'
            },
        });
    })
</script>
@stop
