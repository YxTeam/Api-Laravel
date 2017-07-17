@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Editar disciplina "{{ $disciplina->nome }}"</h1>
    <h4>Edite a informação pretendida e carregue no botão guardar.</h4>
    <a href="{{URL::route('disciplina.index')}}" class="btn btn-default">Voltar atrás</a>
    <hr>
    <form action="{{route('disciplina.update', $disciplina->id)}}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="id" class="control-label">Nº Disciplina:</label>
            <input type="text" id="id" name="id" class="form-control" value="{{ $disciplina->id }}" readonly>
        </div>
        <div class="form-group">
            <label for="nome" class="control-label">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" value="{{ $disciplina->nome }}">
        </div>
        <div class="form-group">
            <label for="tipo" class="control-label">Tipo:</label>
            <input type="number" id="tipo" name="tipo" class="form-control" value="{{ $disciplina->tipo }}">
        </div>
        <div class="form-group">
            <label for="ects" class="control-label">Ects:</label>
            <input type="number" id="ects" name="ects" class="form-control" value="{{ $disciplina->ects }}">
        </div>
        <input type="submit" class="btn btn-primary">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
    </form>
</div>
@stop