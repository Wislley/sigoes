@extends('adminlte::page')

@section('title', 'SIGOES - Painel')
@section('content_header')
    @role('admin')
    <h1 class="text-center">Sistema de Gerenciamento de Ocorrências Escolares</h1>
    @else
    <h1 class="text-center">{{ $usuario->escola->nome }}</h1>
    @endrole
@stop

@section('content')
@role('diretor')
<div class="row justify-content-md-center">
    <div class="col-lg-3 col-6 align-self-center">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $ocorrencias }}</h3>
                <p>Ocorrências registradas</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="/ocorrencias" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
@else
<div class="row justify-content-md-center">
    <div class="col-lg-3 col-6 align-self-center">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $escolas }}</h3>
                <p>Escolas Cadastradas</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="/ocorrencias" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6 align-self-center">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $diretores }}</h3>
                <p>Diretores Cadastrados</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="/diretores" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    @endrole
</div>
@stop

