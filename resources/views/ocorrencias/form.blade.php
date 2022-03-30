@extends('adminlte::page')

@section('title', 'SIGOES - Ocorrências')

@section('content_header')
    <h1>Ocorrências</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Formulário de Ocorrências</h3>
    </div>
    <div class="card-body">
        {!! Form::open(['route' => 'ocorrencias.store', 'id' => 'formulario']) !!}
        <div class="row">
            {!! Form::hidden('escola_id', $user->escola->id) !!}
            <div class="form-group col-md-6">
                {!! Form::label('data_correncia', 'Data', []) !!}
                {!! Form::date('created_at', null, ['class' => 'form-control', 'required' => 'required']) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('turno', 'Turno', []) !!}
                {!! Form::select('turno', [1 => 'Manhã', 2 => 'Tarde', 3 => 'Noite'], null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-12">
                {!! Form::label('aluno', 'Aluno Envolvido', []) !!}
                {!! Form::select('aluno_id', $alunos, null, ['class' => 'form-control select_alunos', 'required' => 'required']) !!}
            </div>
            <div class="form-group col-md-12">
                {!! Form::label('outros_envolvidos', 'Outros Envolvidos', []) !!}
                {!! Form::textarea('outros_envolvidos', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-12">
                {!! Form::label('tipo_ocorrencia', 'Tipo da Ocorrência', []) !!}
                {!! Form::select('tipo_ocorrencia_id', $tiposOcorrencia, null, ['class' => 'form-control select_tipo_ocorrencia']) !!}
            </div>
            <div class="form-group col-md-12">
                {!! Form::label('detalhes', 'Detalhes da Ocorrência', []) !!}
                {!! Form::textarea('detalhes', null, ['class' => 'form-control', 'required' => 'required']) !!}
            </div>
            <div class="form-group col-md-12">
                {!! Form::label('medidas', 'Medida adotada', []) !!}
                {!! Form::select('medida_id', $medidas, null, ['class' => 'form-control select_medida', 'required' => 'required']) !!}
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
        $('.select_escolas').select2();
        $('.select_alunos').select2();
        $('.select_tipo_ocorrencia').select2();
        $('.select_medida').select2();
    })
</script>
@stop
