@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1>Adicionar uma nova curso</h1>
    <h4>Insira toda a informação sobre a curso.</h4>
    <a href="{{URL::route('curso.index')}}" class="btn btn-default">Voltar atrás</a>
    <hr>

    <form action="{{URL::route('curso.store')}}" method="POST">
        <div class="form-group">
            <label for="nome" class="control-label">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="anos" class="control-label">Número de Anos:</label>
            <select id="anos" name="anos" class="form-control" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <div class="form-group">
            <label for="coordenador" class="control-label">Coordenador de Curso:</label>
            <input type="text" id="coordenador" name="coordenador" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="tipo" class="control-label">Tipo:</label>
            <select id="tipo" name="tipo" class="form-control" required>
                <option value="Mestrado">Mestrado</option>
                <option value="Pós-Graduação">Pós-Graduação</option>
                <option value="Outro">Outro</option>
            </select>
        </div>
        <div class="form-group">
            <label for="disciplina" class="control-label">Disciplinas:</label>
            <select id="disciplina" name="disciplina[]" class="form-control" multiple required>
                @foreach($disciplinas as $disciplina)
                    <option value="<?php echo $disciplina->id; ?>"><?php echo $disciplina->nome; ?></option>
                @endforeach
            </select>
        </div>
        <input type="submit" class="btn btn-primary" value="Inserir">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
    </form>
</div>
@stop