@extends('adminlte::page')

@section('title', 'SIGOES - Escolas')

@section('content_header')
    <h1>Ocorrências</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Buscar Ocorrência</h3>
    </div>
    <div class="card-body">
        <form id="formulario">
            @csrf
            <div class="row">
                <div class="col-md-8 form-group">
                    {!! Form::label('escola', 'Escola', []) !!}
                    {!! Form::select('escola', $escolas, null, ['class' => 'form-control select_escolas']) !!}
                </div>
                <div class="col-md-4">
                    {!! Form::label('data_correncia', 'Data', []) !!}
                    {!! Form::date('created_at', null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-12">
                    {!! Form::label('nome_aluno', 'Nome do Aluno', []) !!}
                    {!! Form::text('nome_aluno', null, ['class' => 'form-control']) !!}
                </div>
            </div>
        </form>
    </div>
    <div class="card-footer clearfix">
        {!! Form::submit('Pesquisar', ['class' => 'btn btn-sm btn-primary float-right', 'form' => 'formulario']) !!}
    </div>
</div>

@if (isset($ocorrencias))
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Ocorrências</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered tabela-ocorrencias">
              <thead>
                <tr>
                  <th>Escola</th>
                  <th>Turno</th>
                  <th>Aluno</th>
                  <th>Tipo Ocorrência</th>
                  <th>Data</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($ocorrencias as $ocorrencia)
                      <tr>
                          <td>{{ $ocorrencia->escola->nome }}</td>
                          <td>{{ $turnos[$ocorrencia->turno] }}</td>
                          <td>{{ $ocorrencia->aluno->nome }}</td>
                          <td>{{ $ocorrencia->tipoOcorrencia->nome }}</td>
                          <td>{{ $ocorrencia->created_at->format('d/m/Y') }}</td>
                          <td class="text-center">
                              <a href="/ocorrencias/{{ $ocorrencia->id }}" class="btn btn-primary btn-sm">Visualizar</a>
                          </td>
                      </tr>
                  @endforeach
              </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer clearfix">
        {{-- {{ $escolas->links('paginacao')}} --}}
    </div>
  </div>
@endif
@stop

@section('js')
  <script>
      $(document).ready(function() {
            $('.select_escolas').select2();
            $('.tabela-ocorrencias').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json'
            },
        });
        });
  </script>
@stop
