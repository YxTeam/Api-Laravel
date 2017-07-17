@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Adicionar uma nova disciplina</h1>
    <h4>Insira toda a informação sobre a disciplina.</h4>
    <a href="{{URL::route('disciplina.index')}}" class="btn btn-default">Voltar atrás</a>
    <hr>

    <form action="{{URL::route('disciplina.store')}}" method="POST">
        <div class="form-group">
            <label for="nome" class="control-label">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="tipo" class="control-label">Tipo:</label>
            <input type="number" id="tipo" name="tipo" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="ects" class="control-label">Ects:</label>
            <input type="number" id="ects" name="ects" class="form-control" required>
        </div>
        <input type="submit" class="btn btn-primary" value="Inserir">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
    </form>
</div>
@stop